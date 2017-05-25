@extends('layouts.admin')
@section('content')

    <div class="admin-content">
        <form method="post">
            {{csrf_field()}}
            <h2 class="hdr">Delete playground</h2>
            <select name="playground">
                @foreach($ps as $p)
                    <option value="{{$p->id}}">{{$p->type}} - {{$p->price}} €</option>
                @endforeach
            </select>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

@endsection