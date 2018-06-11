<template>

    <!--nserv: Es el número por el que se empieza a contar, por cada containerServices se suma 4.-->
    <!--servs: Es un array. Con 1 se indica que ese servicio esta activo y se puede mostrar, con 0 lo contrario-->


    <!-- swiper -->
            <swiper :options="swiperOption">
                <swiper-slide>
                    <serviceshome v-bind:nserv="0" v-bind:servs="[1,1,1,1]" v-bind:services="services"  @return-window="emitShow"></serviceshome>
                </swiper-slide>
                <swiper-slide>
                    <serviceshome v-bind:nserv="4" v-bind:servs="[1,1,1,0]" v-bind:services="services" @return-window="emitShow"></serviceshome>
                </swiper-slide>

                <div class="swiper-pagination" slot="pagination"></div>
                <div class="swiper-button-prev" slot="button-prev"></div>
                <div class="swiper-button-next" slot="button-next"></div>
            </swiper>


</template>

<script>

    import serviceshome from './servicesHome';
    import { swiper, swiperSlide } from 'vue-awesome-swiper';
    export default {
        // name: 'carrousel',
        props:['services'],
        data() {
            return {

                swiperOption: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: false,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                }
            }
        },
        computed: {
            swiper() {
                return this.$refs.mySwiper.swiper
            }
        },
        methods:{
            emitShow:function(num){
                this.$emit('window-to-show', num);
                console.log("windoooow to show"+ num);
            }
        },

        // mounted() {
        //     // current swiper instance
        //     // 然后你就可以使用当前上下文内的swiper对象去做你想做的事了
        //     console.log('this is current swiper instance object', this.swiper)
        //     this.swiper.slideTo(3, 1000, false)
        // },
        components: {
            swiper,
            swiperSlide,
            serviceshome
        }
    }
</script>
<style scoped>

    .swiper-container {
        width: 100%;
        height: 70%;
        display:flex;


    }
    .swiper-slide{
        display:flex;
        align-items:center;
    }

    .swiper-button-prev, .swiper-button-next {
    width:10%;
    }
    /*.swiper-button-prev:hover, .swiper-button-next:hover{*/
    /*background-color:rgba(0,0,0,0.1);*/
    /*}*/


    @media (max-width: 545px) {
        .swiper-button-prev, .swiper-button-next {
            top:10%;
            background-color:white;
            width:50%;
        }
    }





</style>