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
                <img src="{{asset('webimages/adminimage.jpg')}}" alt="" id="loginSiteImg">
            </div>

            <div class="col-md-6 col-lg-6">

                <div class="py-5">

                    <h2 class="font-weight-bold">Login To Admin Panel</h2>

                    @if (session('errmsg'))
                        <div class="alert alert-danger font-weight-bold text-center">
                            {{session('errmsg')}}
                        </div>
                    @endif

                    <form action="/check-login" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" required name="adminEmail" id="email" placeholder="Admin Email Address">
                        </div>
                        <div class="form-group">
                            <label for="adminPwd">Password</label>
                            <input type="password" class="form-control" required name="adminPwd" id="adminPwd" placeholder="Admin Password">
                        </div>

                        <a href="/forget-password">
                            Forget Password? Click here.
                        </a>
                        <button type="submit" class="btn btn-info btn-block mt-2">Login</button>
                    </form>

                </div>

            </div>

        </div>
        </div>
    </div>


@endsection