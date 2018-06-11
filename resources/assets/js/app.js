

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



    new Vue({
        el: '#container',
        created: function(){
        this.getServices();
        this.getTrips();
        this.getEvents();
        this.getStatusRoom();
        this.actualDate();

        // this.bttnMas();
        // this.setPriceTrip();


        },

        data:{
            services:[],
            trips:[],
            events:[],
            spaTypes:[],

            statusGuest: false,

            window: [false, false, false, false, false, false, false],
            show: false,
            showModalHK:false,
            showResult:false,
            showHistory:false,

            dataActual: '',
            dataActualFormat: '',

            tripSelected:"",
            eventSelected:"",
            spaSelected:"",
            numPersonsTrip:1,
            statusRoom:"",
            dayHourServ:'',
            quantityServ:'',
            hourTaxi:'',

            numSnacks:['1'],
            numDrinks:['1'],
            showSnack:['true'],

            errores: "",




        },
        methods:{
            getServices: function(){
                var urlServices = 'services';
                axios.get(urlServices).then(response=>{
                    this.services = response.data
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
                if(month < 10) month = "0"+month;
                this.dataActual =  d.getFullYear()+"-"+month+"-"+d.getDate()+"T"+d.getHours()+":"+d.getMinutes()
                this.dayHourServ = this.dataActual
                this.dataActualFormat = moment(this.dataActual).format('MMMM Do YYYY, h:mm a');
                // this.dataActual = d;
            },
            insertRestaurant: function(){
                if(this.dayHourServ<this.dataActual){
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
                    toastr.success("jojoj");
                    this.errores = error.response.data;

                })
                }
                // this.pruebaOrder=response.data;
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
                    trip_type_id: this.dayHourServ

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
            bttnMas: function(tipo){
                if(tipo=='snack'){
                    this.numSnacks.push("1");
                }else if(tipo=='drink'){
                    this.numDrinks.push("1");
                }

            },
            bttnMenos: function(tipo){
                if(tipo=='snack'){
                    this.numSnacks.pop();
                }else if(tipo=='drink'){
                    this.numDrinks.pop();
                }


            },


        },
        computed:{
            infoTrip: function(){
                return this.trips.filter((trip) => trip.id==this.tripSelected);
            },
            infoEvent: function(){
                return this.events.filter((event) => event.id==this.eventSelected);
            },

        },
        components: {
            'tiny-slider': VueTinySlider,
            // 'serviceshome': serviceshome
        }
    });

//----------- END JS APP ------------------



