@extends ('layouts.main')

@section ('content')
<section>
    <div class="container">
        
        <div class="page-header">
            <h1>Confirmation</h1>
        </div>
        <p class="lead">Are you sure you want to delete response <code>#{{$response->id}}</code> titled <em>{{$response->option->text}}</em>?</p>
        <form method="post" action="/responses/{{$response->id}}/destroy">
            <input type="hidden" name="_method" value="DELETE">
            {!! csrf_field() !!}
            <button type="submit" class="btn btn-success">Yes I'm sure</button>
            <a href="/polls/{{$response->poll->slug}}" class="btn btn-cancel">Cancel</a>
        </form>
    </div>
</section>
@endsection