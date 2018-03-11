@if(!empty(Auth::user()) && Auth::user()->isAdmin())
    <span class="pull-right">
        <a class="pr-3" href="/comments/{{$comment->id}}/delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
    </span>
@endif