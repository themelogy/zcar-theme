@if ($breadcrumbs)
    <div class="r-breadcrum">
    <ul>
        <li><a href="{{ route('homepage') }}">{{ trans('themes::theme.title.homepage') }}</a></li>
        @foreach ($breadcrumbs as $crumb)
            @if ($crumb->url && ! $crumb->last)
                <li>
                    <a href="{{ $crumb->url }}"><span>{!! Str::words($crumb->title, 6) !!}</span></a>
                </li>
            @else
                <li class="active"><span>{!! Str::words($crumb->title, 6) !!}</span></li>
            @endif
        @endforeach
    </ul>
    @if(strpos(Request::server('HTTP_REFERER'), Request::root()) !== false)
        <a class="btn btn-default btn-xs pull-right" href="{{ Request::server('HTTP_REFERER') }}"><i class="fa fa-angle-left"></i></a>
    @endif
    </div>
@endif
