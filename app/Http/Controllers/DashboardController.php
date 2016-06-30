<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Task;
use Auth;
use DB;
use App\User;
use App\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Post::all()->sortByDesc('id');
        $items->load('users');
        $user = Auth::user();
        $users = User::all();
        $tasks = Task::all();
        $tasks_done = $user->tasks()->get()->where('isDone', 1)->count();
        $current_task = $user->tasks()->get()->where('isDone', 0)->count();
        return view('dashboard', compact('user', 'items', 'users', 'tasks', 'tasks_done', 'current_task'));
        //return $tasks_done;
    }
}
