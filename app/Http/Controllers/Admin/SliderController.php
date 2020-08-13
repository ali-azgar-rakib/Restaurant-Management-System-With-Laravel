<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);
        $image = $request->file('image');
        $imageName = Str::substr(md5(today()->toDateString()), 0, 15) . uniqid() . '.' . $image->getClientOriginalExtension();
        // $image->move('uploads/slider', $imageName);
        Image::make($image)->resize(1800, 991)->save('uploads/slider/' . $imageName);
        Slider::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'image' => $imageName
        ]);
        return redirect()->route('admin.slider.index')->with('success', 'Successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'mimes:png,jpeg,jpg'
        ]);
        $image = $request->file('image');
        if ($image) {
            if ($slider->image != 'default.png') {
                unlink('uploads/slider/' . $slider->image);
            }
            $imageName = Str::substr(md5(today()->toDateString()), 0, 15) . uniqid() . '.' . $image->getClientOriginalExtension();
            // $image->move('uploads/slider', $imageName);
            Image::make($image)->resize(1800, 991)->save('uploads/slider/' . $imageName);
        } else {
            $imageName = $slider->image;
        }
        $slider->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'image' => $imageName
        ]);
        return redirect()->route('admin.slider.index')->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        if ($slider->image != 'default.png') {
            unlink('uploads/slider/' . $slider->image);
        }
        $slider->delete();
        return redirect()->route('admin.slider.index')->with('success', 'Delete successfully');
    }
}