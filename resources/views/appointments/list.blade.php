@extends('layouts.main')

@section('content')

    @forelse($appointments as $appointment)
        <p>{{ $appointment->time }}</p>
    @empty

    @endforelse
    {{--{{ $appointments }}--}}

    {{--{{ $date->weekOfYear }}--}}
@stop
