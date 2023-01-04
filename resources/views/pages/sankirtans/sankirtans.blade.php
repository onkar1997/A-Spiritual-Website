@extends('layouts.app')

@include('layouts.navbar')

<div class="container my-5" id="module">
    <div class="row row-cols-1 row-cols-md-3 mt-5">
        @if(count($sankirtans) > 0)
        @foreach($sankirtans as $sankirtan)
        <div class="col mb-4">
            <a href="/sankirtans/{{($sankirtan->id)}}" style="text-decoration: none">
                <div class="card h-100" style="border:none">
                    <img src="/storage/cover_images/{{ $sankirtan->cover_image }}" class="card-img-top"
                        alt="{{ $sankirtan->cover_image }}" style="height: 13rem;">
                    <div class="card-body">
                        <h4 class="card-title" style="color:black"><strong>{{$sankirtan->title}}</strong></h4>
                        <span class="text-muted" style="font-style: italic;">
                            <i class="fas fa-eye text-primary"></i>
                            {{ $sankirtan->watch_time }} mins watch
                        </span>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        @else
        <div style="margin-left: 37%;">
            <h3 class="my-5 text-danger">No Sankirtan Posted ! ! !</h3>
        </div>
        @endif
    </div>

    <div class="container mt-4">
        {{ $sankirtans->links('pagination::bootstrap-4') }}
    </div>
</div>