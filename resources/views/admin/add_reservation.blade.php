@extends('layouts.admin')
@section('content')

    <div class="admin-content">
        <form method="post" id="addR">
            {{csrf_field()}}
            <h2 class="hdr">Add new reservation</h2>
            <input type="text" @if(isset($name))value="{{$name}}" @endif name="name" placeholder="Customer's Name">
            <input type="email" @if(isset($email))value="{{$email}}" @endif name="email" placeholder="Customer's E-mail">
            <input type="date" @if(isset($start_date))value="{{$start_date}}" @endif name="start_date" placeholder="Date of start">
            <input type="date" @if(isset($end_date))value="{{$end_date}}" @endif name="end_date" placeholder="Date of end">
            <input type="number" min="0" name="hours" @if(isset($hours)){{$hours}} @endif placeholder="Hours of your stay">
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