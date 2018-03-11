@if(!empty($month = request('month')) && !empty($year = request('year')))
    <h1 class="mb-4">Filtered post by created in: {{$year}} {{$month}}</h1>
@endif