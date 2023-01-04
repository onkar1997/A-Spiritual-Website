@extends('layouts.app')

@include('layouts.navbar')

<div class="container my-5">


    <div class="card shadow cart">
        <div class="card-header">
            <h2 class="text-center">My Cart</h2>
        </div>
        <div class="card-body">
            @php
            $total = 0;
            @endphp
            @if(count($mycart) > 0)
            @foreach($mycart as $item)
            <div class="row product_data">
                <div class="col-md-2">
                    <img src="{{ asset('storage/shop/cover_images/'.$item->products->image) }}"
                        alt="{{ $item->products->image }}" class="img-fluid" height="70px" width="70px">
                </div>
                <div class="col-md-4 mt-3">
                    <h4>{{$item->products->name}}</h4>
                </div>
                <div class="col-md-2 mt-3">
                    <h4>&#8377; {{$item->products->selling_price}}</h4>
                </div>
                <div class="col-md-2" style="margin-top: -8px;">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    @if($item->products->qty >= $item->prod_qty)
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center  mb-3" style="width: 130px;">
                        <div class="input-group-prepend">
                            <button class="input-group-text changeQuantity decrement-btn">-</button>
                        </div>

                        <input type="text" class="form-control text-center qty-input" value="{{ $item->prod_qty }}">

                        <div class="input-group-append">
                            <button class="input-group-text changeQuantity increment-btn">+</button>
                        </div>
                    </div>
                    @php
                    $total += $item->products->selling_price * $item->prod_qty;
                    @endphp
                    @else
                    <h6 class="mt-4 text-danger">Out Of Stock</h6>
                    @endif
                </div>
                <div class="col-md-2 mt-4">
                    <button class="btn btn-danger delete-cart-item">Remove</button>
                </div>
            </div>
            <hr>

            @endforeach
            @else
            <div style="margin-left: 37%;">
                <h3 class="my-5 text-danger">No Products In The Cart ! ! !</h3>
            </div>
            @endif
        </div>
        <div class="card-footer">
            <div class="row">
                @if(count($mycart) > 0)
                <div class="col-md-6">
                    <h4>Total Price : &#8377; {{ $total }}</h4>
                </div>
                <div class="col-md-3" style="margin-left: 7%;">
                    <a href="{{ url('shop') }}" class="btn btn-primary float-right">Continue Shopping</a>
                </div>
                <div class="col-md-3" style="margin-left: -7%;">
                    <a href="{{ url('checkout') }}" class="btn btn-success float-right">Proceed To Checkout</a>
                </div>
                @else
                <div class="col-md-9"></div>
                <div class="col-md-3">
                    <a href="{{ url('shop') }}" class="btn btn-outline-primary float-right">Continue Shopping</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script>
    // increment quantity  
    $(document).on('click', '.increment-btn', function(e) {
        e.preventDefault();
        
        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value < 10)
        {
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    // decrement quantity
    $(document).on('click', '.decrement-btn', function(e) {
        e.preventDefault();
        
        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if(value > 1)
        {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

    // delete-cart-item
    $(document).on('click', '.delete-cart-item', function(e) {

        e.preventDefault();
        
        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {
                'prod_id': prod_id,
            },
            success: function(response) {
                // loadcart();  
                $('.cart').load(location.href + " .cart");
                swal(response.status);
            }
        });
    });

    // update cart item
    $(document).on('click', '.changeQuantity', function(e) {
        e.preventDefault();

        var prod_id = $(this).closest('.product_data').find('.prod_id').val();
        var prod_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            method: "POST",
            url: "update-cart-item",
            data: {
                'prod_id': prod_id,
                'prod_qty': prod_qty,
            },
            success: function(response) {
                $('.cart').load(location.href + " .cart");
            }
        });

    });
    
</script>

{{-- Sweetalert--}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session('status'))
<script>
    swal("{{ session('status') }}");
</script>
@endif