@extends('layouts.main')

@section('content')

    <h1>Find appointment for {{ $dog->name }}</h1>

    <a href="{{ action('AppointmentsController@forgetAppointment') }}">Cancel</a>
    <hr>

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
    {{--{{ $appointments }}--}}

    {{--{{ $date->weekOfYear }}--}}
@stop
