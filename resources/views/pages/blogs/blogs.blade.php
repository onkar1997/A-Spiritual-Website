@extends('layouts.app')

@include('layouts.navbar')

<div class="container my-5">
    <div class="row row-cols-1 row-cols-md-3 mt-5">
        @if(count($blogs) > 0)
        @foreach($blogs as $blog)
        <div class="col mb-4">
            <a href="/blogs/{{($blog->id)}}" style="text-decoration: none">
                <div class="card h-100" style="border: none;">
                    <img src="/storage/cover_images/{{ $blog->cover_image }}" class="card-img-top"
                        alt="{{ $blog->cover_image }}" style="height: 13rem;">
                    <div class="card-body">
                        <h4 class="card-title" style="color:black"><strong>{{$blog->title}}</strong></h4>
                        <span class="text-muted"><i class="fas fa-book-open text-primary"></i> {{ $blog->read_time }}
                            min read</span>
                    </div>
                </div>
            </a>

        </div>
        @endforeach
        @else
        <div style="margin-left: 37%;">
            <h3 class="my-5 text-danger">No Blogs Posted ! ! !</h3>
        </div>
        @endif
    </div>

    <div class="container">
        {{ $blogs->links('pagination::bootstrap-4') }}
    </div>
</div>