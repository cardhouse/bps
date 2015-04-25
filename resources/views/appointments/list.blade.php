@extends('layouts.bootstrap')

@section('content')

    <h1>Find appointment for {{ $dog->name }}</h1>

    <a href="{{ action('AppointmentsController@forgetAppointment') }}">Cancel</a>

    <hr>

    @if($week > 0) <!-- Show previous link if not on first page -->
       <a href="{{ action('AppointmentsController@viewWeek', ['week' => ($week - 1)]) }}">Previous Week</a>
    @endif

    @forelse($available as $date => $times)
        <ul>{{ $date }}
        @foreach($times as $time)
            <li>
                <a href="{{ action('AppointmentsController@create', ['time' => $date . ' ' . $time])}}" >
                    {{ $time }}
                </a>
            </li>
        @endforeach
        </ul>
    @empty
        <h2>There are no openings this week...</h2>
    @endforelse

    <a href="{{ action('AppointmentsController@viewWeek',['week' => ($week + 1)]) }}">
        Next Week
    </a>
@stop
