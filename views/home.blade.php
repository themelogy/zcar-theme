@extends('layouts.master')

@section('header.title')
    {{--@themeSlide('anasayfa', 'home.slider-2')--}}
    {{--@include('carrental::widgets.home.search-2')--}}
@endsection

@section('content')
    @themeSlide('anasayfa', 'home.slider')
    @include('carrental::widgets.home.search')
    @include('page::widgets.home.advantages')
    @carFindByOptions('settings.show_home', 'home.list')
    @faq(10, 'home.faqs')
    @blogLatestPosts(3, 'home.latest')
    {{--@instagramPosts('simgerentacar', 3600, 5)--}}
@endsection
