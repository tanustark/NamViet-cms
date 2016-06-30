@extends('layouts.master')

@section('title')
    Dashboard
    @endsection

@section('top-navbar')
    @include('Shared.top-navbar')
    @endsection

@section('left-navbar')
    @include('Shared.left-navbar')
    @endsection

@section('content')
    <div class="col-lg-11" style="float: left">
            <h1>Dashboard</h1><hr><br>
        {{--Posts Count Section--}}
        <div class="col-sm-4 panel panel-default" style="float: left" id="posts-count">
            <ul class="list-inline">
                <div class="col-sm-6">
                    <li style="font-size: 14pt; text-align: right"><span style="font-size: 26pt;font-weight: bold; color: #2ca02c">{{ $user->posts->count() }}</span><br>My Posts</li>
                </div>
                <div class="col-sm-6">
                    <li style="font-size: 14pt; text-align: right"><span style="font-size: 26pt;font-weight: bold; color: #2ca02c">{{ $items->count() }}</span><br>All Posts</li>
                </div>
            </ul>
        </div>

        <div class="col-lg-7 panel panel-default" style="float: right" id="members">
            <h4><i class="fa fa-fw fa-users"></i> All Members</h4><hr>
            <table class="table table-hover table-responsive member-table">
                <thead>
                <tr>
                    <th>Fullname</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Gender</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $users as $member)
                    @if($users->count() == 0)
                        <p>There is no user yet</p>
                    @endif
                    <tr>
                        <td>{{ $member->fullname }}</td>
                        <td>{{ $member->email }}</td>
                        <td>
                            @if($member->isAdmin == false)
                                Staff
                                @else
                                Administrator
                            @endif
                        </td>
                        <td>Male</td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </div>
        <br><br><br>
        <br><br><br>

        {{--Tasks Count Section--}}
        <div class="col-sm-4 panel panel-default" style="float: left" id="tasks-count">
            <ul class="list-inline">
            <div class="col-sm-6">
                    <li style="font-size: 14pt; text-align: left; padding: 10px"><a href="/tasks" style="color: #000;"><i class="fa fa-fw fa-tasks"></i> Tasks</a></li>
                    <br><br>
                    <li style="font-size: 10pt; text-align: left; padding: 10px">Done:<span style="padding-left: 20px; color: #2ca02c">{{ $tasks_done }}</span><br>Total<span style="padding-left: 27px; color: #2ca02c">{{ $tasks->count() }}</span></li>
            </div>
            <div class="col-sm-6">
                    <li style="font-size: 14pt; text-align: right"><span style="font-size: 26pt;font-weight: bold; color: #2ca02c">{{ $current_task }}</span><br>Current Task</li>
            </div>
            </ul>
        </div>

        {{--Recent Posts Table Section--}}
        <div class="col-lg-12 panel panel-default" id="posts-table" style="float: left">
            <h2 class="page-header">Recent Posts</h2>
            <table class="table table-hover table-responsive dashboard-table">
                <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Title</th>
                        <th>Published at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $items as $item)
                        @if($item->count() == 0)
                            <p>There is no post yet</p>
                            @endif
                    <tr>
                        <td>{{ $item->users->fullname }}</td>
                        <td>{{ $item->users->email }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                        @endforeach
                </tbody>

            </table>
        </div>

    </div>
@endsection
