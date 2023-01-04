<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(9);
        return view('pages.blogs.blogs')->with('blogs', $blogs);
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        return view('pages.blogs.showblog')->with('blog', $blog);
    }
}
