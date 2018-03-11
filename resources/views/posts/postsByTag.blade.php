@extends('posts.postLayout')

@section('postContent')

    @include('partial.tagName')

    @foreach($posts as $post)

        @include('partial.post')

    @endforeach

@endsection