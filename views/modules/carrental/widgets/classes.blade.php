<div class="widget">
    <h2>Kategori</h2>
    <div class="r-best-vehicle-list-outer">
        <div class="r-best-leftbar">
            <ul class="pl-0 mb-0 r-best-vehicle-types">
                @foreach($classes as $class)
                    @if(request()->get('category') == $class->id)
                    <li class="r-best-vehicle-acitve">
                        <a class="clearfix" href="{{ route('carrental.index', ['sort'=>request()->get('sort'),'dir'=>request()->get('dir'), 'brand'=>request()->get('brand')]) }}"><span class="ml10">{{ $class->name }}</span></a>
                    </li>
                    @else
                        <li>
                            <a class="clearfix" href="{{ route('carrental.index', ['sort'=>request()->get('sort'),'dir'=>request()->get('dir'), 'category'=>$class->id, 'brand'=>request()->get('brand')]) }}"><span class="ml10">{{ $class->name }}</span></a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
