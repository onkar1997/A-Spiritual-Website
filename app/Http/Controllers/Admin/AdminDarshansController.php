<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Darshan;

class AdminDarshansController extends Controller
{
    public function index()
    {
        $darshans = Darshan::latest()->paginate(7);
        return view('admin.darshans.darshans')->with('darshans', $darshans);
    }

    public function create()
    {
        return view('admin.darshans.adddarshan');
    }

    public function store(Request $request)
    {
        // Handle file upload
        if($request->hasFile('cover_image')){
            // get filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            // get just filename 
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // get just extension 
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // filenameto store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            // upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        $darshan = new Darshan;
        $darshan->title = $request->input('title');
        $darshan->link = $request->input('link');
        $darshan->watch_time = $request->input('watch_time');
        $darshan->cover_image = $fileNameToStore;

        $darshan->save();

        return redirect('/admin/darshans')->with('success', 'Darshan Posted');
    }

    public function edit($id)
    {
        $darshan = Darshan::find($id);
        return view('admin.darshans.editdarshan')->with('darshan', $darshan);
    }

    public function update(Request $request,  $id)
    {
        // Handle file upload
        if($request->hasFile('cover_image')){
            // get filename with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();

            // get just filename 
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // get just extension 
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // filenameto store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            // upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }
        else{
            $fileNameToStore = Darshan::find($id)->cover_image;
        }

        // Create
        $darshan = Darshan::find($id);
        $darshan->title = $request->input('title');
        $darshan->link = $request->input('link');
        $darshan->watch_time = $request->input('watch_time');
        $darshan->cover_image = $fileNameToStore;

        $darshan->save();

        return redirect('/admin/darshans')->with('success', 'Darshan Updated');
    }

    public function destroy($id)
    {
        $darshans = Darshan::findOrFail($id);

        $darshans->delete();

        return redirect('/admin/darshans')->with('success', 'Darshan Deleted');
    }
}
