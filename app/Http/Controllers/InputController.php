<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Page;
use App\News;
use App\Product;
use App\Country;
use App\Order;

class InputController extends Controller
{
    public function search(Request $request)
    {
        $text = trim(strip_tags($request->text));

        $news = News::where('status', 1)
            ->where(function($query) use ($text) {
                return $query->where('title', 'LIKE', '%'.$text.'%')
                ->orWhere('headline', 'LIKE', '%'.$text.'%')
                ->orWhere('content', 'LIKE', '%'.$text.'%');
            })->paginate(10);

	    $products = Product::where('status', 1)
	        ->where(function($query) use ($text) {
	            return $query->where('title', 'LIKE', '%'.$text.'%')
	            ->orWhere('description', 'LIKE', '%'.$text.'%')
	            ->orWhere('characteristic', 'LIKE', '%'.$text.'%');
	        })->paginate(10);

        return view('site.found', compact('text', 'news', 'products'));
    }

    public function clearCart()
    {
        Session::forget('items');

        return redirect('/');
    }

    public function addToCart(Request $request, $id)
    {
        if (Session::has('items')) {

            $items = Session::get('items');

            $items['products_id'][$id] = $id;

            $count = count($items['products_id']);

            Session::set('items', $items);

            return response()->json(['alert' => 'Товар обновлен', 'countItems' => $count]);
        }

        $items = [];
        $items['products_id'][$id] = $id;

        Session::set('items', $items);

        return response()->json(['alert' => 'Товар добавлен', 'countItems' => 1]);
    }

    public function basket()
    {
        if (Session::has('items')) {

            $items = Session::get('items');
            $products = Product::whereIn('id', $items['products_id'])->get();

        }
        else {
            $products = collect();
        }

        return view('site.basket', compact('products'));
    }

    public function order()
    {
        $countries = Country::all();

        if (Session::has('items')) {

            $items = Session::get('items');
            $products = Product::whereIn('id', $items['products_id'])->get();

        }

        return view('site.order', compact('products', 'countries'));
    }

    public function storeOrder(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|min:6',
            'city_id' => 'numeric',
            'address' => 'required',
        ]);

        $items = Session::get('items');
        $products = Product::whereIn('id', $items['products_id'])->get();

        $order = new Order;

        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        // $order->city_id = $request->city_id;
        $order->address = $request->address;
        $order->count = count($items['products_id']);
        $order->price = $products->sum('price');
        $order->amount = $products->sum('price');
        $order->save();

        $order->products()->attach($items['products_id']);

        Session::forget('items');

        return redirect('/')->with('status', 'Заказ принят!');
    }

    public function destroy($id)
    {
        $items = Session::get('items');

        unset($items['products_id'][$id]);

        Session::set('items', $items);

        return redirect('basket');
    }
}
