<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SmallStufsController extends Controller
{
    //


    public function allusers()
    {
        $allusers = DB::table('user_data')->where('varification_status', 'verified')->orderBy('id', 'desc')->get();
        return view('normalpages.allusers', compact('allusers'));
    }




    public function editUserProfile(Request $request)
    {
        $userId = $request->userId;
        $userMail = $request->userMail;
        $usertype = $request->userType;

        if ($usertype != '') {


            $editquery = DB::table('user_data')->where('id', $userId)->update([
                'user_type' => $usertype,
            ]);

            if ($editquery) {
                return Redirect::back()->with('msg', '[ ' . $userMail . ' ] has Benn updated to "' . $usertype . '" user successfully!')->with('type', 'alert-success');
            } else {
                return Redirect::back();
            }
        } else {
            return Redirect::back();
        }
    }
}
