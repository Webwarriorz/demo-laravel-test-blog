@if(count($post->tags))
<div class="post-tags">
    <ul class="list-inline">

        @foreach($post->tags as $tag)
            <li class="list-inline-item">
                <a href="/posts/tags/{{$tag->name}}">{{$tag->name}}</a>
            </li>
        @endforeach

    </ul>
</div>
@endif