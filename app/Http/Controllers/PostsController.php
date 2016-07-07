<?php

namespace App\Http\Controllers;

use App\Images;
use DB;

use App\Post;
use App\User;
use App\Comment;
use App\Highlight;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public  function __construct()
    {
        $this->middleware('auth');
    }

//Show a specific Post from All Posts
    public function show($postID){
        $post = Post::find($postID);
        $post->load('users');
        $post->load('images');
        $comments = Comment::where('post_id', '=', $post->id)->orderBy('id','desc')->paginate(5);
        return view('Post.show', compact('post', 'comments'));
        //return $post;
    }

//Comment on a post
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

//Show index of Posts
    public function index(){
        $user=User::all();
        $posts = Post::all()->sortByDesc('id');
        $posts->load('users');
        $posts->load('images');
        //$posts=Post::with('users.comments')->find(1);
        return view('Post.index', compact('posts', 'user'));
        //return $user;
    }

//Create post view
    public function create(){
        return view('Post.create');
    }


//Confirm to post a post
    public function confirmation(Request $request){
        $user = Auth::user();

        $posts = new Post([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $user->id,
            'isAccepted' => false,
            'isHighlight' => false
        ]);
        $posts->save();
        if($request->file('image_file') != null){
            $imgName = $posts->id . '.' .'jpg';
            $path = base_path() . '/public/assets/img/posts/';
            $request->file('image_file')->move($path, $imgName);
            $cover_image = new Images ([
                'imgName' => $imgName,
                'post_id' => $posts->id,
            ]);
            $cover_image->save();
        }

        return view('Post.confirmation');
    }


//Manage post view
    public function manage(){
        $posts = Post::all()->sortByDesc('updated_at');
        $posts->load('users');
        return view('Post.manage', compact('posts'));
        //return $posts;
    }


//Confirm when upload edit version of a post
    public function editConfirm()
    {
        return view('Post.edit-confirm');
    }


//Edit post view
    public function edit($postID){
        $post = Post::find($postID);
        $post->load('images');
        return view('Post.edit', compact('post'));
    }


//Update a post
    public function update(Request $request, Post $post, $postID){

        $imgName = $postID . '.' .'jpg';
        $path = base_path() . '/public/assets/img/posts/';
        if ($request->file('image_file' != null)){
            $request->file('image_file')->move($path, $imgName);
            $cover_image = new Images ([
                'imgName' => $imgName,
                'post_id' => $postID,
            ]);
            $cover_image->save();
            return back();
        }


        $post=Post::find($postID);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        $post->load('images');

        return view('Post.confirmation');

    }


//Delete a post
    public function delete($postID){
        $post=Post::find($postID);
        $post->delete();
        return back();
    }

    public function myposts()
    {
        $user = Auth::user();
        $posts = DB::table('posts')->where('user_id', $user->id)->orderBy('updated_at','desc')->get();
        return view('Post.my-post', compact('posts','user'));
    }


//Show a specfic post from My Posts
    public function showmypost($postID){
        $user=Auth::user();
        $post = Post::find($postID);
        $post->load('images');
        $comments = Comment::where('post_id', '=', $post->id)->orderBy('id','desc')->paginate(5);
        return view('Post.showmypost', compact('post','user','comments'));
    }

    public function editmypost($postID){
        $post = Post::find($postID);
        $post->load('images');
        return view('Post.editmypost', compact('post'));
    }


//Update a post from My Posts
    public function updatemypost(Request $request, $postID){
        $post = Post::find($postID);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

//Replace old cover image
        if($request->file('image_file') != null){
            $imgName = $post->id . '.' .'jpg';
            $path = base_path() . '/public/assets/img/posts/';
            $request->file('image_file')->move($path, $imgName);
            $cover_image = Images::find($post->images->id);
            $cover_image->save();
        }
        return view('Post.confirmation');
    }


//Admin accept a post to be published to main site
    public function acceptToMainSite($postID){
        $post=Post::find($postID);
        $post->isAccepted = true;
        $post->save();
        return back();
    }

//Admin remove a post from main site
    public function removeFromMainSite($postID){
        $post = Post::find($postID);
        $post->isAccepted = false;
        $post->isHighlighted = false;
        $post->save();
        return back();
    }

//Admin make a post highlight
    public function makeHighlight($postID){

        //Have 3 highlights, delete the last when a new one added
        $posts = Post::all();
        $olds = $posts->filter(function ($posts){
            return ($posts->isHighlighted);
        });
        foreach ($olds as $old){
            $old->isHighlighted = false;
            $old->save();
        }

        $post = Post::find($postID);
        $post->isHighlighted = true;
        $post->save();
        $post->load('users');
        $highlight = new Highlight([
            'title' => $post->title,
            'body' => $post->body,
            'author' => $post->users->fullname,
            'updatedAt' => $post->updated_at
        ]);
        $highlight->save();
        return back();
        //return $olds;
    }
}
