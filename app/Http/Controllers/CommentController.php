<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use App\Post;
use Auth;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class CommentController extends Controller
{
    public function edit(Request $request, $cmtID){
        $user = Auth::user();
        $comment = Comment::find($cmtID);
        $comment->body = $request->comment;
        $comment->save();
        return back();
    }

    public function delete($cmtID){
        $comment = Comment::find($cmtID);
        $comment->delete();
        return back();
    }
}

