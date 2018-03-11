@if(count($post->comments))

    <h3 class="mb-2">Comments</h3>

    <div class="comments">
        <ul class="list-group">

            @foreach($post->comments as $comment)

                <li class="list-group-item">
                    <span class="d-block">
                        <strong>{{$comment->user->name}}</strong> - {{$comment->created_at->diffForHumans()}}
                        @include('partial.adminCommentOptions')
                    </span>
                    <span class="d-block">{{$comment->body}}</span>

                </li>
            @endforeach

        </ul>
    </div>
@endif