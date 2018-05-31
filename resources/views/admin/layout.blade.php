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
<div id="main_container">
    <nav class="sidenav">
        <header id="titleAdmin">
            <p id="titleApp">SmartStay</p>
            <h5 id="hotelName">JAUME BALMES</h5>
        </header>
        <hr id="separator">
        <p><a id="guests" href="{{ route('guests.index') }}">Guests</a></p>

        <div class="dropdown show">
            <p class="btn dropdown-toggle" href="#" role="button" id="services" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="myFunction()">
                Services
            </p>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" id="servicesList" style="border: none; box-shadow: none; display: block">
                <a class="dropdown-item" id="itemDropdown" href="{{ url('admin/alarms') }}"><i class="far fa-clock" style="padding: 5px;"></i>Alarm</a>
                <a class="dropdown-item" id="itemDropdown" href="{{ url('admin/restaurant') }}"><i class="fas fa-utensils" style="padding: 5px;"></i>Restaurant</a>
                <a class="dropdown-item" id="itemDropdown" href="{{ url('admin/housekeeping') }}"><i class="fas fa-broom" style="padding: 5px;"></i>Housekeeping</a>
                <a class="dropdown-item" id="itemDropdown" href="{{ url('admin/taxi') }}"><i class="fas fa-taxi" style="padding: 5px;"></i>Taxi</a>
                <a class="dropdown-item" id="itemDropdown" href="{{ url('admin/snacks') }}"><i class="fas fa-glass-martini" style="padding: 5px;"></i>Snacks</a>
                <a class="dropdown-item" id="itemDropdown" href="{{ url('admin/spa') }}"><i class="fas fa-sun" style="padding: 5px;"></i>Spa</a>
                <a class="dropdown-item" id="itemDropdown" href="{{ url('admin/petCare') }}"><i class="fas fa-paw" style="padding: 5px;"></i>Pet care</a>
                <a class="dropdown-item" id="itemDropdown" href="{{ url('admin/events') }}"><i class="fas fa-music" style="padding: 5px;"></i>Events</a>
                <a class="dropdown-item" id="itemDropdown" href="{{ url('admin/trips') }}"><i class="fas fa-suitcase" style="padding: 5px;"></i>Trips</a>
            </div>
        </div>

    </nav>

    <main>

        <div id="flexNavbar">
            <nav aria-label="breadcrumb" id="breadNav">
                <ol class="breadcrumb" style="background-color: #F5F5F5">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i class="fas fa-home"></i></a></li>
                    @yield('breadcrumb')
                </ol>
            </nav>

        <form action="{{ route('logout') }}" method="POST" class="form-inline my-2 my-lg-0" id="formLayout">
            @csrf
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" id="logOutBtn">Log out <i
                        class="fas fa-sign-out-alt"></i></button>
        </form>

        </div>
        <hr id="separator2">

@yield('content')

    </main>
</div>

<script>

    function myFunction() {
        var x = document.getElementById("servicesList");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

</script>

@yield('scripts')
</body>
</html>