<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use DB;

use App\Http\Requests;

class SearchController extends Controller
{
    public function search(Request $request){

        $query = $request->search_string;
        $result = DB::table('posts')->where('title', 'LIKE', "%$query%")->get();
        //$posts = Post::all();
        return $result;
    }
}
