<header id="header">
    <div class="r-header r-header-inner r-header-strip-03">
        <div class="r-header-strip">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="r-logo">
                            <a href="{{ route('homepage') }}" class="d-inline-block"><img src="{{ Theme::url('images/logo/logo-wbg.svg') }}" class="img-fluid d-block" alt="{{ setting('theme::company-name') }}"></a>
                        </div>
                        <a href="javaScript:void(0)" class="menu-icon"> <i class="fa fa-bars"></i> </a>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">

                        <div class="r-nav-section float-right">
                            <nav>
                                {!! Menu::render('header', \Themes\Zcar\Presenter\HeaderMenuPresenter::class) !!}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @yield('header.title')
    </div>
</header>
