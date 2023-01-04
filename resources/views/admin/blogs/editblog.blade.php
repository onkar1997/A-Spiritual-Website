@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container my-5">

    <h2 class="text-center">EDIT BLOG</h2>
    <hr>
    <a href="{{ url('admin/blogs') }}" class="btn btn-dark btn-sm float-left mr-2">Back</a>
    <div class="card shadow my-5 px-4">
        <div class="card-body">
            <form action="{{ route('updateblog', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="row my-4">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Title :</label>
                            <input type="text" class="form-control" placeholder="Title" name="title"
                                value="{{$blog->title}}">
                        </div>

                        <div class="form-group">
                            <label>Paragraph 1 :</label>
                            <textarea class="form-control" placeholder="Paragraph 1"
                                name="body">{{$blog->body}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Paragraph 2 :</label>
                            <textarea class="form-control" placeholder="Paragraph 2"
                                name="body2">{{$blog->body2}}</textarea>
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Read Time" name="read_time"
                                value="{{$blog->read_time}}">
                        </div>

                        <div class=" form-group">
                            <label>Cover Image : </label>
                            <img src="/storage/cover_images/{{ $blog->cover_image }}" alt="{{ $blog->cover_image }}"
                                height="20">
                            <br>
                            <input type="file" name="cover_image">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block MT-5">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>