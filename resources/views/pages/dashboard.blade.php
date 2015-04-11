@extends('layouts.main')

@section('title')
    @parent - Dashboard
@stop

@section('content')

    @if($user->hasDogs())
    <div>
        {!! Form::open(['action' => 'AppointmentsController@schedule']) !!}
        {{-- Make form for ajax request --}}
        <h2>Book appointment for:</h2>
        @include('layouts.partials.errors')
        <ul>
            @foreach($user->dogs as $dog)
                @if($dog->hasUpcomingAppointment())
                    <p>
                        {{ $dog->name }} has an appointment on
                        {{ Carbon\Carbon::parse($dog->getNextAppointment()->time)->toDayDateTimeString() }}
                        <a href="{{ action('AppointmentsController@cancel', ['appointment' => $dog->getNextAppointment()->id]) }}">
                        (cancel this appointment)
                        </a>
                    </p>
                @else
                    <li>
                        {!! Form::label($dog->name) !!}
                        {!! Form::checkbox('dogs[]', $dog->id) !!}
                    </li>
                @endif
            @endforeach
        </ul>
        {!! link_to_route('add_dog_route', 'Add a New Dog') !!}

        <br/>

        {{-- Submit button for the form --}}
        {!! Form::submit('Find Openings') !!}
        {!! Form::close() !!}
    </div>
    @else
        {!! link_to_route('add_dog_route', 'Add a New Dog') !!}
    @endif

@stop
