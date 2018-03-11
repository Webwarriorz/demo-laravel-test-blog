@extends('posts.postLayout')

@section('postContent')

    <h1>Create a post</h1>

    @include('partial.errors')

    <form method="post" action="/posts">
        {{csrf_field()}}

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required="required">
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control" required="required"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Publish</button>
        </div>

    </form>

@endsection