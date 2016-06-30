<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class StaffsController extends Controller
{
    public function index()
    {
        $staffs = DB::table('users')->where('isAdmin', 0)->get();
        return view('Staffs.index', compact('staffs'));
    }

    public function delete($staffID)
    {
        $staff = User::find($staffID);
        $staff->delete();

        return back();
    }

    public function confirm(Request $request)
    {
        $staff = new User ([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'gender' => $request->gender,
            'password' => bcrypt($request->password),
            'isAdmin' => 0
        ]);
        $staff->save();

        return back();
    }

}
