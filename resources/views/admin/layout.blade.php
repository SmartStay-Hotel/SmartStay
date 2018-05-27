<!DOCTYPE html>
<html>
<head>
    <title>SmartStay</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
          rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
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
        <a id="homeIcon" class="nav-link" href="{{ url('admin/dashboard') }}"><i class="fas fa-home fa-lg"></i></a>
        <form action="{{ route('logout') }}" method="POST" class="form-inline my-2 my-lg-0">
            @csrf
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Log out <i class="fas fa-sign-out-alt"></i></button>
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
        <p><a id="guests" href="{{ url('admin/guests') }}">Guests</a></p>
        <p id="services">Services</p>
        <ul id="servicesList" class="list-group list-group-flush">
            <li><a href="{{ url('admin/alarms') }}">Alarm</a></li>
            <li><a href="#restaurant">Restaurant</a></li>
            <li><a href="#housekeeping">Housekeeping</a></li>
            <li><a href="#taxi">Taxi</a></li>
            <li><a href="#snacks">Snacks and Drinks</a></li>
            <li><a href="#spa">Spa Appointments</a></li>
            <li><a href="#pet">Pet care</a></li>
            <li><a href="#events">Events</a></li>
            <li><a href="#trips">Trips</a></li>
        </ul>
    </div>
    @yield('content')
</div>

</body>
</html>