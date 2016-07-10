@if(isset($error)) {{$error}} @endif

<form action="/polls/{{$poll->slug}}" method="post">
    {!! csrf_field() !!}
    <div class="panel">
        <div class="panel-body">
            <p class="lead">{{$poll->question or 'Poll Question'}}</p>
            @foreach ($poll->options as $option)
            @if (isset($response))
            <div class="{{$option->type->option_type}} @if($response) disabled @endif @if($response->option_id == $option->id) checked @endif">
                @if($response->option_id == $option->id)
                <a href="/responses/{{$response->id}}/delete" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                @endif
                <label><input type="{{$option->type->option_type}}" name="options[]" value="{{$option->id}}" @if($response->option_id == $option->id) checked @endif @if($response) disabled @endif>{{$option->text}}</label>
            </div>
            @else
            <div class="{{$option->type->option_type}}">
                <label><input type="{{$option->type->option_type}}" name="options[]" value="{{$option->id}}">{{$option->text}}</label>
            </div>
            @endif
            @endforeach

            @if(!isset($response) || !count($response))
            <hr>
            <p><button type="submit" class="btn btn-block btn-success">Respond</button></p>
            @endif
        </div>
    </div>
</form>

<span class="label">{{date('j F Y', strtotime($poll->created_at))}}</span>
<span class="label">{{number_format($poll->responses()->count())}} Responses</span>
<a class="label label-danger" href="/users/{{$poll->user->login}}">{{$poll->user->name}}</a>
<a class="label label-primary" href="/polls/{{$poll->slug}}/share" title="Share"><i class="fa fa-share"></i> Share</a>


