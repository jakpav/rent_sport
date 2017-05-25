@extends('layouts.admin')
@section('content')

    <div class="admin-content">
        <table class="table-reservations">
            <tr>
                <th>Customer Name</th>
                <th>E-mail</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>For Hours</th>
                <th>Playground</th>
            </tr>
            @if(!empty($reservations))
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{$reservation->name}}</td>
                        <td>{{$reservation->email}}</td>
                        <td>{{$reservation->start_date}}</td>
                        <td>{{$reservation->end_date}}</td>
                        <td>{{$reservation->hours}}</td>
                        <td><?php $pg = \App\Playground::find($reservation->playgrounds_id) ?>{{$pg->type}}</td>
                    </tr>
                @endforeach
            @endif
        </table>
        <div class="crud-playgrounds text-center">
            <a class="add" href="{{url('/admin/reservations/add')}}">Add</a>
            <a class="delete" href="{{url('/admin/reservations/delete')}}">Delete</a>
        </div>
    </div>

@endsection