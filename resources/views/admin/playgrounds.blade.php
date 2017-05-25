@extends('layouts.admin')
@section('content')

    <div class="admin-content">
        <table class="table-playgrounds">
            <tr>
                <th>Playground type</th>
                <th>Charge per hour</th>
            </tr>
        @if(!empty($playgrounds))
            @foreach($playgrounds as $playground)
                <tr>
                    <td>{{$playground->type}}</td>
                    <td>{{$playground->price}} €</td>
                </tr>
            @endforeach
        @endif
        </table>
        <div class="crud-playgrounds text-center">
            <a class="add" href="{{url('/admin/playgrounds/add')}}">Add</a>
            <a class="delete" href="{{url('/admin/playgrounds/delete')}}">Delete</a>
        </div>
    </div>

@endsection