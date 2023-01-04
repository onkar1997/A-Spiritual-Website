@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container my-5">

    <h2 class="text-center">EDIT PRODUCT</h2>
    <hr>
    <a href="{{ url('admin/shop') }}" class="btn btn-dark btn-sm float-left mr-2">Back</a>
    <div class="card shadow my-5 px-4">
        <div class="card-body">
            <form action="{{ route('updateproduct', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="row my-4">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="name">Product Name :</label>
                            <input type="text" class="form-control" name="name" value="{{ $product->name }}">
                        </div>

                        <div class="form-group">
                            <label for="description">Description :</label>
                            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="qty">Quantity :</label>
                            <input type="text" class="form-control" name="qty" value="{{ $product->qty }}">
                        </div>

                        <div class="form-group">
                            <label>Original Price :</label>
                            <input type="text" class="form-control" name="original_price"
                                value="{{ $product->original_price }}">
                        </div>

                        <div class="form-group">
                            <label>Selling Price :</label>
                            <input type="text" class="form-control" name="selling_price"
                                value="{{ $product->selling_price }}">
                        </div>

                        <div class="form-group">
                            <label>Product Image : </label>
                            <img src="/storage/shop/cover_images/{{ $product->image }}" alt="{{ $product->image }}"
                                height="20">
                            <br>
                            <input type="file" name="cover_image">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-5">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>