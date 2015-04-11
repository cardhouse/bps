@extends('layouts.main')

@section('content')
    {!! Form::open(array('method' => 'DELETE', 'action' => array('AppointmentsController@delete', $id))) !!}
    <p>Are you sure you want to cancel this appointment</p>
    {!! Form::submit('Yes', array('class' => 'btn btn-danger')) !!}

    <a href="{{ url('dashboard') }}">No, take me back</a>

    {!! Form::close() !!}
@stop
