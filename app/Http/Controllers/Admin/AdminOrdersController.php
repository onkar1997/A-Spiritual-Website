<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrdersController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', '0')->latest()->paginate(10);
        return view('admin.orders.orders')->with('orders', $orders);
    }

    public function view($id)
    {
        $orders = Order::where('id', $id)->first();
        return view('admin.orders.vieworder')->with('orders', $orders);
    }

    public function update(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('admin/orders')->with('success', 'Order Updated Successfully');
    }

    public function orderhistory()
    {
        $orders = Order::where('status', '1')->paginate(10);
        return view('admin.orders.orderhistory')->with('orders', $orders);
    }

    public function destroy($id)
    {
        $orders = Order::findOrFail($id);
        $orders->delete();
        return redirect('admin/orders/order-history')->with('success', 'Order History Deleted Successfully');
    }
}
