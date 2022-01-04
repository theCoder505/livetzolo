@extends('layout.app')

@section('content')


    <center>
        @if (session()->has('errormsg'))
            <div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                {{ session()->get('errormsg') }}
            </div>
        @endif
    </center>

    <center>
        @if (session()->has('successMsg'))
            <div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                {{ session()->get('successMsg') }}
            </div>
        @endif
    </center>

    <div class="container">
        <div class="row">
            <div class="col-md-12 p-5">

                <h1 class="text-center font-weight-bold text-primary my-3">
                    Add Coins Uploading CSV File
                </h1>

                <a href="{{ asset('webimages/demofile.csv') }}" download="{{ asset('webimages/demofile.csv') }}"
                    class="floatLeftBtn btn btn-primary btn-sm">Download
                    Demo CSV</a>

                <form action="/upload-coins-by-excell" method="post" enctype="multipart/form-data">

                    @csrf

                    <div class="form-group">
                        <input type="file" name="uploadfile" id="" class="form-control" required accept=".csv"> <br>
                    </div>

                    <button type="submit" class="btn btn-success btn-block">Upload CSV File </button>

                </form>

            </div>
        </div>
    </div>


    <script>$(".upcoins").addClass("activated"); </script>
@endsection
