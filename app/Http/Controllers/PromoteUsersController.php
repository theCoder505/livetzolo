<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use mysqli;

class PromoteUsersController extends Controller
{
    //




    public function promoteredirect()
    {
        $getCoins = DB::table('coininfos')->where('status', 'promoted')->orderBy('promote_position', 'asc')->get();
        $allcoins = DB::table('coininfos')->where('status', '!=', 'promoted')->orderBy('id', 'desc')->get();
        $promotedcoins = DB::table('coininfos')->where('status', '=', 'promoted')->orderBy('promote_position', 'asc')->get();
        return view('promote', compact('getCoins', 'allcoins', 'promotedcoins'));
    }





    public function updatelistMethod(Request $request)
    {

        $reqData = $request->page_id_array;
        for ($i = 0; $i < count($reqData); $i++) {
            $upquery = DB::table('coininfos')->where('id', $reqData[$i])->update([
                'promote_position' => ($i + 1),
            ]);
        }
        echo "Page Order has been updated";
    }





    public function promoteMethod(Request $request)
    {
        $id = $request->coinId;
        $status = $request->coinstatus;
        $coinname = $request->coinname;
        if ($status != '') {
            $promote = DB::table('coininfos')->where('id', $id)->update([
                'status' => $status,
            ]);
            if ($promote) {
                return Redirect::back()->with('msg', '{ ' . $coinname . ' } added to promoted list')->with('type', 'alert-success');
            } else {
                return Redirect::back()->with('msg', 'Could not update coin')->with('type', 'alert-danger');
            }
        } else {
            return Redirect::back()->with('msg', '{ ' . $coinname . ' } added to promoted list')->with('type', 'alert-success');
        }
    }









    public function normalizeMethod(Request $request)
    {
        $id = $request->coinId;
        $status = $request->coinstatus;
        $coinname = $request->coinname;
        if ($status != '') {
            $promote = DB::table('coininfos')->where('id', $id)->update([
                'status' => $status,
            ]);
            if ($promote) {
                return Redirect::back()->with('msg', '{ ' . $coinname . ' } added to Normal Coin list')->with('type', 'alert-info');
            } else {
                return Redirect::back()->with('msg', 'Could not update coin')->with('type', 'alert-danger');
            }
        } else {
            return Redirect::back()->with('msg', '{ ' . $coinname . ' } added to Normal Coin list')->with('type', 'alert-info');
        }
    }
}
