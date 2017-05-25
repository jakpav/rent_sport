@extends('layouts.website')
@section('content')

    <div class="container sport-grounds">
        @foreach($ps as $p)
            @if($a%2==0)
                <div class="row">
                    <div class="col-xs-12">
                        <div class="playground_1">
                            <h2 class="hdr">{{$p->type}}</h2>
                            <p>{{$p->description}}</p>
                            <div class="playground_price text-right">Price/Hour: {{$p->price}}</div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-xs-12">
                        <div class="playground_2">
                            <h2 class="hdr">{{$p->type}}</h2>
                            <p>{{$p->description}}</p>
                            <div class="playground_price text-right">Price/Hour: {{$p->price}}</div>
                        </div>
                    </div>
                </div>
            @endif
            <?php $a++ ?>
        @endforeach
    </div>

    @endsection