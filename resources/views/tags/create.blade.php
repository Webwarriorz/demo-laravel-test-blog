@extends('tags.tagLayout')

@section('tagContent')

    <h1>Create a tag</h1>

    @include('partial.errors')

    <form method="post" action="/tags">
        {{csrf_field()}}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required="required">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>

    </form>

@endsection