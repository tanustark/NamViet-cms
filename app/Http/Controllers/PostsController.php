<?php

namespace App\Http\Controllers;

use App\Images;
use DB;
use App\Post;
use App\User;
use App\Comment;
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
        $post = Post::find($postID);
        $post->load('users.comments');
        $post->load('images');
        $comments = Comment::paginate(5);
        return view('Post.show', compact('post','comments'));
        //return $post;
    }

    public function comment(Request $request, $postID){
        $users = User::all();
        $user = Auth::user();
        $comments = Comment::all();
        $comment = new Comment ([
            'user_id' => $user->id,
            'post_id' => $postID,
            'body' => $request->comment
        ]);
        $comment->save();
        $comment->load('users.posts');
        $comments->load('users.posts');
        return back();
    }

    public function index(){
        $user=User::all();
        $posts = Post::all()->sortByDesc('id');
        $posts->load('users');
        $posts->load('images');
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
        ]);
        $posts->save();
        $imgName = $posts->id . '.' .'jpg';
        $path = base_path() . '/public/assets/img/posts/';
        $request->file('image_file')->move($path, $imgName);
        $cover_image = new Images ([
            'imgName' => $imgName,
            'post_id' => $posts->id,
        ]);
        $cover_image->save();
        return view('Post.confirmation');
    }

    public function manage(){
        $user=User::all();
        $posts = Post::all()->sortByDesc('id');
        //$posts->load('users.comments');
        $user->load('posts.comments');
        $posts->load('users');//must bind user who logged
        $posts->load('images');
        return view('Post.manage', compact('posts', 'user'));
    }

    public function editConfirm()
    {
        return view('Post.edit-confirm');
    }

    public function edit($postID){
        $post = Post::find($postID);
        $post->load('images');
        return view('Post.edit', compact('post'));
    }

    public function update(Request $request, Post $post, $postID){

        $imgName = $postID . '.' .'jpg';
        $path = base_path() . '/public/assets/img/posts/';
        $request->file('image_file')->move($path, $imgName);
        $cover_image = new Images ([
            'imgName' => $imgName,
            'post_id' => $postID,
        ]);
        $cover_image->save();

        $post=Post::find($postID);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        $post->load('images');

        return view('Post.confirmation');

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
        return view('Post.my-post', compact('posts','user'));
    }

    public function showmypost($postID){
        $user=Auth::user();
        $post = Post::find($postID);
        $post->load('images');
        $comments = Comment::paginate(5);
        return view('Post.showmypost', compact('post','user','comments'));
    }

    public function editmypost($postID){
        $post = Post::find($postID);
        $post->load('images');
        return view('Post.editmypost', compact('post'));
    }

    public function updatemypost(Request $request, $postID){
        $post = Post::find($postID);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
//Replace old cover image
        $imgName = $post->id . '.' .'jpg';
        $path = base_path() . '/public/assets/img/posts/';
        $request->file('image_file')->move($path, $imgName);
        $cover_image = Images::find($post->images->id);
        $cover_image->save();

        return view('Post.confirmation');
    }
}
