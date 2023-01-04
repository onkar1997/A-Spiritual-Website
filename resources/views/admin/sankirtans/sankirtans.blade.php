@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container my-5">

    @include('layouts.messages')

    <h2 class="text-center">SANKIRTANS</h2>
    <hr>

    <div class="container my-5">
        @if(count($sankirtans) > 0)
        <a href="{{ url('admin/dashboard') }}" class="btn btn-dark btn-sm float-left mr-2">Back</a>
        <a href="{{ url('admin/sankirtans/addsankirtan') }}" class="btn btn-primary btn-sm mb-3">
            <i class="fas fa-plus"></i> Add Sankirtan
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
                @foreach($sankirtans as $key => $sankirtan)
                <tr>
                    <th scope="row">{{ $sankirtans->firstItem() + $key }}</th>
                    <td>
                        <img src="/storage/cover_images/{{ $sankirtan->cover_image }}" alt="{{$sankirtan->cover_image}}"
                            height="40" width="70px" style="border-radius: 5px;">
                    </td>
                    <td>{{$sankirtan->title}}</td>
                    <td>
                        <a href="{{ route('editsankirtan', $sankirtan->id) }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure you want to delete ?')"
                            href="{{ route('deletesankirtan', $sankirtan->id) }}" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="text-center">
            <h3 class="my-3 text-danger">No Sankirtans Posted ! ! !</h3>
            <a href="{{ url('admin/dashboard') }}" class="btn btn-dark btn-sm mr-2">Back</a>
            <a href="{{ url('admin/sankirtans/addsankirtan') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Sankirtan
            </a>
        </div>
        @endif
    </div>
    <div class="container">
        {{ $sankirtans->links('pagination::bootstrap-4') }}
    </div>

</div>