

/* ----------------------- REQUIRES ----------------------------------*/

require('./bootstrap');
window.Vue = require('vue');
window.axios = require('axios');


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
Vue.component('housekeeping', require('./components/menuHousekeeping.vue'));
Vue.component('serviceshome', require('./components/servicesHome.vue'));
// Vue.component('modal', {
//     template: '#hola'
// })

// import servicesHome from './components/servicesHome.vue'

    var urlServices = 'services';
    var urlTrips = 'trips';
    var urlChangeStatusRoom= 'changeStatus';
    var urlGetStatusRoom ='seeStatus';
    var urlSpaTypes='';



    new Vue({
        el: '#container',
        created: function(){
        this.getServices();
        this.getTrips();
        this.getEvents();
        this.getStatusRoom();
        // this.bttnMas();
        // this.setPriceTrip();


        },

        data:{
            services:[],
            trips:[],
            events:[],
            spaTypes:[],
            window: [false, false, false, false, false, false, false],
            show: false,
            guestOut:true,
            showMenuOut: true,
            tripSelected:"",
            eventSelected:"",
            spaSelected:"",
            numPersonsTrip:1,
            statusRoom:"",
            showModal:false,
            dayHourServ:'',
            quantityServ:'',
            showResult:false,
            numSnacks:['1'],
            numDrinks:['1'],
            showSnack:['true'],
            pruebaOrder:[],



        },
        methods:{
            getServices: function(){
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
                this.show = !this.show
                this.window[num]=!this.window[num]
            },
            showOut: function(){
                axios.get(urlChangeStatusRoom)
                this.guestOut = !this.guestOut
                this.showMenuOut = !this.showMenuOut
            },
            showOut2:function(){
                this.guestOut = !this.guestOut
                this.showMenuOut = !this.showMenuOut
            },
            setPriceTrip: function(price){
                return this.numPersonsTrip * price
            },
            actualDate: function(){
                this.dataActual =  Date.now()
            },
            insertRestaurant: function(){
                var urlInsRest ='admin/service/restaurant';
                axios.post(urlInsRest,{
                    day_hour: this.dayHourServ,
                    quantity: this.quantityServ
                }).then(response=>{
                    this.showResult = true;

                    toastr.success("jeje");
                })
                // this.pruebaOrder=response.data;
            },
            insertAlarm: function(){
                var urlInsAlarm ='admin/service/alarm';
                axios.post(urlInsAlarm,{
                    day_hour: this.dayHourServ

                }).then(response=>{
                    this.showResult = true;
                    toastr.success("adios");
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
                return this.events.filter((event) => event.name.includes(this.eventSelected));
            },

        },
        components: {
            'tiny-slider': VueTinySlider,
            // 'serviceshome': serviceshome
        }
    });

//----------- END JS APP ------------------



