<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function index() {
        $orders = Order::where('user_id', Auth::id())->latest()->Paginate(10);
        return view('dashboard', compact('orders'));
    }

    public function view($id) {
        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        return view('pages.orders.view', compact('orders'));
    }
}
