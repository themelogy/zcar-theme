@extends('layouts.master')

@section('header.title')
    @component('partials.components.title', ['breadcrumb'=>'carrental.index'])
        <h1>Kiralık Araçlar</h1>
    @endcomponent
@endsection

@section('content')
    <div class="r-car-search">
        <div class="container">
            {!! Form::open(['route' => ['carrental.index', 'sort'=>request()->get('sort'),'dir'=>request()->get('dir'), 'category'=>request()->get('category'), 'brand'=>request()->get('brand')], 'method' => 'post', 'rel'=>'nofollow']) !!}

            <div class="row">
                <div class="col-md-11">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                                {!! Form::label('start_location', trans('themes::carrental.reservation.start location')) !!}
                                {!! Form::select('start_location', CarLocationRepository::all()->pluck('name', 'id'),old('start_location', isset($reservation->start_location) ? $reservation->start_location : ''),['class'=>'form-control selectpicker', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                        {!! Form::label('pick_at', trans('themes::carrental.reservation.pickup date')) !!}
                                        {!! Form::text('pick_at', old('pick_at', isset($reservation->pick_at) ? $reservation->pick_at->format('d.m.Y') : Carbon::now()->format('d.m.Y')), ['id'=>'pick_at', 'placeholder'=>Carbon::now()->format('d.m.Y'), 'class'=>'form-control date-pick']) !!}
                                    </div>
                                </div>
                                <div class="col-md-5" style="padding: 0 5px;">
                                    <div class="form-group form-group-icon-left"><i class="fa fa-clock-o input-icon input-icon-hightlight"></i>
                                        {!! Form::label('pick_hour', trans('themes::carrental.reservation.hour')) !!}
                                        {!! Form::text('pick_hour', old('pick_hour', isset($reservation->pick_at) ? $reservation->pick_at->format('H:i') : '09:00'), ['id'=>'pick_hour', 'class'=>'form-control time-pick']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group form-group-icon-left"><i class="fa fa-map-marker input-icon input-icon-hightlight"></i>
                                {!! Form::label('return location', trans('themes::carrental.reservation.return location')) !!}
                                {!! Form::select('return_location', CarLocationRepository::all()->pluck('name', 'id'),old('return_location', isset($reservation->return_location) ? $reservation->return_location : ''),['class'=>'form-control selectpicker', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group form-group-icon-left"><i class="fa fa-calendar input-icon input-icon-hightlight"></i>
                                        {!! Form::label('drop_at', trans('themes::carrental.reservation.drop date')) !!}
                                        {!! Form::text('drop_at', old('drop_at', isset($reservation->drop_at) ? $reservation->drop_at->format('d.m.Y') : Carbon::now()->addDay(1)->format('d.m.Y')), ['id'=>'drop_at', 'placeholder'=>Carbon::now()->format('Y-m-d'), 'class'=>'form-control date-pick']) !!}
                                    </div>
                                </div>
                                <div class="col-md-5" style="padding: 0 5px;">
                                    <div class="form-group form-group-icon-left"><i class="fa fa-clock-o input-icon input-icon-hightlight"></i>
                                        {!! Form::label('drop_hour', trans('themes::carrental.reservation.hour')) !!}
                                        {!! Form::text('drop_hour', old('drop_hour', isset($reservation->drop_at) ? $reservation->drop_at->format('H:i') : '09:00'), ['id'=>'drop_hour', 'class'=>'form-control time-pick']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <button name="reservationUpdate" type="submit" class="btn btn-primary" value="1"><i class="fa fa-search"></i></button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <section class="r-car-showcase-wrapper">
        <div class="r-best-vehicles">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        @carClasses()
                        <br/>
                        @carBrands()
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">

                        <div class="r-car-filter-area">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12">
                                    <span class="r-filter-text">({{ $cars->total() }} araç bulundu)</span>
                                </div>
                                <div class=" col-lg-6 col-md-12 col-sm-12">
                                    <div class="r-car-filter-wrapper">
                                        @php
                                            $sortList = collect();
                                            $sortList->put('price1', ['key'=>'price', 'name'=>'Fiyat (Azalan)', 'dir'=>'desc']);
                                            $sortList->put('price2', ['key'=>'price', 'name'=>'Fiyat (Artan)', 'dir'=>'asc']);
                                            $sortList->put('name1', ['key'=>'name', 'name'=>'Marka (A-Z)', 'dir'=>'desc']);
                                            $sortList->put('name2', ['key'=>'name', 'name'=>'Marka (Z-A)', 'dir'=>'asc']);
                                            $currentSort = request()->has('sort') && request()->has('dir') ? $sortList->where('key', request()->get('sort'))->where('dir', request()->get('dir'))->first() : $sortList->first();
                                        @endphp
                                        <select onChange="window.document.location.href=this.options[this.selectedIndex].value;" class="r-show-cars-filter">
                                            @foreach($sortList->all() as $sort)
                                                <option value="{{ route('carrental.index', ['sort'=>$sort['key'], 'dir'=>$sort['dir'], 'category'=>request()->get('category'), 'brand'=>request()->get('brand')]) }}"> {{ $sort['name'] }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="r-car-showcase">
                            <div class="row clearfix r-best-offer-list">
                                @forelse($cars as $car)
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                        <div class="r-best-offer-single">
                                            <div class="r-best-offer-in">
                                                <div class="r-offer-img">
                                                    <a class="d-inline-block" href="{{ $car->url }}"><img src="{{ $car->present()->firstImage(null,200,'resize',50) }}" class="img-fluid d-block m-auto" alt=""></a>
                                                    <div class="r-offer-img-over">
                                                        <a href="{{ $car->url }}"><i class="fa fa-search"></i></a>
                                                    </div>
                                                </div>
                                                <div class="r-best-offer-content">
                                                    <a href="{{ $car->url }}">{{ $car->fullname }}</a>
                                                    <p>{!! trans('themes::carrental.title.price day', ['price'=>$car->prices->price1]) !!}</p>
                                                    <ul class="pl-0 mb-0">
                                                        <li><i class="fa fa-car"></i><span>{{ $car->present()->body_type }}</span></li>
                                                        <li><i class="fa fa-cogs"></i><span>{{ $car->present()->transmission }}</span></li>
                                                        <li><i class="fa fa-beer"></i><span>{{ $car->present()->fuel_type }}</span></li>
                                                        <li><i class="fa fa-suitcase"></i><span>{{ $car->series->baggage }}</span></li>
                                                    </ul>
                                                </div>
                                                <div class="r-offer-rewst-this">
                                                    <a href="{{ $car->url }}">
                                                        <span class="text-uppercase">{{ trans('themes::carrental.buttons.reservation') }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-12">
                                        <div class="alert alert-warning">
                                            <button class="close" type="button" data-dismiss="alert"><span aria-hidden="true">×</span>
                                            </button>
                                            <p class="text-small">Araç Bulunamadı.</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                {!! $cars->appends(request()->query())->links('partials.pagination') !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gap"></div>
            </div>
        </div>
    </section>
@endsection

@push('css-stack')
    {!! Theme::style('vendor/select2/css/select2.min.css') !!}
@endpush

@push('js-stack')
    {!! Theme::script('vendor/select2/js/select2.min.js', ['defer']) !!}
    {!! Theme::script('js/datetime.min.js', ['defer']) !!}
@endpush

@push('js-inline')
    <script>
        document.addEventListener("DOMContentLoaded", function (event) {
            $('.date-pick').datepicker({
                todayHighlight: true,
                language: "tr",
                format: 'dd.mm.yyyy',
                startDate: new Date()
            });

            var pick_at = $('input[name="pick_at"]');
            var drop_at = $('input[name="drop_at"]');

            function dropMinDate() {
                var start_at = new Date(pick_at.datepicker('getDate'));
                start_at.setDate(start_at.getDate() + 1);
                drop_at.datepicker('setStartDate', start_at);
                drop_at.datepicker('setDate', start_at);
            }

            pick_at.datepicker().on('changeDate', function () {
                dropMinDate();
                $(this).datepicker('hide');
            });

            drop_at.datepicker().on('changeDate', function () {
                $(this).datepicker('hide');
            });


            $('input.time-pick').timepicker({
                minuteStep: 15,
                showInpunts: false,
                showMeridian: false
            });

            $('.selectpicker').select2();
        });
    </script>
@endpush
