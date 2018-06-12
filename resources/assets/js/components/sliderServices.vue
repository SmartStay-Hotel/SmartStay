<template>
    <!-- Make a frame wrapped slider -->

    <div style="width:100%; height:70%; display:flex;position:absolute">
        <p>{{services[2].name}}</p>
        <!-- Configuring slider components -->
        <button @click="slidePre()" style="width:10%;"> < </button>

        <slider ref="slider" :pages="pages" :sliderinit="sliderinit" @slide='slide' @tap='onTap' @init='onInit'>


        </slider>
        <button @click="slideNext()" style="width:10%;"> > </button>

    </div>

</template>
<script>
    import slider from 'vue-concise-slider'// import slider components

    export default {
        props:['services'],

        data:function(){
            return {

                services:[],
                num: 0,
                pages:[
                    {
                        html: '<div class="buttonService"><p></p></div>',
                        style: {

                        }
                    },
                    {
                        html: '',
                        style: {
                            'background': '#4bbfc3'
                        }
                    },
                    {
                        html: '<div class="slider3">slider3</div>',
                        style: {
                            'background': '#7baabe'
                        }
                    }
                ],
                //Sliding configuration [obj]
                sliderinit: {
                    effect:'slide',
                    currentPage:this.onPage,
                    loop:true,

                }
            }
        },
        components: {
            slider,


        },
        methods: {

            // Listener event
            slideNext () {
                this.$refs.slider.$emit('slideNext');
            },
            slidePre () {
                this.$refs.slider.$emit('slidePre');
            }
        }
    }
</script>