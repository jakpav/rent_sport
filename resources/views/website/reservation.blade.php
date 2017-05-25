@extends('layouts.website')
@section('content')


    <div class="container">
        <form class="reservation-form" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h2 class="hdr">Rezervácia</h2>
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
                    <select name="playground">
                        @foreach($ps as $p)
                            <option value="{{$p->id}}">{{$p->type}} - {{$p->price}} €/hour</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <input required type="date" placeholder="Date of start" class="my_datepicker text-center" name="date_start" id="my_datepicker">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <input required type="date" placeholder="Date of end" class="my_datepicker text-center" name="date_end" id="my_datepicker2">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input required type="text" @if(isset($hours))value="{{$hours}}" @endif name="hours" placeholder="Hours of your visit" class="reservation-hours text-center">
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