@extends('layouts.main')

@section('content')

    <h1>Find appointment for {{ $dog->name }}</h1>

    <a href="{{ action('AppointmentsController@forgetAppointment') }}">Cancel</a>
    <hr>

    @if($week > 0)
        {!! link_to_action('AppointmentsController@viewWeek', 'Previous Week', ['week' => ($week - 1)]) !!}
    @endif

    @forelse($available as $date => $times)
        <ul>{{ $date }}
        @foreach($times as $time)
            <li>
                <a href="{{ action('AppointmentsController@create', ['time' => $date . ' ' . $time])
                }}" >{{ $time }}</a>
            </li>
        @endforeach
        </ul>
    @empty

    @endforelse

    {!! link_to_action('AppointmentsController@viewWeek', 'Next Week', ['week' => ($week + 1)]) !!}
@stop
