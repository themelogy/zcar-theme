@extends('layouts.master')

@section('header.title')
    @component('partials.components.title', ['breadcrumb'=>'contact'])
        <h1>İletişim</h1>
    @endcomponent
@endsection

@section('content')
    <section id="r-contact-part" class="r-contact-part">
        <div class="container clearfix">
            <div class="contact-head">
                <span>BİZE ULAŞIN</span>
                <h2><b>{{ setting('theme::company-name') }}</b>'ya<br> ulaşın. </h2>
            </div>
            <div class="row clearfix">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="r-contact-address">
                        <div class="head">Ankara Ofisi</div>
                        <div class="address address-cnt"><i class="fa fa-map-marker"></i>{!! setting('theme::address') !!}</div>
                        <div class="call address-cnt"><i class="fa fa-phone"></i>{!! setting('theme::phone') !!}</div>
                        <div class="mail address-cnt"><i class="fa fa-envelope"></i>{!! setting('theme::email') !!}</div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="r-contact-address">
                    @include('contact::form')
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('contact::map')
@endsection
