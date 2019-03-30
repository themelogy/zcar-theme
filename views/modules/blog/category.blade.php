@extends('layouts.master')

@section('header.title')
    @component('partials.components.title', ['breadcrumb'=>'blog.category'])
        <h1>{{ $category->name }}</h1>
    @endcomponent
@endsection

@section('content')
    <section class="section-blog section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    @foreach($posts->chunk(2) as $chunk)
                    <div class="row">
                        @foreach($chunk as $post)
                            @include('blog::partials.post')
                        @endforeach
                        @unset($post)
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-12">
                            {!! $posts->links('partials.pagination') !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    @include('blog::partials.sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection
