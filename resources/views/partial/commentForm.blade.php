<h3>Join the discussion</h3>
<div class="mb-4">

    @include('partial.errors')

    <form method="POST" action="/posts/{{$post->id}}/comments">

        {{csrf_field()}}

        <div class="form-group">
            <textarea name="body" rows="2" class="form-control" placeholder="your comment" required="required"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add comment</button>
        </div>

    </form>

</div>

<hr>