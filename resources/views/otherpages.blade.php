@extends('layout.app')

@section('content')

    <script src="https://cdn.tiny.cloud/1/abrw04rlhjamz8cegjy3kqdgrtl9qvi7va41i73z56p16vrp/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

    {{-- <script src="{{asset('js/tinymce.js')}}"></script> --}}

    @include('others.goolekey');
    @include('others.about');
    @include('others.contact');
    @include('others.privacy');
    @include('others.helps');

    <script>
        $(".others").addClass("activated");
    </script>
@endsection
