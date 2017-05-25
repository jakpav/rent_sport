@extends('layouts.website')
@section('content')


    <div class="container">
        <form class="reservation-form" method="post" id="contact_form">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h2 class="hdr">Kontaktný formulár</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input required type="text" @if(isset($name))value="{{$name}}" @endif name="name" placeholder="Full Name" class="reservation-name text-center">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input required type="email" @if(isset($email))value="{{$email}}" @endif name="email" placeholder="E-mail" class="reservation-email text-center">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input required type="number" min="0" @if(isset($mobile))value="{{$mobile}}" @endif name="mobile" placeholder="Mobile phone number" class="reservation-email contact_mobile text-center">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <textarea required form="contact_form" placeholder="Your message..." name="message">@if(isset($message)){{$message}}@endif</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input type="submit" name="submit" value="Submit" class="reservation-submit text-center">
                </div>
            </div>
        </form>
    </div>

@endsection