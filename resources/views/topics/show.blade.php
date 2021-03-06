@extends('layouts.main')

@section ('content')
<section>
    <div class="container">

        <div class="page-header">
            <h1>{{$topic->title}} <small>({{count($polls)}})</small></h1>
        </div>
        <p class="lead">{{$topic->description}}</p>
        
        @include('polls.items', ['polls' => $polls])
        
    </div>
</section>


@endsection