<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function addProduct(Request $request) 
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if(Auth::check())
        {
            $prod_check = Product::where('id', $product_id)->first();

            if($prod_check) 
            {
                if(Cart::where('prod_id', $product_id)->where('user_id', Auth::id())->exists())
                {
                    return response()->json(['status' => $prod_check->name." already added to cart"]);
                }
                else 
                {
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->prod_qty = $product_qty;
                    $cartItem->user_id = Auth::id();
                    $cartItem->save();

                    return response()->json(['status' => $prod_check->name." added to cart"]);
                }
            }
        }
        else 
        {
            return response()->json(['status' => "Login to continue"]);
        }
    }

    public function viewCart()
    {
        $mycart = Cart::where('user_id', Auth::id())->get();
        return view('pages.shops.cart', compact('mycart'));
    }

    public function updateCart(Request $request) 
    {
        $prod_id = $request->input('prod_id');   
        $product_qty = $request->input('prod_qty');   

        if(Auth::check())
        {
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartItem->prod_qty = $product_qty;
                $cartItem->update();

                return response()->json(['status' => "Quantity updated successfully"]);
            }
        }
        else
        {
            return response()->json(['status' => "Login to continue"]);
        }
    }

    public function destroy(Request $request) 
    {   
        if(Auth::check())
        {
            $prod_id = $request->input('prod_id');   
            if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
            {
                $cartItem = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartItem->delete();

                return response()->json(['status' => "Product deleted successfully"]);
            }
        }
        else
        {
            return response()->json(['status' => "Login to continue"]);
        }

    }
}
