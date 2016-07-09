@foreach ($tree as $node)
<p> @if ($node->id > 1)
    <a href="/categories/{{$node->id}}/delete"><i class="fa fa-fw fa-times"></i></a>@endif

    @for ($i = 0; $i < $node->depth; $i++)
    -
    @endfor
    <a  href="/categories/{{$node->id}}/edit">{{$node->title}}</a>  
</p>
    @if ($node->children)
    @include ('categories.nodes', ['tree' => $node->children])
    @endif
@endforeach