@extends('layouts.master')

@section('header.title')
    @component('partials.components.title', ['breadcrumb'=>'faq.category'])
        <h1>{{ $category->name }}</h1>
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
                    <div id="accordion">
                        @foreach($faqs as $faq)
                            @include('faq::partials.faq')
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {!! $faqs->links('partials.pagination') !!}
                </div>
            </div>
        </div>
    </section>
@stop
