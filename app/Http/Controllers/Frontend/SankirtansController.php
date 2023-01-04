<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Sankirtan;

class SankirtansController extends Controller
{
    public function index()
    {
        $sankirtans = Sankirtan::latest()->paginate(9);
        return view('pages.sankirtans.sankirtans')->with('sankirtans', $sankirtans);
    }

    public function show($id)
    {
        $sankirtan = Sankirtan::find($id);
        return view('pages.sankirtans.showsankirtan')->with('sankirtan', $sankirtan);
    }
}
