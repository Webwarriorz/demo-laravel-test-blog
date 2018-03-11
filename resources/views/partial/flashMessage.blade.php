@if(!empty($flash = session('message')))

    @if(session()->has('message_important'))
        <div id="flash-message" class="alert alert-danger mb-5" role="alert">
            {{$flash}}
        </div>
    @else
        <div id="flash-message" class="alert alert-success mb-5" role="alert">
            {{$flash}}
        </div>
    @endif

@endif