<div class="widget">
    <h2>Markalar</h2>
    <div class="r-best-vehicle-list-outer">
        <div class="r-best-leftbar">
            <ul class="pl-0 mb-0 r-best-vehicle-types">
                @foreach($brands as $brand)
                    @if(request()->get('brand') == $brand->id)
                        <li class="r-best-vehicle-acitve">
                            <a class="clearfix" href="{{ route('carrental.index', ['sort'=>request()->get('sort'),'dir'=>request()->get('dir'), 'category'=>request()->get('category')], ['style'=>'color:gray;']) }}"><span class="pull-left">{{ $brand->name }} ({{ $brand->cars()->count() }}) </span>
                            </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('carrental.index', ['sort'=>request()->get('sort'),'dir'=>request()->get('dir'), 'category'=>request()->get('category'), 'brand'=>$brand->id]) }}"><span class="ml10">{{ $brand->name }} ({{ $brand->cars()->count() }})</span>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
