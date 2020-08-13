@extends('layouts.app')

@section('name')
Slider
@endsection

@section('content')
<div class="row">

    <div class="col-md-12">
        @if (session('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="material-icons">close</i>
            </button>
            <span>
                {{session('success')}}</span>
        </div>
        @endif
        <a href="{{route('admin.category.create')}}" class='btn btn-primary'>Add Category</a>
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title "> All Category</h4>
                <p class="card-category"> Here is a subtitle for this table</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                Serial
                            </th>
                            <th>
                                Category
                            </th>

                            <th>
                                Created At
                            </th>
                            <th>
                                Updated At
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key=>$category)


                            <tr>
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>
                                    {{$category->category}}
                                </td>
                                <td>
                                    {{$category->created_at ? $category->created_at->diffForHumans() : '-'}}
                                </td>
                                <td>
                                    {{$category->updated_at ? $category->updated_at->diffForHumans() : '-'}}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('admin.category.edit',$category->id)}}"
                                            class='btn btn-sm btn-warning'>edit</a>
                                        <button
                                            onclick="confirm('Are you sure you want to delete this ?');document.getElementById('deleteForm').submit()"
                                            class='btn btn-sm btn-danger'>delete</button>
                                        <form id='deleteForm' method='post'
                                            action="{{route('admin.category.destroy',$category->id)}}">
                                            @method('delete')
                                            @csrf
                                        </form>


                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @endsection