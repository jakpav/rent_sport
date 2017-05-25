@extends('layouts.admin')
@section('content')

    <div class="admin-content">
        <form method="post" id="addPG">
            {{csrf_field()}}
            <h2 class="hdr">Add new playground</h2>
            <input type="text" @if(isset($type))value="{{$type}}" @endif name="type" placeholder="Type of playground">
            <textarea form="addPG" name="description" placeholder="Description">@if(isset($description)){{$description}} @endif</textarea>
            <input type="number" @if(isset($price))value="{{$price}}" @endif name="price" placeholder="Charge per hour" min="0">
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

@endsection