<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}
