@extends('layouts.app')

@include('layouts.navbar')

<div class="container mt-1" style="width:73%;">
    <div class="row mb-5">
        <div class="col">
            <img src="/storage/cover_images/{{ $blog->cover_image }}" alt="{{$blog->cover_image}}" class="img-fluid"
                style="height: 75vh; width: 100vw;">
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col">
            <h1 class="text-center"><strong>{{$blog->title}}</strong></h1>
        </div>
    </div>

    <div class="row text-center mt-2" style="font-style: italic">
        <div class="col">
            <span class="text-muted"><i class="fas fa-clock text-danger"></i> Posted On :- {{$blog->created_at}} ·
            </span>
            <span class="text-muted"><i class="fas fa-book-open text-primary"></i> {{ $blog->read_time }} min
                read</span>
        </div>
    </div>

    <hr>

    <div class="row mt-5 mb-5">
        <div class="col">
            <p class="text-center">{{$blog->body}}</p>
            <p class="text-center">{{$blog->body2}}</p>
        </div>
    </div>
</div>