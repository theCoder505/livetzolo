@extends('layout.app')

@section('content')

    <style>
        body {
            font-family: "Poppins", sans-serif;
            margin: 0;
            overflow-x: hidden;
            font-weight: 300;
            background: #000a1e;
            color: white;
        }

    </style>


    <center>
        @if (session()->has('msg'))
            <div class="alert alert-{{ session()->get('type') }} text-center alert-dismissible fade show" role="alert">
                {{ session()->get('msg') }}
            </div>
        @endif
    </center>





    <div class="container">
        <div class="row">
            <div class="col-md-12 p-5">

                <h1 class="text-center font-weight-bold my-3">
                    Site Info Control
                </h1>


                <div class="mt-4">

                    <center>
                        <h2 class="text-info">Site Name: <b class="font-weight-bold text-danger">{{ $sitename }}</b>
                        </h2>

                        <img src="{{ $sitelogo }}" alt="" id="logoImg">

                    </center>

                    <div id="formData">
                        <form action="/change-siteinfo" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="siteName">Site Name</label>
                                <input type="text" class="form-control" name="siteName" value="{{ $sitename }}"
                                    required>
                            </div>

                            <div class="form-group">
                                <label for="fileName">Set Logo</label>
                                <input type="file" class="form-control" accept="image/*" name="fileName"
                                    onchange="showLogo(event)">
                            </div>

                            <center>
                                <button class="btn btn-danger px-5">CHANGE INFO</button>
                            </center>

                        </form>

                    </div>



                </div>


            </div>
        </div>
    </div>



    <script>
        $(".siteinfo").addClass("activated");
    </script>

@endsection
