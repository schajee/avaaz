@foreach ($topics as $topic)
<li><a href="/topics/{{$topic->slug}}">{{$topic->title}}</a>
@if (!$topic->isLeaf())
    <ul class="submenu">
    @include ('topics.items', ['topics' => $topic->children])
    </ul>
@endif
</li>
@endforeach