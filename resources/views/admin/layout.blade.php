<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>SmartStay</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Guest App and Hotel Manager">
    <meta name="author" content="SmartStay Team">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/icon/favicon-96x96.png') }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/admin/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    @yield('css')
</head>
<body>
<div id="main_container">
    <nav class="sidenav">
        <header>
           <!-- <p id="titleApp">SmartStay <img src="{{ asset('img/icon/favicon-96x96.png') }}" style="width: 40px;"></p>
            <h5 id="hotelName">JAUME BALMES</h5>-->
               <img src="{{ asset('img/logoTransparente.png') }}" style="width: 95px; margin-left: 35px; margin-bottom: 10%; padding-top: 0px;">
        </header>
        <hr id="separator">
        <p><a id="guests" href="{{ route('guests.index') }}">Guests</a></p>

        <div class="dropdown show">
            <p class="btn dropdown-toggle" href="#" role="button" id="services" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="myFunction()">
                Services
            </p>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" id="servicesList" style="border: none; box-shadow: none; display: block">
                <a class="dropdown-item itemDropdown"  href="{{ route('alarm.index') }}"><i class="far fa-clock" style="padding: 5px;"></i>Alarm</a>
                <a class="dropdown-item itemDropdown"  href="{{ route('restaurant.index') }}"><i class="fas fa-utensils" style="padding: 5px;"></i>Restaurant</a>
                <a class="dropdown-item itemDropdown"  href="{{ route('housekeeping.index') }}"><i class="fas fa-broom" style="padding: 5px;"></i>Housekeeping</a>
                <a class="dropdown-item itemDropdown"  href="{{ route('taxi.index') }}"><i class="fas fa-taxi" style="padding: 5px;"></i>Taxi</a>
                <a class="dropdown-item itemDropdown"  href="{{ route('snackdrink.index') }}"><i class="fas fa-glass-martini" style="padding: 5px;"></i>Snacks</a>
                <a class="dropdown-item itemDropdown"  href="{{ route('spa.index') }}"><i class="fas fa-sun" style="padding: 5px;"></i>Spa</a>
                <a class="dropdown-item itemDropdown"  href="{{ route('petcare.index') }}"><i class="fas fa-paw" style="padding: 5px;"></i>Pet care</a>
                <a class="dropdown-item itemDropdown"  href="{{ route('event.index') }}"><i class="fas fa-music" style="padding: 5px;"></i>Events</a>
                <a class="dropdown-item itemDropdown"  href="{{ route('trip.index') }}"><i class="fas fa-suitcase" style="padding: 5px;"></i>Trips</a>
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
<script src="{{ asset('js/admin/app.js') }}"></script>


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