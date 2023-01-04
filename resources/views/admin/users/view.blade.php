@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container text-center my-5">
    <div class="card shadow">
        <div class="card-header">
            <h3>User Details <a href="{{ url('admin/users') }}" class="btn btn-sm btn-dark float-left">Back</a></h3>
        </div>
        <div class="card-body">
            <div class="row mt-4 p-3">
                <div class="col-md-6 text-left">
                    <label>First Name</label>
                    <div class="border p-2">{{ $users->name }}</div>
                </div>
                <div class="col-md-6 text-left">
                    <label class="mt-2">Last Name</label>
                    <div class="border p-2">{{ $users->lname }}</div>
                </div>
                <div class="col-md-6 text-left">
                    <label class="mt-2">Email</label>
                    <div class="border p-2">{{ $users->email }}</div>
                </div>
                <div class="col-md-6 text-left">
                    <label class="mt-2">City</label>
                    <div class="border p-2">
                        {{ $users->city }}
                    </div>
                </div>
                <div class="col-md-6 text-left">
                    <label class="mt-2">Address 1</label>
                    <div class="border p-2">
                        {{ $users->address1 }}
                    </div>
                </div>
                <div class="col-md-6 text-left">
                    <label class="mt-2">State</label>
                    <div class="border p-2">
                        {{ $users->state }}
                    </div>
                </div>
                <div class="col-md-6 text-left">
                    <label class="mt-2">Address 2</label>
                    <div class="border p-2">
                        {{ $users->address2 }}
                    </div>
                </div>
                <div class="col-md-6 text-left">
                    <label class="mt-2">Zip Code</label>
                    <div class="border p-2">
                        {{ $users->pincode }}
                    </div>
                </div>
                <div class="col-md-6 text-left">
                    <label class="mt-2">Contact No.</label>
                    <div class="border p-2">{{ $users->phone }}</div>
                </div>

                <div class="col-md-6 text-left">
                    <label class="mt-2">Country</label>
                    <div class="border p-2">{{ $users->country }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>