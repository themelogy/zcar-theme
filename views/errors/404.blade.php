@extends('layouts.master')

@php
    seo_helper()->setTitle('404 - Sayfa bulunamadı');
@endphp

@section('header.title')
    @component('partials.components.title')
        <h1>404 - Sayfa Bulunamadı</h1>
    @endcomponent
@endsection

@section('content')

    <div class="r-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1>Sayfa bulunamadı.</h1>
                    <p>Aramış olduğunuz sayfayı bulamadık.</p><a class="btn btn-primary mt5" href="{!! LaravelLocalization::getLocalizedURL(locale(), route('homepage')) !!}"><i class="fa fa-long-arrow-left"></i> Anasayfa'ya dön</a>
                </div>
            </div>
        </div>
    </div>
@stop
