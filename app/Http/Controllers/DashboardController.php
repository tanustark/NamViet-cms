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
        $tasks_done = DB::table('tasks')->where('isDone','true')->count();
        return view('dashboard', compact('user', 'items', 'users', 'tasks', 'tasks_done'));
        //return $tasks_done;
    }
}
