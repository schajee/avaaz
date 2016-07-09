@extends ('layouts.main')

@section ('content')
<section>
    <div class="container">
        
        <div class="page-header">
            <a class="btn btn-success pull-right" href="/topics/create" data-toggle="moal" data-target="#modal" data-size="modal-sm">Create Topic</a>
            <h1>Topics</h1>
        </div>
        {{-- This comment will not be present in the rendered HTML --}}

        <dl class="dl-horizontal">        
        @foreach ($cloud as $topic)
            <dt><a href="/topics/{{$topic->slug}}">{{$topic->title}}</a></dt>
            <dd>{{$topic->description}}</dd>
        @endforeach
        </dl>
    </div>
</section>
@endsection