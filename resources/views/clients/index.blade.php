@extends('layouts.main')

@section('content')
<ul>
    @foreach($clients as $client)
    <li>
        {!! link_to_action('ClientsController@show', $client, ['name' => $client]) !!}
    </li>
    @endforeach
</ul>
@stop
