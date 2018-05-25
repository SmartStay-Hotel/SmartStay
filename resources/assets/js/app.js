

/* ----------------------- REQUIRES ----------------------------------*/
console.log("jejejeje");
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




    function nextPass(num){
        document.getElementsByClassName("pass")[num + 1].focus();
    }

    /*------------- DASHBOARD GUEST ------------------*/
// require('./bootstrap');
//
// import Vue from 'vue';



    var urlServices = 'services';

    new Vue({
        el: '#main_container',
        created: function(){
        this.getServices();
        },
        data:{
            services:[]
        },
        methods:{
            getServices: function(){
                axios.get(urlServices).then(response=>{
                    this.services = response.data
                });
            }
        }
    });

//----------- END JS APP ------------------



