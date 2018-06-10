<template>


            <!-- swiper -->
            <swiper :options="swiperOption">
                <swiper-slide>
                    <serviceshome v-bind:nserv="0" v-bind:servs="[1,1,1,1]"  @return-window="emitShow"></serviceshome>
                </swiper-slide>
                <swiper-slide>Slide 2</swiper-slide>
                <swiper-slide>Slide 3</swiper-slide>
                <swiper-slide>Slide 4</swiper-slide>
                <swiper-slide>Slide 5</swiper-slide>
                <swiper-slide>Slide 6</swiper-slide>
                <swiper-slide>Slide 7</swiper-slide>
                <swiper-slide>Slide 8</swiper-slide>
                <swiper-slide style="border:2px solid green">Slide 9</swiper-slide>
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

        data() {
            return {

                swiperOption: {
                    slidesPerView: 1,
                    spaceBetween: 30,
                    loop: true,
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
    }
    .swiper-slide{

    }



</style>