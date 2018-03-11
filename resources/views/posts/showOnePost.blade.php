@extends('posts.postLayout')

@section('postContent')

        <div class="blog-post">
            <h1 class="blog-post-title">{{$post->title}}</h1>

            @include('partial.tags')

            <p class="blog-post-meta">
                {{$post->user->name}} on {{$post->created_at->diffForHumans()}}
            </p>
            <p>{{$post->body}}</p>

            @include('partial.adminPostOptions')

            <hr>

            @auth
                @include('partial.commentForm')
            @endauth

            @include('partial.comments')

        </div>

@endsection