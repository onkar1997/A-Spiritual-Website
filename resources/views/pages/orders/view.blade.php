@extends('layouts.app')

@include('layouts.navbar')

<div class="container text-center my-5">
    <div class="card shadow">
        <div class="card-header">
            <h3>Order View <a href="{{ url('dashboard') }}" class="btn btn-sm btn-dark float-left">Back</a></h3>
        </div>
        <div class="card-body">

            <div class="row mt-4 p-3">
                <div class="col-md-6 text-left shipping-details">
                    <h4>Shipping Details</h4>
                    <hr>
                    <label>First Name</label>
                    <div class="border p-2">{{ $orders->fname }}</div>
                    <label class="mt-2">Last Name</label>
                    <div class="border p-2">{{ $orders->lname }}</div>
                    <label class="mt-2">Email</label>
                    <div class="border p-2">{{ $orders->email }}</div>
                    <label class="mt-2">Contact No.</label>
                    <div class="border p-2">{{ $orders->phone }}</div>
                    <label class="mt-2">Shipping Address</label>
                    <div class="border p-2">
                        {{ $orders->address1 }}
                        <br>
                        {{ $orders->address2 }}
                        <br>
                        {{ $orders->city }},
                        {{ $orders->state }},
                        {{ $orders->country }}
                    </div>
                    <label class="mt-2">Zip Code</label>
                    <div class="border p-2">{{ $orders->pincode }}</div>
                </div>


                <div class="col-md-6 text-left">
                    <h4>Order Details</h4>
                    <hr>
                    <table class="table table-bordered">
                        <thead class="bg-primary text-light">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $mycount=1;
                            @endphp
                            @foreach($orders->orderitems as $item)
                            <tr>
                                <th scope="row">{{ $mycount++ }}</th>
                                <td>
                                    <img src="{{ asset('storage/shop/cover_images/'.$item->products->image) }}"
                                        alt="{{ $item->products->image }}" width="40px">
                                </td>
                                <td>{{ $item->products->name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ $item->price }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h5 class="float-right mr-4">Grand Total : &#8377; {{ $orders->total_price }}</h5>
                </div>
            </div>


        </div>

    </div>
</div>
</div>