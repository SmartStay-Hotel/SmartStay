<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <div class="modal-header">
                        <slot name="header">
                            <div class="housekeepingTitle">
                            <button class="closeHousekeeping" @click="$emit('close')"><i class="fas fa-long-arrow-alt-left"></i></button>
                            <h3>Housekeeping</h3>
                            </div>
                        </slot>
                    </div>
                    <div class="modal-body">
                        <slot name="body">
                            <div class="menuOut"><input type="checkbox"  name="bedSheets"  value="1" v-model="bedSheets"> Bed Sheets</div>
                            <div class="menuOut"><input type="checkbox"  name="cleaning"  value="1" v-model="cleaning"> Cleaning </div>
                            <div class="menuOut"><input type="checkbox"  name="minibar"  value="1" v-model="minibar"> Minibar</div>
                            <div class="menuOut"><input type="checkbox"  name="blanket"  value="1" v-model="blanket"> Blanket</div>
                            <div class="menuOut"><input type="checkbox"  name="toiletries" value="1" v-model="toiletries"> Toiletries</div>
                            <div class="menuOut"><input type="checkbox"  name="pillow"  value="1" v-model="pillow"> Pillow</div>
                        </slot>
                    </div>

                    <div class="modal-footer">
                        <slot name="footer">

                            <button class="modal-default-button" @click="insertHousekeeping" v-if="this.bedSheets || this.cleaning || this.minibar || this.blanket || this.toiletries || this.pillow">
                                Send
                            </button>
                        </slot>
                    </div>
                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        data: function(){
            return {
            bedSheets :false,
            cleaning :false,
            minibar :false,
            blanket :false,
            toiletries :false,
            pillow :false,
                errores:'',
            }
        },

        methods:{
            insertHousekeeping:function(){
                var urlInsHousekeeping ='admin/service/housekeeping';


                axios.post(urlInsHousekeeping,{
                    bed_sheets:this.bedSheets,
                    cleaning:this.cleaning,
                    minibar:this.minibar,
                    blanket:this.blanket,
                    toiletries:this.toiletries,
                    pillow:this.pillow



                }).then(response=>{
                    this.showResult = true;
                toastr.success("adios");
                console.log("correcto houseeee");
            }).catch(error=>{

                    toastr.success("sdfsadf");
                this.errores = error.response.data;
                console.log("noot houseee no");

            })
                    // this.bedSheets ='',
                    // this.cleaning ='',
                    // this.minibar ='',
                    // this.blanket ='',
                    // this.toiletries ='',
                    // this.pillow ='',
                this.$emit('close');
            }

        },
    }
</script>

<style scoped>
    .modal-mask {
        position: fixed;
        z-index: 9998;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, .5);
        display: table;
        transition: opacity .3s ease;
        padding:0px;
    }

    .modal-wrapper {
        display: table-cell;
        vertical-align: middle;
        padding:0px;
    }

    .modal-container {
        width: 20%;
        min-width:200px;
        margin: 0px auto;
        /*padding: 20px 30px;*/
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
        transition: all .3s ease;
        font-family: Helvetica, Arial, sans-serif;
    }

    /*.modal-header h3 {*/
        /*margin-top: 0;*/
        /*color: #42b983;*/
    /*}*/
    .modal-header{
        background-color: var(--colorSubMenu);
        color:white;
    }
/*.modal-header, .model-body{*/
    /*border-bottom:none;*/
/*}*/
    .modal-body {
        /*margin: 20px 0;*/
    }

    .modal-default-button {
        float: right;
    }

    /*
     * The following styles are auto-applied to elements with
     * transition="modal" when their visibility is toggled
     * by Vue.js.
     *
     * You can easily play with the modal transition by editing
     * these styles.
     */

    .modal-enter {
        opacity: 0;
    }

    .modal-leave-active {
        opacity: 0;
    }

    .modal-enter .modal-container,
    .modal-leave-active .modal-container {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }
    .closeHousekeeping{
        border:none;
        color:white;
        background-color:transparent;
    }
    .housekeepingTitle{
        display:flex;
        justify-content:space-between;
    }
</style>