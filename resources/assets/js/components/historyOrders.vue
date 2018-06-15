<template>
    <transition name="fade">
        <div id="historyContainer">
        <div id="history">
            <div id="historyTitle">
                <button @click="$emit('close')"><i class="fas fa-long-arrow-alt-left"></i></button><h3>History</h3>
            </div>
            <div id="historyContent">
                <!--<p v-for="order in history">{{order.guest_id}}</p>-->

                    <div v-for="order in paginatedData">

                        <div class="historyItem">
                            <div class="historyInfo">
                            <p>{{order.serviceName}}</p>
                            <p class="historyDate">{{formatDate(order.order_date)}}</p>
                            </div>
                            <div class="historyCancel">
                                <form method="POST" action="#" v-on:submit.prevent="deleteOrder(order.service_id, order.id)" accept-charset="UTF-8">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="c8nkxTiFO7LY9dNwy1W2y96J7Wgu9xlEMMYPrWNm">
                                <button type="submit"><i class="far fa-times-circle"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--<li><p>Pedido 2 </p><i class="far fa-times-circle"></i></li>-->
                    <!--<li><p>Pedido 3 </p><i class="far fa-times-circle"></i></li>-->
                    <!--<li><p>Pedido 4 </p><i class="far fa-times-circle"></i></li>-->

            </div>
            <div id="historyPage">
                <button @click="prevPage" class="historyButton">
                    <
                </button>
                <button @click="nextPage" class="historyButton">
                    >
                </button>
            </div>
        </div>

        </div>

    </transition>
</template>

<script>
    import moment from 'moment'
    moment.lang('es')
    export default {

        created: function(){
            this.getHistory();
        },
        data: function(){
            return {
                history: [],
                pageNumber: 0,
                endPage: 0,
            }
        },
        methods: {
            getHistory: function () {
                var urlHistory = 'orderHistory';
                axios.get(urlHistory).then(response=>{
                    this.history = response.data
            });
            },
            nextPage:function(){
                console.log(this.history.length);
                console.log(this.history.length/5);
                if(this.endPage < this.history.length){ this.pageNumber++; }

            },
            prevPage:function(){
                if(this.pageNumber > 0) {
                    this.pageNumber--;
                }
            },
            formatDate:function(d){
                return moment(d).fromNow();
            },
            deleteOrder:function(idServ, idOrder){
                var nameService = "";
                switch (idServ) {
                    case 1:
                        nameService = "restaurant";
                        break;
                    case 2:
                        nameService = "snackdrink";
                        break;
                    case 3:
                        nameService = "spa";
                        break;
                    case 4:
                        nameService = "alarm";
                        break;
                    case 5:
                        nameService = "petcare";
                        break;
                    case 6:
                        nameService = "trip";
                        break;
                    case 7:
                        nameService = "event";
                        break;
                    case 8:
                        nameService = "taxi";
                        break;
                    default:
                        nameService = "";
                }
                if(nameService != ''){
                    var urlDeleteOrder = "/admin/service/"+nameService+"/"+idOrder;

                    axios.delete(urlDeleteOrder).then(response=>{
                        this.getHistory();
                    })
                }
            }
        },
        computed:{
            paginatedData:function(){
                const start = this.pageNumber * 5,
                    end = start + 5;
                this.endPage = end;
                return this.history.slice(start, end);
            }

        },

    }
</script>

<style scoped>

    #historyContainer * {
        /*border:1px solid red;*/

    }
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
    /*#historyList{*/
        /*list-style-type:none;*/
    /*}*/
    /*#historyList > li{*/

        /*padding: 2% 3% 1% 3%;*/
        /*border-bottom:1px solid gray;*/
        /*margin-top:1%;*/
        /*display:flex;*/
        /*justify-content: space-between;*/
    /*}*/
    /*#historyList > li > i {*/
        /*font-size:150%;*/
        /*color:red;*/
    /*}*/
    /*#historyList > li > i:hover {*/

        /*color:black;*/
    /*}*/
    .historyItem{
        border-bottom:1px solid gray;
        padding:2% 5%;
    }
    .historyInfo{
        width:92%;

    }
    .historyCancel{
        width:8%;
        font-size:100%;
        display:flex;
        justiy-content:center;
        align-items:center;
    }
    /*.historyCancel>i{*/
        /*width:100%;*/
        /*height:100%;*/
        /*margin:0px;*/
        /**/
    /*}*/
    .historyItem p{
        margin:0px;
    }
    .historyItem{
        display:flex;
    }
    .historyDate{
        font-size: 70%;
        color:red
    }
    .historyButton{
        margin:0px;
        width:50%;
        border:none;
    }
    #historyPage{
        display:flex;
        justify-content:space-around;
    }
</style>