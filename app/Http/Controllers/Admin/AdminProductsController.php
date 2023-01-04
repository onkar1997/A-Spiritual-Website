<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminProductsController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(7);
        return view('admin.shops.shop')->with('products', $products);
    }

    public function create()
    {
        return view('admin.shops.addproduct');
    }

    public function store(Request $request)
    {
        // Handle file upload
        if($request->hasFile('image')){
            // get filename with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            // get just filename 
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // get just extension 
            $extension = $request->file('image')->getClientOriginalExtension();

            // filenameto store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            // upload image
            $path = $request->file('image')->storeAs('public/shop/cover_images', $fileNameToStore);
        }

        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->qty = $request->input('qty');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->image = $fileNameToStore;

        $product->save();

        return redirect('/admin/shop')->with('success', 'Product Added');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.shops.editproduct')->with('product', $product);
    }

    public function update(Request $request,  $id)
    {
        // Handle file upload
        if($request->hasFile('image')){
            // get filename with extension
            $fileNameWithExt = $request->file('image')->getClientOriginalName();

            // get just filename 
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // get just extension 
            $extension = $request->file('image')->getClientOriginalExtension();

            // filenameto store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            // upload image
            $path = $request->file('image')->storeAs('public/shop/cover_images', $fileNameToStore);
        }
        else{
            $fileNameToStore = Product::find($id)->image;
        }

        // Create
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->qty = $request->input('qty');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->image = $fileNameToStore;

        $product->save();

        return redirect('/admin/shop')->with('success', 'Product Updated');
    }

    public function destroy($id)
    {
        $products = Product::findOrFail($id);

        $products->delete();

        return redirect('/admin/shop')->with('success', 'Product Deleted');
    }
}
