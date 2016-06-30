<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Hash;

use App\Http\Requests;

class UsersController extends Controller
{
    public function updateProfile(Request $request, $userID)
    {
        $user = User::find($userID);
        $currentPass = Hash::make($request->current_password);
        if ($currentPass == $user->password) {
            $user->fullname = $request->fullname;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->password = Hash::make($request->new_password);
            $user->save();
            return back();
        } elseif ($request->new_password != $request->retype) {
            $error = 'Your new password and new password retyped are not matched. Please try again!';
            return view('Shared.error', compact('error'));
        } elseif ($currentPass != $user->password) {
            $error = 'Your current password is incorrect. Please try again!';
            return view('Shared.error', compact('error'));
        } else {
            $error = 'Unknown Error. Please try again!';
            return view('Shared.error', compact('error'));
        }

    }
}
