<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SmartStay</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{--<link rel="stylesheet" href="{{asset('css/loginGuest.css')}}">--}}
    <script type="text/javascript" src="{{asset('js/app.js') }}"></script>

</head>

<body id="body-index">


<form method="POST" action="{{ url('/') }}" id="formLoginGuest">
<div id="app"></div>
    <div class="dropdown">
        <button class="dropbtn"><img src="{{ Config::get('languages')[App::getLocale()]['flag']}}"/></button>
        <div class="dropdown-content" id="language">

            @foreach (Config::get('languages') as $lang => $language)
                @if ($lang != App::getLocale())
                    <a href="{{ route('lang.switch', $lang) }}"><img src="{{$language['flag']}}"/></a>
                @endif
            @endforeach

        </div>

    </div>
    <form method="POST" action="{{ url('/') }}" id="formLoginGuest">
        {{ csrf_field() }}
        <p>{{trans('smartstay.login.introduceCode')}}</p>
        <div class="passGroup">
            <div id="passGroup1">
                <input type="password" name="code[]" class="pass" maxlength="1" id="firstPass" onkeyup="nextPass(0)"
                       autofocus>
                <input type="password" name="code[]" class="pass" maxlength="1" onkeyup="nextPass(1)">
                <input type="password" name="code[]" class="pass" maxlength="1" onkeyup="nextPass(2)">
            </div>
            <div id="passGroup2">
                <input type="password" name="code[]" class="pass" maxlength="1" onkeyup="nextPass(3)">
                <input type="password" name="code[]" class="pass" maxlength="1" onkeyup="nextPass(4)">
                <input type="password" name="code[]" class="pass" maxlength="1">
            </div>
        </div>
        <input type="submit" id="submit" value="{{trans('smartstay.login.submit')}}">
    </form>

</form>
</body>
</html>