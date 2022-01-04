@extends('layout.app')

@section('content')


    @include('influencers.create');
    @include('influencers.draginfluencers');


    <script>
        $(".influencers").addClass("activated");
    </script>
@endsection
