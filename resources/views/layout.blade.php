@if(\Session::has('guest_id'))
        <!DOCTYPE html>
<html>
<head>
    <title>SmartStay</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
          rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/guest.css')}}">
    {{--<link rel="stylesheet" href="{{asset('css/tabletGuest.css')}}">--}}
    {{--<link rel="stylesheet" href="{{asset('css/phoneGuest.css')}}">--}}
    <script>
        function botones() {

            if (window.innerWidth <= 600) {
                document.getElementById('bttnsDirection').innerHTML = "<i class=\"fas fa-chevron-left\"></i>\n" +
                    "    <i class=\"fas fa-chevron-right\"></i>";
                document.getElementsByClassName('bttnsDirection')[0].innerHTML = "";
                document.getElementsByClassName('bttnsDirection')[1].innerHTML = "";
            }
        }
    </script>
</head>
<body onload="botones()">

<nav>
    <div id="nav1">
        <h3><span style="font-size:1rem">SmartStay</span> Hotel Jaume Balmes</h3>
    </div>
    <div id="nav2">
        <p><i class="fas fa-door-closed" style="margin-right:5px"></i>147</p>
    </div>

</nav>
<div id="subMenu">
    <div id="subMenu1">
        <a href="{{url('/logout')}}"><i class="fas fa-power-off"></i></a>
    </div>
    <div id="subMenu2">

    </div>
</div>
<div id="main_container">
    @yield('content')
</div>


</body>
</html>
@else
    <script>window.location = "{{ url('/') }}";</script>
@endif
