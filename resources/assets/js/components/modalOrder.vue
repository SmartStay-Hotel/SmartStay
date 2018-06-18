<template>
    
<transition name="modal">
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container">
                <div class="modal-header">
                    <slot name="header">
                        <div class="modalOrderTitle">
                        <button class="bttnBackOrder" @click="$emit('close')"><i class="fas fa-long-arrow-alt-left"></i></button>
                        <h3 v-if="order.service_id==2"> {{transorder[23]}}</h3>
                        <h3 v-else>{{order.serviceName}}</h3>
                        </div>
                    </slot>
                </div>
                <div class="modal-body">
                    <slot name="body">
                        <!-- Restaurant -->
                        <div v-if="order.service_id==1">
                            <p><strong>{{transorder[0]}} </strong> {{order.day_hour}}</p>
                            <p><strong>{{transorder[1]}} </strong> {{order.quantity}}</p>
                            <p><strong>{{transorder[2]}} </strong>{{order.guest_id}}</p>
                        </div>

                        <!-- Snack and drinks -->
                        <div v-if="order.service_id==2">
                            <p><strong>{{transorder[3]}} </strong>{{order.snackTypeName}}</p>
                            <p><strong>{{transorder[4]}}</strong>{{order.quantity}}</p>
                            <p><strong>{{transorder[5]}} </strong>{{order.price}}</p>
                        </div>

                        <!-- Spa -->
                        <div v-if="order.service_id==3">
                            <p><strong>{{transorder[6]}}</strong> {{order.spaTypeName}}</p>
                            <p><strong>{{transorder[7]}}</strong> {{order.day_hour}}</p>
                            <p><strong>{{transorder[8]}} </strong>{{order.price}}</p>
                        </div>

                        <!-- Alarm -->
                        <div v-if="order.service_id==4">
                            <p><strong>{{transorder[9]}}</strong> {{order.day_hour}}</p>
                        </div>

                        <!-- Pet care -->
                        <div v-if="order.service_id==5">
                            <p v-if="order.water"> {{transorder[10]}}</p>
                            <p v-if="order.standard_food"> {{transorder[11]}}</p>
                            <p v-if="order.premium_food"> {{transorder[12]}}</p>
                            <p v-if="order.snacks"> {{transorder[13]}}</p>
                        </div>

                        <!-- Trip -->
                        <div v-if="order.service_id==6">
                            <p><strong>{{transorder[14]}}</strong> {{order.tripTypeName}</p>
                            <p><strong>{{transorder[1]}}</strong> {{order.people_num}}</p>
                            <p><strong>{{transorder[5]}} </strong>{{order.price}}</p>
                        </div>

                        <!-- Event -->
                        <div v-if="order.service_id==7">
                            <p><strong>{{transorder[15]}}</strong> {{order.eventTypeName}}</p>
                            <p><strong>{{transorder[1]}}</strong> {{order.people_num}}</p>
                        </div>

                        <!-- Taxi -->
                        <div v-if="order.service_id==8">
                            <p><strong>{{transorder[16]}} </strong>{{order.day_hour}}</p>

                        </div>
                        <!-- Housekeeping -->
                        <div v-if="order.service_id==9">
                            <p v-if="order.bed_sheets"> {{transorder[17]}}</p>
                            <p v-if="order.cleaning"> {{transorder[18]}}</p>
                            <p v-if="order.minibar"> {{transorder[19]}}</p>
                            <p v-if="order.blanket"> {{transorder[20]}}</p>
                            <p v-if="order.toiletries"> {{transorder[21]}}</p>
                            <p v-if="order.pillow"> {{transorder[22]}}</p>
                        </div>

                    </slot>
                </div>

                <div class="modal-footer">
                    <slot name="footer">


                    </slot>
                </div>
            </div>
        </div>
    </div>
</transition>
</template>


<script>
    export default {
        props:['order','transorder'],
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

    .bttnBackOrder{
        border:none;
        color:white;
        background-color:transparent;
    }
    .modalOrderTitle{
        display:flex;
        justify-content:space-between;
    }
</style>

<style scoped>

</style>