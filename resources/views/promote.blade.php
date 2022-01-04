@extends('layout.app')

@section('content')


    @include('promotesecs.normaltopromote');
    @include('promotesecs.promotemain');
    @include('promotesecs.promtonormal');


    <script>
        $(".promotecoins").addClass("activated");
    </script>
@endsection
