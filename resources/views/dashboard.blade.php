@extends('layouts.app')

@include('layouts.navbar')

<div class="container text-center my-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-light">
            <h3>My Orders</h3>
        </div>
        <div class="card-body">
            <div class="row mt-3">
                <div class="col">
                    @if (count($orders) > 0)
                    <table class="table table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No.</th>
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
                                <td>{{ $order->tracking_no }}</td>
                                <td>&#8377; {{ $order->total_price }}</td>
                                <td>{{ $order->status == '0' ? 'Not Delivered' : 'Delivered' }}</td>
                                <td>
                                    <a href="{{ url('view-order/'.$order->id) }}"
                                        class="btn btn-primary btn-sm">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <hr>
                    <div class="container text-center">
                        <h3 class="text-danger">You have not ordered yet</h3>
                        <a href="{{ url('/shop') }}" class="btn btn-primary btn-md">Go to Shop</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <p>{{ $orders->links('pagination::bootstrap-4') }}</p>
</div>


{{-- Sweetalert--}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session('status'))
<script>
    swal("{{ session('status') }}");
</script>
@endif