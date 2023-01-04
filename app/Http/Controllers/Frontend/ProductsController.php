<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductsController extends Controller
{
    public function index() {
        $products = Product::latest()->paginate(9);
        return view('pages.shops.shop')->with('products', $products);
    }

    public function show($id) {
        $product = Product::find($id);
        return view('pages.shops.product')->with('product', $product);
    }
}
