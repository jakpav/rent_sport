@extends('layouts.admin')
@section('content')

    <div class="admin-content">
        <form method="post" id="addR">
            {{csrf_field()}}
            <h2 class="hdr">Add new reservation</h2>
            @if(isset($collision_message))
                <div class="collision_message">{{$collision_message}}</div>
            @endif
            @if(isset($time_message))
                <div class="collision_message">{{$time_message}}</div>
            @endif
            <input type="text" @if(isset($name))value="{{$name}}" @endif name="name" placeholder="Customer's Name">
            <input type="email" @if(isset($email))value="{{$email}}" @endif name="email" placeholder="Customer's E-mail">
            <input type="date" @if(isset($date))value="{{$date}}" @endif name="date" placeholder="Date">
            <input type="time" name="time_begin" @if(isset($time_begin))value="{{$time_begin}}" @endif placeholder="Time of beginnig">
            <input type="time" name="time_end" @if(isset($time_end))value="{{$time_end}}" @endif placeholder="Time of finishing">
            <select name="playgrounds_id">
                @if(isset($playgrounds))
                @foreach($playgrounds as $p)
                    <option value="{{$p->id}}">{{$p->type}} - {{$p->price}} €</option>
                @endforeach
                @endif
            </select>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

@endsection