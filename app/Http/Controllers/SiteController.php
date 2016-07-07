<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\User;
use App\Images;
use App\posts;
use DB;

class SiteController extends Controller
{
    public function index(){
        $posts = Post::all();
//        $sitePosts = $posts->filter(function ($posts) {
//            return ($posts->isAccepted);
//        });
//        $sitePosts->all()->paginate(10);

        $sitePosts = Post::where('isAccepted', '=', true)->paginate(10);


        $highlight = $posts->filter(function ($posts){
            return ($posts->isHighlighted);
        });
        $highlight->first();
        $highlight->load('images');

        return view('site.index', compact('sitePosts', 'highlight'));
        //return $highlight;
    }

    public function show($postID){
        $post = Post::find($postID);
        $post->load('users');
        $post->load('images');
        return view('site.show', compact('post'));
    }

    public function search(Request $request){

        $query = $request->search_string;
        $results = DB::table('posts')
            ->where('title', 'LIKE', "%$query%")
            ->get();
//        $result->load('users.comments');
//        $result->load('images');
        return view('site.siteResult', compact('results'));

    }
}
