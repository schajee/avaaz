<form action="/polls/{{$poll->slug}}" method="post">
    <div class="panel">
        <div class="panel-body">
            <p class="lead">{{$poll->question or 'Poll Question'}}</p>
            @foreach ($poll->options as $option)
            <div class="{{$option->type->option_type}}">
                <label><input type="{{$option->type->option_type}}" name="options" value="{{$option->id}}">{{$option->text}}</label>
            </div>
            @endforeach
            <hr>
            <p>
                <a href="/polls/{{$poll->slug}}" class="btn btn-default pull-right">View Results</a>
                <button type="submit" class="btn btn-success">Submit</button>
            </p>
        </div>
    </div>
</form>