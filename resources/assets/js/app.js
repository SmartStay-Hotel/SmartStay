

/* ----------------------- REQUIRES ----------------------------------*/

require('./bootstrap');
window.Vue = require('vue');
window.axios = require('axios');
var Swiper = require('swiper');
import moment from 'moment'


//
// let token = document.head.querySelector('meta[name="csrf-token"]');
//
// if (token) {
//     window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
// } else {
//     console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
// }

/* ----------------------------------------------------------------------------- */
/*------------ LOGIN GUEST --------------------*/




    /*------------- DASHBOARD GUEST ------------------*/
// require('./bootstrap');
//
// import Vue from 'vue';


    // Vue.component('serviceslider', require('./components/swipeServices.vue'));

// var VueTinySlider = require('vue-tiny-slider');
//
// new Vue({
//     el: '#app',
//     components: {
//         'tiny-slider': VueTinySlider
//     }
// })

// import Vue from 'vue';
// import VueCarousel from 'vue-carousel';
//
// Vue.use(VueCarousel);




import VueTinySlider from 'vue-tiny-slider';


Vue.component('homeslider', require('./components/swiperHome.vue'))
Vue.component('housekeeping', require('./components/menuHousekeeping.vue'));
Vue.component('serviceshome', require('./components/servicesHome.vue'));
Vue.component('historyorders', require('./components/historyOrders.vue'))
// Vue.component('modal', {
//     template: '#hola'
// })

// import servicesHome from './components/servicesHome.vue'




    var urlGetStatusRoom ='seeStatus';
    var urlChangeStatusRoom = 'changeStatus';

toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": false,
    "extendedTimeOut": "3000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut",
    "closeOnHover": false
};

    new Vue({
        el: '#container',
        created: function(){
        this.getServices();
        this.getTrips();
        this.getEvents();
        this.getSpaTypes();
        this.getStatusRoom();
        this.actualDate();
        this.getCheckOutDate();
        this.getProductTypes();
        this.getHistory();

        // this.bttnMas();
        // this.setPriceTrip();


        },

        data:{
            services:[],
            trips:[],
            events:[],
            spaTypes:[],
            snacks:[],
            drinks:[],
            history:[],

            statusGuest: false,

            window: [false, false, false, false, false, false, false],
            show: false,
            showModalHK:false,
            showResult:false,
            showHistory:false,

            dataActual: '',
            dataActualFormat: '',
            checkoutDate: '',
            checkoutDateFormat:'',

            tripSelected:"",
            eventSelected:"",
            spaSelected:"",
            numPersonsTrip:1,
            statusRoom:"",
            dayHourServ:'',
            quantityServ:'',
            hourTaxi:'',

            productSelected:[],
            productCant:[],
            productPrice:[],
            snackSelected:[],
            snackCant:[],
            snackPrice:[],
            drinkSelected:[],
            drinkCant:[],
            drinkPrice:[],

            numSnacks:[0],
            nS:1,
            numDrinks:[0],
            nD:1,
            showSnack:['true'],

            petWater:"",
            petStandardFood:"",
            petPremiumFood:"",
            petSnacks:"",

            errores: "",
            errorExists : false,

            precioTotalSD: 0,




        },
        methods:{
            getServices: function(){
                var urlServices = 'services';
                axios.get(urlServices).then(response=>{
                    this.services = response.data
                });

            },
            getCheckOutDate:function(){
              var urlCheckOutDate = 'checkout';
                axios.get(urlCheckOutDate).then(response=>{
                    this.checkoutDate = response.data+"T00:00";
                    this.checkoutDateFormat = moment(response.data).format('YYYY-MM-DD');
            })
            },
            getHistory:function(){
              var urlHistory = 'orderHistory';
              axios.get(urlHistory).then(response=>{
                  this.history = response.data
              })
            },
            getProductTypes: function(){
                var urlSnacks= 'snacks';
                var urlDrinks = 'drinks';
                axios.get(urlSnacks).then(response=>{
                    this.snacks = response.data
            });
                axios.get(urlDrinks).then(response=>{
                    this.drinks = response.data
            });

            },
            getStatusRoom:function(){
                axios.get(urlGetStatusRoom).then(response=>{
                    this.statusRoom = response.data
                })
            },
            getTrips: function(){
                var urlTrips = 'trips';
                axios.get(urlTrips).then(response=>{
                    this.trips = response.data
            });

            },
            getEvents:function(){

                var urlEvents = 'events';
                axios.get(urlEvents).then(response=> {
                    this.events = response.data
            });
            },
            getSpaTypes: function(){
                var urlSpaTypes = 'spas';
                axios.get(urlSpaTypes).then(response=>{
                    this.spaTypes= response.data
                });
            },

            showWindow: function(num){
                console.log("shoooow wind"+ num);
                this.show = !this.show
                this.window[num]=!this.window[num]
                this.showResult = false

            },
            showOut: function(){
                axios.get(urlChangeStatusRoom)
                this.showModalHK = true

            },

            setPriceTrip: function(price){
                return this.numPersonsTrip * price
            },
            actualDate: function(){
                var d = new Date();
                var month = d.getMonth() + 1;
                var hour= d.getHours();
                var day = d.getDate();
                var minutes = d.getMinutes();
                if(month < 10) month = "0"+month;
                if(hour<10) hour = "0" + hour;
                if(day<10) day = "0"+ day;
                if(minutes<10) minutes = "0" + minutes;
                this.dataActual =  d.getFullYear()+"-"+month+"-"+d.getDate()+"T"+d.getHours()+":"+d.getMinutes()
                this.dayHourServ = this.dataActual
                this.dataActualFormat = moment().format('YYYY-MM-DD, h:mm a');

                // this.dataActual = d;
            },
            insertRestaurant: function(){
                if(this.dayHourServ<=this.dataActual){
                    this.errorExists = true;
                    console.log("holasdas");
                }else{
                console.log("correctoo");

                var urlInsRest ='admin/service/restaurant';
                axios.post(urlInsRest,{
                    day_hour: this.dayHourServ,
                    quantity: this.quantityServ
                }).then(response=>{
                    this.showResult = true;
                    toastr.success("jeje");
                }).catch(error=>{
                        this.errorExists = true;
                    this.errores = error.response.data;

                })
                }
                // this.pruebaOrder=response.data;
            },
            insertSpa: function(){
                var urlInsSpa ='admin/service/spa';
                axios.post(urlInsSpa,{
                    treatment_type_id: this.spaSelected,
                    day_hour: this.dayHourServ

                }).then(response=>{
                    this.showResult = true;
                toastr.success("adios");
                console.log("coorecto spapapa");

            }).catch(error=>{

                    toastr.success("sdfsadf");
                this.errores = error.response.data;
                console.log("alarm no sopasdoa");

            })
            },
            insertAlarm: function(){
                var urlInsAlarm ='admin/service/alarm';
                axios.post(urlInsAlarm,{
                    day_hour: this.dayHourServ

                }).then(response=>{
                    this.showResult = true;
                    toastr.success("adios");
                    console.log("coorecto alaramaaa");

            }).catch(error=>{

                    toastr.success("sdfsadf");
                this.errores = error.response.data;
                console.log("alarm no");

            })
            },
            insertTrip: function(){
                var urlInsTrip ='admin/service/trip';
                axios.post(urlInsTrip,{
                    trip_type_id: this.tripSelected,
                    people_num: this.numPersonsTrip

                }).then(response=>{
                    this.showResult = true;
                toastr.success("adios");
                console.log("correcto trip");
            }).catch(error=>{

                    toastr.success("sdfsadf");
                this.errores = error.response.data;
                console.log("tripppp no");

            })
            },insertEvent: function(){
                var urlInsEvent ='admin/service/event';
                axios.post(urlInsEvent,{
                    event_type_id: this.eventSelected

                }).then(response=>{
                    this.showResult = true;
                toastr.success("adios");
                console.log("correcto eventtt");
            }).catch(error=>{

                    toastr.success("sdfsadf");
                this.errores = error.response.data;
                console.log("evevevvent no");

            })
            },
            insertTaxi: function(){
                var urlInsTaxi ='admin/service/taxi';
                axios.post(urlInsTaxi,{
                    day_hour: this.dayHourServ

                }).then(response=>{
                    this.showResult = true;
                toastr.success("adios");
                console.log("correcto taxiiii");
            }).catch(error=>{

                    toastr.success("sdfsadf");
                this.errores = error.response.data;
                console.log("taxino no");

            })
            },
            insertPetCare: function(){
                var urlInsPetCare ='admin/service/petcare';
                var water = 0;
                var standard = 0;
                var premium = 0;
                var snacks = 0;
                if(this.petWater != '') water=1;
                if(this.petStandardFood !='') standard=1;
                if(this.petPremiumFood != '') premium = 1;
                if(this.snacks != '') snacks = 1;
                axios.post(urlInsPetCare,{

                    water: water,
                    standard_food:standard,
                    premium_food:premium,
                    snacks: snacks


                }).then(response=>{
                    this.showResult = true;
                toastr.success("adios");
                console.log("correcto dogg");
            }).catch(error=>{

                    toastr.success("sdfsadf");
                this.errores = error.response.data;
                console.log("dooogg no");

            })
            },
            bttnMas: function(tipo){
                if(tipo=='snack'){
                    this.numSnacks.push(this.nS);
                    this.nS = this.nS+1;
                }else if(tipo=='drink'){
                    this.numDrinks.push(this.nD);
                    this.nD = this.nD+1;
                }

            },
            bttnMenos: function(tipo){
                if(tipo=='snack'){
                    this.numSnacks.pop();
                    this.nS = this.nS-1;
                    this.snackSelected[this.nS] = '';

                }else if(tipo=='drink'){
                    this.numDrinks.pop();
                    this.nD = this.nD-1;
                    this.snackSelected[this.nD] = '';
                }


            }, infoSnack:function(num){
                return this.snacks.filter((product) => product.id==this.snackSelected[num]);
            },
            infoDrink:function(num){
                return this.drinks.filter((product) => product.id==this.drinkSelected[num]);
            },

            getPriceProducts:function(){
                var i = 0;
                this.productPrice = [];
                this.productSelected = [];
                this.productCant = [];
                this.precioTotalSD = 0;
                // console.log("length snack "+this.snackSelected.length);
                // var prodPrice = document.getElementsByClassName("productPrice");

                for(i = 0; i < snackPrice.length; i++){
                    this.productPrice.push(snackPrice[i]);
                }
                for(i = 0; i < drinkPrice.length; i++){
                    this.productPrice.push(drinkPrice[i]);
                }
                for(i = 0; i < this.snackSelected.length; i++){
                    this.productSelected.push(this.snackSelected[i]);
                }
                for(i = 0; i < this.drinkSelected.length; i++){
                    this.productSelected.push(this.drinkSelected[i]);
                }
                for(i = 0; i < this.snackCant.length; i++){
                    this.productCant.push(this.snackCant[i]);
                }
                for(i = 0; i < this.drinkCant.length; i++){
                    this.productCant.push(this.snackCant[i]);
                }


                for(i = 0; i < this.productSelected.length; i++){
                    console.log("parseee precio"+parseInt(this.productPrice[i]));
                    console.log("i "+i);
                    var cant = 1;
                    if(this.productCant[i] != null) cant = this.productCant[i];
                    this.precioTotalSD += (this.productPrice[i] * cant);
                }

                return this.precioTotalSD;


            },

            // getPrecio(precio, num){
            //     console.log(num);
            //     console.log(precio+"precioooo");
            //     console.log(this.snackCant[num]+ "accaaant");
            //     this.precioTotalSD += parseInt(this.snackCant[num]);
            //         return "";
            // },

            calcularPrecio(){
                this.getPriceProducts();
                this.hola = !this.hola;
            }



        },
        computed:{
            infoTrip: function(){
                return this.trips.filter((trip) => trip.id==this.tripSelected);
            },
            infoEvent: function(){
                return this.events.filter((event) => event.id==this.eventSelected);
            },
            setPrecioSnack: function(precio, num){
                this.snackPrice[num] = precio;
                return precio;
            },
            setPrecioDrink: function(precio, num){
                this.drinkPrice[num] = precio;
                return precio;
            },


        },
        components: {
            'tiny-slider': VueTinySlider,
            // 'serviceshome': serviceshome
        }
    });

//----------- END JS APP ------------------



