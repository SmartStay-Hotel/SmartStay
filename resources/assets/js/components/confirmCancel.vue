<template>

    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <div class="modal-header">
                        <slot name="header">
                            <p>{{trans-cancel[0]}}</p>
                        </slot>
                    </div>
                    <div class="modal-body">
                        <slot name="body">
                            <div class="bttnsCancel">
                            <button class="cancelBttn" @click="$emit('no-cancel')">{{trans-cancel[1]}}</button>
                            <button class="cancelBttn" @click="$emit('yes-cancel')">{{trans-cancel[2]}}</button>
                            </div>
                        </slot>
                    </div>

                </div>
            </div>
        </div>
    </transition>
</template>


<script>
    export default {
        props:['trans-cancel'],
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
        width: 30%;
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
    .bttnsCancel{
        display:flex;
        justify-content:flex-end;
    }
    .cancelBttn{
        border:none;
        /*float:right;*/
        width:20%;
        margin-left:2px;

    }
</style>

<style scoped>

</style>