<?php

namespace App\Http\Controllers;

use App\Task;
use DB;
use Auth;
use Illuminate\Http\Request;
use App\User;

use App\Http\Requests;

class TasksController extends Controller
{
    public function __contruct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = DB::table('users')->where('isAdmin','false')->get();
        $tasks = Task::all();
        $tasks->load('users');
        return view('Tasks.index', compact('tasks', 'users'));
    }

    public function confirm(Request $request){
        $task = new Task ([
            'taskName' => $request->taskName,
            'taskBody' => $request->taskBody,
            'assignedTo' => $request->assignedTo,
            'startDate' => $request->startDate,
            'endDate' =>  $request->endDate,
            'isDone' => false
        ]);

        $task->save();
        $task->load('users');
        return back();
    }

    public function manage(){
        $users=User::all();
        $tasks = Task::all()->sortByDesc('id');
        //$posts->load('users.comments');
        $tasks->load('users');
        return view('Tasks.manage', compact('tasks', 'users'));
    }

    public function delete($taskID){
        $task = Task::find($taskID);
        $task->delete();
        return back();
    }

    public function update(Request $request, $taskID){
        $task = Task::find($taskID);
        $task->taskName = $request->taskName;
        $task->taskBody = $request->taskBody;
        $task->assignedTo = $request->assignedTo;
        $task->startDate = $request->startDate;
        $task->endDate = $request->endDate;

        $task->load('users');
        $task->save();

        return back();


    }
}
