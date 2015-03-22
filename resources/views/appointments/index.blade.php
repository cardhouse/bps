@extends('layouts.main')

@section('content')

    <h1>Have you groomed with us before?</h1>
    <a href="{{ url('auth/login') }}">Yes</a>
    <a href="{{ url('auth/register') }}">No</a>
@stop
