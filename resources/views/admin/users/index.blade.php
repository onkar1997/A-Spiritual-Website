@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container my-5">

    <h2 class="text-center">REGISTERED USERS</h1>
        <hr>

        @include('layouts.messages')

        <div class="container my-5">
            @if(count($users) > 0)
            <a href="{{ url('admin/dashboard') }}" class="btn btn-dark btn-sm float-left mr-2 mb-3">Back</a>
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">View</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                    <tr>
                        <th scope="row">{{ $users->firstItem() + $key }}</th>
                        <td>{{ $user->name }} {{ $user->lname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            <a href="{{ url('admin/users/view-user/'.$user->id) }}" class="btn btn-primary btn-sm">
                                <i class="far fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            @else
            <div class="text-center">
                <h3 class="my-3 text-danger">No Users ! ! !</h3>
                <a href="{{ url('admin/dashboard') }}" class="btn btn-dark btn-sm">Back</a>
            </div>
            @endif
        </div>

        <div class="container">
            {{ $users->links('pagination::bootstrap-4') }}
        </div>
</div>