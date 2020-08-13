<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contact.index', compact('contacts'));
    }

    public function seen(Contact $contact)
    {
        $contact->update([
            'status' => true
        ]);
        return back();
    }

    public function delete(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}