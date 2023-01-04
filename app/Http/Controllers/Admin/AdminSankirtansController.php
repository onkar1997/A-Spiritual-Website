<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Sankirtan;

class AdminSankirtansController extends Controller
{
    public function index()
    {
        $sankirtans = Sankirtan::latest()->paginate(7);
        return view('admin.sankirtans.sankirtans')->with('sankirtans', $sankirtans);
    }

    public function create()
    {
        return view('admin.sankirtans.addsankirtan');
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

        $sankirtan = new Sankirtan;
        $sankirtan->title = $request->input('title');
        $sankirtan->link = $request->input('link');
        $sankirtan->watch_time = $request->input('watch_time');
        $sankirtan->cover_image = $fileNameToStore;

        $sankirtan->save();

        return redirect('/admin/sankirtans')->with('success', 'Sankirtan Posted');
    }

    public function edit($id)
    {
        $sankirtan = Sankirtan::find($id);
        return view('admin.sankirtans.editsankirtan')->with('sankirtan', $sankirtan);
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
            $fileNameToStore = Sankirtan::find($id)->cover_image;
        }

        // Create
        $sankirtan = Sankirtan::find($id);
        $sankirtan->title = $request->input('title');
        $sankirtan->link = $request->input('link');
        $sankirtan->watch_time = $request->input('watch_time');
        $sankirtan->cover_image = $fileNameToStore;

        $sankirtan->save();

        return redirect('/admin/sankirtans')->with('success', 'Sankirtan Updated');
    }

    public function destroy($id)
    {
        $sankirtans = Sankirtan::findOrFail($id);

        $sankirtans->delete();

        return redirect('/admin/sankirtans')->with('success', 'Sankirtan Deleted');
    }
}
