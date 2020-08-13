@extends('layouts.app')

@section('title')
Create Slider
@endsection

@section('content')

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add Slider</h4>
                <p class="card-category">Complete your profile</p>
            </div>
            <div class="card-body">
                <form action='{{route('admin.slider.store')}}' method='post' enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Title</label>
                                <input name='title' type="text" class="form-control" value='{{old('title')}}'>
                            </div>
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Sub Title</label>
                                <div class="form-group">
                                    <textarea name='sub_title' class="form-control"
                                        rows="5">{{old('sub_title')}}</textarea>
                                </div>
                            </div>
                            @error('sub_title')
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


            <button type="submit" class="btn btn-primary pull-right">Add Slider</button>
            <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection