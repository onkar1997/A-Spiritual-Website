@extends('layouts.app')

@include('layouts.navbar')

<div class="container my-5">
    <div class="row mb-5">
        <div class="col">
            <iframe src="{{ $sankirtan->link }}" style="height: 75vh; width: 100%;"></iframe>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col">
            <h1 class="text-center"><strong>{{$sankirtan->title}}</strong></h1>
        </div>
    </div>

    <div class="row text-center mt-2" style="font-style: italic">
        <div class="col">
            <span class="text-muted"><i class="fas fa-clock text-danger"></i> Posted On : {{ $sankirtan->created_at }} ·
            </span>
            <span class="text-muted"><i class="fas fa-eye text-primary"></i> {{ $sankirtan->watch_time }} mins
                watch</span>
        </div>
    </div>

    <hr>
</div>