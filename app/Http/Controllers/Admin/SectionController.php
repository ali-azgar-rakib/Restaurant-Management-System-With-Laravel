<?php

namespace App\Http\Controllers\Admin;

use App\Section;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Section::latest()->paginate(10);
        return view('admin.section.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.section.create');
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
            'section_title' => 'required|string|min:15',
            'food_title' => 'required|string|',
            'food_description' => 'required|string',
            'icon_image' => 'bail|required|mimes:jpg,jpeg,png|max:1024',
            'section_image' => 'bail|required|mimes:jpg,jpeg,png|max:1024',
            'food_image' => 'bail|required|mimes:jpg,jpeg,png|max:1024',
        ]);
        $icon_image = $this->iconImageUpload($request->file('icon_image'));
        $section_image = $this->sectionImageUpload($request->file('section_image'));
        $food_image = $this->foodImageUpload($request->file('food_image'));

        Section::create([
            'section_title' => $request->section_title,
            'food_title' => $request->food_title,
            'food_description' => $request->food_description,
            'icon_image' => $icon_image,
            'section_image' => $section_image,
            'food_image' => $food_image
        ]);
        return redirect()->route('admin.section.index')->with('success', 'Section Added Successfully');
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
    public function edit(Section $section)
    {
        return view('admin.section.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $request->validate([
            'section_title' => 'required|string|min:15',
            'food_title' => 'required|string',
            'food_description' => 'required|string',
            'icon_image' => 'bail|mimes:jpg,jpeg,png|max:1024',
            'section_image' => 'bail|mimes:jpg,jpeg,png|max:1024',
            'food_image' => 'bail|mimes:jpg,jpeg,png|max:1024',
        ]);
        // icon image 
        $icon_image = $request->file('icon_image');
        if ($icon_image) {
            unlink('uploads/section/' . $section->icon_image);
            $icon_image = $this->iconImageUpload($icon_image);
        } else {
            $icon_image = $section->icon_image;
        }

        // section image 

        $section_image = $request->file('section_image');
        if ($section_image) {
            unlink('uploads/section/' . $section->section_image);
            $section_image = $this->sectionImageUpload($section_image);
        } else {
            $section_image = $section->section_image;
        }

        // food image 

        $food_image = $request->file('food_image');
        if ($food_image) {
            unlink('uploads/section/' . $section->food_image);
            $food_image = $this->foodImageUpload($food_image);
        } else {
            $food_image = $section->food_image;
        }

        $section->update([
            'section_title' => $request->section_title,
            'food_title' => $request->food_title,
            'food_description' => $request->food_description,
            'icon_image' => $icon_image,
            'section_image' => $section_image,
            'food_image' => $food_image
        ]);
        return redirect()->route('admin.section.index')->with('success', 'Section Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        if ($section->delete()) {

            unlink('uploads/section/' . $section->section_image);
            unlink('uploads/section/' . $section->food_image);
            unlink('uploads/section/' . $section->icon_image);

            return redirect()->back()->with('success', 'Deleted Successfully');
        }
    }

    private function sectionImageUpload($image)
    {
        $imageName = Str::substr(md5(today()->toDateString()), 0, 15) . uniqid() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(880, 840)->save('uploads/section/' . $imageName);
        return $imageName;
    }
    private function foodImageUpload($image)
    {
        $imageName = Str::substr(md5(today()->toDateString()), 0, 15) . uniqid() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(400, 400)->save('uploads/section/' . $imageName);
        return $imageName;
    }
    private function iconImageUpload($image)
    {
        $imageName = Str::substr(md5(today()->toDateString()), 0, 15) . uniqid() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(125, 125)->save('uploads/section/' . $imageName);
        return $imageName;
    }
}