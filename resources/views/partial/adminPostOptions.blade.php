@if(!empty(Auth::user()) && Auth::user()->isAdmin())
    <div class="post-edit-options py-1">
        <span class="pl-2">Adminstrator options</span>
        <span class="pull-right">
                <a class="pr-3" href="/posts/{{$post->id}}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                <a class="pr-3" href="/posts/{{$post->id}}/delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
            </span>
    </div>
@endif