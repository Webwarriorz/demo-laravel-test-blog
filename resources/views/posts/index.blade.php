@extends('posts.postLayout')

@section('postContent')

    @include('partial.filters')

    @foreach($posts as $post)

        @include('partial.post')

    @endforeach

@endsection