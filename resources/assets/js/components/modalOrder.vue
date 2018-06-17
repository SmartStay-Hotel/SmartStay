<template>
    
<transition name="modal">
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container">
                <div class="modal-header">
                    <slot name="header">
                        <button @click="$emit('close')"><i class="fas fa-long-arrow-alt-left"></i></button>
                        <p>{{order.serviceName}}</p>
                    </slot>
                </div>
                <div class="modal-body">
                    <slot name="body">
                        <!-- Restaurant -->
                        <div v-if="order.service_id==1">
                            <p>Date booking: {{order.day_hour}}</p>
                            <p>Quantity of persons: {{order.quantity}}</p>
                            <p>Name of booking: {{order.guest_id}}</p>
                        </div>

                        <!-- Snack and drinks -->
                        <div v-if="order.service_id==2">
                            <p>? Snack and drink</p>
                        </div>

                        <!-- Spa -->
                        <div v-if="order.service_id==3">
                            <p>Treatment: {{order.treatment_type_id}}</p>
                            <p>Booking date: {{order.day_hour}}</p>
                            <p>Price: {{order.price}}</p>
                        </div>

                        <!-- Alarm -->
                        <div v-if="order.service_id==4">
                            <p>Alarm setted: {{order.day_hour}}</p>
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
                            <p>Trip: {{order.trip_type_id}}</p>
                            <p>Number of persons: {{order.people_num}}</p>
                            <p>Price: {{order.price}}</p>
                        </div>

                        <!-- Event -->
                        <div v-if="order.service_id==7">
                            <p>Event: {{order.event_type_id}}</p>
                            <p>Number of persons: {{order.people_num}}</p>
                        </div>

                        <!-- Taxi -->
                        <div v-if="order.service_id==7">
                            <p>Day - hour: {{order.day_hour}}</p>

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
</style>

<style scoped>

</style>