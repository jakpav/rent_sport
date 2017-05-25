@extends('layouts.admin')
@section('content')

    <div class="admin-content">
        <form method="post">
            {{csrf_field()}}
            <h2 class="hdr">Delete reservation</h2>
            <select name="reservation">
                @foreach($reservations as $r)
                    <option value="{{$r->id}}">{{$r->name}}: {{$r->start_date}} - {{$r->end_date}}, {{$r->hours}} hours </option>
                @endforeach
            </select>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

@endsection