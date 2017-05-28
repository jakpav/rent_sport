@extends('layouts.website')
@section('content')


    <div class="container">
        <form class="reservation-form" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h2 class="hdr">Rezervácia</h2>
                    @if(isset($collision_message))

                        <div class="collision_message">{{$collision_message}}</div>

                    @endif
                    @if(isset($success))

                        <div class="success">{{$success}}</div>

                    @endif
                    @if(isset($time_message))

                        <div class="collision_message">{{$time_message}}{{$time_message}}</div>

                    @endif
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
                <div class="col-xs-12">
                    <input required type="date" @if(isset($date))value="{{$date}}" @endif name="date" placeholder="Date" class="my_datepicker text-center">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input required type="time" @if(isset($time_begin))value="{{$time_begin}}" @endif name="time_begin" placeholder="Time of beginning" class="my_time_picker text-center">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <input required type="time" @if(isset($time_end))value="{{$time_end}}" @endif name="time_end" placeholder="Time of finishing" class="my_time_picker text-center">
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