<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Darshan;

class DarshansController extends Controller
{
    public function index()
    {
        $darshans = Darshan::latest()->paginate(9);
        return view('pages.darshans.darshans')->with('darshans', $darshans);
    }

    public function show($id)
    {
        $darshan = Darshan::find($id);
        return view('pages.darshans.showdarshan')->with('darshan', $darshan);
    }
}
