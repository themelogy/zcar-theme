@extends('layouts.master')

@section('header.title')
    @component('partials.components.title', ['breadcrumb'=>'blog.show'])
        <h1>{{ $post->title }}</h1>
    @endcomponent
@endsection

@section('content')
    <section class="section-blog section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="post">
                        <div class="post-header">
                            <a href="{{ $post->url }}">
                                <img class="img-fluid img-thumbnail" src="{{ $post->present()->firstImage(800,null,'resize',80) }}" alt="{{ $post->title }}">
                            </a>
                        </div>
                        <div class="post-inner">
                            <ul class="post-meta">
                                @isset($post->category->url)
                                    <li><i class="fa fa-th-large"></i> <a href="{{ $post->category->url }}">{{ $post->category->name }}</a></li>
                                @endisset
                                <li><i class="fa fa-calendar"></i> <a href="#">{{ $post->created_at->formatLocalized('%d %B %Y') }}</a></li>
                            </ul>
                            <h3 class="title"><a href="{{ $post->url }}">{{ $post->title }}</a></h3>
                            <div class="description">
                                {!! $post->content !!}
                            </div>
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
