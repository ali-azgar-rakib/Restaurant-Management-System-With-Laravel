@extends('layouts.app')

@section('title')
Create Slider
@endsection

@section('content')

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Item</h4>
                <p class="card-category">Complete your profile</p>
            </div>
            <div class="card-body">
                <form action='{{route('admin.item.update',$item->id)}}' method='post' enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Item Name</label>
                                <input value='{{$item->name}}' name='name' type="text" class="form-control">
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Cateory Name</label>
                                <select class='form-control' name="category_id" id="">
                                    <option value="" disabled selected>Select One</option>
                                    @foreach ($categories as $category)
                                    <option {{$item->category_id == $category->id ?'selected':''}}
                                        value="{{$category->id}}">{{$category->category}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Item Price</label>
                                <input value='{{$item->price}}' name='price' type="text" class="form-control">
                            </div>
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Item Description</label>
                                <div class="form-group">
                                    <textarea name='description' class="form-control"
                                        rows="5">{{$item->description}}</textarea>
                                </div>
                            </div>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="bmd-label-floating">Image</label>
                            <input type="file" name='image' class="form-control">
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
            </div>


            <button type="submit" class="btn btn-primary pull-right">Update Item</button>
            <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection