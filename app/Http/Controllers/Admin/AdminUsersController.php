<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::latest()->Paginate(7);
        return view('admin.users.index', compact('users'));
    }

    public function view($id)
    {
        $users = User::findOrFail($id);
        return view('admin.users.view', compact('users'));
    }
}
