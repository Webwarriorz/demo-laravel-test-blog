<div class="sidebar-module">
    <h4>Tags</h4>
    <ol class="list-unstyled">

        @foreach($tags as $tag)
            <li>
                <a href="/posts/tags/{{$tag}}">{{$tag}}</a>
            </li>
        @endforeach
        <li>
            <a href="/tags">Show all tags</a>
        </li>

    </ol>
</div>