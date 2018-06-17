<template>
    <transition name="modal">
        <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">
                    <div class="modal-header">
                        <slot name="header">
                            <p>Compra</p>
                        </slot>
                    </div>
                    <div class="modal-body">
                        <slot name="body">
                            <ul>
                                <li v-for="prod in products">{{prod}}</li>
                            </ul>
                            <p v-for="cant in prod-cant">{{cant}}</p>
                            <h2 v-for="price in prod-prices">{{price}}</h2>
                            <h1>{{precio-total}}</h1>

                        </slot>
                    </div>
                    <div class="modal-footer">
                        <slot name="footer">
                            <button @click="$emit('no-cancel')">No</button>
                            <button @click="$emit('yes-cancel')">Si</button>

                        </slot>
                    </div>

                </div>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        props:['products', 'prodcant', 'prodprices', 'preciototal'],
    }
</script>

<style scoped>

</style>