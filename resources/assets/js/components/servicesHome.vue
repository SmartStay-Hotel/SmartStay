<template>
    <div class="servicesHome">
        <div class="servicesTop">

            <div class="bttnServices col-md-3 col-xs-6" v-if="servs[nserv]" @click="$emit('return-window', nserv)">
                <img v-bind:src="services[nserv].image" alt="">
                <div class="serviceDescription">
                    <div class="textDesc">{{ services[nserv].description }}</div>
                </div>
                <div class="serviceName">
                    <p>{{ services[nserv].name }}</p>
                </div>
            </div>

            <div class="bttnServices col-md-3 col-xs-6" v-if="servs[nserv+1]" @click="$emit('return-window', nserv+1)">
                <img v-bind:src="services[nserv+1].image" alt="">
                <div class="serviceDescription">
                    <div class="textDesc">{{ services[nserv+1].description }}</div>
                </div>
                <div class="serviceName">
                    <p>{{ services[nserv+1].name }}</p>
                </div>
            </div>
        </div>

        <div class="servicesBottom">
            <div class="bttnServices col-md-3 col-xs-6" v-if="servs[nserv+2]" @click="$emit('return-window', nserv+2)">
                <img v-bind:src="services[nserv+2].image" alt="">
                <div class="serviceDescription">
                    <div class="textDesc">{{ services[nserv+2].description }}</div>

                </div>
                <div class="serviceName">
                    <p>{{ services[nserv+2].name }}</p>
                </div>
            </div>
            <div class="bttnServices col-md-3 col-xs-6" v-if="servs[nserv+3]" @click="$emit('return-window', nserv+3)">
                <img v-bind:src="services[nserv].image" alt="">
                <div class="serviceDescription">
                    <div class="textDesc">{{ services[nserv+3].description }}</div>
                </div>
                <div class="serviceName">
                    <p>{{ services[nserv+3].name }}</p>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

    export default {
        props:['nserv','servs'],
        created: function(){
            this.getServices();

        },
        data: function(){
            return {
                services:[],

            }
        },
        methods: {
            getServices: function(){
                var urlServices = 'services';
                axios.get(urlServices).then(response=>{
                    this.services = response.data
            });

            },
            // showWindow: function (num) {
            //     this.show = !this.show
            //     this.window[num] = !this.window[num]
            // }
        }
        // name: "services-home"
    }
</script>

<style scoped>

</style>
