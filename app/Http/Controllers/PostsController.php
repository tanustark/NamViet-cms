<?php

namespace App\Http\Controllers;

use DB;
use App\Post;
use App\User;
use Hamcrest\Type\IsBoolean;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public  function __construct()
    {
        $this->middleware('auth');
    }


    public function show($postID){
        $user = User::first();
        $post = Post::find($postID);
        return view('Post.show', compact('post','user'));
    }

    public function index(User $user){
        $user=User::all();
        $posts = Post::all()->sortByDesc('id');
        //$posts->load('users.comments');
        $user->load('posts.comments');
        $posts->load('users');//must bind user who logged
        //$posts=Post::with('users.comments')->find(1);
        return view('Post.index', compact('posts', 'user'));


        //return $user;

    }

    public function create(){
        return view('Post.create');
    }

    public function confirmation(Request $request){
        $user = Auth::user();
        $posts = new Post([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $user->id,
            'imgPath' => ''
        ]);
        //$posts=Post::with('users.comments')->find(8);
        $posts->save();
        $user->load('posts.comments');
        return $request;
        return view('Post.confirmation', compact('posts', 'user'));
    }

    public function manage(){
        $user=User::all();
        $posts = Post::all()->sortByDesc('id');
        //$posts->load('users.comments');
        $user->load('posts.comments');
        $posts->load('users');//must bind user who logged
        return view('Post.manage', compact('posts', 'user'));
    }

    public function editConfirm()
    {
        return view('Post.edit-confirm');
    }

    public function edit($postID){
        $post = Post::find($postID);
        return view('Post.edit', compact('post'));
    }

    public function update(Request $request, Post $post, $postID){
        $post=Post::find($postID);
        $user = Auth::user();
            $post->title = $request->title;
            $post->body = $request->body;
        $post->save();
        $user->load('posts.comments');
        return view('Post.confirmation', compact('posts', 'user'));
    }

    public function delete($postID){
        $post=Post::find($postID);
        $post->delete();
        return back();
    }

    public function myposts()
    {
        $user = Auth::user();
        $posts = DB::table('posts')->where('user_id', $user->id)->orderBy('id','desc')->get();
        //$user->load('posts.comments');
        //$posts->load('users');
        //$posts = Post::all();
        return view('Post.my-post', compact('posts','user'));
    }

    public function showmypost($postID){
        $user=Auth::user();
        $post = Post::find($postID);
        return view('Post.showmypost', compact('post','user'));
    }

    public function editmypost($postID){
        $post = Post::find($postID);
        return view('Post.editmypost', compact('post'));
    }

    public function updatemypost(Request $request, Post $post, $postID){
        $post=Post::find($postID);
        $user = Auth::user();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        $user->load('posts.comments');
        return view('Post.confirmation', compact('posts', 'user'));
    }
}
