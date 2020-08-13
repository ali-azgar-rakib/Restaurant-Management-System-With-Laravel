<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Item;
use App\Reserv;
use App\Slider;
use App\Contact;
use App\Section;
use App\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $categories = Category::all();
        $items = Item::with('category')->get();
        $sections = Section::latest()->limit(2)->get();
        $dishes = Dish::latest()->get();
        return view('welcome', compact('sliders', 'categories', 'items', 'sections', 'dishes'));
    }

    public function reserve(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',
            'time' => 'required'
        ]);

        Reserv::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'time' => $request->time,
            'message' => $request->message
        ]);
        Toastr::success('Request Sending Successfully.Check Email for Confirmation', 'Success');
        return back();
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);
        Toastr::success('Message Successfully', 'Success');
        return back();
    }
}