@extends('layouts.main')

@section ('content')
<section>
    <div class="container">

        <div class="page-header">
            <h1>{{$topic->title}} <small>({{count($polls)}})</small></h1>
        </div>
        <p class="lead">{{$topic->description}}</p>
        
        @if (count($polls))
            @foreach ($polls->chunk(3) as $row)
            <div class="row">
                @foreach ($row as $poll)
                <div class="col-md-4">
                    <h3>#{{$poll->id}}) <a href="/polls/{{$poll->slug}}">{{$poll->title}}</a></h3>
                    <p>{{str_limit($poll->description,200)}}</p>
                    <p>{!!\App\Libraries\Common::chart_labels($poll->options)!!}</p>
                    <p>{!!\App\Libraries\Common::chart_values($poll)!!}</p>
                </div>
                @endforeach
            </div>

            @endforeach
        @else
            <p>There are no polls under this topic.</p>
            <p><a href="/polls/create" class="btn btn-success">Create a Poll</a></p>
        @endif
    </div>
</section>


@endsection