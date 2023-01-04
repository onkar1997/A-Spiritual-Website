@extends('layouts.app')

@include('layouts.adminnavbar')


<div class="container admin-container text-center my-5">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h3>Admin Dashboard</h3>
        </div>
        <div class="card-body">
            <div class="flex">
                <a href="/admin/blogs" style="text-decoration: none;">
                    <div class="col-lg-4">
                        <div class="card shadow" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title">BLOG</h5>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="/admin/shop" style="text-decoration: none;">
                    <div class="col-lg-4">
                        <div class="card shadow" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title">SHOP</h5>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="/admin/darshans" style="text-decoration: none;">
                    <div class="col-lg-4">
                        <div class="card shadow" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title">DIVINE DARSHANS</h5>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="/admin/orders" style="text-decoration: none;">
                    <div class="col-lg-4">
                        <div class="card shadow" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title">ORDERS</h5>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="/admin/sankirtans" style="text-decoration: none;">
                    <div class="col-lg-4">
                        <div class="card shadow" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title">SANKIRTANS</h5>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="/admin/feedbacks" style="text-decoration: none;">
                    <div class="col-lg-4">
                        <div class="card shadow" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title">FEEDBACKS</h5>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="/admin/users" style="text-decoration: none;">
                    <div class="col-lg-4">
                        <div class="card shadow" style="width: 20rem;">
                            <div class="card-body">
                                <h5 class="card-title">USERS</h5>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>