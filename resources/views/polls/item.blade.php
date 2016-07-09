@if(isset($error)) {{$error}} @endif

<form action="/polls/{{$poll->slug}}" method="post">
    {!! csrf_field() !!}
    <div class="panel">
        <div class="panel-body">
            <a href="/polls/{{$poll->slug}}/share" class="pull-right" title="Share"><i class="fa fa-share-square-o"></i></a>
            <p class="lead">{{$poll->question or 'Poll Question'}}</p>
            @foreach ($poll->options as $option)
            <div class="{{$option->type->option_type}}">
                <label><input type="{{$option->type->option_type}}" name="options[]" value="{{$option->id}}">{{$option->text}}</label>
            </div>
            @endforeach
            <hr>
            <p>
                <button type="submit" class="btn btn-block btn-success" @if(!Auth::check()) disabled @endif>Submit</button>
            </p>
        </div>
    </div>
    @if (isset($responses) && count($responses))
    <div class="panel">
        <div class="panel-body">
            <h4>Your response(s):</h4>
            @foreach ($responses as $response)
            <p><span class="label label-default">{{date('j F Y', strtotime($response->created_at))}}</span> {{str_limit($response->option->text,40)}}</p>
            @endforeach
        </div>
    </div>
    @endif
</form>