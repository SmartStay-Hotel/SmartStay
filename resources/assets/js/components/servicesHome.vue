<template>
    <div class="servicesHome">
        <div class="servicesTop">

            <div class="bttnServices col-md-4 col-sm-4 col-xs-6 col-lg-5 col-xl-3" v-if="servs[nserv]" @click="$emit('return-window', nserv)">
                <img v-bind:src="services[nserv].image" alt="">
                <div class="serviceDescription">
                    <div class="textDesc">{{ services[nserv].description }}</div>
                </div>
                <div class="serviceName">
                    <p>{{ services[nserv].name }}</p>
                </div>
            </div>

            <div class="bttnServices col-md-4 col-sm-4 col-xs-6 col-lg-5 col-xl-3" v-if="servs[nserv+1]" @click="$emit('return-window', nserv+1)">
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
            <div class="bttnServices col-md-4 col-sm-4 col-xs-6 col-lg-5 col-xl-3" v-if="servs[nserv+2]" @click="$emit('return-window', 5)">
                <img v-bind:src="services[nserv+2].image" alt="">
                <div class="serviceDescription">
                    <div class="textDesc">{{ services[nserv+2].description }}</div>

                </div>
                <div class="serviceName">
                    <p>{{ services[nserv+2].name }}</p>
                </div>
            </div>
            <div class="bttnServices col-md-4 col-sm-4 col-xs-6 col-lg-5 col-xl-3" v-if="servs[nserv+3]" @click="$emit('return-window', nserv+3)">
                <img v-bind:src="services[nserv+3].image" alt="">
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
        props:['nserv','servs', 'services'],
        // created: function(){
        //     this.getServices();
        //
        // },
        data: function(){
            return {
                // services:[],

            }
        },
        // methods: {
        //     getServices: function(){
        //         var urlServices = 'services';
        //         axios.get(urlServices).then(response=>{
        //             this.services = response.data
        //     });
        //
        //     },
        //     // showWindow: function (num) {
        //     //     this.show = !this.show
        //     //     this.window[num] = !this.window[num]
        //     // }
        // }
        // name: "services-home"
    }
</script>

<style scoped>
    .servicesHome {

        /*display:flex;*/
        /*align-items: center;*/

        /*display:flex;*/
        /*flex-direction: column;*/
        /*justify-content: space-around;*/
        text-align:center;
    }


    .servicesTop, .servicesBottom {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .bttnServices {
        background-color: var(--colorSubMenu);
        padding: 0px;
        margin-bottom: 1%;
        margin-right: 1%;
        color: white;
        box-shadow: var(--shadows);
    }

    .bttnServices img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .serviceDescription {
        position: absolute;
        bottom: 100%;
        left: 0;
        right: 0;
        background-color: rgba(255, 255, 255, 0.8);
        overflow: hidden;
        width: 100%;
        height: 0;
        transition: .5s ease;

    }

    .bttnServices:hover .serviceDescription {
        bottom: 0;
        height: 100%;
    }

    .textDesc {
        /*white-space: nowrap;*/
        color: black;
        font-size: 90%;
        position: absolute;
        overflow: hidden;
        top: 50%;
        width: 100%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
    }

</style>
