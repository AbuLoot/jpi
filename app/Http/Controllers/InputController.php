<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Page;
use App\News;
use App\Product;

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

    public function addToCart(Request $request, $id)
    {
        if (Session::has('items')) {

            $items = Session::get('items');

            $items['product_ids'][$id] = $id;

            Session::set('items', $items);

            return response()->json(['alert' => 'Товар обновлен', 'arr' => Session::get('items')]);
        }

        $items = [];
        $items['product_ids'][$id] = $id;

        Session::set('items', $items);

        return response()->json(['alert' => 'Товар добавлен', 'arr' => Session::get('items')]);
    }
}
