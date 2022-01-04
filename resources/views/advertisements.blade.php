@extends('layout.app')

@section('content')


    @include('advertise.footeradds');
    @include('advertise.alladds');

    <script>
        $(".advertisements").addClass("activated");
    </script>
@endsection
