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
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title "> Contact Details</h4>
                <p class="card-category"> Here is a subtitle for this table</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>
                                Title
                            </th>
                            <th>
                                Address
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Phone
                            </th>
                            <th>
                                Fb
                            </th>
                            <th>
                                Twitter
                            </th>
                            <th>
                                Insta
                            </th>
                            <th>
                                Linkedin
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody>

                            @foreach ($all_contact_details as $contact_details)




                            <tr>
                                <td>
                                    {{$contact_details->title?$contact_details->title:'-'}}
                                </td>
                                <td>
                                    {{$contact_details->address?$contact_details->address:'-'}}
                                </td>
                                <td>
                                    {{$contact_details->extra?$contact_details->extra:'-'}}
                                </td>
                                <td>
                                    {{$contact_details->phone?$contact_details->phone:'-'}}
                                </td>
                                <td>
                                    {{$contact_details->fb?$contact_details->fb:'-'}}
                                </td>
                                <td>
                                    {{$contact_details->twitter?$contact_details->twitter:'-'}}
                                </td>
                                <td>
                                    {{$contact_details->insta?$contact_details->insta:'-'}}
                                </td>
                                <td>
                                    {{$contact_details->linked_in?$contact_details->linked_in:'-'}}
                                </td>
                                <td>
                                    {{$contact_details->footer?$contact_details->footer:'-'}}
                                </td>
                                <td>
                                    <img width="100" src="{{asset('uploads/contact_details/'.$contact_details->image)}}"
                                        alt="">
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('admin.page_details.edit',$contact_details->id)}}"
                                            class='btn btn-sm btn-warning'>edit</a>
                                        <button
                                            onclick="confirm('Are you sure you want to delete this ?');document.getElementById('deleteForm').submit()"
                                            class='btn btn-sm btn-danger'>delete</button>
                                        <form id='deleteForm' method='post'
                                            action="{{route('admin.page_details.destroy',$contact_details->id)}}">
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