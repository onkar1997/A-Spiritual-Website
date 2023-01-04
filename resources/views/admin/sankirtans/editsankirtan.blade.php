@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container my-5 admincontainer">

    <h2 class="text-center">EDIT SANKIRTAN</h2>
    <hr>
    <a href="{{ url('admin/sankirtans') }}" class="btn btn-dark btn-sm float-left mr-2">Back</a>
    <div class="card shadow my-5 px-3">
        <div class="card-body">
            <form action="{{ route('updatesankirtan', $sankirtan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="row my-5">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Title :</label>
                            <input type="text" class="form-control" placeholder="Title" name="title"
                                value="{{$sankirtan->title}}">
                        </div>

                        <div class="form-group">
                            <label>Url :</label>
                            <input type="text" class="form-control" placeholder="Url" name="link"
                                value="{{$sankirtan->link}}">
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Watch Time" name="watch_time"
                                value="{{ $sankirtan->watch_time }}">
                        </div>

                        <div class="form-group">
                            <label>Cover Image : </label>
                            <img src="/storage/cover_images/{{ $sankirtan->cover_image }}"
                                alt="{{ $sankirtan->cover_image }}" height="20">
                            <br>
                            <input type="file" name="cover_image">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-5">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>