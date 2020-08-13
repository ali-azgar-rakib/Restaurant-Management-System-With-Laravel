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
                                Phone
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Message
                            </th>
                            <th>
                                Time
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
                            @foreach ($reservs as $key=>$reserv)


                            <tr class="{{!$reserv->status?'bg-info':''}}">
                                <td>
                                    {{$key+1}}
                                </td>
                                <td>
                                    {{$reserv->name}}
                                </td>
                                <td>
                                    {{$reserv->mobile}}
                                </td>
                                <td>
                                    {{$reserv->email}}
                                </td>
                                <td>
                                    {{$reserv->message?$reserv->message:'-'}}
                                </td>
                                <td>
                                    {{$reserv->time}}
                                </td>
                                <td>
                                    @if($reserv->status)
                                    <span class='badge badge-success'>Confirmed</span>
                                    @else
                                    <span class='badge badge-warning'>Not Confirmed</span>
                                    @endif
                                </td>

                                <td>
                                    {{$reserv->created_at ? $reserv->created_at->diffForHumans() : '-'}}
                                </td>
                                <td>
                                    {{$reserv->updated_at ? $reserv->updated_at->diffForHumans() : '-'}}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        @if (!$reserv->status)
                                        <a href="{{route('admin.reserv.confirm',$reserv->id)}}"
                                            onclick="confirm('Are you sure you want to confirm?')"
                                            class='btn btn-sm btn-warning'>confirm</a>
                                        @endif
                                        <a href="{{route('admin.reserv.delete',$reserv->id)}}"
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