@extends('layouts.bootstrap')

@section('content')

    <h1>Find appointment for {{ $dog->name }}</h1>

    <a href="{{ action('AppointmentsController@forgetAppointment') }}">Cancel</a>

    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @if($week > 0) <!-- Show previous link if not on first page -->
                <a href="{{ action('AppointmentsController@viewWeek', ['week' => ($week - 1)]) }}">Previous Week</a>
                @endif
            </div>
        </div>

        <div class="row">
            @forelse($available as $date => $times)
                <div class="col-md-2">
                    <div class="list-group">
                        <div class="list-group-item"><h4>{{ $date }}</h4></div>
                        @foreach($times as $time)

                            <a class="list-group-item" href="{{ action('AppointmentsController@create', ['time' => $date . ' ' . $time])}}" >
                                {{ $time }}
                            </a>
                        @endforeach

                    </div>
                </div>
            @empty
                <h2>There are no openings this week...</h2>
            @endforelse
        </div>

    </div>



    <a href="{{ action('AppointmentsController@viewWeek',['week' => ($week + 1)]) }}">
        Next Week
    </a>
@stop
