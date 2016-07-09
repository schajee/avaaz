@if (isset($node))
<form method="post" action="/categories/{{$node->id}}/update" id="modal-form">
<input type="hidden" name="_method" value="PUT">
@else
<form method="post" action="/categories/store" id="modal-form">
@endif

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">@if (isset($node)) Editing {{$node->title}}&hellip; @else New category&hellip; @endif</h4>
    </div>

    <div class="modal-body">

        <div class="errors">
        @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
        @endforeach
        </div>

        <div class="form-group">
            <select id="parent_node" name="parent" class="form-control">
            <option value="" default hidden>Parent node</option>
            @foreach ($categories as $category)
                @if (isset($node) && $category->id === $node->parent_id)
                <option value="{{$category->id}}" selected>{{$category->title}}</option>
                @else
                <option value="{{$category->id}}">{{$category->title}}</option>
                @endif
            @endforeach
            </select>
        </div>

        <div class="form-group">
            <input type="text" class="form-control" id="node_title" name="title" placeholder="Node title" value="{{$node->title or ''}}">
        </div>

        {!! csrf_field() !!}
        <button type="submit" class="btn btn-block btn-success">Create</button>
        
    </div>

</form> 

