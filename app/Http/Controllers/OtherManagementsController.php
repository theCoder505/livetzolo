<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class OtherManagementsController extends Controller
{
    //




    public function showpage()
    {
        $about = DB::table('pagetexts')->where('sno', '1')->value('aboutus');
        $contact = DB::table('pagetexts')->where('sno', '2')->value('contactus');
        $privacy = DB::table('pagetexts')->where('sno', '3')->value('privacypolicy');
        $helptexts = DB::table('pagetexts')->where('sno', '4')->value('helptexts');
        $gcaptcha = DB::table('siteinfo')->where('id', '1')->value('google_key');

        return view('otherpages', compact('about', 'contact', 'privacy', 'helptexts', 'gcaptcha'));
    }








    public function AboutUsUpload(Request $request)
    {
        $value = $request->aboutVal;

        $update = DB::table('pagetexts')->where('sno', '1')->update([
            'aboutus' => $value,
        ]);

        return Redirect::back()->with('message', "About Us content Successfully Updated")->with('type', 'success');
    }










    // its actually the terms and conditions part, but by mistake functions name are as contact 
    public function contacttUsUpload(Request $request)
    {
        $value = $request->contactVal;

        $update = DB::table('pagetexts')->where('sno', '2')->update([
            'contactus' => $value,
        ]);

        return Redirect::back()->with('message', "Terms & Conditions content Successfully Updated")->with('type', 'success');
    }








    public function privacyUpload(Request $request)
    {
        $value = $request->privacyVal;

        $update = DB::table('pagetexts')->where('sno', '3')->update([
            'privacypolicy' => $value,
        ]);

        return Redirect::back()->with('message', "Privacy Policy content Successfully Updated")->with('type', 'success');
    }





    public function helpsUpload(Request $request)
    {
        $value = $request->helpsVal;

        $update = DB::table('pagetexts')->where('sno', '4')->update([
            'helptexts' => $value,
        ]);

        return Redirect::back()->with('message', "Helps content Successfully Updated")->with('type', 'success');
    }











    public function siteinfo()
    {
        $sitelogo = DB::table('siteinfo')->where('id', '1')->value('sitelogo');
        $sitename = DB::table('siteinfo')->where('id', '1')->value('sitename');
        return view('normalpages.changelogo', compact('sitelogo', 'sitename'));
    }

















    public function changeSiteInfo(Request $request)
    {
        $name = $request->siteName;
        $file = $request->fileName;
        $siteOldlogo = DB::table('siteinfo')->where('id', '1')->value('sitelogo');


        if ((!(empty($file)))) {

            $validate = $request->validate([
                'fileName' => 'required|mimes:jpg,png,jpeg,gif'
            ]);

            if (!($validate)) {
                return Redirect::back()->with('msg', 'Supported images are jpg, png, jpeg, gif!')->with('type', 'warning');
                die();
            } else {



                $storeLocation = $request->file('fileName')->store('public/websitelogo');

                if ($storeLocation) {

                    $cutLocTil = explode("/storage", $siteOldlogo)[1];
                    $unlinkingLink = public_path() . "/storage" . $cutLocTil;

                    $unlink = unlink($unlinkingLink);

                    if (!$unlink) {
                        return Redirect::back()->with('msg', 'Could not remove Ex Logo. Try later!...')->with('type', 'danger');
                    } else {



                        $photoName = explode('/', $storeLocation)[2];
                        $host = $_SERVER['HTTP_HOST'];
                        $logoLocation = 'http://' . $host . '/storage/websitelogo/' . $photoName;


                        $insert = DB::table('siteinfo')->where('id', '1')->update([
                            'sitename' => $name,
                            'sitelogo' => $logoLocation
                        ]);
                        if ($insert) {
                            return Redirect::back()->with('msg', 'Update Is done successfully!...')->with('type', 'success');
                        }
                    }
                }
            }
        } else {


            $insert = DB::table('siteinfo')->where('id', '1')->update([
                'sitename' => $name,
            ]);
            if ($insert) {
                return Redirect::back()->with('msg', $siteOldlogo . ' Update Is done successfully!...')->with('type', 'success');
            }
        }
    }













    public function googleCaptcha(Request $request)
    {
        $key = $request->googlecaptcha;
        $update = DB::table('siteinfo')->where('id', '1')->update([
            'google_key' => $key,
        ]);

        if ($update) {
            return Redirect::back()->with('message', '"' . $key . '" this google captcha key added Successfully!...')->with('type', 'success');
        } else {
            return Redirect::back()->with('message', 'Could not add this Key!...' . $key)->with('type', 'danger');
        }
    }
}
