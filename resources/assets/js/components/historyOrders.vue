<template>
    <transition name="fade">
        <div id="historyContainer">
            <div id="history" >
                <div id="historyTitle">
                    <button @click="$emit('close')"><i class="fas fa-long-arrow-alt-left" style="color:white"></i></button><h3>{{transhistory[0]}}</h3>
                </div>
                <div id="historyContent">
                    <!--<p v-for="order in history">{{order.guest_id}}</p>-->

                    <div v-for="order in paginatedData">

                        <div class="historyItem" >
                            <div class="historyInfo" v-on:click="showInfoOrder(order.service_id, order.id)">

                                <p style="font-weight: bolder" v-if="order.service_id==2">{{transhistory[4]}}</p>
                                <p style="font-weight: bolder" v-else>{{order.serviceName}}</p>
                                <div class="historySubInfo">
                                    <p class="historyDate">{{formatDate(order.created_at)}}</p>
                                    <p v-if="order.status==1" style="margin-left:3%">{{transhistory[1]}}</p>
                                    <p v-if="order.status==2" style="color:green; margin-left:3%">{{transhistory[2]}}</p>
                                </div>
                            </div>
                            <div class="historyCancel" v-if="order.status==0">
                                <button type="submit" @click="showConfirmCancel(order.service_id, order.id)"><i class="far fa-times-circle"></i></button>

                            </div>
                            <!--<h2>{{infoServID[order.service_id]}} // {{infoOrderID[order.id]}}</h2>-->
                        </div>
                        <div v-if="showInfo && infoServID == order.service_id && infoOrderID == order.id">
                            <orderinfo v-bind:order="order" v-bind:transorder="transorder" @close="showInfo = false"></orderinfo>
                        </div>
                        <div v-if="confirmCancelOrder && infoServID == order.service_id && infoOrderID == order.id">
                            <confirmcancel v-bind:transcancel="transcancel" @yes-cancel="deleteOrder(order.service_id, order.id)" @no-cancel="confirmCancelOrder=false"></confirmcancel>
                        </div>

                    </div>
                    <!--<li><p>Pedido 2 </p><i class="far fa-times-circle"></i></li>-->
                    <!--<li><p>Pedido 3 </p><i class="far fa-times-circle"></i></li>-->
                    <!--<li><p>Pedido 4 </p><i class="far fa-times-circle"></i></li>-->

                </div>
                <div id="historyPage" v-if="paginatedData.length>5">
                    <button @click="prevPage" class="historyButton">
                        <i class="fas fa-caret-left"></i>
                    </button>
                    <button @click="nextPage" class="historyButton">
                        <i class="fas fa-caret-right"></i>
                    </button>
                </div>
            </div>
            <!--{{$data}}-->
        </div>

    </transition>
</template>

<script>
    import orderinfo from './modalOrder'
    import confirmcancel from './confirmCancel'
    import moment from 'moment'
    moment.lang('en')
    export default {
        props:['transhistory', 'transorder','transcancel'],
        created: function(){
            this.getHistory();
        },
        data: function(){
            return {
                history: [],
                pageNumber: 0,
                endPage: 0,
                showInfo:false,
                infoServID:0,
                infoOrderID:0,
                num:0,
                confirmCancelOrder:false,
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
            showInfoOrder:function(servid, ordid){
                this.showInfo = true,
                    this.infoServID=servid,
                    this.infoOrderID=ordid
            },
            showConfirmCancel:function(servid, ordid){
                console.log("shooow confirm");
                this.confirmCancelOrder = true,
                    this.infoServID=servid,
                    this.infoOrderID=ordid
            },
            // closeInfoOrder:function(servid, ordid){
            //     this.infoServID[servid]=false,
            //     this.infoOrderID[ordid]=false
            // },
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
                    case 9:
                        nameService = "housekeeping";
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
                this.confirmCancelOrder = false
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
        components:{
            orderinfo,
            confirmcancel
        }

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

        width:50%;
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
        border-bottom:1px solid var(--colorBody);
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
    .historyCancel button{
        background: transparent;
        border:none;
    }
    .historyCancel:hover{
        color:red;
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
    .historyItem:hover{
        background-color:var(--colorBody);
        cursor:pointer;
    }

    .historyButton{
        margin:0px;
        width:50%;
        border:none;
        background-color:var(--colorNav)
    }
    #historyPage{
        display:flex;
        justify-content:space-around;

    }
    .historySubInfo{
        font-size:75%;
        display:flex;
    }

    @media (max-width: 450px) {
        #history {
            width: 100%;
        }
    }

</style>