<?php

namespace App\Http\Controllers;

use DB;
use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostsController extends Controller
{


    public function show($postID){
        $user = User::first();
        $post = Post::find($postID);
        return view('Post.show', compact('post','user'));
    }

    public function index(User $user){
        $user=User::first();
        $posts = Post::all()->sortByDesc('id');
        //$posts->load('users.comments');
        $user->load('posts.comments'); //must bind user who logged
        //$posts=Post::with('users.comments')->find(1);
        return view('Post.index', compact('posts', 'user'));
        //return $posts;
        //return $user;

    }

    public function create(){
        return view('Post.create');
    }

    public function confirmation(Request $request){
        $user = User::first();
        $posts = new Post([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $user->id,
            'imgPath' => './assets/img/1.png'
        ]);
        //$posts=Post::with('users.comments')->find(8);
        $posts->save();
        $user->load('posts.comments');
        //return $user;
        return view('Post.confirmation', compact('posts', 'user'));
    }

    public function manage(){
        $user=User::first();
        $posts = Post::all()->sortByDesc('id');
        $user->load('posts.comments'); //must bind user who logged
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
        $user = User::first();
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

    public function myposts(){
        $user=User::first();
        $posts = Post::all()->sortByDesc('$id');
        return view('Post.my-post',compact('posts','user'));
    }

    public function showmypost($postID){
        $user=User::first();
        $post = Post::find($postID);
        return view('Post.showmypost', compact('post','user'));
    }

    public function editmypost($postID){
        $post = Post::find($postID);
        return view('Post.editmypost', compact('post'));
    }

    public function updatemypost(Request $request, Post $post, $postID){
        $post=Post::find($postID);
        $user = User::first();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        $user->load('posts.comments');
        return view('Post.confirmation', compact('posts', 'user'));
    }
}
