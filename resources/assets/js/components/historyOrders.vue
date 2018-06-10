<template>
    <transition name="fade">
        <div id="history">
            <div id="historyTitle">
                <p>hola</p> <p @click="$emit('close')">x</p>
            </div>
            <div id="historyContent">
                <p v-for="order in history">{{order.guest_id}}</p>
            </div>
            <div id="historyPage">

            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        created: function(){
            this.getHistory();
        },
        data: function(){
            return {
                history: [],

            }
        },
        methods: {
            getHistory: function () {
                var urlHistory = 'orderListRestaurant';
                axios.get(urlHistory).then(response=>{
                    this.history = response.data
            });
            }
        }
    }
</script>

<style scoped>

</style>