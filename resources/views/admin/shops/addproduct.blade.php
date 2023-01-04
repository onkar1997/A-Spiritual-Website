@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container my-5">

    <h2 class="text-center">ADD PRODUCT</h2>
    <hr>
    <a href="{{ url('admin/shop') }}" class="btn btn-dark btn-sm float-left mr-2">Back</a>
    <div class="card shadow my-5 px-4">
        <div class="card-body">
            <form action="{{ route('postproduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row my-4">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Product Name" name="name" required>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="description" placeholder="Description..."
                                required></textarea>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Quantity" name="qty" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Original Price" name="original_price"
                                required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Selling Price" name="selling_price"
                                required>
                        </div>


                        <div class="form-group">
                            <label>Product Image : </label>
                            <input type="file" name="image" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-5">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>