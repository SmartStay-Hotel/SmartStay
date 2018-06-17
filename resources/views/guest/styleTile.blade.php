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
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/guest.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tile.css') }}">

</head>
<body>
<div class="container border" style="margin-top: 3%">
    <div class="row border">
        <div class="col-4 border" style="padding-bottom: 40px;">
            <h1 id="tileTitle">Smartstay Style Tile</h1>
            <hr>
            <h2 id="tilesubTitle">I'm a headline</h2>
            <h6>Subheadline</h6>
            <p>One morning, when Gregor Samsa woke from troubled dreams, he found himself
                transformed in his bed into a horrible vermin. He lay on his armour-like back, and
                if he lifted his head a little he could see his brown belly, slightly domed and
                divided by arches into stiff sections. The bedding was hardly able to cover it and
                seemed ready to slide off any moment. His many legs, pitifully thin compared with
                the size of the rest of him, waved about helplessly as he looked.</p>
        </div>
        <div class="col-4 border">
            <p>BUTTONS/ICONS</p>
            <div class="row" style="padding:30px; padding-left:0px;">
                <div class="col-6 bttnSubmit">
                    <button type="submit" form="formIns0" value="enviar">Send</button>
                </div>
                <div class="col-6">
                    <button @click="bttnMas('snack')"><i
                                class="fas fa-plus"></i></button>
                    <button @click="bttnMenos('snack')"><i
                                class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="row" style="padding-bottom:30px; padding-top:20px; padding-left:35px;">
                <div class="col-3" id="nav2">
                    <p><i class="fas fa-door-closed"
                          style="margin-right:5px"></i>101</p>
                </div>
                <div class="col-3" id="subMenu1">
                    <a href=""><i class="fas fa-power-off"></i></a>
                </div>
                <div class="col-3" id="bttnHistory" >
                    <i class="fas fa-history" ></i>
                </div>
            </div>
            <div class="row" style="padding-left:30px;">
                <div id="subMenu2">
                    <div id="inOut">
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-left:100px; padding-top: 60px;">
                <div class="dropdown-content" id="language">

                    @foreach (Config::get('languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                            <a href="{{ route('lang.switch', $lang) }}"><img src="{{$language['flag']}}" style="height: 20px;"/></a>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
        <div class="col-4 border">
            <p>LOGO</p>
            <img class="logo" src="{{('img/icon/favicon.ico')}}" style="width: 200px;">
        </div>
    </div>
    <div class="row border">
        <div class="col-12 border" style="padding-bottom: 40px;">
            <p>COLORS/IMAGES</p>
            <div class="row">
                <div id="m01-01" class="item"></div>
                <div id="m01-02" class="item"></div>
                <div id="m01-03" class="item"></div>
                <div id="m01-04" class="item"></div>
                <div id="m01-05" class="item"></div>
            </div>
        </div>
    </div>
    <div class="row border">
        <div class="col-12 border" style="padding-bottom: 40px;">
            <p>COLORS/IMAGES</p>
            <div class="row">
                <div style="margin-left: 150px; margin-right:15px;"><img src="{{('img/home_services/snackdrink/snickers.jpg')}}" style="width: 150px; padding-top: 50px;"></div>
                <div style="margin-right:15px;"><img src="{{('img/home_services/snackdrink/doritos.jpg')}}" style="width: 150px; padding-top: 25px;"></div>
                <div style="margin-right:15px;"><img src="{{('img/home_services/spa/facial.jpg')}}" style="width: 150px; padding-top: 45px;"></div>
                <div style="margin-right:15px;"><img src="{{('img/home_services/spa/handsFeet.jpg')}}" style="width: 150px; padding-top: 45px;"></div>
                <div><img src="{{('img/home_services/snackdrink/lays.jpg')}}" style="width: 150px; padding-top: 25px;"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<!--
<div id="web-container">

    <header>
        <h1>Smartstay</h1>
        <h2>- Style Tile -</h2>
    </header>


    <main>
        <div class="header-01">Colors</div>
        <div class="container-01">
            <div id="m01-01" class="item"></div>
            <div id="m01-02" class="item"></div>
            <div id="m01-03" class="item"></div>
            <div id="m01-04" class="item"></div>
            <div id="m01-05" class="item"></div>
        </div>
        <div class="header-02">Fonts</div>
        <div class="container-02">
            <div id="f01-01">These</div>
            <div id="f01-02">are</div>
            <div id="f01-03">my</div>
            <div id="f01-04">wonderful</div>
            <div id="f01-05">fonts!</div>
        </div>
        <div class="header-03">Logo</div>
        <div class="container-03">
            <div class="logo"><img src="./img/logo2.png" /></div>
        </div>
    </main>


    <footer>

        <div class="container-01">
            <div class="item"></div>

        </div>
    </footer>
</div>-->