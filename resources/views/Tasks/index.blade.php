@extends('layouts.master')

@section('title')
    Tasks Index
    @endsection

@section('top-navbar')
    @include('Shared.top-navbar')
    @endsection

@section('left-navbar')
    @include('Shared.left-navbar')
    @endsection

@section('content')
    <div class="container"></div>
        <div class="col-lg-10 panel panel-default" id="tasks-table" style="float: left">

        <h2 class="page-header">Tasks
            @if(Auth::user()->isAdmin == true)
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#assignTask" style="float: right; margin-right: 10px"><i class="fa fa-fw fa-plus"></i> Assign Task </button>

                {{--Assign Task Modal--}}
                <div class="modal fade" id="assignTask" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <form method="POST" action="/tasks/confirm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><i class="fa fa-fw fa-plus"></i> Assign New Task</h4>
                            </div>
                            <div class="modal-body">

                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        {{--Task Title--}}
                                        <label>Title of the task:</label>
                                        <input type="text" class="form-control" id="modal-assign-task" name="taskName" placeholder="Task Title">

                                        {{--Assign to--}}
                                        <label>Assign to:</label>
                                        <select class="form-control" name="assignedTo" id="modal-assignTo">
                                            @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->fullname }}</option>
                                                @endforeach
                                        </select>

                                        {{--Start date--}}
                                        <label>Begin in:</label>
                                        <input class="form-control" type="date" name="startDate" id="modal-assign-startDate">

                                        {{--End date--}}
                                        <label>Deadline: </label>
                                        <input class="form-control" type="date" name="endDate" id="modal-assign-endDate">

                                        {{--Task Body--}}
                                        <label>Detail:</label>
                                        <textarea type="text" class="form-control" id="modal-assign-detail" name="taskBody" placeholder="Task Detail"></textarea>

                                    </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Assign</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            @endif
        </h2>

        <table class="table table-hover table-responsive tasks-table">

            <thead>
            <tr>
                <th>Title</th>
                <th>Task</th>
                <th>Assigned To</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                @if(Auth::user()->isAdmin == true)
                    <th>Action</th>
                    @endif
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
                    <td>{{ $task->users->fullname }}</td>
                    <td>{{ $task->startDate }}</td>
                    <td>{{ $task->endDate }}</td>
                    <td>
                        @if($task->isDone == false)
                            In Progress
                            @else
                        Done
                            @endif
                    </td>
                    @if(Auth::user()->isAdmin == true)
                        <td>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-action"><i class="glyphicon glyphicon-edit" id="task-action-button"></i></button>
                        </td>

                    {{--Modal Action to Edit current task--}}

                        <div class="modal fade" id="modal-action" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <form method="POST" action="/tasks/update/{{ $task->id }}">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title"><i class="fa fa-fw fa-plus"></i> Edit Task</h4>
                                        </div>
                                        <div class="modal-body">

                                            {{ csrf_field() }}

                                            <div class="form-group">
                                                {{--Task Title--}}
                                                <label>Title of the task:</label>
                                                <input type="text" class="form-control" id="modal-assign-task" name="taskName" value="{{ $task->taskName }}">

                                                {{--Assign to--}}
                                                <label>Assign to:</label>
                                                <select class="form-control" name="assignedTo" id="modal-assignTo">
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}">{{ $task->users->fullname }}</option>
                                                    @endforeach
                                                </select>

                                                {{--Start date--}}
                                                <label>Begin in:</label>
                                                <input class="form-control" type="date" name="startDate" value="{{ $task->startDate }}" id="modal-assign-startDate">

                                                {{--End date--}}
                                                <label>Deadline: </label>
                                                <input class="form-control" type="date" name="endDate" value="{{ $task->endDate }}" id="modal-assign-endDate">

                                                {{--Task Body--}}
                                                <label>Detail:</label>
                                                <textarea type="text" class="form-control" id="modal-assign-detail" name="taskBody">{{ $task->taskBody }}</textarea>

                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Update</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" onclick="taskDeleteButtonPressed({{ $task->id }})" class="glyphicon glyphicon-trash btn btn-danger" style="float: left"></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endif
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    @endsection