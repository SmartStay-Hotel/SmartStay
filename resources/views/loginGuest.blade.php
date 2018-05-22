
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SmartStay</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/loginGuest.css')}}">
    <script type="text/javascript" src="{{asset('js/app.js') }}"></script>

</head>

<body onload="inPass()" id="body-index">


<div class="dropdown">
    <button class="dropbtn">{{ Config::get('languages')[App::getLocale()] }}</button>
    <div class="dropdown-content" id="language">

        @foreach (Config::get('languages') as $lang => $language)
            @if ($lang != App::getLocale())
                    <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
            @endif
        @endforeach

    </div>

</div>


<div id="containerLogin">
    <form method="POST" action="{{ url('/') }}" id="formLogin">
        {{ csrf_field() }}

    <div class="passGroup">
        <input type="password" name="code[]" class="pass" maxlength="1" autofocus id="firstPass">
        <input type="password" name="code[]" class="pass" maxlength="1">
        <input type="password" name="code[]" class="pass" maxlength="1">
        <input type="password" name="code[]" class="pass" maxlength="1" id="fourthPass">
        <input type="password" name="code[]" class="pass" maxlength="1">
        <input type="password" name="code[]" class="pass" maxlength="1">
    </div>
        <input type="submit" id="submit" value="{{trans('smartstay.login.submit')}}">
</form>
</div>

</body>
</html>