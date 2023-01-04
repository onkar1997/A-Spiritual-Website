@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container my-5">

    <h2 class="text-center">PRODUCTS</h2>
    <hr>

    @include('layouts.messages')

    <div class="container my-5">
        @if(count($products) > 0)
        <a href="{{ url('admin/dashboard') }}" class="btn btn-dark btn-sm float-left mr-2">Back</a>
        <a href="{{ url('admin/shop/addproduct') }}" class="btn btn-primary btn-sm mb-3">
            <i class="fas fa-plus"></i> Add Product
        </a>

        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $key => $product)
                <tr>
                    <th scope="row">{{ $products->firstItem() + $key }}</th>
                    <td>
                        <img src="/storage/shop/cover_images/{{ $product->image }}" alt="{{$product->image}}"
                            height="40" width="70px" style="border-radius: 5px;">
                    </td>
                    <td>{{$product->name}}</td>
                    <td>
                        <a href="{{ route('editproduct', $product->id) }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure you want to delete ?')"
                            href="{{ route('deleteproduct', $product->id) }}" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div style="margin-left: 37%;">
            <h3 class="my-5 text-danger">No Products Posted ! ! !</h3>
            <a href="{{ url('admin/dashboard') }}" class="btn btn-dark btn-sm mr-2">Back</a>
            <a href="{{ url('admin/shop/addproduct') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Product
            </a>
        </div>
        @endif
    </div>

    <div class="container">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>
</div>