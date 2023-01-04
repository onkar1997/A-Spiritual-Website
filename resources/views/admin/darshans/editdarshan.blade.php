@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container my-5">

    <h2 class="text-center">EDIT DARSHAN POST</h2>
    <hr>
    <a href="{{ url('admin/darshans') }}" class="btn btn-dark btn-sm float-left mr-2">Back</a>
    <div class="card shadow my-5 px-4">
        <div class="card-body">
            <form action="{{ route('updatedarshan', $darshan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="row my-4">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Title :</label>
                            <input type="text" class="form-control" placeholder="Title" name="title"
                                value="{{$darshan->title}}">
                        </div>

                        <div class="form-group">
                            <label>Url :</label>
                            <input type="text" class="form-control" placeholder="Url" name="link"
                                value="{{$darshan->link}}">
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Watch Time" name="watch_time"
                                value="{{ $darshan->watch_time }}">
                        </div>

                        <div class="form-group">
                            <label>Cover Image : </label>
                            <img src="/storage/cover_images/{{ $darshan->cover_image }}"
                                alt="{{ $darshan->cover_image }}" height="20">
                            <br>
                            <input type="file" name="cover_image">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>