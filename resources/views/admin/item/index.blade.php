@extends('layouts.app')

@section('name')
Item
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
        <a href="{{route('admin.item.create')}}" class='btn btn-primary'>Add Item</a>
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title "> All Item</h4>
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
                                Name
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                Category
                            </th>
                            <th>
                                Price
                            </th>
                            <th>
                                Image
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
                            @foreach ($items as $key=>$item)


                            <tr>
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                                    {{$item->description}}
                                </td>
                                <td>
                                    {{$item->category->category}}
                                </td>
                                <td>
                                    {{$item->price}}
                                </td>
                                <td>
                                    <img width="100" src="{{asset('uploads/item/'.$item->image)}}" alt="">
                                </td>

                                <td>
                                    {{$item->created_at ? $item->created_at->diffForHumans() : '-'}}
                                </td>
                                <td>
                                    {{$item->updated_at ? $item->updated_at->diffForHumans() : '-'}}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('admin.item.edit',$item->id)}}"
                                            class='btn btn-sm btn-warning'>edit</a>
                                        <button
                                            onclick="confirm('Are you sure you want to delete this ?');document.getElementById('deleteForm').submit()"
                                            class='btn btn-sm btn-danger'>delete</button>
                                        <form id='deleteForm' method='post'
                                            action="{{route('admin.item.destroy',$item->id)}}">
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