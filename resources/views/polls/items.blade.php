@if (count($polls))
<dl class="dl-horizontal poll">
    @foreach ($polls as $poll)
    <dt><a href="/polls/{{$poll->slug}}">{{$poll->title}}</a></dt>
    <dd>{{$poll->description}}
        <footer>
            <span class="label">{{date('j F Y', strtotime($poll->created_at))}}</span>
            <span class="label"><a href="/users/{{$poll->user->login}}">{{$poll->user->name}}</a></span>
            <span class="label"><i class="fa fa-eye"></i> {{$poll->views}}</a></span>
            <span class="label"><i class="fa fa-check"></i> {{$poll->responses}}</a></span>
        </footer>        
    </dd>
    @endforeach
</dl>
@else
    <p>There are no polls under this topic.</p>
    <p><a href="/polls/create" class="btn btn-success">Create a Poll</a></p>
@endif