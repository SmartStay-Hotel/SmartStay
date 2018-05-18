
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SmartStay</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script type="text/javascript" src="{{asset('js/app.js') }}"></script>

</head>

<body onload="inPass()" id="body-index">

<div id="flags">
    <select name="language">
        <option value="es"><img src="{{asset('img/flags/es.png')}}>" alt="es"></option>
        <option value="en"><img src="{{asset('img/flags/gb.png')}}>" alt="en"></option>
        <option value="cat"><img src="{{asset('img/flags/cat.png')}}>" alt="cat"></option>
        <option value="de"><img src="{{asset('img/flags/de.png')}}>" alt="de"></option>
        <option value="it"><img src="{{asset('img/flags/it.png')}}>" alt="it"></option>
    </select>
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