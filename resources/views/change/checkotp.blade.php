@extends('layout.loginlayout')

@section('content')

    <style>
        body {
            background: black;
            color: white;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
            display: flex;
        }

    </style>

    <div class="container">

        <div id="loginHolder">
            <div class="row">


                <div class="col-md-6 col-lg-6">
                    <img src="{{ asset('webimages/adminimage.jpg') }}" alt="" id="loginSiteImg">
                </div>

                <div class="col-md-6 col-lg-6">

                    <div class="py-5">

                        <h2 class="font-weight-bold text-danger">Enter OTP</h2>
                        <small class="text-warning">An email has been sent to Admin Mail. Give The 6 digit OTP below and
                            continue. OTP is valid for 15 minutes. </small>
                        <br>
                        <br>

                        @if (session('errmsg'))
                            <div class="alert alert-danger font-weight-bold text-center">
                                {{ session('errmsg') }}
                            </div>
                        @endif

                        <form action="/check-emailchange-otp" method="post">
                            @csrf

                            <div class="form-group">
                                <input type="text" maxlength="6" class="form-control" name="sentOtp" id="top"
                                    placeholder="6 Digit OTP" required>
                            </div>

                            <a href="/admin-login">
                                Skip & Login
                            </a>

                            <button type="submit" class="btn btn-block btn-danger mt-2">SUBMIT OTP</button>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection
