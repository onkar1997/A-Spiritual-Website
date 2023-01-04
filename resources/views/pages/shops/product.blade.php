@extends('layouts.app')

@include('layouts.navbar')

<div class="container" style="margin-top: 5%;">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <img src="/storage/shop/cover_images/{{ $product->image }}" alt="{{$product->image}}"
                        class="img-fluid w-100">
                </div>

                <div class="col-md-8">
                    <h3>{{$product->name}}</h3>

                    <hr>

                    <span class="mr-5">
                        Original Price :
                        <span style="text-decoration: line-through;">
                            &#8377; {{$product->original_price}}
                        </span>
                    </span>

                    <span>
                        <strong>Selling Price : &#8377; {{$product->selling_price}}</strong>
                    </span>

                    <p class="mt-4">{{$product->description}}</p>

                    <hr>

                    {{-- stock --}}
                    <div class="row">
                        <div class="col">
                            @if($product->qty > 0)
                            <label class="badge badge-success">In stock</label>
                            @else
                            <label class="badge badge-danger">Out of stock</label>
                            @endif
                        </div>
                    </div>

                    {{-- quantity --}}
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <input type="hidden" value="{{ $product->id }}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center  mb-3" style="width: 130px;">
                                <div class="input-group-prepend">
                                    <button class="input-group-text decrement-btn">-</button>
                                </div>
                                @if($product->qty == 0)
                                <input type="text" class="form-control text-center qty-input" value="0" disabled>
                                @else
                                <input type="text" class="form-control text-center qty-input" value="1">
                                @endif
                                <div class="input-group-append">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- add to cart --}}
                    <div class="row">
                        <div class="col-md-4">
                            @if($product->qty <= 0) <button class="btn btn-primary btn-block my-3 addToCartBtn"
                                disabled>
                                Add To Cart
                                </button>
                                @else
                                <button class="btn btn-primary btn-block my-3 addToCartBtn">
                                    Add To Cart
                                </button>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="container my-5">
    <div class="card shadow product_data">
        <div class="row mt-5 top">
            <div class="col-lg-2 col-sm-12">
            </div>
            <div class="col-lg-8 col-sm-12">
                <h1 class="text-center">{{$product->name}}</h1>
            </div>
            <div class="col-lg-2 col-sm-12">
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-lg-4 p-4">
                <img src="/storage/shop/cover_images/{{ $product->image }}" alt="{{$product->image}}"
                    class="img-fluid w-100">
            </div>
            <div class="col-lg-8">
                <p>{{$product->description}}</p>
                @if($product->qty > 9)
                <label class="badge badge-success">In stock :
                    {{$product->qty}}</label>
                @elseif($product->qty >= 1 && $product->qty <= 9) <label class="badge badge-warning">In stock :
                    {{$product->qty}}</label>
                    @else
                    <label class="badge badge-danger">Out of stock : {{$product->qty}}</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <input type="hidden" value="{{ $product->id }}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center  mb-3" style="width: 130px;">
                                <div class="input-group-prepend">
                                    <button class="input-group-text decrement-btn">-</button>
                                </div>
                                @if($product->qty == 0)
                                <input type="text" class="form-control text-center qty-input" value="0" disabled>
                                @else
                                <input type="text" class="form-control text-center qty-input" value="1">
                                @endif
                                <div class="input-group-append">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <p class="card-title">Original Price:
                                <span style="text-decoration: line-through;">&#8377;
                                    {{$product->original_price}}/-</span>
                            </p>
                            <p class="card-text text-left" style="font-weight:bold;">Selling Price:
                                &#8377; {{$product->selling_price}}/-
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            @if($product->qty == 0)
                            <button class="btn btn-success btn-block my-3 addToCartBtn" disabled>Add
                                To
                                Cart</button>
                            @else
                            <button class="btn btn-success btn-block my-3 addToCartBtn">Add
                                To
                                Cart</button>
                            @endif
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                    </div>

            </div>
        </div>

        <div class="row mt-2 mb-5 p-4">
            <div class="col-lg-12">
                <small class="text-muted" style="font-style: italic;">Posted On :- {{$product->created_at}}</small>
            </div>

            <div class="col-lg-2 col-sm-12 mt-3">
                <a href="/shop" class="btn btn-dark">Go Back</a>
            </div>
        </div>
    </div>
</div> --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function() {
        // increment quantity
        $(".increment-btn").click(function(e){
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
        $(".decrement-btn").click(function(e){ 
            e.preventDefault(); 
            var dec_value=$(this).closest('.product_data').find('.qty-input').val(); 
            var value=parseInt(dec_value, 10);
            value=isNaN(value) ? 0 : value; 
            if(value> 1)
            {
                value--;
                $(this).closest('.product_data').find('.qty-input').val(value);
            }
        });

        // Add to cart 
        $(".addToCartBtn").click(function(e) {
            e.preventDefault();

            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.qty-input').val();
            
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: "POST",
                url: "/add-to-cart",
                data: {
                    'product_id': product_id,
                    'product_qty': product_qty,
                },
                success: function(response) {
                    swal(response.status);
                }
            });

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