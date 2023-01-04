@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container my-5">

    <h2 class="text-center">ADD SANKIRTAN</h2>
    <hr>
    <a href="{{ url('admin/sankirtans') }}" class="btn btn-dark btn-sm float-left mr-2">Back</a>
    <div class="card shadow my-5 px-3">
        <div class="card-body">
            <form action="{{ route('postsankirtan') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row my-5">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Title" name="title" required>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Url" name="link" required>
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Watch Time" name="watch_time"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Cover Image : </label>
                            <input type="file" name="cover_image" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-5">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>