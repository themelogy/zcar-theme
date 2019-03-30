@extends('layouts.master')

@section('header.title')
    @component('partials.components.title', ['breadcrumb'=>'faq.view'])
        <h1>{{ $faq->title }}</h1>
    @endcomponent
@endsection

@section('content')
    <section class="r-faq-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    @faqCategories('sidebar.categories')
                </div>
                <div class="col-lg-9 col-md-12">
                    <h3 class="title">{{ $faq->title }}</h3>
                    {!! $faq->content !!}
                </div>
            </div>
        </div>
    </section>
@stop
