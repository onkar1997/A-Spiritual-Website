<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    public function store(Request $request)
    {
        $contact = new Contact;
        $contact->fullname = $request->input('fullname');
        $contact->email = $request->input('email');
        $contact->mobile = $request->input('mobile');
        $contact->address = $request->input('address');
        $contact->message = $request->input('message');
        
        $contact->save();

        return redirect('/')->with('Success', 'Thank You for sending message! We\'ll get back to you soon...');
    }
}
