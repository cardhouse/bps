@extends('layouts.main')

@section('content')

    <h1>Find appointment for {{ $dog->name }}</h1>

    <hr>

    @forelse($available as $date => $times)
        <ul>{{ $date }}
        @foreach($times as $time)
            <li>
                <a href="{{ action('AppointmentsController@create', ['time' => $date . ' ' . $time, 'dog_id' => $dog->id])
                }}" >{{ $time }}</a>
            </li>
        @endforeach
        </ul>
    @empty

    @endforelse
    {{--{{ $appointments }}--}}

    {{--{{ $date->weekOfYear }}--}}
@stop
