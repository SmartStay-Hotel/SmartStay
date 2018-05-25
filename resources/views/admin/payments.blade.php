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

    <h2 id="checkInTitle">PAYMENTS</h2>
    <div class="col-sm-6">
    <table id="paymentsTable" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Room Type</th>
            <th scope="col">Check-in Day</th>
            <th scope="col">Check-out Day</th>
            <th scope="col">Room Nr</th>
            <th scope="col">Price for Orders</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">Happy Giraffe</th>
            <td>Deluxe</td>
            <td>2018-03-01</td>
            <td>2018-03-04</td>
            <td>211</td>
            <td>50</td>
        </tr>
        <tr>
            <th scope="row">Crazy Elephant</th>
            <td>Standard</td>
            <td>2018-04-18</td>
            <td>2018-04-09</td>
            <td>400</td>
            <td>20</td>
        </tr>
        <tr>
            <th scope="row">Aggressive Hippo</th>
            <td>Standard</td>
            <td>2018-04-15</td>
            <td>2018-04-20</td>
            <td>102</td>
            <td>70</td>
        </tr>
        <tr>
            <th scope="row">Lunatic Racoon</th>
            <td>Deluxe</td>
            <td>2018-04-15</td>
            <td>2018-04-16</td>
            <td>407</td>
            <td>0</td>
        </tr>
        </tbody>
    </table>
    </div>
</div>
</body>
</html>