@extends("layout")
@section("content")

    <div id="inOut">
        <label class="switch">
            <input type="checkbox">
            <span class="slider"></span>
        </label>
    </div>

    <div id="containerButtons">
        <div id="bttnBack" class="bttnsDirection">
            <i class="fas fa-chevron-left"></i>
        </div>

        <div id="servicesHome">
            <div id="servicesTop">

                <div id="bttnRestaurant" class="bttnServices">
                        <div class="overlay">
                            <div class="text">@{{ services[0].description }}</div>
                        </div>
                    <p>@{{ services[0].name }}</p>
                </div>
                <div id="bttnSnackDrink" class="bttnServices">
                    <div class="overlay">
                        <div class="text">@{{ services[1].description }}</div>
                    </div>
                    <p>@{{ services[1].name }}</p></div>
            </div>
            <div id="servicesBottom">
                <div id="bttnSpa" class="bttnServices">
                    <div class="overlay">
                        <div class="text">@{{ services[2].description }}</div>
                    </div><p>@{{ services[2].name }}</p>
                </div>
                <div id="bttnAlarm" class="bttnServices">
                    <div class="overlay">
                        <div class="text">@{{ services[3].description }}</div>
                    </div>
                    <p>@{{ services[3].name }}</p>
                </div>
            </div>
        </div>
        <div id="bttnForward" class="bttnsDirection">
            <i class="fas fa-chevron-right"></i>
        </div>

    </div>
    <div id="bttnsDirection">
        {{--<i class="fas fa-chevron-left"></i>--}}
        {{--<i class="fas fa-chevron-right"></i>--}}
    </div>



@endsection