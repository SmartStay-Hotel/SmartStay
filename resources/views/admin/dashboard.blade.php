<!DOCTYPE html>
<html>
<head>
    <title>SmartStay</title>
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
    {{--<link rel="stylesheet" href="{{asset('css/tabletGuest.css')}}">--}}
    {{--<link rel="stylesheet" href="{{asset('css/phoneGuest.css')}}">--}}

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
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
        <a href="#services" id="services">Services</a>
        <ul id="servicesList" class="list-group list-group-flush">
            <li><a href="#alarm">Alarm</a></li>
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

    <div class="row">
        <div class="col-sm-10" id="groupDashBtn">
            <a href="checkinform" id="dashBtn" class="btn btn-outline-success">Check in<i class="fas fa-arrow-left"></i></a>
            <a href="payments" id="dashBtn" class="btn btn-outline-danger">Check out</a>
            <a href="#" id="dashBtn" class="btn btn-outline-info">Bookings</a>
            <a href="#" id="dashBtn" class="btn btn-outline-warning">New Booking</a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4" id="card3">
            <div class="card text-center">
                <h5 class="card-header">PENDING ORDERS</h5>
                <div class="card-body">
                    <h5 class="card-title">Orders ready to be dispatched</h5>
                    <ul class="card-text">
                        <li><span>Alarm - </span>Happy Giraffe<button style="float:right"><i class="fas fa-check"></i></button></li>
                        <li><span>Pet care - </span>Crazy Elephant<button style="float:right"><i class="fas fa-check"></i></button></li>
                        <li><span>Restaurant - </span>Aggressive Hippo<button style="float:right"><i class="fas fa-check"></i></button></li>
                        <li><span>Restaurant - </span>Lunatic Racoon<button style="float:right"><i class="fas fa-check"></i></button></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-4" id="card1">
                <div class="card text-center">
                    <h5 class="card-header">DISPATCHED ORDERS</h5>
                    <div class="card-body">
                        <h5 class="card-title">Dispatched orders</h5>
                        <ul class="card-text">
                            <li>Happy Giraffe<button style="float:right"><i class="fas fa-user-check"></i></button></li>
                            <li>Crazy Elephant<button style="float:right"><i class="fas fa-user-check"></i></button></li>
                            <li>Aggressive Hippo<button style="float:right"><i class="fas fa-user-check"></i></button></li>
                            <li>Lunatic Racoon<button style="float:right"><i class="fas fa-user-check"></i></button></li>
                        </ul>
                    </div>
                </div>
        </div>
    </div>
</div>

</body>
</html>
