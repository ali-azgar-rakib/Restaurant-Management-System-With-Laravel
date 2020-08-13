@extends('layouts.app')

@section('title')
Create Dish Slider
@endsection

@section('content')

<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Add Dish Slider</h4>
                <p class="card-category">Complete your profile</p>
            </div>
            <div class="card-body">
                <form action='{{route('admin.dish.store')}}' method='post' enctype="multipart/form-data">
                    @csrf


                    <div class="row">
                        <div class="col-md-12">
                            <label class="bmd-label-floating">Image</label>
                            <input type="file" name='image[]' class="form-control" multiple>
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