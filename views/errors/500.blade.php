@extends('layouts.master')

@php
    seo_helper()->setTitle('500 - Sistem hatası');
@endphp

@section('header.title')
    @component('partials.components.title')
        <h1>500 - Sistem Hatası</h1>
    @endcomponent
@endsection

@section('content')

    <div class="r-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <p class="text-hero">500</p>
                    <h1>Sistem Hatası.</h1>
                    <p>Bir hata oluştu. Bu konuda yönetici bilgilendirildi.</p><a class="btn btn-primary" href="{!! LaravelLocalization::getLocalizedURL(locale(), route('homepage')) !!}"><i class="fa fa-long-arrow-left"></i> Anasayfa'ya dön</a>
                </div>
            </div>
        </div>
    </div>
@stop
