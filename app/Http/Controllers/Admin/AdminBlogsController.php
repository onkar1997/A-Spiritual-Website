<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Blog;

class AdminBlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(7);
        return view('admin.blogs.blogs')->with('blogs', $blogs);
    }

    public function create()
    {
        return view('admin.blogs.addblog');
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

        $blog = new Blog;
        $blog->title = $request->input('title');
        $blog->body = $request->input('body');
        $blog->body2 = $request->input('body2');
        $blog->read_time = $request->input('read_time');
        $blog->cover_image = $fileNameToStore;

        $blog->save();

        return redirect('/admin/blogs')->with('success', 'Blog Posted');
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blogs.editblog')->with('blog', $blog);
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
            $fileNameToStore = Blog::find($id)->cover_image;
        }

        // Create
        $blog = Blog::find($id);
        $blog->title = $request->input('title');
        $blog->body = $request->input('body');
        $blog->body2 = $request->input('body2');
        $blog->read_time = $request->input('read_time');
        $blog->cover_image = $fileNameToStore;

        $blog->save();

        return redirect('/admin/blogs')->with('success', 'Blog Updated');
    }

    public function destroy($id)
    {
        $blogs = Blog::findOrFail($id);

        $blogs->delete();

        return redirect('/admin/blogs')->with('success', 'Blog Deleted');
    }
}
