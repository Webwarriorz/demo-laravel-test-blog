<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="/posts/{{$post->id}}">{{$post->title}}</a>
    </h2>

    @include('partial.tags')

    <p class="blog-post-meta">
        {{$post->user->name}} on {{$post->created_at->diffForHumans()}}
    </p>
    <p>{{$post->body}}</p>

    @include('partial.adminPostOptions')

    <hr>

</div>