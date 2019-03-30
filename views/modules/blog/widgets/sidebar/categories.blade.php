<div class="sidebar-widget category">
    <h3 class="title">{{ trans('themes::theme.title.category') }}</h3>
    <ul>
        @foreach($categories as $category)
        <li><a href="{{ $category->url }}"><i class="fa fa-angle-right"></i> {{ $category->name }} <small >({{ $category->posts()->count() }})</small></a></li>
        @endforeach
        @unset($category)
    </ul>
</div>
