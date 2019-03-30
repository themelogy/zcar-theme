@extends('layouts.master')

@php
    $page = Page::findBySlug(trans('carrental::routes.prices'));
    Breadcrumbs::register('page', function ($breadcrumbs) use ($page) {
        $breadcrumbs->push($page->title, $page->url);
    });
@endphp

@section('header.title')
    @component('partials.components.title', ['breadcrumb'=>'page'])
        <h1>{{ $page->title }}</h1>
    @endcomponent
@endsection

@section('content')
    <section class="r-page">
        <div class="container car-prices">
            @foreach($cars->chunk(3) as $chunk)
            <div class="row">
                @foreach($chunk as $car)
                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <div class="thumbnail text-center">
                        <img class="img-responsive" src="{{ $car->present()->firstImage(300,150,'fit',50) }}" alt="{{ $car->fullname }}" />
                        <div class="caption">
                            <h3>{!! $car->brand->present()->logo(50).' '.$car->fullname !!}</h3>
                            <ul class="booking-item-features booking-item-features-small booking-item-features-sign clearfix mt-1">
                                <li rel="tooltip" data-placement="top" title="Yolcu"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x{{ $car->series->person }}</span>
                                </li>
                                <li rel="tooltip" data-placement="top" title="Araç Tipi"><i class="im im-car-doors"></i><span style="font-size: 8px;" class="booking-item-feature-sign">{{ $car->present()->body_type }}</span>
                                </li>
                                <li rel="tooltip" data-placement="top" title="Bagaj Hacmi"><i class="fa fa-briefcase"></i><span class="booking-item-feature-sign">x{{ $car->series->baggage }}</span>
                                </li>
                                <li rel="tooltip" data-placement="top" title="Vites"><i class="im im-shift"></i><span class="booking-item-feature-sign" style="font-size: 0.6em;">{{ $car->present()->transmission }}</span>
                                </li>
                                <li rel="tooltip" data-placement="top" title="Yakıt Tipi"><i class="im im-electric"></i><span class="booking-item-feature-sign" style="font-size: 0.6em;">{{ $car->present()->fuel_type }}</span>
                                </li>
                            </ul>
                            <table class="table table-striped">
                                <tr>
                                    <th>{{ trans('carrental::cars.form.price1') }}</th>
                                    <td>{{ $car->prices->price1 }} TL</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('carrental::cars.form.price2') }}</th>
                                    <td>{{ $car->prices->price2 }} TL</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('carrental::cars.form.price3') }}</th>
                                    <td>{{ $car->prices->price3 }} TL</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('carrental::cars.form.price4') }}</th>
                                    <td>{{ $car->prices->price4 }} TL</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('carrental::cars.form.price5') }}</th>
                                    <td>{{ $car->prices->price1 }} TL</td>
                                </tr>
                                <tr>
                                    <th>{{ trans('carrental::cars.form.price6') }}</th>
                                    <td>{{ $car->prices->price6 }} TL</td>
                                </tr>
                            </table>
                            <a class="btn btn-primary btn-sm" href="{{ $car->url }}">{{ trans('carrental::cars.button.reservation') }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
    </section>
@endsection
