<div class="r-form-strip">
    <div class="r-slider-serach r-slider-serach-down form-search dark">
        {!! Form::open(['route' => 'carrental.index', 'method' => 'post']) !!}
        <div class="form-title">
            <h2>{!! trans('themes::carrental.title.home search') !!}</h2>
        </div>
        <div class="row row-inputs">
            <div class="col-sm-6">
                <div class="form-group has-icon has-label">
                    {!! Form::label('start_location', trans('themes::carrental.reservation.start location')) !!}
                    {!! Form::select('start_location', CarLocationRepository::all()->pluck('name', 'id'),old('start_location', isset($reservation->start_location) ? $reservation->start_location : ''),['class'=>'selectpicker form-control', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group has-icon has-label">
                    {!! Form::label('return location', trans('themes::carrental.reservation.return location')) !!}
                    {!! Form::select('return_location', CarLocationRepository::all()->pluck('name', 'id'),old('return_location', isset($reservation->return_location) ? $reservation->return_location : ''),['class'=>'selectpicker', 'data-live-search'=>'true', 'data-width'=>'100%', 'data-toggle'=>'tooltip', 'title'=>'select']) !!}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group has-icon has-label label" id="datetimepicker2" data-target-input="nearest">
                    {!! Form::label('pick_at', trans('themes::carrental.reservation.pick date')) !!}
                    {!! Form::text('pick_at', old('pick_at', isset($reservation->pick_at) ? $reservation->pick_at->format('d.m.Y') : Carbon::now()->format('d.m.Y')), ['id'=>'pick_at', 'placeholder'=>Carbon::now()->format('d.m.Y'), 'class'=>'form-control date-pick']) !!}
                    <span class="form-control-icon"><i class="fa fa-calendar"></i></span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group has-icon has-label date" id="datetimepicker3" data-target-input="nearest">
                    {!! Form::label('pick_hour', trans('themes::carrental.reservation.pick hour')) !!}
                    {!! Form::text('pick_hour', old('pick_hour', isset($reservation->pick_at) ? $reservation->pick_at->format('H:i') : '09:00'), ['id'=>'pick_hour', 'class'=>'form-control time-pick']) !!}
                    <span class="form-control-icon"><i class="fa fa-clock-o"></i></span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group has-icon has-label label" id="datetimepicker4" data-target-input="nearest">
                    {!! Form::label('drop_at', trans('themes::carrental.reservation.drop date')) !!}
                    {!! Form::text('drop_at', old('drop_at', isset($reservation->drop_at) ? $reservation->drop_at->format('d.m.Y') : Carbon::now()->addDay(1)->format('d.m.Y')), ['id'=>'drop_at', 'placeholder'=>Carbon::now()->format('d.m.Y'), 'class'=>'form-control date-pick']) !!}
                    <span class="form-control-icon"><i class="fa fa-calendar"></i></span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group has-icon has-label date" id="datetimepicker5" data-target-input="nearest">
                    {!! Form::label('drop_hour', trans('themes::carrental.reservation.drop hour')) !!}
                    {!! Form::text('drop_hour', old('drop_hour', isset($reservation->drop_at) ? $reservation->drop_at->format('H:i') : '09:00'), ['id'=>'drop_hour', 'class'=>'form-control time-pick']) !!}
                    <span class="form-control-icon"><i class="fa fa-clock-o"></i></span>
                </div>
            </div>
            <div class="col-12 mb-3">
                <hr>
            </div>
            <div class="inner col-12 clearfix">
                {!! Form::button(trans('themes::carrental.reservation.button'), ['type'=>'submit', 'class'=>'btn m-auto d-block float-right btn-full']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>



@push('css-stack')
    {!! Theme::style('vendor/select2/css/select2.min.css') !!}
@endpush

@push('js-stack')
    {!! Theme::script('js/datetime.min.js') !!}
    {!! Theme::script('vendor/select2/js/select2.min.js') !!}
@endpush

@push('js-inline')
    <script async>
        document.addEventListener("DOMContentLoaded", function(event) {
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
                start_at.setDate(start_at.getDate()+1);
                drop_at.datepicker('setStartDate', start_at);
                drop_at.datepicker('setDate', start_at);
            }

            pick_at.datepicker().on('changeDate', function () {
                dropMinDate();
                $(this).datepicker('hide');
            });

            drop_at.datepicker('setDate', '+2d').on('changeDate', function () {
                $(this).datepicker('hide');
            });


            $('input.time-pick').timepicker({
                minuteStep: 15,
                showInpunts: false,
                showMeridian: false
            });

            $('select').select2();
        });
    </script>
@endpush
