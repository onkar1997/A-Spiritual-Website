@extends('layouts.app')

@include('layouts.navbar')

<div class="container my-5" id="module">
    <div class="row row-cols-1 row-cols-md-3 mt-5">
        @if(count($products) > 0)
        @foreach($products as $product)
        <div class="col mb-4">
            <a href="/shop/product/{{ $product->id }}" style="text-decoration: none">
                <div class="card h-100 shadow" style="border: none">
                    <img src="/storage/shop/cover_images/{{ $product->image }}" class="card-img-top p-2"
                        style="height: 13rem;" alt="{{ $product->cover_image }}">
                    <div class="card-body">
                        <h4 class="card-title" style="color:black"><strong>{{$product->name}}</strong></h4>

                        @if($product->qty > 0)
                        <span class="badge badge-success">Left {{$product->qty}}</span>
                        @else
                        <span class="badge badge-danger text-light">Out Of Stock</span>
                        @endif

                        <div class="row mt-3 mb-2">
                            <div class="col-md-4">
                                <p class="card-text"
                                    style="font-weight:bold; text-decoration: line-through; color: black;">
                                    &#8377; {{
                                    $product->original_price }}
                                </p>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <p class="card-text" style="font-weight:bold; color: black;">
                                    &#8377; {{
                                    $product->selling_price }}
                                </p>
                            </div>
                        </div>

                        <small class="text-muted" style="font-style: italic;">Posted On :-
                            {{$product->created_at}}</small>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        @else
        <div style="margin-left: 37%;">
            <h3 class="my-5 text-danger">No Products Found ! ! !</h3>
        </div>
        @endif
    </div>

    <div class="container mt-4">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>
</div>