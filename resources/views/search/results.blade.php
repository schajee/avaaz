@extends ('layouts.main')

@section ('content')
<section>
    <div class="container">
        
        <div class="page-header">
            <h1>Search results...</h1>
        </div>
        
        @include('polls.items', ['polls' => $polls])
        
    </div>
</section>

@endsection