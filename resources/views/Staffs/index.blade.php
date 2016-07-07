@extends('layouts.master')

@section('title')
    Staffs
@endsection

@section('top-navbar')
    @include('Shared.top-navbar')
@endsection

@section('left-navbar')
    @include('Shared.left-navbar')
@endsection

@section('content')
    <div class="col-lg-10 panel panel-default" id="staffs-table" style="float: left">
        <div class="pannel-heading">
            <h1 class="page-header">Staffs
                @if(Auth::user()->isAdmin == true)
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addStaff" style="float: right; margin-right: 10px"><i class="fa fa-fw fa-plus"></i> Add staff </button>

                    {{--Assign staff Modal--}}
                    <div class="modal fade" id="addStaff" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form method="POST" action="/staffs/confirm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><i class="fa fa-fw fa-plus"></i> Add new staff</h4>
                                    </div>
                                    <div class="modal-body">

                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            {{--Fullname--}}
                                            <label>Fullname:</label>
                                            <input type="text" class="form-control" id="modal-assign-staff" name="fullname" placeholder="Fullname">

                                            {{--Email--}}
                                            <label>Email:</label>
                                            <input class="form-control" type="email" name="email" placeholder="Email" id="modal-assign-staff">

                                            {{--Gender--}}
                                            <label>Gender:</label>
                                            <input type="radio" name="gender" value="Male" checked> <span style="font-size: 12pt">Male</span>
                                            <input type="radio" name="gender" value="Female" id="gender-select">  <span style="font-size: 12pt">Female</span><br>

                                            {{--Password--}}
                                            <label>Password: </label>
                                            <input class="form-control" type="password" name="password" id="modal-assign-staff">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Add</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </h1>
        </div>


        <table class="table table-hover table-responsive staffs-table">

            <thead>
            <tr>
                <th>Fullname</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Role</th>
                <th>Added Date</th>
                <th>Updated Date</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach( $staffs as $staff)
                <tr class="staff">
                    <td style="font-weight: bold">{{ $staff->fullname }}</td>
                    <td>{{ $staff->email }}</td>
                    <td>{{ $staff->gender }}</td>
                    <td style="font-style: italic">Staff</td>
                    <td>{{ date('F d, y', strtotime($staff->created_at))}}</td>
                    <td>{{ date('F d, y', strtotime($staff->updated_at))}}</td>
                    <td>
                        <button class="btn btn-danger" onclick="deleteStaffButtonPressed({{  $staff->id }})"><i class="glyphicon glyphicon-remove" id="take-action-button"></i></button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection