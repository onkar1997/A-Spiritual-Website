<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Contact;


class AdminFeedbacksController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(7);
        return view('admin.feedbacks')->with('contacts', $contacts);
    }

    public function destroy($id)
    {
        $contacts = Contact::findOrFail($id);

        $contacts->delete();

        return redirect('/admin/feedbacks')->with('success', 'Feedback Deleted');
    }
}
