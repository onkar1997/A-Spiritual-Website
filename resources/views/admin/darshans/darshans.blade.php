@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container my-5">

    @include('layouts.messages')

    <h2 class="text-center">DIVINE DARSHANS</h1>
        <hr>

        <div class="container my-5">
            @if(count($darshans) > 0)
            <a href="{{ url('admin/dashboard') }}" class="btn btn-dark btn-sm float-left mr-2">Back</a>
            <a href="{{ url('admin/darshans/adddarshan') }}" class="btn btn-primary btn-sm mb-3">
                <i class="fas fa-plus"></i> Add Darshan
            </a>
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($darshans as $key => $darshan)
                    <tr>
                        <th scope="row">{{ $darshans->firstItem() + $key }}</th>
                        <td>
                            <img src="/storage/cover_images/{{ $darshan->cover_image }}" alt="{{$darshan->cover_image}}"
                                height="40" width="70px" style="border-radius: 5px;">
                        </td>
                        <td>{{$darshan->title}}</td>
                        <td>
                            <a href="{{ route('editdarshan', $darshan->id) }}" class="btn btn-sm btn-secondary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a onclick="return confirm('Are you sure you want to delete ?')"
                                href="{{ route('deletedarshan', $darshan->id) }}" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="text-center">
                <h3 class="my-5 text-danger">No Darshans Posted ! ! !</h3>
                <a href="{{ url('admin/dashboard') }}" class="btn btn-dark btn-sm mr-2">Back</a>
                <a href="{{ url('admin/darshans/adddarshan') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Add Darshan
                </a>
            </div>
            @endif
        </div>
        <div class="container">
            {{ $darshans->links('pagination::bootstrap-4') }}
        </div>
</div>