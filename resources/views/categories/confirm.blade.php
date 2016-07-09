@extends ('layouts.main')

@section ('content')
<section>
    <div class="container">
        
        <div class="page-header">
            <a class="btn btn-success pull-right" href="/categories/create" data-toggle="moal" data-target="#modal" data-size="modal-sm">Create Node</a>
            <h1>Confirmation</h1>
        </div>
        <p class="lead">Are you sure you want to delete category #{{$node->id}} named '{{$node->title}}'?</p>
        <form method="post" action="/categories/{{$node->id}}/destroy">
            <input type="hidden" name="_method" value="DELETE">
            {!! csrf_field() !!}
            <button type="submit" class="btn btn-success">Yes I'm sure</button>
        </form>
    </div>
</section>
@endsection