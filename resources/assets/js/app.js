

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
// Vue.component('modal', {
//     template: '#hola'
// })


    var urlServices = 'services';
    var urlTrips = 'trips';
    var urlChangeStatusRoom= 'changeStatus';
    var urlGetStatusRoom ='seeStatus';



    new Vue({
        el: '#container',
        created: function(){
        this.getServices();
        this.getTrips();
        this.getStatusRoom();
        // this.setPriceTrip();


        },

        data:{
            services:[],
            trips:[],
            window: [false, false, false, false, false, false, false],
            show: false,
            guestOut:true,
            showMenuOut: true,
            tripSelected:"",
            numPersonsTrip:1,
            statusRoom:"",
            showModal:false,


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
            }

        },
        computed:{
            infoTrip: function(){
                return this.trips.filter((trip) => trip.name.includes(this.tripSelected));
            },

        },
        components: {
            'tiny-slider': VueTinySlider
        }
    });

//----------- END JS APP ------------------



