@extends('layouts.admin')
@section('content')


    <div class="admin-content">
        <h1>Statistics</h1>
        <canvas id="myChart"></canvas>
        <h2>Sum of all reservations in 2017: {{$reservations}}</h2>
        @if(isset($res_play))
            @foreach($res_play as $item)
                <h2 class="index"><?php $p = \App\Playground::find($item->playgrounds_id); ?>{{$p->type}} reservations: {{$item->pocet}}</h2>
            @endforeach
        @endif
    </div>



    <script src="{{asset('js/Chart.min.js')}}"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                datasets: [{
                    label: "Reservations 2017",
                    backgroundColor: 'rgb(220, 99, 99)',
                    borderColor: 'rgb(220, 99, 99)',
                    data: [{{$jan}}, {{$feb}}, {{$mar}}, {{$apr}}, {{$may}}, {{$jun}}, {{$jul}}, {{$aug}}, {{$sep}}, {{$okt}}, {{$nov}}, {{$dec}}]
                }]
            },

            // Configuration options go here
            options: {}
        });
    </script>

@endsection