@extends('tags.tagLayout')

@section('tagContent')

    <h1>Edit a tag</h1>

    @include('partial.errors')

    <form method="post" action="/tags/{{$tag->id}}/edit">
        {{csrf_field()}}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required="required" value="{{$tag->name}}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>

@endsection