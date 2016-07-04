<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\User;
use App\Images;
use DB;

class SiteController extends Controller
{
    public function index(){
        $posts = Post::all();
        $posts->load('users');
        $posts->load('images');
        return view('site.index', compact('posts'));
    }

    public function show($postID){
        $post = Post::find($postID);
        $post->load('users');
        $post->load('images');
        return view('site.show', compact('post'));
    }
}
