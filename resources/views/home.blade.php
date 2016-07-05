@extends('layouts.main')

@section ('content')
<section>
    <div class="container">

        <article>
            <p class="lead">{!! \App\Libraries\Common::format_topics($poll->topics) !!}</p>
            <div class="row">
                <div class="col-md-6">
                    <h1 class="poll-title"><a href="/polls/{{$poll->slug}}">{{$poll->title}}</a></h1>
                    <p class="text-muted">{{$poll->description}}</p>
                </div>
                <div class="col-md-5 col-md-offset-1">
                    @include ('partials.poll')
                </div>
            </div>
        </article>
        
    </div>
</section>
@endsection