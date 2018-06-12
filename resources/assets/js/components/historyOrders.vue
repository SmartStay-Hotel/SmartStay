<template>
    <transition name="fade">
        <div id="historyContainer">
        <div id="history">
            <div id="historyTitle">
                <button @click="$emit('close')"><i class="fas fa-long-arrow-alt-left"></i></button><h3>History</h3>
            </div>
            <div id="historyContent">
                <!--<p v-for="order in history">{{order.guest_id}}</p>-->
                <ul id="historyList">
                    <li><p>Pedido 1 </p><i class="far fa-times-circle"></i></li>
                    <li><p>Pedido 2 </p><i class="far fa-times-circle"></i></li>
                    <li><p>Pedido 3 </p><i class="far fa-times-circle"></i></li>
                    <li><p>Pedido 4 </p><i class="far fa-times-circle"></i></li>
                    <li><p>Pedido 5 </p><i class="far fa-times-circle"></i></li>
                </ul>
            </div>
            <div id="historyPage">

            </div>
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
    #historyContainer{

        display:flex;
        justify-content:center;
        align-items:center;
        height:70%;
    }
    #history{
        background-color:white;

        width:40%;
        box-shadow: var(--shadows);

    }
    #historyTitle{
        display:flex;
        justify-content: space-between;
        padding:2%;
        background-color: var(--colorSubMenu);
        color:white;
    }
    #historyTitle button{
        padding:0px;
        border:none;
        font-size:150%;
        background-color:transparent;
    }
    #historyTitle button:hover{
        color: var(--colorSecond);
     }
    #historyList{
        list-style-type:none;
    }
    #historyList > li{

        padding: 2% 3% 1% 3%;
        border-bottom:1px solid gray;
        margin-top:1%;
        display:flex;
        justify-content: space-between;
    }
    #historyList > li > i {
        font-size:150%;
        color:red;
    }
    #historyList > li > i:hover {

        color:black;
    }
</style>