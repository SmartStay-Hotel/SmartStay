<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SmartStay</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{--<link rel="stylesheet" href="{{asset('css/loginGuest.css')}}">--}}


</head>

<body id="body-index" onload="inPass()">


<form method="POST" action="{{ url('/') }}" id="formLoginGuest">
    <div id="app"></div>
    <div class="dropdown">
        <div class="dropbtn"><img src="{{ Config::get('languages')[App::getLocale()]['flag']}}"/></div>
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
                <input type="password" name="code[]" class="pass" maxlength="1" id="firstPass" autofocus>
                <input type="password" name="code[]" class="pass" maxlength="1">
                <input type="password" name="code[]" class="pass" maxlength="1" id="thirdPass">
            </div>
            <div id="passGroup2">
                <input type="password" name="code[]" class="pass" maxlength="1" id="fourthPass">
                <input type="password" name="code[]" class="pass" maxlength="1">
                <input type="password" name="code[]" class="pass" maxlength="1">
            </div>
        </div>
        <input type="submit" id="submit" value="{{trans('smartstay.login.submit')}}">
    </form>

</form>
<script type="text/javascript" src="{{asset('js/app.js') }}"></script>
<script>
    function inPass() {
        var container = document.getElementsByClassName('passGroup')[0];
        container.onkeyup = function (e) {
            if (document.activeElement.id === "thirdPass") {
                document.getElementById("fourthPass").focus();
            }
            var target = e.srcElement || e.target;
            var maxLength = parseInt(target.attributes["maxlength"].value, 10);
            var myLength = target.value.length;
            if (myLength >= maxLength) {
                var next = target;
                while (next = next.nextElementSibling) {
                    if (next == null)
                        break;
                    if (next.tagName.toLowerCase() === "input") {
                        next.focus();
                        break;
                    }
                }
            }
            // Move to previous field if empty (user pressed backspace)
            else if (myLength === 0) {
                if (document.activeElement.id === "fourthPass") {
                    document.getElementById("thirdPass").focus();
                }
                var previous = target;
                while (previous = previous.previousElementSibling) {
                    if (previous == null)
                        break;
                    if (previous.tagName.toLowerCase() === "input") {
                        previous.focus();
                        break;
                    }
                }
            }
        }
    }
</script>
</body>

</html>