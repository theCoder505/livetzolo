<center>
    @if (session()->has('message'))
        <div class="alert alert-{{ session()->get('type') }} text-center alert-dismissible fade show" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif
</center>



<center>
    <h1 class="font-weight-bold pt-4 text-danger"> Google Captcha Key </h1>
</center>



<div class="container">
    <div class="row">
        <div class="col-md-12 p-5">

            <form action="/edit-gcaptcha" method="post">
                @csrf

                <div class="form-group">
                    <label for=""> Set New Google Captcha Key: </label>
                    <input type="text" required class="form-control" name="googlecaptcha" value="{{ $gcaptcha }}">
                </div>

                <center>
                    <button class="btn btn-danger px-5">Edit Key</button>
                </center>

            </form>

        </div>
    </div>
</div>
