@extends('layouts.app')

@section('title')
Create Slider
@endsection

@section('content')

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add Section</h4>
                <p class="card-category">Complete your profile</p>
            </div>
            <div class="card-body">
                <form action='{{route('admin.section.store')}}' method='post' enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Section Title</label>
                                <input name='section_title' type="text" class="form-control"
                                    value='{{old('section_title')}}'>
                            </div>
                            @error('section_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Food Title</label>
                                <input name='food_title' type="text" class="form-control" value='{{old('food_title')}}'>
                            </div>
                            @error('food_title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Food Description</label>
                                <div class="form-group">
                                    <textarea name='food_description' class="form-control"
                                        rows="5">{{old('food_description')}}</textarea>
                                </div>
                            </div>
                            @error('food_description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="bmd-label-floating">Icon Image</label>
                            <input type="file" name='icon_image' class="form-control">
                            @error('icon_image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="bmd-label-floating">Section Image</label>
                            <input type="file" name='section_image' class="form-control">
                            @error('section_image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="bmd-label-floating">Food Image</label>
                            <input type="file" name='food_image' class="form-control">
                            @error('food_image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
            </div>


            <button type="submit" class="btn btn-primary pull-right">Add Section</button>
            <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection