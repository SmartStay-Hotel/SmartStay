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


<div id="main_container">
    <div class="sidenav">
        <div id="titleAdmin">
            <p id="titleApp">SmartStay</p>
            <h5 id="hotelName">JAUME BALMES</h5>
        </div>
        <a href="#rooms">Rooms</a>
        <a href="#customers">Customers</a>
        <a href="#orders">Orders</a>
        <a href="#events">Events</a>
        <a href="#events">Taxi Companies</a>
        <a href="#events">Employees Contact</a>
    </div>


    <div class="row">
        <div class="col-sm-4" id="card3">
            <div class="card text-center">
                <h5 class="card-header">ORDERS</h5>
                <div class="card-body">
                    <h5 class="card-title">Orders placed by customers</h5>
                    <p class="card-text">Click on list to see all placed orders</p>
                    <a href="#" class="btn btn-primary">List</a>
                </div>
            </div>
        </div>
        <div id="checkOutIn" class="col-sm-4">
            <div id="card1">
                <div class="card text-center">
                    <h5 class="card-header">CHECK-IN</h5>
                    <div class="card-body">
                        <h5 class="card-title">Customers checking in today</h5>
                        <p class="card-text">Click to check in a customer</p>
                        <a href="#" class="btn btn-primary">Check-in</a>
                    </div>
                </div>
            </div>
            <div  id="card2">
                <div class="card text-center">
                    <h5 class="card-header">CHECK-OUT</h5>
                    <div class="card-body">
                        <h5 class="card-title">Customers checking out today</h5>
                        <p class="card-text">Click to check out a customer</p>
                        <a href="#" class="btn btn-primary">Check out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

    </div>

</body>
</html>
