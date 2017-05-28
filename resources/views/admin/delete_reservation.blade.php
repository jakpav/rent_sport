@extends('layouts.admin')
@section('content')

    <div class="admin-content">
        <form method="post">
            {{csrf_field()}}
            <h2 class="hdr">Delete reservation</h2>
            <select name="reservation">
                @foreach($reservations as $r)
                    <option value="{{$r->id}}">{{$r->name}}: {{$r->date}}, start: {{$r->time_begin}} - end: {{$r->time_end}}</option>
                @endforeach
            </select>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

@endsection