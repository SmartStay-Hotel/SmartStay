<template>
    
<transition name="modal">
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container">
                <div class="modal-header">
                    <slot name="header">
                        <div class="modalOrderTitle">
                        <button class="bttnBackOrder" @click="$emit('close')"><i class="fas fa-long-arrow-alt-left"></i></button>
                        <h3 v-if="order.service_id==2"> Snacks and drinks</h3>
                        <h3 v-else>{{order.serviceName}}</h3>
                        </div>
                    </slot>
                </div>
                <div class="modal-body">
                    <slot name="body">
                        <!-- Restaurant -->
                        <div v-if="order.service_id==1">
                            <p><strong>Date booking: </strong> {{order.day_hour}}</p>
                            <p><strong>Quantity of persons: </strong> {{order.quantity}}</p>
                            <p><strong>Name of booking: </strong>{{order.guest_id}}</p>
                        </div>

                        <!-- Snack and drinks -->
                        <div v-if="order.service_id==2">
                            <p><strong>Product: </strong>{{order.snackTypeName}}</p>
                            <p><strong>Quantity: </strong>{{order.quantity}}</p>
                            <p><strong>Price: </strong>{{order.price}}</p>
                        </div>

                        <!-- Spa -->
                        <div v-if="order.service_id==3">
                            <p><strong>Treatment:</strong> {{order.spaTypeName}}</p>
                            <p><strong>Booking date:</strong> {{order.day_hour}}</p>
                            <p><strong>Price: </strong>{{order.price}}</p>
                        </div>

                        <!-- Alarm -->
                        <div v-if="order.service_id==4">
                            <p><strong>Alarm setted:</strong> {{order.day_hour}}</p>
                        </div>

                        <!-- Pet care -->
                        <div v-if="order.service_id==5">
                            <p v-if="order.water"> Water</p>
                            <p v-if="order.standard_food"> Standard food</p>
                            <p v-if="order.premium_food"> Premium food</p>
                            <p v-if="order.snacks"> Snacks</p>
                        </div>

                        <!-- Trip -->
                        <div v-if="order.service_id==6">
                            <p><strong>Trip:</strong> {{order.tripTypeName}</p>
                            <p><strong>Number of persons:</strong> {{order.people_num}}</p>
                            <p><strong>Price: </strong>{{order.price}}</p>
                        </div>

                        <!-- Event -->
                        <div v-if="order.service_id==7">
                            <p><strong>Event:</strong> {{order.eventTypeName}}</p>
                            <p><strong>Number of persons:</strong> {{order.people_num}}</p>
                        </div>

                        <!-- Taxi -->
                        <div v-if="order.service_id==8">
                            <p><strong>Day - hour: </strong>{{order.day_hour}}</p>

                        </div>
                        <!-- Housekeeping -->
                        <div v-if="order.service_id==9">
                            <p v-if="order.bed_sheets"> Bed sheets</p>
                            <p v-if="order.cleaning"> Cleaning </p>
                            <p v-if="order.minibar"> Minibar</p>
                            <p v-if="order.blanket"> Blanket</p>
                            <p v-if="order.toiletries"> Toiletries</p>
                            <p v-if="order.pillow"> Pillow</p>
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
        props:['order'],
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