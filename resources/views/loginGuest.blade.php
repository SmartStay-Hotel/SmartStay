
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SmartStay</title>

        <link rel="stylesheet" href="{{asset('css/loginGuest.css')}}">
        <script type="text/javascript" src="{{asset('js/loginGuest.js') }}"></script>

    </head>

<body onload="inPass()">
<form action="#">
    <div class="passGroup">
        <input type="password" name="code[]" class="pass" maxlength="1" autofocus id="firstPass">
        <input type="password" name="code[]" class="pass" maxlength="1">
        <input type="password" name="code[]" class="pass" maxlength="1">
        <input type="password" name="code[]" class="pass" maxlength="1" id="fourthPass">
        <input type="password" name="code[]" class="pass" maxlength="1">
        <input type="password" name="code[]" class="pass" maxlength="1">
            <br>
        <input type="submit" id="submit" value="submit">
    </div>
</form>

</body>
</html>