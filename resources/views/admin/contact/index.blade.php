@extends('layouts.app')

@section('name')
Reservation
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
                <h4 class="card-title "> All Message</h4>
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
                                Subject
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Message
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
                            @foreach ($contacts as $key=>$contact)


                            <tr class="{{!$contact->status?'bg-info':''}}">
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>
                                    {{$contact->name}}
                                </td>
                                <td>
                                    {{$contact->subject}}
                                </td>
                                <td>
                                    {{$contact->email}}
                                </td>
                                <td>
                                    {{$contact->message?$contact->message:'-'}}
                                </td>
                                <td>
                                    {{$contact->created_at ? $contact->created_at->diffForHumans() : '-'}}
                                </td>
                                <td>
                                    {{$contact->updated_at ? $contact->updated_at->diffForHumans() : '-'}}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        @if (!$contact->status)
                                        <a href="{{route('admin.contact.status',$contact->id)}}"
                                            onclick="confirm('Are you sure you want to confirm?')"
                                            class='btn btn-sm btn-warning'>seen</a>
                                        @endif
                                        <a href="{{route('admin.contact.delete',$contact->id)}}"
                                            onclick="confirm('Are you sure you want to delete?')"
                                            class='btn btn-sm btn-danger'>delete</a>



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