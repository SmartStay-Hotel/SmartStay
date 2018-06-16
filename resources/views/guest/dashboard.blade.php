@extends("layout")
@section("content")

    <transition name="fade">

        <div class="swiperHome" v-if="!show">
            <homeslider @window-to-show="showWindow" v-bind:services="services"></homeslider>
        </div>

    </transition>


    {{--<sliderservices v-bind:services="services"></sliderservices>--}}
    {{--<div class="swiper-container">--}}
    {{--<!-- Additional required wrapper -->--}}
    {{--<div class="swiper-wrapper">--}}
    {{--<!-- Slides -->--}}
    {{--<div class="swiper-slide">Slide 1</div>--}}
    {{--<div class="swiper-slide">Slide 2</div>--}}
    {{--<div class="swiper-slide">Slide 3</div>--}}
    {{--...--}}
    {{--</div>--}}
    {{--<!-- If we need pagination -->--}}
    {{--<div class="swiper-pagination"></div>--}}

    {{--<!-- If we need navigation buttons -->--}}
    {{--<div class="swiper-button-prev"></div>--}}
    {{--<div class="swiper-button-next"></div>--}}

    {{--<!-- If we need scrollbar -->--}}
    {{--<div class="swiper-scrollbar"></div>--}}
    {{--</div>--}}

    <!-- if you don't want to use the buttons Flickity provides -->
    {{--<agile :infinite="false">--}}
    {{--<div class="slide slide--1"><h3>slide 1</h3></div>--}}
    {{--<div class="slide slide--2"><h3>slide 2</h3></div>--}}
    {{--<div class="slide slide--3"><h3>slide 3</h3></div>--}}
    {{--<div class="slide slide--4"><h3>slide 4</h3></div>--}}
    {{--<div class="slide slide--5"><h3>slide 5</h3></div>--}}
    {{--<div class="slide slide--6"><h3>slide 6</h3></div>--}}
    {{--</agile>--}}

    {{--<transition name="fade">--}}
    {{--<div id="sliderServices" v-if="!show && !showHistory">--}}
    {{--<tiny-slider :mouse-drag="true" :loop="false" items="1" gutter="100">--}}
    {{--nserv: Es el número por el que se empieza a contar, por cada containerServices se suma 4.--}}
    {{--servs: Con 1 se indica que ese servicio esta activo y se puede mostrar, con 0 lo contrario --}}
    {{--services: Es el array de services. Siempre se ha de poner --}}

    {{--<div class="containerServices">--}}
    {{--<serviceshome v-bind:nserv="0" v-bind:servs="[1,1,1,1]" v-bind:services="services"></serviceshome>--}}
    {{--</div>--}}
    {{--<div class="containerServices">--}}
    {{--<serviceshome v-bind:nserv="4" v-bind:servs="[1,1,1,0]" v-bind:services="services"></serviceshome>--}}
    {{--</div>--}}

    {{--<div class="servicesHome">--}}
    {{--<div class="servicesTop row">--}}

    {{--<div class="bttnServices col-md-4 col-sm-4 col-xs-6 col-lg-5 col-xl-3"--}}
    {{--v-on:click="showWindow(0)">--}}
    {{--<img v-bind:src="services[0].image" alt="">--}}
    {{--<div class="serviceDescription">--}}
    {{--<div class="textDesc">@{{ services[0].description }}</div>--}}
    {{--</div>--}}
    {{--<div class="serviceName">--}}
    {{--<p>@{{ services[0].name }}</p>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="bttnServices col-md-4 col-sm-4 col-xs-6 col-lg-5 col-xl-3" @click="showWindow(1)">--}}
    {{--<img v-bind:src="services[1].image" alt="">--}}
    {{--<div class="serviceDescription">--}}
    {{--<div class="textDesc">@{{ services[1].description }}</div>--}}
    {{--</div>--}}
    {{--<div class="serviceName">--}}
    {{--<p>@{{ services[1].name }}</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="servicesBottom row">--}}
    {{--<div class="bttnServices col-md-4 col-sm-4 col-xs-6 col-lg-5 col-xl-3" @click="showWindow(2)">--}}
    {{--<img v-bind:src="services[2].image" alt="">--}}
    {{--<div class="serviceDescription">--}}
    {{--<div class="textDesc">@{{ services[2].description }}</div>--}}

    {{--</div>--}}
    {{--<div class="serviceName">--}}
    {{--<p>@{{ services[2].name }}</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="bttnServices col-md-4 col-sm-4 col-xs-6 col-lg-5 col-xl-3" @click="showWindow(3)">--}}
    {{--<img v-bind:src="services[3].image" alt="">--}}
    {{--<div class="serviceDescription">--}}
    {{--<div class="textDesc">@{{ services[3].description }}</div>--}}
    {{--</div>--}}
    {{--<div class="serviceName">--}}
    {{--<p>@{{ services[3].name }}</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="servicesHome">--}}
    {{--<div class="servicesTop row">--}}

    {{--<div class="bttnServices col-md-4 col-sm-4 col-xs-6 col-lg-5 col-xl-3"--}}
    {{--v-on:click="showWindow(4)">--}}
    {{--<img v-bind:src="services[0].image" alt="">--}}
    {{--<div class="serviceDescription">--}}
    {{--<div class="textDesc">@{{ services[0].description }}</div>--}}
    {{--</div>--}}
    {{--<div class="serviceName">--}}
    {{--<p>@{{ services[0].name }}</p>--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="bttnServices col-md-4 col-sm-4 col-xs-6 col-lg-5 col-xl-3" @click="showWindow(5)">--}}
    {{--<img v-bind:src="services[1].image" alt="">--}}
    {{--<div class="serviceDescription">--}}
    {{--<div class="textDesc">@{{ services[1].description }}</div>--}}
    {{--</div>--}}
    {{--<div class="serviceName">--}}
    {{--<p>@{{ services[1].name }}</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="servicesBottom row">--}}
    {{--<div class="bttnServices col-md-4 col-sm-4 col-xs-6 col-lg-5 col-xl-3" @click="showWindow(6)">--}}
    {{--<img v-bind:src="services[2].image" alt="">--}}
    {{--<div class="serviceDescription">--}}
    {{--<div class="textDesc">@{{ services[2].description }}</div>--}}

    {{--</div>--}}
    {{--<div class="serviceName">--}}
    {{--<p>@{{ services[2].name }}</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="bttnServices col-md-4 col-sm-4 col-xs-6 col-lg-5 col-xl-3" @click="showWindow(7)">--}}
    {{--<img v-bind:src="services[3].image" alt="">--}}
    {{--<div class="serviceDescription">--}}
    {{--<div class="textDesc">@{{ services[3].description }}</div>--}}
    {{--</div>--}}
    {{--<div class="serviceName">--}}
    {{--<p>@{{ services[3].name }}</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</tiny-slider>--}}
    {{--</div>--}}
    {{--</transition>--}}


    <div class="windows">
        <transition name="fade">
            <div class="windowService" v-if="window[0]">
                <div v-if="existsRestaurant == ''">
                <div class="windowTitle">
                    <button class="returnWindow " v-if="show" @click="showWindow(0)"><i
                                class="fas fa-long-arrow-alt-left"></i></button>
                    <h2>@{{ services[0].name }}</h2>
                </div>
                <p class="windowDesc">@{{ services[0].description }} </p>
                <div class="windowContent row">
                    <form class="attribOrder col-md-7" action="#" method="post" v-on:submit.prevent="insertRestaurant" id="formIns0">
                        <div class="row">
                            <label for="dateRestaurant" class="col-md-6">{{trans('smartstay.restaurant.date')}}</label>
                            <input type="datetime-local" class="col-md-6" style="width:50%;" name="dateRestaurant" v-model="dayHourServ" v-bind:min="dataActual" v-bind:max="checkoutDate">
                        </div>
                        <div class="row">
                            {{--<p class="errorForm errorDayHour col-md-12" v-if="errorExists">Ha habido un error, no se ha podido insertar.</p>--}}
                            <p class="errorForm errorDayHour col-md-12" v-if="errorDayHour">*La fecha debe ser entre @{{dataActualFormat}} y @{{ checkoutDateFormat }}</p>
                        </div>
                        <div class="row">
                            <label for="numPersonRest" class="col-md-6" style="width:40%;">{{trans('smartstay.restaurant.numPers')}}</label>
                            <input type="number" class="col-md-6" style="width:50%;" v-model="quantityServ" name="numPersonRest" required>
                        </div>


                    </form>
                    <div class="resultOrder col-md-5">
                        <p>{{trans('smartstay.restaurant.bookingName')}}
                            <strong>{{Session::get('guest_id')}}</strong></p>
                        <div v-if="showResult">
                            <p>{{trans('smartstay.restaurant.time')}} @{{dayHourServ}}</p>
                        </div>

                    </div>


                </div>
                    <div class="bttnSubmit">
                    <button type="submit" form="formIns0" value="enviar">{{trans('smartstay.dashboard.send')}}</button>
                    </div>
                </div>
                <div v-else>
                    <div class="windowTitle">
                        <button class="returnWindow " v-if="show" @click="showWindow(0)"><i
                                    class="fas fa-long-arrow-alt-left"></i></button>
                        <h2>Tu reserva</h2>
                    </div>
                    <p class="windowDesc">Datos de tu reserva </p>
                    <div class="windowContent" v-for="info in existsRestaurant">
                        <p>Nombre de la reserva: @{{ info.guest_id }} </p>
                        <p>Fecha: @{{ info.day_hour }}</p>
                        <p>Número de personas: @{{ info.quantity }}</p>
                        <div class="bttnSubmit">
                            <button type="submit" v-on:click="showCancelConfirm=true" value="delete">Cancelar pedido</button>
                        </div>
                        <confirmcancel v-if="showCancelConfirm" @yes-cancel="deleteOrder(info.service_id,info.id)" @no-cancel="showCancelConfirm=false"></confirmcancel>
                    </div>

                </div>
            </div>
            <div class="windowService" v-if="window[1]">
                <div class="windowTitle">
                    <button class="returnWindow " v-if="show" @click="showWindow(1)"><i
                                class="fas fa-long-arrow-alt-left"></i></button>
                    <h2>@{{ services[1].name }}</h2>
                </div>
                <p class="windowDesc" style="margin-bottom:0px;">@{{ services[1].description }}</p>
                <div class="windowNav">

                        <p @click="showSnack=true"
                            v-bind:class="[showSnack ? 'windowNavSelected' : '']">{{trans('smartstay.snack.name')}}</p>
                        <p @click="showSnack=false"
                            v-bind:class="[!showSnack ? 'windowNavSelected' : '']">{{trans('smartstay.drink.name')}}</p>

                </div>
                <div class="windowContent">
                    <form class="attribOrder col-md-12"  action="#" method="post" v-on:submit.prevent="insertRestaurant">
                        <div class="row" style="margin-bottom:5%;">
                            <transition name="fade">
                                <div v-if="showSnack">
                                    <div class="col-md-5">
                                    <div style="display:flex;">
                                    <label for="orderSnack" style="padding-left:4%;width:80%" >{{trans('smartstay.snack.name')}}</label>
                                    <label for="cantSnack" style="width:20%;">Cantidad </label>
                                    </div>
                                        <div class="selSnackDrinks" v-for="numS in numSnacks" style="display:flex; flex-direction: row; justify-content: space-around;">

                                        <select style="width:70%; height:25px;" name="orderSnack" id="snackOrder"  v-model="snackSelected[numS]" >
                                            <option v-for="snack in snacks" v-bind:value="snack.id">@{{ snack.name }}</option>
                                        </select>
                                        <input type="number" name="cantSnack" min="1" v-model="snackCant[numS]" style="width:20%; height:25px" v-on:keyup="getPriceProducts()" v-on:change="getPriceProducts()" required>
                                    </div>

                                        <div class="bttnSnackDrinks row">
                                            <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 col-xl-5"
                                                 style="padding:0px">
                                                <button @click="bttnMas('snack')" v-if="this.numSnacks.length<3"><i
                                                            class="fas fa-plus"></i></button>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 col-xl-5"
                                                 style="padding:0px">
                                                <button @click="bttnMenos('snack')" v-if="this.numSnacks.length>1"><i
                                                            class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="windowInfo col-md-5 infoSnackDrink" >

                                        <div v-if="snackSelected[0]!=''" v-for="infoProd in infoSnack(0)" class="col-md-4">
                                            <p><span class="productPrice">@{{ setPrecioSnack(infoProd.price,0) }} </span> €</p>
                                        <img v-bind:src="infoProd.image" alt="Product">
                                        </div>
                                        <div v-if="snackSelected[1]!=''" v-for="infoProd in infoSnack(1)" class="col-md-4">
                                            <p><span class="productPrice">@{{ setPrecioSnack(infoProd.price,1) }} </span> €</p>
                                            <img v-bind:src="infoProd.image" alt="Product">
                                        </div>
                                        <div v-if="snackSelected[2]!=''" v-for="infoProd in infoSnack(2)" class="col-md-4">
                                            <p><span class="productPrice">@{{ setPrecioSnack(infoProd.price,2) }} </span> €</p>
                                            <img v-bind:src="infoProd.image" alt="Product">

                                        </div>

                                    </div>
                                </div>
                            </transition>
                            <transition name="fade">
                                <div v-if="!showSnack">
                                    <div class="col-md-5">
                                        <div style="display:flex;">
                                            <label for="orderDrink" style="padding-left:4%;width:80%" >{{trans('smartstay.drink.name')}}</label>
                                            <label for="cantDrink" style="width:20%;">Cantidad </label>
                                        </div>
                                        <div class="selSnackDrinks" v-for="numD in numDrinks" style="display:flex; flex-direction: row; justify-content: space-around;">

                                            <select style="width:70%; height:25px;" name="orderDrink" id="drinkOrder"  v-model="drinkSelected[numD]" >
                                                <option v-for="drink in drinks" v-bind:value="drink.id">@{{ drink.name }}</option>
                                            </select>
                                            <input type="number" name="cantDrink" min="1" v-model="drinkCant[numD]" style="width:20%; height:25px" v-on:keyup="getPriceProducts()" v-on:change="getPriceProducts()" required>
                                        </div>

                                        <div class="bttnSnackDrinks row">
                                            <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 col-xl-5"
                                                 style="padding:0px">
                                                <button @click="bttnMas('drink')" v-if="this.numDrinks.length<3"><i
                                                            class="fas fa-plus"></i></button>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 col-xl-5"
                                                 style="padding:0px">
                                                <button @click="bttnMenos('drink')" v-if="this.numDrinks.length>1"><i
                                                            class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="windowInfo col-md-5 infoSnackDrink" >

                                        <div v-if="drinkSelected[0]!=''" v-for="infoProd in infoDrink(0)" class="col-md-4">
                                            <p><span class="productPrice">@{{ setPrecioDrink(infoProd.price,0) }} </span> €</p>
                                            <img v-bind:src="infoProd.image" alt="Product">
                                        </div>
                                        <div v-if="drinkSelected[1]!=''" v-for="infoProd in infoDrink(1)" class="col-md-4">
                                            <p><span class="productPrice">@{{setPrecioDrink(infoProd.price,1) }} </span> €</p>
                                            <img v-bind:src="infoProd.image" alt="Product">
                                        </div>
                                        <div v-if="drinkSelected[2]!=''" v-for="infoProd in infoDrink(2)" class="col-md-4">
                                            <p><span class="productPrice">setPrecioDrink(infoProd.price,2) </span> €</p>
                                            <img v-bind:src="infoProd.image" alt="Product">

                                        </div>

                                    </div>
                                </div>
                            </transition>


                        </div>
                        <div style="display:flex; justify-content:space-between">
                            <p>Precio @{{ precioTotalSD.toFixed(2) }}</p>
                        <input type="submit" name="{{trans('smartstay.dashboard.send')}}">

                        </div>
                    </form>

                </div>

            </div>
            <div class="windowService" v-if="window[2]">
                <div class="windowTitle">
                    <button class="returnWindow " v-if="show" @click="showWindow(2)"><i
                                class="fas fa-long-arrow-alt-left"></i></button>
                    <h2>@{{ services[2].name }}</h2>
                </div>
                <p class="windowDesc">@{{ services[2].description }}</p>
                <div class="windowContent row">

                    <form class="attribOrder col-md-7" action="#" method="post" id="formIns2" v-on:submit.prevent="insertSpa">

                        <div class="row">
                            <label for="dateSpa" class="col-md-6">{{trans('smartstay.spa.date')}}</label>
                            <input type="datetime-local"  class="col-md-6" name="dateSpa" v-model="dayHourServ" v-bind:min="dataActual" v-bind:max="checkoutDate">
                        </div>
                        <div class="row">
                            {{--<p class="errorForm errorDayHour col-md-12" v-if="errorExists">Ha habido un error, no se ha podido insertar.</p>--}}
                            <p class="errorForm errorDayHour col-md-12" v-if="errorDayHour">*La fecha debe ser entre @{{dataActualFormat}} y @{{ checkoutDateFormat }}</p>
                        </div>
                        <div class="row">
                        <label for="typeSpa" class="col-md-6" style="width:40%;">{{trans('smartstay.spa.type')}}</label>
                        <select name="typeSpa" v-model="spaSelected" class="col-md-6" style="width:50%;">
                            <option v-for="spatype in spaTypes" v-bind:value="spatype.id"> @{{ spatype.name }} </option>
                        </select>
                        </div>

                    </form>
                    <div class="resultOrder col-md-5">
                        <div class="windowInfo" v-for="item in infoSpa" v-if="spaSelected != ''">
                        <div class="col-md-5">
                            <p>Duration: @{{ item.duration }}</p>
                        <p>Precio: @{{ item.price }}</p>
                        </div>
                            <img v-bind:src="item.image" alt="Spa type" class="col-md-5">

                        </div>
                    </div>


                </div>
                <div class="bttnSubmit">
                    <button type="submit" form="formIns2" value="enviar">{{trans('smartstay.dashboard.send')}}</button>
                </div>

            </div>
            <div class="windowService" v-if="window[3]">
                <div class="windowTitle">
                    <button class="returnWindow " v-if="show" @click="showWindow(3)"><i
                                class="fas fa-long-arrow-alt-left"></i></button>
                    <h2>@{{ services[3].name }}</h2>
                </div>
                <p class="windowDesc">@{{ services[3].description }}</p>
                <div class="windowContent row">
                    <form class="attribOrder col-md-7" action="#" method="post" v-on:submit.prevent="insertAlarm">
                        <label for="dateAlarm">{{trans('smartstay.alarm.date')}}</label>
                        <input type="datetime-local" name="dateAlarm" v-model="dayHourServ"><br>

                        <br>
                        <input type="submit" name="{{trans('smartstay.dashboard.send')}}">
                    </form>
                    <div v-if="showResult">
                        <p>{{trans('smartstay.alarm.hour')}}: @{{dayHourServ}}</p>
                    </div>
                </div>
            </div>
            <div class="windowService" v-if="window[4]">
                <div class="windowTitle">
                    <button class="returnWindow " v-if="show" @click="showWindow(4)"><i
                                class="fas fa-long-arrow-alt-left"></i></button>
                    <h2>{{trans('smartstay.pet.name')}}</h2>
                </div>
                <p class="windowDesc">{{trans('smartstay.pet.description')}}</p>
                <div class="windowContent">
                    <form class="attribOrder col-md-7" action="#" method="post" v-on:submit.prevent="insertPetCare">
                    <input type="checkbox" name="petWater" v-model="petWater" value="water">{{trans('smartstay.pet.water')}}
                    <input type="radio" name="petStandardFood" value="standard" v-model="petStandardFood">{{trans('smartstay.pet.standardFood')}}
                    <input type="radio" name="petPremiumFood" value="premium" v-model="petPremiumFood">{{trans('smartstay.pet.premiumFood')}}
                    <input type="checkbox" v-model="petSnacks" name="petSnacks" value="snacks">{{trans('smartstay.pet.snacks')}}
                        <input type="submit">
                    </form>
                </div>
            </div>
            <div class="windowService" v-if="window[5]">
                <div class="windowTitle">
                    <button class="returnWindow " v-if="show" @click="showWindow(5)"><i
                                class="fas fa-long-arrow-alt-left"></i></button>
                    <h2>{{trans('smartstay.trips.name')}}</h2>
                </div>
                <p class="windowDesc">{{trans('smartstay.trips.description')}}</p>
                <div class="windowContent row">
                    <form class="attribOrder col-md-7" action="#" method="post" v-on:submit.prevent="insertTrip">
                    <label for="selTrips">
                        {{trans('smartstay.trips.select')}}
                    </label>
                    <select name="selTrips" id="" v-model="tripSelected">
                        <option v-for="trip in trips" v-bind:value="trip.id">@{{ trip.name }}</option>
                    </select>
                    <label for="cantTrip">{{trans('smartstay.trips.numPersons')}}: </label><input type="number" min="1" v-model="numPersonsTrip">

                        <input type="submit">
                        <div class="windowInfo" v-for="item in infoTrip" v-if="tripSelected != ''">
                            <p>{{trans('smartstay.trips.location')}}: @{{ item.location }}</p>
                            <p>{{trans('smartstay.trips.day')}}: @{{ item.day_week }}</p>
                            <p>{{trans('smartstay.trips.price')}}: @{{ setPriceTrip(item.price) }}</p>

                        </div>
                    </form>
                    <div v-if="showResult">
                        <p>Trip selected: @{{tripSelected}}</p>
                        <p>Number: @{{numPersonsTrip}}</p>
                    </div>
                </div>
            </div>
            <div class="windowService" v-if="window[6]">
                <div class="windowTitle">
                    <button class="returnWindow " @click="showWindow(6)"><i class="fas fa-long-arrow-alt-left"></i>
                    </button>
                    <h2>@{{ services[6].name }}</h2>
                </div>


                <p class="windowDesc">@{{ services[6].description }}</p>
                <div class="windowContent row">
                    <form class="attribOrder col-md-7" action="#" method="post" v-on:submit.prevent="insertEvent">
                        <label for="selEvent">
                            {{trans('smartstay.event.selectEvent')}}
                        </label>
                        <select name="selEvent" v-model="eventSelected">
                            <option v-for="event in events" v-bind:value="event.id">@{{ event.name }}</option>
                        </select>
                        <input type="submit">
                        <div class="windowInfo" v-for="item in infoEvent" v-if="eventSelected != ''">
                            <p>{{trans('smartstay.event.location')}}: @{{ item.location }}</p>
                            <p>{{trans('smartstay.event.day')}}: @{{ item.day_week }}</p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="windowService" v-if="window[7]">
                <div class="windowTitle">
                    <button class="returnWindow " @click="showWindow(7)"><i class="fas fa-long-arrow-alt-left"></i>
                    </button>
                    <h2>{{trans('smartstay.taxi.name')}}</h2>
                </div>
                <p class="windowDesc">{{trans('smartstay.taxi.description')}}</p>
                <div class="windowContent">
                    <form class="attribOrder col-md-7" action="#" method="post" v-on:submit.prevent="insertTaxi">
                    {{trans('smartstay.taxi.hour')}}<input type="datetime-local" v-model="dayHourServ">
                        <input type="submit">
                    </form>
                    <div v-if="showResult">
                        <p>Hour: @{{hourTaxi}}</p>

                    </div>
                </div>
            </div>
        </transition>
    </div>




    {{--<footer v-if="show"></footer>--}}

    {{-- ------------------ --}}



@endsection