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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.3.5/tiny-slider.css">


    {{--<link rel="stylesheet" href="{{asset('css/tabletGuest.css')}}">--}}
    {{--<link rel="stylesheet" href="{{asset('css/phoneGuest.css')}}">--}}
    <script>
    </script>

</head>
<body>
<div id="container">
<nav>
    <div id="nav1">
        <h3><span style="font-size:1rem">SmartStay</span> Hotel Jaume Balmes</h3>
    </div>
    <div id="nav2">
        <p><i class="fas fa-door-closed" style="margin-right:5px"></i>{{\App\Guest::find(Session::get('guest_id'))->rooms[0]->number}}</p>
    </div>

</nav>
<div id="subMenu">
    <div id="subMenu1">
        <a href="{{url('logout')}}"><i class="fas fa-power-off"></i></a>
    </div>
    <div id="subMenu2">
        <div id="inOut"  >

            <label class="switch">

                <input type="checkbox" v-model="guestOut" @click="showOut" checked>
                <span class="slider"></span>
            </label>
        </div>
        {{--<p>@{{guestOut}}</p>--}}
    </div>
</div>
<div id="main_container" v-bind:class="[!showMenuOut ? 'blur' : '']">
    @yield('content')
</div>


    <transition name="bounce">

        <div id="out" v-if="!showMenuOut">
            <div class="containerMenuOut">
                <div class="menuOut"><input type="checkbox"> Sabanas limpias</div>
                <div class="menuOut"><input type="checkbox"> Limpiar habitación</div>
                <div class="menuOut"><input type="checkbox"> Rellenar habitación</div>
                <div class="menuOut"><input type="checkbox"> Toallas</div>
                <div class="menuOut"><input type="checkbox"> Manta</div>
                <div class="menuOut"><input type="checkbox"> Almohadas</div>
                <div class="menuOut"><input type="number" max="5" style="width:30px"> Número de almohadas</div>
                <div class="menuOut"><input type="submit" value="Okay" @click="showMenuOut = !showMenuOut"></div>
            </div>
        </div>
    </transition>

</div>
<script type="text/javascript" src="{{asset('js/app.js') }}"></script>
</body>
</html>
@else
    <script>window.location = "{{ url('/') }}";</script>
@endif
