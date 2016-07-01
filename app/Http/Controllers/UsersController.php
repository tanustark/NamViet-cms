<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Hash;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;

class UsersController extends Controller
{
    public function updateProfile(Request $request, $userID)
    {
        $user = User::find($userID);
        if (Hash::check($request->current_password, $user->password) && ($request->new_password == $request->retype)) {
            $user->fullname = $request->fullname;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->password = Hash::make($request->new_password);
            $user->save();
            return view('success');
        } elseif ($request->new_password != $request->retype) {
            $error = 'Your new password and new password retyped are not matched. Please try again!';
            return view('error', compact('error'));
        } elseif (!Hash::check($request->current_password, $user->password)) {
            $error = 'Your current password is incorrect. Please try again!';
            return view('error', compact('error'));
        } else {
            $error = 'Unknown Error. Please try again!';
            return view('error', compact('error'));
        }
    }
}
