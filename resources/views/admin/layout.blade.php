<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>SmartStay</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Guest App and Hotel Manager">
    <meta name="author" content="SmartStay Team">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    @yield('css')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
          rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
            integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
            integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
            crossorigin="anonymous"></script>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
        <a id="homeIcon" class="nav-link" href="{{ route('admin') }}"><i class="fas fa-home fa-lg"></i></a>
        <form action="{{ route('logout') }}" method="POST" class="form-inline my-2 my-lg-0">
            @csrf
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Log out <i
                        class="fas fa-sign-out-alt"></i></button>
        </form>
    </div>
</nav>

<div id="main_container">
    <div class="sidenav">
        <div id="titleAdmin">
            <p id="titleApp">SmartStay</p>
            <h5 id="hotelName">JAUME BALMES</h5>
        </div>
        <hr id="separator">
        <p><a id="guests" href="{{ route('guests.index') }}">Guests</a></p>
        <p id="services">Services</p>
        <ul id="servicesList" class="list-group list-group-flush">
            <li><a href="{{ url('admin/alarms') }}">Alarm</a></li>
            <li><a href="{{ url('admin/restaurant') }}">Restaurant</a></li>
            <li><a href="{{ url('admin/housekeeping') }}">Housekeeping</a></li>
            <li><a href="{{ url('admin/taxi') }}">Taxi</a></li>
            <li><a href="{{ url('admin/snacks') }}">Snacks and Drinks</a></li>
            <li><a href="{{ url('admin/spa') }}">Spa Appointments</a></li>
            <li><a href="{{ url('admin/petCare') }}">Pet care</a></li>
            <li><a href="{{ url('admin/events') }}">Events</a></li>
            <li><a href="{{ url('admin/trips') }}">Trips</a></li>

        </ul>
    </div>
    @yield('content')
</div>

@yield('scripts')
</body>
</html>