<template>
    <div class="servicesHome">
        <div class="servicesTop">

            <div class="bttnServices col-md-3 col-xs-6" v-if="servs[0]" v-on:click="showWindow(0)">
                <img v-bind:src="services[nserv].image" alt="">
                <div class="serviceDescription">
                    <div class="textDesc">{{ services[nserv].description }}</div>
                </div>
                <div class="serviceName">
                    <p>{{ services[nserv].name }}</p>
                </div>
            </div>

            <div class="bttnServices col-md-3 col-xs-6" v-if="servs[1]" @click="showWindow(1)">
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
            <div class="bttnServices col-md-3 col-xs-6" v-if="servs[2]" @click="showWindow(2)">
                <img v-bind:src="services[nserv+2].image" alt="">
                <div class="serviceDescription">
                    <div class="textDesc">{{ services[nserv+2].description }}</div>

                </div>
                <div class="serviceName">
                    <p>{{ services[nserv+2].name }}</p>
                </div>
            </div>
            <div class="bttnServices col-md-3 col-xs-6" v-if="servs[3]" @click="showWindow(3)">
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
        props:['nserv','servs','services'],
        data: function(){
            return {
                window: [false, false, false, false, false, false, false],
                show: false,
            }
        },
        methods: {
            showWindow: function (num) {
                this.show = !this.show
                this.window[num] = !this.window[num]
            }
        }
        // name: "services-home"
    }
</script>

<style scoped>

</style>

