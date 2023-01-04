@extends('layouts.app')

@include('layouts.navbar')

<div class="container my-5">
    <div class="row mb-5">
        <div class="col frm">
            {{-- <iframe src="{{ $darshan->link }}" style="height: 75vh; width: 100%;"></iframe> --}}
            <embed src="{{ $darshan->link }}" style="height: 75vh; width: 100%;" type="application/pdf" />
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col">
            <h1 class="text-center"><strong>{{$darshan->title}}</strong></h1>
        </div>
    </div>

    <div class="row text-center mt-2" style="font-style: italic">
        <div class="col">
            <span class="text-muted"><i class="fas fa-clock text-danger"></i> Posted On : {{ $darshan->created_at }} ·
            </span>
            <span class="text-muted"><i class="fas fa-eye text-primary"></i> {{ $darshan->watch_time }} mins
                watch</span>
        </div>
    </div>

    <hr>
</div>