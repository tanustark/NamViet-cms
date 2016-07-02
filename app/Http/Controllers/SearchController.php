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
        $results = DB::table('posts')
            ->where('title', 'LIKE', "%$query%")
            ->get();
//        $result->load('users.comments');
//        $result->load('images');
        return view('Search.result', compact('results'));
        return $results;
    }
}
