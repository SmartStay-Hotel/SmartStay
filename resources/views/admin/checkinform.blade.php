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

        <h2 id="checkInTitle">CHECK-IN</h2>
    <form id="checkInForm" class="col-sm-4">
        <div class="form-group">
            <label for="Name">First name</label>
            <input type="text" class="form-control" id="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="Surname">Surname</label>
            <input type="text" class="form-control" id="surname" placeholder="Surname">
        </div>
        <div class="form-group">
            <label for="Id">Id</label>
            <input type="text" class="form-control" id="id" placeholder="Id">
        </div>
        <div class="form-group">
            <label for="PeopleNumber">Number of people</label>
            <input type="text" class="form-control" id="PeopleNumber" placeholder="Number of people">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" placeholder="Price">
        </div>

        <label for="bedroomType">Bedroom Type</label><br/>
        <select id="bedroomType">
            <option selected>Select the bedroom type</option>
            <option value="standard">Standard</option>
            <option value="view">Standard with view</option>
            <option value="superior">Superior</option>
            <option value="deluxe">Deluxe</option>
            <option value="family">Family</option>
        </select><br/><br/>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="jacuzzi">
            <label class="form-check-label" for="jacuzzi">Jacuzzi</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    </div>
</body>
</html>
