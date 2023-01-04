@extends('layouts.app')

@include('layouts.navbar')

<div class="container my-5" id="module">

    <div class="row row-cols-1 row-cols-md-3 mt-5">
        @if(count($darshans) > 0)
        @foreach($darshans as $darshan)
        <div class="col mb-4">
            <a href="/darshans/{{($darshan->id)}}" style="text-decoration: none">
                <div class="card h-100" style="border:none">
                    <img src="/storage/cover_images/{{ $darshan->cover_image }}" class="card-img-top"
                        alt="{{ $darshan->cover_image }}" style="height: 13rem;">
                    <div class="card-body">
                        <h4 class="card-title" style="color:black"><strong>{{$darshan->title}}</strong></h4>
                        <span class="text-muted" style="font-style: italic;">
                            <i class="fas fa-eye text-primary"></i>
                            {{ $darshan->watch_time }} mins watch
                        </span>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        @else
        <div style="margin-left: 37%;">
            <h3 class="my-5 text-danger">No Darshans Posted ! ! !</h3>
        </div>
        @endif
    </div>

    <div class="container mt-4">
        {{ $darshans->links('pagination::bootstrap-4') }}
    </div>
</div>