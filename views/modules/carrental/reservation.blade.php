@extends('layouts.master')

@section('header.title')
    @component('partials.components.title', ['breadcrumb'=>'carrental.reservation'])
        <h1>{{ trans('themes::carrental.titles.reservation car', ['car'=>$car->fullname]) }}</h1>
    @endcomponent
@endsection

@section('content')
    <section class="r-car-showcase-wrapper">
        <div class="container">
            <div class="booking-item-details">
                <div class="gap"></div>
                <div class="row">
                    <div class="col-md-4">
                        @include('carrental::partials.reservation-details')
                    </div>
                    <div class="col-md-8">
                        @include('carrental::partials.reservation-form')
                    </div>
                </div>
                <div class="gap"></div>
            </div>
            <div class="gap gap-small"></div>
        </div>
    </section>
@endsection

@push('js-inline')
    {!! Captcha::script() !!}
@endpush
