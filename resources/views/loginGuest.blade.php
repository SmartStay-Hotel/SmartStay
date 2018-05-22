
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

<body id="body-index">


    <form method="POST" action="{{ url('/') }}" id="formLoginGuest">
        {{ csrf_field() }}
<p>Introduce your code</p>
    <div class="passGroup">
        <div id="passGroup1">
        <input type="password" name="code[]" class="pass" maxlength="1" id="firstPass" onkeyup="nextPass(0)" autofocus>
        <input type="password" name="code[]" class="pass" maxlength="1" onkeyup="nextPass(1)">
        <input type="password" name="code[]" class="pass" maxlength="1" onkeyup="nextPass(2)">
        </div>
        <div id="passGroup2">
        <input type="password" name="code[]" class="pass" maxlength="1" onkeyup="nextPass(3)">
        <input type="password" name="code[]" class="pass" maxlength="1" onkeyup="nextPass(4)">
        <input type="password" name="code[]" class="pass" maxlength="1" >
        </div>
    </div>
    <input type="submit" id="submit" value="Sign in">

</form>


</body>
</html>