@if(!empty(Auth::user()) && Auth::user()->isAdmin())
    <span class="pull-right">
        <a class="pr-3" href="/tags/{{$tag->id}}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        <a class="pr-3" href="/tags/{{$tag->id}}/delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
    </span>
@endif