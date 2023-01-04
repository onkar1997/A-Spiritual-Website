@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container my-5">

    @include('layouts.messages')

    <h2 class="text-center">ORDER HISTORY</h2>

    <hr>

    <div class="container p-3 mt-2">


        @if (count($orders) > 0)
        <a href="{{ url('/admin/orders') }}" class="btn btn-dark btn-sm float-left mb-3">Back</a>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Order/Tracking No.</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $key => $order)
                <tr>
                    <th scope="row">{{ $orders->firstItem() + $key }}</th>
                    <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                    <td>{{ $order->tracking_no }}</td>
                    <td>&#8377; {{ $order->total_price }}</td>
                    <td>{{ $order->status == '0' ? 'pending' : 'completed' }}</td>
                    <td>
                        <a href="{{ url('admin/orders/order-history/view-order/'.$order->id) }}"
                            class="btn btn-primary btn-sm">View </a>

                        <a onclick="return confirm('Are you sure you want to delete ?')"
                            href="{{ url('delete-orderhistory/'.$order->id) }}" class="btn btn-sm btn-danger">
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="text-center">
            <h3 class="my-3 text-danger">Order Histroy Not Available ! ! !</h3>
            <a href="{{ url('/admin/orders') }}" class="btn btn-dark btn-sm">Back</a>
        </div>
        @endif
    </div>

    <div class="container">
        {{ $orders->links() }}
    </div>
</div>