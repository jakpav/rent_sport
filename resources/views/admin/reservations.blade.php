@extends('layouts.admin')
@section('content')

    <div class="admin-content">
        <table class="table-reservations">
            <tr>
                <th>Customer Name</th>
                <th>E-mail</th>
                <th>Date</th>
                <th>Time of beginning</th>
                <th>Time of finishing</th>
                <th>Playground</th>
            </tr>
            @if(!empty($reservations))
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{$reservation->name}}</td>
                        <td>{{$reservation->email}}</td>
                        <td>{{$reservation->date}}</td>
                        <td>{{$reservation->time_begin}}</td>
                        <td>{{$reservation->time_end}}</td>
                        <td><?php $pg = \App\Playground::find($reservation->playgrounds_id) ?>{{$pg->type}}</td>
                    </tr>
                @endforeach
            @endif
        </table>

        {{$reservations->links()}}

        <div class="crud-playgrounds text-center">
            <a class="add" href="{{url('/admin/reservations/add')}}">Add</a>
            <a class="delete" href="{{url('/admin/reservations/delete')}}">Delete</a>
        </div>
    </div>

@endsection