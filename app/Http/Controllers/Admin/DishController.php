<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::latest()->get();
        return view('admin.dish.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dish.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->file('image') as $image) {
            $imageName = $this->imageUpload($image);
            Dish::create([
                'image' => $imageName
            ]);
        }
        return redirect()->route('admin.dish.index')->with('success', 'Added Successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        if ($dish->delete()) {
            unlink('uploads/dish/' . $dish->image);
            return back()->with('success', 'Deleted Successfully');
        }
    }

    private function imageUpload($image)
    {
        $imageName = Str::substr(md5(today()->toDateString()), 0, 15) . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move('uploads/dish', $imageName);
        return $imageName;
    }
}