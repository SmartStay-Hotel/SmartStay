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
                            <p class="errorForm errorDayHour col-md-12" v-if="errorDayHour">*{{trans('smartstay.dashboard.errorFecha')}} @{{dataActualFormat}} {{trans('smartstay.dashboard.and')}} @{{ checkoutDateFormat }}</p>
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
                        <h2>{{trans('smartstay.dashboard.yourBooking')}}</h2>
                    </div>
                    <p class="windowDesc">{{trans('smartstay.dashboard.yourBookingData')}}</p>
                    <div class="windowContent" v-for="info in existsRestaurant">
                        <p><strong>{{trans('smartstay.dashboard.bookingName')}}: </strong> @{{ info.guest_id }} </p>
                        <p><strong>{{trans('smartstay.dashboard.date')}}: </strong>@{{ info.day_hour }}</p>
                        <p><strong>{{trans('smartstay.restaurant.numPers')}}:</strong> @{{ info.quantity }}</p>
                        <div class="bttnSubmit">
                            <button type="submit" v-if="!pedidoHecho" v-on:click="showCancelConfirm=true">{{trans('smartstay.dashboard.cancelOrder')}}</button>
                            <button type="submit" v-if="pedidoHecho" class="bttnPedidoHecho">{{trans('smartstay.dashboard.completedOrder')}}</button>
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
                <div class="windowContent">
                    <form class="attribOrder col-md-12"  action="#" method="post" id="formIns1" v-on:submit.prevent="insertProduct">
                        <div class="row" style="margin-bottom:5%;">

                                    <div class="col-md-5">
                                    <div style="display:flex;">
                                    <label for="orderProduct" style="padding-left:4%;width:80%" >{{trans('smartstay.product.select')}}</label>
                                    <label for="cantProduct" style="width:20%;">{{trans('smartstay.dashboard.quantity')}}</label>
                                    </div>
                                        <div class="selSnackDrinks" v-for="numP in numProducts" style="display:flex; flex-direction: row; justify-content: space-around;">

                                        <select style="width:70%; height:25px;" name="orderProduct" id="productOrder"  v-model="productSelected[numP]">
                                            <option v-for="product in products" v-bind:value="product.id">@{{ product.name }}</option>
                                        </select>
                                        <input type="number" name="cantProduct" min="1" v-model="productCant[numP]" style="width:20%; height:25px" required>
                                    </div>


                                        <div class="bttnSnackDrinks row">
                                            <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 col-xl-5"
                                                 style="padding:0px">
                                                <p class="bttnSD" @click="bttnMas()" v-if="this.numProducts.length<3"><i
                                                            class="fas fa-plus"></i></p>
                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 col-xl-5"
                                                 style="padding:0px">
                                                <p class="bttnSD" @click="bttnMenos()" v-if="this.numProducts.length>1"><i
                                                            class="fas fa-minus"></i></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="windowInfo col-md-5 infoSnackDrink" >

                                        <div v-if="productSelected[0]!=''" v-for="infoProd in infoProduct(0)" class="col-md-4">
                                            <p><span class="productPrice"  style="font-weight: bolder">@{{ infoProd.price }}</span> €</p>
                                            <img v-bind:src="infoProd.image" style="width:50px" alt="Product">
                                        </div>
                                        <div v-if="productSelected[1]!=''" v-for="infoProd in infoProduct(1)" class="col-md-4">
                                            <p><span class="productPrice" style="font-weight: bolder">@{{ infoProd.price }}</span> €</p>
                                            <img v-bind:src="infoProd.image" style="width:50px" alt="Product">
                                        </div>
                                        <div v-if="productSelected[2]!=''" v-for="infoProd in infoProduct(2)" class="col-md-4">
                                            <p><span class="productPrice" style="font-weight: bolder">@{{ infoProd.price }} </span> €</p>
                                            <img v-bind:src="infoProd.image" style="width:50px" alt="Product">

                                        </div>

                                    </div>


                        </div>
                            {{--<div style="display:flex; justify-content:space-between">--}}
                                {{--<p v-if="showPrecioProduct">Precio @{{ precioTotalSD.toFixed(2) }}</p>--}}

                            {{--</div>--}}
                    </form>

                </div>
                <div class="bttnSubmit col-md-12" style="display:flex; justify-content:flex-start; justify-content: space-between">
                    <div>
                        <p v-if="showPrecioProduct"><strong>{{trans('smartstay.product.totPrice')}}:</strong> @{{ precioTotalSD.toFixed(2) }} €</p>
                    </div>
                    <div style="display:flex;">
                        <button @click="showProdPrice" v-if="!pedidoHecho" style="width:150px">{{trans('smartstay.product.calcPrice')}}</button>
                        <button type="submit" v-if="!pedidoHecho" form="formIns1" value="enviar">{{trans('smartstay.dashboard.send')}}</button>
                        <button type="submit" v-if="pedidoHecho" style="width:150px" class="bttnPedidoHecho">{{trans('smartstay.dashboard.completedOrder')}}</button>
                    </div>
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
                            <p class="errorForm errorDayHour col-md-12" v-if="errorDayHour">{{trans('smartstay.dashboard.errorFecha')}} @{{dataActualFormat}} {{trans('smartstay.dashboard.and')}} @{{ checkoutDateFormat }}</p>
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
                            <p>{{trans('smartstay.spa.duration')}}: @{{ item.duration }} min</p>
                        <p>{{trans('smartstay.spa.price')}}: @{{ item.price }} €</p>
                        </div>
                            <img v-bind:src="item.image" alt="Spa type" style="width:200px;" class="col-md-5">

                        </div>
                    </div>


                </div>
                <div class="bttnSubmit">
                    <button type="submit" v-if="!pedidoHecho" form="formIns2" value="{{trans('smartstay.dashboard.send')}}">{{trans('smartstay.dashboard.send')}}</button>
                    <button type="submit" v-if="pedidoHecho" class="bttnPedidoHecho">{{trans('smartstay.dashboard.completedOrder')}}</button>
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
                    <div class="col-md-12" style="display:flex;justify-content: center;"><label for="dateAlarm" style="width:auto; font-weight: bolder; text-transform: uppercase; font-size:150%;">{{trans('smartstay.alarm.date')}}</label></div>
                    <form class="attribOrder col-md-12" style="display:flex;justify-content: center;" action="#" method="post" v-on:submit.prevent="insertAlarm" id="formIns3">
                        <input type="datetime-local" name="dateAlarm" v-model="dayHourServ" style="border:none; border:1px solid gray; border-radius:5px;"><br>
                    </form>
                    <div class="row">

                            <div class="col-md-12" style="display:flex; justify-content: center; padding-top:2%;">
                        {{--<p class="errorForm errorDayHour col-md-12" v-if="errorExists">Ha habido un error, no se ha podido insertar.</p>--}}
                        <p class="errorForm errorDayHour" v-if="errorDayHour">{{trans('smartstay.dashboard.errorFecha')}}@{{dataActualFormat}} {{trans('smartstay.dashboard.and')}} @{{ checkoutDateFormat }}</p>
                            </div>

                    </div>
                    <div class="col-md-12 bttnSubmit" style="justify-content: center; padding-top:2%">
                        <button type="submit" v-if="!pedidoHecho" form="formIns3" value="enviar">{{trans('smartstay.dashboard.send')}}</button>
                        <button type="submit" v-if="pedidoHecho" class="bttnPedidoHecho">{{trans('smartstay.dashboard.completedOrder')}}</button>
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
                    <form class="attribOrder col-md-12" action="#" method="post" id="formIns4" v-on:submit.prevent="insertPetCare" style="display:flex; justify-content: space-around">
                    <div><input type="checkbox" name="petWater" v-model="petWater" value="water"><label for="petWater">{{trans('smartstay.pet.water')}}</label></div>
                    <div><input type="radio" name="petFood" value="standard_food" v-model="petFood"><label for="petFood" style="width:auto">{{trans('smartstay.pet.standardFood')}}</label></div>
                    <div><input type="radio" name="petFood" value="premium_food" v-model="petFood"><label for="premium_food" style="width:auto">{{trans('smartstay.pet.premiumFood')}}</label></div>
                    <div><input type="checkbox" v-model="petSnacks" name="petSnacks" value="snacks"><label for="petSnacks">{{trans('smartstay.pet.snacks')}}</label></div>

                    </form>
                    <div class="col-md-12 bttnSubmit" style="justify-content: center; padding-top:2%">
                        <button type="submit" v-if="!pedidoHecho" form="formIns4" value="enviar">{{trans('smartstay.dashboard.send')}}</button>
                        <button type="submit" v-if="pedidoHecho" class="bttnPedidoHecho">{{trans('smartstay.dashboard.completedOrder')}}</button>
                    </div>
                </div>
            </div>
            <div class="windowService" v-if="window[5]">
                <div class="windowTitle">
                    <button class="returnWindow " v-if="show" @click="showWindow(5)"><i
                                class="fas fa-long-arrow-alt-left"></i></button>
                    <h2>@{{ services[5].name }}</h2>
                </div>
                <p class="windowDesc">@{{ services[5].description }}</p>
                <div class="windowContent row">
                    <form class="attribOrder col-md-5" action="#" method="post" v-on:submit.prevent="insertTrip" id="formIns5">
                        <div class="row">
                            <label for="selTrips" class="col-md-6">
                                {{trans('smartstay.trips.select')}}
                            </label>
                            <select name="selTrips" id="" v-model="tripSelected" class="col-md-6" style="width:50%;">
                                <option v-for="trip in trips" v-bind:value="trip.id">@{{ trip.name }}</option>
                            </select>
                        </div>

                        <div class="row">
                    <label for="cantTrip" class="col-md-6" style="width:40%;">{{trans('smartstay.trips.numPersons')}}: </label>
                            <input type="number" min="1" class="col-md-6" v-model="numPersonsTrip">
                        </div>
                        <div class="row">
                            {{--<p class="errorForm errorDayHour col-md-12" v-if="errorExists">Ha habido un error, no se ha podido insertar.</p>--}}
                            <p class="errorForm col-md-12" v-if="errorPlazas">{{trans('smartstay.dashboard.noPlace')}}</p>
                        </div>
                    </form>
                        <div class="windowInfo" v-for="item in infoTrip" v-if="tripSelected != ''">
                            <div style="display:flex">
                            <div class="col-md-8 col-sm-7 col-xs-7 col-lg-7 col-xl-7">
                                <p><strong> {{trans('smartstay.trips.available')}}:</strong> @{{ getTripPlaces(item.id) }}</p>
                            <p><strong>{{trans('smartstay.trips.location')}}:</strong> @{{ item.location }}</p>
                            <p><strong>{{trans('smartstay.trips.day')}}: </strong>@{{ item.day_week }}</p>
                            <p><strong>{{trans('smartstay.trips.price')}}: </strong>@{{ setPriceTrip(item.price) }} €</p>
                            </div>
                            <img v-bind:src="item.image" alt="Trip image" style="width:150px;align-self: center" class="col-md-4 col-sm-5 col-xs-5 col-lg-5 col-xl-5">
                            </div>
                        </div>



                </div>
                <div class="bttnSubmit">
                    <button type="submit"  v-if="!pedidoHecho" form="formIns5" value="enviar">{{trans('smartstay.dashboard.send')}}</button>
                    <button type="submit" v-if="pedidoHecho" style="width:150px" class="bttnPedidoHecho">{{trans('smartstay.dashboard.completedOrder')}}</button>
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
                    <form class="attribOrder col-md-5" action="#" method="post" id="formIns6" v-on:submit.prevent="insertEvent">
                        <div class="row" >
                        <label for="selEvent" class="col-md-6" style="width:40%;">
                            {{trans('smartstay.event.selectEvent')}}
                        </label>
                        <select name="selEvent" v-model="eventSelected" class="col-md-6" style="width:50%;">
                            <option v-for="event in events" v-bind:value="event.id">@{{ event.name }}</option>
                        </select>
                        </div>
                        <div class="row">
                            <label for="cantTrip" class="col-md-6" style="width:40%;">{{trans('smartstay.trips.numPersons')}}: </label>
                            <input type="number" min="1" class="col-md-6" v-model="numPersonsTrip">
                        </div>
                        <div class="row">
                            {{--<p class="errorForm errorDayHour col-md-12" v-if="errorExists">Ha habido un error, no se ha podido insertar.</p>--}}
                            <p class="errorForm col-md-12" v-if="errorPlazas">{{trans('smartstay.dashboard.noPlace')}}</p>
                        </div>

                    </form>


                    <div class="windowInfo" v-for="item in infoEvent" v-if="eventSelected != ''">
                        <div style="display:flex">
                        <div class="col-md-8 col-sm-7 col-xs-7 col-lg-7 col-xl-7">
                            <p><strong>{{trans('smartstay.trips.available')}}: </strong>@{{ getEventPlaces(item.id) }}</p>
                            <p><strong>{{trans('smartstay.event.location')}}:</strong> @{{ item.location }}</p>
                            <p><strong>{{trans('smartstay.event.day')}}:</strong> @{{ item.day_week }}</p>
                        </div>
                            <img v-bind:src="item.image" style="width:150px;align-self: center" alt="Event image" class="col-md-5">

                        </div>
                    </div>




                </div>
                <div class="bttnSubmit">
                    <button type="submit" v-if="!pedidoHecho" form="formIns6">{{trans('smartstay.dashboard.send')}}</button>
                    <button type="submit" v-if="pedidoHecho" style="width:150px" class="bttnPedidoHecho">{{trans('smartstay.dashboard.completedOrder')}}</button>
                </div>
            </div>
            <div class="windowService" v-if="window[7]">
                <div class="windowTitle">
                    <button class="returnWindow " @click="showWindow(7)"><i class="fas fa-long-arrow-alt-left"></i>
                    </button>
                    <h2>{{trans('smartstay.taxi.name')}}</h2>
                </div>
                <p class="windowDesc">{{trans('smartstay.taxi.description')}}</p>
                <div class="windowContent row">
                    <div class="col-md-12" style="display:flex;justify-content: center;"><label for="dateTaxi" style="width:auto; font-weight: bolder; text-transform: uppercase; font-size:150%;">{{trans('smartstay.alarm.date')}}</label></div>
                    <form class="attribOrder col-md-12" style="display:flex;justify-content: center;" action="#" method="post" v-on:submit.prevent="insertTaxi" id="formIns7">
                    <input type="datetime-local" name="dateTaxi" v-model="dayHourServ">
                    </form>
                    <div class="row">
                        <div class="col-md-12" style="display:flex; justify-content: center; padding-top:2%;">
                            {{--<p class="errorForm errorDayHour col-md-12" v-if="errorExists">Ha habido un error, no se ha podido insertar.</p>--}}
                            <p class="errorForm errorDayHour" v-if="errorDayHour">{{trans('smartstay.dashboard.errorFecha')}} @{{dataActualFormat}} {{trans('smartstay.dashboard.and')}} @{{ checkoutDateFormat }}</p>
                        </div>
                    </div>
                    <div class="col-md-12 bttnSubmit" style="justify-content: center; padding-top:2%">
                        <button type="submit" v-if="!pedidoHecho" form="formIns7" value="enviar">{{trans('smartstay.dashboard.send')}}</button>
                        <button type="submit" v-if="pedidoHecho" class="bttnPedidoHecho">{{trans('smartstay.dashboard.completedOrder')}}</button>
                    </div>
                </div>
            </div>
        </transition>
    </div>




    {{--<footer v-if="show"></footer>--}}

    {{-- ------------------ --}}



@endsection