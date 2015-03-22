@extends('layouts.main')

@section('content')

    <div id="hero-cta" class="clearfix">
        <a href="{{ route('create_appointment_path') }}" class="btn primaryBtn home-cta-btn">APPOINTMENTS</a>
        <a href="#map-window" class="btn primaryBtn home-cta-btn">DIRECTIONS</a>
        <a href="#join-window" class="btn primaryBtn home-cta-btn">COMMUNITY</a>
    </div>

    <div class="ltblu-div clearfix"></div>
    <div class="stripe-div clearfix"></div>

    <div class="map-div clearfix">
        <address class="map-p">
            8025 Greiner Rd &#x28;&#x40; Transit&#x29;<br />
            Williamsville, NY 14221<br /><br />
        </address>
    </div>
    <div class="ltblu-div clearfix">
    </div>
    <div class="ltpink-div clearfix">
        <a href="#" class="btn secondBtn">OUR STORY</a>
        <a href="#" class="btn secondBtn">OUR WORK</a>
    </div>
    <div class="ltblu-div clearfix">
    </div>
    <div class="clearfix page-bottom">
        <div class="info-window clearfix">
            <p class="info-h">
                JOIN OUR MAILING LIST
            </p>
            <p class="info-p">
                Join for FREE and get special deals, secret coupons, events &amp; MORE&#x21;&#x21;
            </p>
            <input name="name" class="form-input clearfix" placeholder="Enter Your Name">
            <input name="email" class="form-input clearfix" placeholder="Enter Your Email">
            <input id="join-btn1" class="primaryBtn" type="button" value="JOIN NOW">
        </div>
    </div>
    <div class="ltblu-div clearfix">
    </div>
@endsection
