<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class InluencerController extends Controller
{
    //




    public function influencers()
    {
        $getinfluencers = DB::table('user_data')->where('user_type', 'influencer')->where('varification_status', 'verified')->orderBy('influencer_pos', 'asc')->get();
        return view('influencers', compact('getinfluencers'));
    }




    public function addInfluencers(Request $request)
    {
        $name = $request->infName;
        $email = $request->infMailAddr;
        $link = $request->infLink;
        $password = $request->infPassword;
        $imgLink = $request->imgLink;
        $type = 'influencer';


        $add = DB::table('user_data')->insert([
            'user_name' => $name,
            'user_email' => $email,
            'user_password' => $link,
            'influencer_url' => $password,
            'user_type' => $type,
            'varification_status' => 'verified',
            'influencer_img_link' => $imgLink,
        ]);

        if ($add) {
            return Redirect::back()->with('msg', 'Influencer "' . $name . '" added successfully')->with('type', 'alert-success');
        } else {
            return Redirect::back()->with('msg', 'Could not add Influencer "' . $name . '"')->with('type', 'alert-danger');
        }
    }





    public function deletingMethod($deleteId)
    {
        $dlt = DB::table('user_data')->where('id', $deleteId)->delete();
        if ($dlt) {
            return Redirect::back()->with('msg', 'Influencer deleted successfully')->with('type', 'alert-info');
        }
    }




    public function updateInfluencerMethod(Request $request)
    {
        $reqData = $request->page_id_array;
        for ($i = 0; $i < count($reqData); $i++) {
            $upquery = DB::table('user_data')->where('id', $reqData[$i])->update([
                'influencer_pos' => ($i + 1),
            ]);
        }
        echo "Influencer Rank has been updated";
    }




    public function editUserStatus(Request $request)
    {
        $userId = $request->userId;
        $status = $request->userStatus;
        $urlLink = $request->urlLink;
        $imageLink = $request->imageLink;

        $dbStatus = DB::table('user_data')->where('id', $userId)->value('user_type');
        $dbUrl = DB::table('user_data')->where('id', $userId)->value('influencer_url');
        $dbImgLink = DB::table('user_data')->where('id', $userId)->value('influencer_img_link');

        if (empty($status)) {
            $status = $dbStatus;
        }
        if (empty($urlLink)) {
            $urlLink = $dbUrl;
        }
        if (empty($imageLink)) {
            $imageLink = $dbImgLink;
        }

        $update = DB::table('user_data')->where('id', $userId)->update([
            'user_type' => $status,
            'influencer_url' => $urlLink,
            'influencer_img_link' => $imageLink,
        ]);
        if ($update) {
            return Redirect::back()->with('msg', 'Influencer Account changed successfully.')->with('type', 'alert-success');
        }
    }
}
