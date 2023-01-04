@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container my-5">

    <h2 class="text-center">FEEDBACKS</h2>
    <hr>

    <div class="container-fluid my-5">
        @if(count($contacts) > 0)
        <a href="{{ url('admin/dashboard') }}" class="btn btn-dark btn-sm float-left mr-2 mb-3">Back</a>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Address</th>
                    <th>Message</th>
                    <th>Reply</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $key =>$contact)
                <tr>
                    <th scope="row">{{ $contacts->firstItem() + $key }}</th>
                    <td>{{$contact->fullname}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->mobile}}</td>
                    <td>{{$contact->address}}</td>
                    <td>{{$contact->message}}</td>
                    <td>
                        <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox?compose={{$contact->email}}"
                            class="btn btn-sm btn-primary">
                            <i class="fa fa-reply"></i>
                        </a>
                    </td>
                    <td>
                        <a onclick="return confirm('Are you sure you want to delete ?')"
                            href="{{ route('deletefeedback', $contact->id) }}" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="text-center">
            <h3 class="my-3 text-danger">No Feedbacks Found ! ! !</h3>
            <a href="{{ url('admin/dashboard') }}" class="btn btn-dark btn-sm">Back</a>
        </div>
        @endif
    </div>
    <div class="container">
        {{ $contacts->links('pagination::bootstrap-4') }}
    </div>
</div>