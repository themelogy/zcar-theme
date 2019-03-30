<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="{{ LaravelLocalization::getCurrentLocale() }}">
<head>
    @include('partials.metadata')
</head>
<body>
<div class="r-wrapper">
    @include('partials.header')
    @yield('content')
    @include('partials.footer')
</div>
<div id="r-to-top" class="r-to-top"><i class="fa fa-angle-up"></i></div>
@include('partials.scripts')
</body>
</html>
