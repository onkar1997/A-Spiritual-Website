@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container my-5">
    <h2 class="text-center">ADD BLOG</h2>
    <hr>
    <a href="{{ url('admin/blogs') }}" class="btn btn-dark btn-sm float-left mr-2">Back</a>
    <div class="card shadow my-5 px-4">
        <div class="card-body">
            <form action="{{ route('postblog') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row my-4">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Title" name="title" required>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" placeholder="Paragraph 1" name="body" required></textarea>
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" placeholder="Paragraph 2" name="body2" required></textarea>
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Read Time" name="read_time" required>
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