@extends('layouts.master')

@section('content')
    <div class="row">

        <div class="col-sm-8 blog-main">
            @yield('tagContent')
        </div>

        <div class="col-sm-3 offset-sm-1 blog-sidebar">
            @include('partial.sidebar')
        </div>

    </div>
@endsection