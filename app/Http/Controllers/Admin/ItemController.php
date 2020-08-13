<?php

namespace App\Http\Controllers\Admin;

use App\Item;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::latest()->with('category')->get();
        return view('admin.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.item.create', compact('categories'));
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
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|mimes:png,jpeg,jpg'
        ]);
        $image = $request->file('image');
        $imageName = uniqid() . Str::substr(md5(today()->toDateString()), 0, 15) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(370, 300)->save('uploads/item/' . $imageName);
        Item::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imageName
        ]);
        return redirect()->route('admin.item.index')->with('success', 'Item added successfully');
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
    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('admin.item.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'image' => 'mimes:png,jpeg,jpg'
        ]);
        $image = $request->file('image');
        if ($image) {
            if ($item->image != 'default.png') {
                unlink('uploads/item/' . $item->image);
            }
            $imageName = uniqid() . Str::substr(md5(today()->toDateString()), 0, 15) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(370, 300)->save('uploads/item/' . $imageName);
        } else {
            $imageName = $item->image;
        }
        $item->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imageName
        ]);
        return redirect()->route('admin.item.index')->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        if ($item->image != 'default.png') {
            unlink('uploads/item/' . $item->image);
        }
        $item->delete();
        return back()->with('success', 'Item deleted successfully');
    }
}