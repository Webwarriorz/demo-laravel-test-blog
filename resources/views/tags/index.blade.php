@extends('tags.tagLayout')

@section('tagContent')

    <h1>Tags list</h1>

    @foreach($tags as $tag)

        @include('partial.tag')

    @endforeach

@endsection