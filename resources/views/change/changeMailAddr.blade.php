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

                        <h2 class="font-weight-bold text-danger">Change Password & Login</h2>
                        <br>
                        <br>

                        <small class="text-warning">This page will expire in 15 minutes. Try soon, Thanks!...</small>

                        @if (session('errmsg'))
                            <div class="alert alert-danger font-weight-bold text-center">
                                {{ session('errmsg') }}
                            </div>
                        @endif

                        <form action="/change-admin-email" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="">Set Email</label>
                                <input type="email" class="form-control" name="setEmail" id="setEmail"
                                    placeholder="SET NEW EMAIL" required>
                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="ADMIN PASSWORD" required>
                                <input type="checkbox" onclick="showpass()"> Show Password
                            </div>

                            <a href="/admin-login">
                                Skip & Login
                            </a>

                            <button type="submit" class="btn btn-block btn-danger mt-2">CHANGE PASSWORDS</button>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection
