@extends('layouts.bootstrap')

@section('title')
    @parent - Dashboard
@stop

@section('content')

    @if( ! $user->hasDogs())
        {!! link_to_route('add_dog_route', 'Add a New Dog') !!}
    @else
        <div class="container">
            <div class="row">
                <div class="page-header">
                    <h2>My Dogs</h2>
                </div>
            </div>
            <div class="row">
                @foreach($user->dogs as $dog)
                    <div class="col-md-4">
                        {!! Form::open(['action' => 'AppointmentsController@schedule']) !!}
                        {!! Form::hidden('dog', $dog->id) !!}
                        <h2 class="list-group-item text-center">{{ $dog->name }}</h2>
                        <div class="list-group">

                        @forelse($dog->upcomingAppointments() as $appointment)
                            <p class="list-group-item">
                                {{ Carbon\Carbon::parse($appointment->time)->toDayDateTimeString() }}
                                <a href="{{ action('AppointmentsController@cancel', ['appointment' => $appointment->id]) }}">
                                    (cancel this appointment)
                                </a>
                            </p>
                        @empty
                        @endforelse

                        {!! Form::submit('Book an Appointment', ['class' => 'btn btn-block']) !!}
                        {!! Form::close() !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@stop
