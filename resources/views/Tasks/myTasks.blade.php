@extends('layouts.master')

@section('title')
    My Tasks
@endsection

@section('top-navbar')
    @include('Shared.top-navbar')
@endsection

@section('left-navbar')
    @include('Shared.left-navbar')
@endsection

@section('content')
        <div class="col-lg-10 panel panel-default" id="tasks-table">
            <h1 class="panel-heading" style="background-color: transparent;">My Tasks</h1>
            <table class="table table-hover table-responsive tasks-table">

                <thead>
                <tr>
                    <th>Title</th>
                    <th>Task</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach( $tasks as $task)
                    @if($task->count() == 0)
                        <p>There is no post yet</p>
                    @endif
                    <tr class="task">
                        <td style="text-wrap: normal; text-overflow: ellipsis; overflow: hidden">{{ $task->taskName }}</td>
                        <td style="text-wrap: normal; text-overflow: ellipsis; overflow: hidden">{{ $task->taskBody }}</td>
                        <td>{{ $task->startDate }}</td>
                        <td>{{ $task->endDate }}</td>
                        <td>
                            @if($task->isDone == false)
                                <span style="color: red">In Progress</span>
                            @else
                                <span style="color: green">Completed</span>
                            @endif
                        </td>
                        <td>
                            @if($task->isDone == false)
                                <button class="btn btn-success" onclick="successButtonPressed({{  $task->id }})"><i class="glyphicon glyphicon-ok" id="take-action-button"></i></button>
                            @else
                                <button class="btn btn-danger" onclick="notSuccessButtonPressed({{  $task->id }})"><i class="glyphicon glyphicon-remove" id="take-action-button"></i></button>
                            @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endsection