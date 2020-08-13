<?php

namespace App\Http\Controllers\Admin;

use App\ContactDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactDetailsController extends Controller
{
    public function index()
    {
        $all_contact_details = ContactDetails::all();
        return view('admin.contact_details.index', compact('all_contact_details'));
    }
}