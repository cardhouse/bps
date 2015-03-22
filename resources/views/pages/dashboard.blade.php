@extends('layouts.main')

@section('title')
    @parent - Dashboard
@stop

@section('content')

    Hello {{ $user->first_name }}

    @if($user->hasDogs())
    <div>
        {{-- Make form for ajax request --}}
        <h2>Book appointment for:</h2>
        <ul>
            @foreach($user->dogs as $dog)
                <li>
                    {{ $dog->name }}
                    <ul>
                        <li>
                            {{ $dog->breed }} ({{ $dog->size }})
                            <input type="checkbox">
                        </li>
                    </ul>
                    {{-- Checkbox for appointment --}}
                </li>
            @endforeach
        </ul>
        {!! link_to_route('add_dog_route', 'Add a New Dog') !!}

        <br/>

        {{-- Submit button for the form --}}
        <input type="button" value="Find Openings">
    </div>
    @else
        {!! link_to_route('add_dog_route', 'Add a New Dog') !!}
    @endif

@stop
