<?php

namespace App\Http\Controllers\Joystick;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate(50);

        return view('joystick-admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('joystick-admin.orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return view('joystick-admin.orders.edit', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:2|max:80',
        ]);

        $order = Order::findOrFail($id);
        $order->sort_id = ($request->sort_id > 0) ? $request->sort_id : $order->count() + 1;
        $order->slug = (empty($request->slug)) ? str_slug($request->title) : $request->slug;
        $order->title = $request->title;
        $order->data = $request->data;
        $order->lang = $request->lang;
        $order->save();

        return redirect('/admin/orders')->with('status', 'Запись обновлена!');
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect('/admin/orders')->with('status', 'Запись удалена!');
    }
}