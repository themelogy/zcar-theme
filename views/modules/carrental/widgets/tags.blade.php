@isset($tags)
    @if($tags->count()>0)
        <div class="sidebar-widget tag">
            <h3 class="title">{{ trans('tag::tags.tag') }}</h3>
            @foreach($tags as $tag)
                <a href="{{ route('blog.tag', $tag->slug) }}"><span class="badge badge-secondary">{{ $tag->name }}</span></a>
            @endforeach
        </div>
    @endif
@endisset
