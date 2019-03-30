@extends('layouts.master')

@section('header.title')
    @component('partials.components.title', ['breadcrumb'=>'page'])
        <h1>{{ $page->title }}</h1>
    @endcomponent
@endsection

@section('content')

    <div class="r-page">
        <div class="container">
        {!! $page->body !!}
        </div>
    </div>
@stop
