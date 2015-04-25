@extends('layouts.main')

@section('content')
    <div class="hero-cta clearfix" id="book1-hero">
    </div>
    <div class="ltblu-div clearfix">
    </div>
    <div class="stripe-div clearfix">
        <h2 class="center">Have You Groomed w/ Us Before?</h2>
    </div>
    <div class="ltpink-div clearfix">
        <a href="{{ url('auth/login') }}" class="btn secondBtn">YES</a>
        <a href="{{ url('auth/register') }}" class="btn secondBtn">NO</a>
    </div>
@stop
