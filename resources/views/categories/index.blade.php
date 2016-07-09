@extends ('layouts.main')

@section ('content')
<section>
    <div class="container">
        
        <div class="page-header">
            <a class="btn btn-success pull-right" href="/categories/create" data-toggle="moal" data-target="#modal" data-size="modal-sm">Create Node</a>
            <h1>Categories</h1>
        </div>
        {{-- This comment will not be present in the rendered HTML --}}
        
        @include ('categories.nodes', ['tree' => $tree])

    </div>
</section>
@endsection