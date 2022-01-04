<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AddsController extends Controller
{
    //








    public function redirectpage()
    {
        $alladds = DB::table('footeradds')->orderBy('sno', 'desc')->get();
        return view('advertisements', compact('alladds'));
    }









    public function uploadAddMethod(Request $request)
    {
        $postcompanyname = $request->companyname;
        $postimgLink = $request->imgLink;
        $postimageFileName = $request->imageFileName;
        $postredirectLink = $request->redirectLink;
        $posttypename = $request->typename;
        $postcookietime = $request->cookietime;


        if (
            ($postcompanyname == '') &&
            ($postimgLink == '') &&
            ($postimageFileName == '') &&
            ($postredirectLink == '') &&
            ($posttypename == '') &&
            ($postcookietime == '')
        ) {
            return Redirect::back()->with('alertmsg', 'Please select some appropriate fields to upload add!')->with('type', 'warning');
            die();
        } else {

            if ($postimageFileName == '' && $postimgLink == '') {
                return Redirect::back()->with('alertmsg', 'Choose an Addvertise Image!')->with('type', 'warning');
                die();
            }




            if ($postimageFileName != '' && $postimgLink == '') {
                // uploading image in files 

                $validate = $request->validate([
                    'imageFileName' => 'required|mimes:jpg,png,jpeg,gif'
                ]);

                if (!$validate) {
                    return Redirect::back()->with('alertmsg', 'Supported images are jpg, png, jpeg, gif!')->with('type', 'warning');
                    die();
                } else {


                    $storeLocation = $request->file('imageFileName')->store('public/addsimages');

                    if ($storeLocation) {

                        $photoName = explode('/', $storeLocation)[2];
                        $host = $_SERVER['HTTP_HOST'];
                        $imageLocation = 'http://' . $host . '/storage/addsimages/' . $photoName;

                        DB::table('footeradds')->insert([
                            'company' => $postcompanyname,
                            'rawimage' => $imageLocation,
                            'redirectlink' => $postredirectLink,
                            'add_location' => $posttypename,
                            'cookietime' => $postcookietime,
                        ]);

                        return Redirect::back()->with('alertmsg', 'Addvertise uploaded successfully for "' . $postcompanyname . '" as "' . $posttypename . '" Type')->with('type', 'success');
                        die();
                    }
                }
            }




            if ($postimageFileName == '' && $postimgLink != '') {

                // upload add with image link 
                DB::table('footeradds')->insert([
                    'company' => $postcompanyname,
                    'imagelink' => $postimgLink,
                    'redirectlink' => $postredirectLink,
                    'add_location' => $posttypename,
                    'cookietime' => $postcookietime,
                ]);

                return Redirect::back()->with('alertmsg', 'Addvertise uploaded successfully for "' . $postcompanyname . '" as "' . $posttypename . '" Type')->with('type', 'success');
            } else {
                return Redirect::back()->with('alertmsg', 'Either choose image with link or upload one. Not both at a time!!')->with('type', 'warning');
            }
        }
    }







    public function deleteAddMethod($addSno)
    {
        $dlt = DB::table('footeradds')->where('sno', $addSno)->delete();
        if ($dlt) {
            return Redirect::back()->with('alertmsg', 'Requested addvertise is permanantly deleted.')->with('type', 'info');
        } else {
            return Redirect::back()->with('alertmsg', 'Could not delete add! Try again.')->with('type', 'warning');
        }
    }
}
