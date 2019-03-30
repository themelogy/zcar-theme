<div class="r-header-inner-banner">
    <div class="r-header-in-over">
        {{ $slot ?? null }}
        @isset($breadcrumb)
        {!! Breadcrumbs::renderIfExists($breadcrumb) !!}
        @endisset
    </div>
</div>
