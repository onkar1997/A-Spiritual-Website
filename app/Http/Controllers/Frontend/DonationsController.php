<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class DonationsController extends Controller
{
    public function index()
    {
        return view('pages.donation');
    }
}
