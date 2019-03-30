<ul class="list-group category">
    @foreach($categories as $category)
    <li class="list-group-item"><a href="{{ $category->url }}"><i class="fa fa-angle-right"></i> {{ $category->name }}</a></li>
    @endforeach
</ul>
