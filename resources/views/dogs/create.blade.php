@extends('layouts.main')

@section('content')

    <div id="ltblu-div" class="clearfix"></div>

    <div id="ltblu-div1" class="clearfix">
        <p id="booking-instructions">
                <span id="booking-steps-h">
                    New to Online Booking&#x3f; <br />
                    It&#x27;s as Easy as 1 2 3&#x21;&#x21;
                </span>
            <br />
            <span id="booking-steps-1">STEP 1</span>&#x3a;
            Tell us about your dog<br />
        </p>

    </div>
    <div id="dkpink-div" class="clearfix">

        @include('layouts.partials.errors')

        {!! Form::open(['action' => 'DogsController@store']) !!}

        <div class="form-group">
            Dog's Name:
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            Dog's Breed:
            {!! Form::text('breed', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            Size (approximate):
            {!! Form::select('size', [
                    'sm' => 'Small (1 - 20 lbs)',
                    'med' => 'Medium (21 - 45 lbs)',
                    'lg' => 'Large (46 - 80 lbs)',
                    'xl' => 'X-Large (81 lbs - Horse)'
                ],
                ['class' => 'form-control'])
            !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Continue') !!}
        </div>

        {!! Form::close() !!}

    </div>
@stop
