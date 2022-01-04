<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    //


    public function loginController()
    {
        if ((Cookie::get('loggerkey'))) {
            return redirect('/');
        } else {
            return view('login.loginpage');
        }
    }





    public function checkLogin(Request $request)
    {
        $email = $request->adminEmail;
        $password = $request->adminPwd;

        $mailcheck = DB::table('admin')->where('email', $email)->count();
        if ($mailcheck > 0) {
            $adminpass = DB::table('admin')->where('email', $email)->value('password');
            $verify = password_verify($password, $adminpass);
            if ($verify) {
                $loggerKey = 'admin';
                $mints = (60 * 24);
                Cookie::queue('loggerkey', $loggerKey, $mints);
                return redirect('/');
            } else {
                return Redirect::back()->with('errmsg', 'Passwords did not match');
            }
        } else {
            return Redirect::back()->with('errmsg', 'Email not matched');
        }
    }







    public function forgetPassController()
    {
        $otp = rand(000000, 999999);
        $adminmail = DB::table('admin')->where('designation', 'mainadmin')->value('email');

        //mail part start
        $data = ['name' => 'Vishal Sharma', 'theotp' => $otp];
        $user['to'] = $adminmail;
        Mail::send('mail', $data, function ($message) use ($user) {
            $message->to($user['to']);
            $message->subject("One Time Password");
        });
        //mail part ends




        $time = time();
        $update = DB::table('admin')->where('designation', 'mainadmin')->update([
            'otp' => $otp,
            'otp_sent_time' => $time,
        ]);
        if ($update) {
            return view('login.forgetpass');
        } else {
            return Redirect::back()->with('errmsg', 'Could not send OTP, try again later.');
        }
    }








    public function changeMailOTp()
    {
        $otp = rand(000000, 999999);
        $adminmail = DB::table('admin')->where('designation', 'mainadmin')->value('email');

        //mail part start
        $data = ['name' => 'Vishal Sharma', 'theotp' => $otp];
        $user['to'] = $adminmail;
        Mail::send('chnagemail', $data, function ($message) use ($user) {
            $message->to($user['to']);
            $message->subject("One Time Password");
        });
        //mail part ends



        $time = time();
        $update = DB::table('admin')->where('designation', 'mainadmin')->update([
            'otp' => $otp,
            'otp_sent_time' => $time,
        ]);
        if ($update) {
            return view('change.checkotp');
        } else {
            return Redirect::back()->with('errmsg', 'Could not send OTP, try again later.');
        }
    }







    public function checkOtp(Request $request)
    {
        $sentOtp = $request->sentOtp;
        $check = DB::table('admin')->where('otp', $sentOtp)->count();
        if ($check > 0) {

            $otpTime = DB::table('admin')->where('otp', $sentOtp)->value('otp_sent_time');
            $varfdTime = ($otpTime + (15 * 60));

            if ($varfdTime > time()) {
                $mints = 15;
                //it checks if the otp verified or not while making get request on password change page.
                Cookie::queue('passkey', 'verified', $mints);

                return redirect('/change-pass');
            } else {
                return Redirect::back()->with('errmsg', 'OTP expired. Try again.');
            }
        } else {
            return Redirect::back()->with('errmsg', 'OTP did not match. Try Again');
        }
    }





    public function checkEmailchangeOtp(Request $request)
    {
        $sentOtp = $request->sentOtp;
        $check = DB::table('admin')->where('otp', $sentOtp)->count();
        if ($check > 0) {

            $otpTime = DB::table('admin')->where('otp', $sentOtp)->value('otp_sent_time');
            $varfdTime = ($otpTime + (15 * 60));

            if ($varfdTime > time()) {
                $mints = 15;
                Cookie::queue('mailkey', 'verified', $mints);

                return redirect('/change-email-address');
            } else {
                return Redirect::back()->with('errmsg', 'OTP expired. Try again.');
            }
        } else {
            return Redirect::back()->with('errmsg', 'OTP did not match. Try Again');
        }
    }






    public function pwdchangerdirect()
    {
        if ((Cookie::get('passkey'))) {
            $askKey = (Cookie::get('passkey'));
            if ($askKey == 'verified') {
                return view('login.changepassword');
            } else {
                return redirect('/admin-login');
            }
        } else {
            return redirect('/admin-login');
        }
    }






    public function mailChangeRedirect()
    {
        if ((Cookie::get('mailkey'))) {
            $askKey = (Cookie::get('mailkey'));
            if ($askKey == 'verified') {
                return view('change.changeMailAddr');
            } else {
                return redirect('/admin-login');
            }
        } else {
            return redirect('/admin-login');
        }
    }







    public function changePasswordsMethod(Request $request)
    {
        $firstPwd = $request->password;
        $lastPwd = $request->confirmpassword;
        if ($firstPwd == $lastPwd) {

            $loggerKey = 'admin';
            $mints = (60 * 24);
            Cookie::queue('loggerkey', $loggerKey, $mints);

            $updatePass = DB::table('admin')->where('designation', 'mainadmin')->update([
                'password' => bcrypt($lastPwd),
            ]);

            if ($updatePass) {
                return redirect('/');
            } else {
                return Redirect::back()->with('errmsg', 'Could not set Passwords. Try later.');
            }
        } else {
            return Redirect::back()->with('errmsg', 'Passwords did not match');
        }
    }





    public function changeEmailMethod(Request $request)
    {
        $askingemail = $request->setEmail;
        $password = $request->password;

        $dbPassword = DB::table('admin')->where('designation', 'mainadmin')->value('password');

        $verify = password_verify($password, $dbPassword);



        if ($verify) {

            $loggerKey = 'admin';
            $mints = (60 * 24);
            Cookie::queue('loggerkey', $loggerKey, $mints);

            $updateMail = DB::table('admin')->where('designation', 'mainadmin')->update([
                'email' => $askingemail,
            ]);

            if ($updateMail) {
                return redirect('/');
            } else {
                return Redirect::back()->with('errmsg', 'Could not set Email. Try later.');
            }
        } else {
            return Redirect::back()->with('errmsg', 'Admin Password did not match. Try Again.');
        }
    }






    public function logoutMethod()
    {

        if ((Cookie::get('loggerkey'))) {
            Cookie::queue(Cookie::forget('loggerkey'));
        }
        if ((Cookie::get('passkey'))) {
            Cookie::queue(Cookie::forget('passkey'));
        }
        if ((Cookie::get('mailkey'))) {
            Cookie::queue(Cookie::forget('mailkey'));
        }
        return redirect('/admin-login');
    }
}
