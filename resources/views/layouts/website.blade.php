<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jakub Pavlo</title>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                <a href="{{url('/')}}"><img src="{{asset('img/logo.png')}}" alt="logo" class="img-responsive" /></a>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text-right">
                <nav>
                    <ul class="menu">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('/about')}}">About us</a></li>
                        <li><a href="{{url('/sport-grounds')}}">Sport grounds</a></li>
                        <li><a href="{{url('/reservation')}}">Reservation</a></li>
                        <li><a href="{{url('/contact')}}">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

@yield('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <footer>
                &copy; JAKUP PAVLO, s. t. u. d. e. n. t.
            </footer>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>