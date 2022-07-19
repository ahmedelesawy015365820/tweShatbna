<template>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Start Navigation -->

        <!-- Header -->
        <layout-header v-if="!link.includes($route.name)" />
        <!-- /Header -->

        <router-view v-slot="{ Component }">
            <transition name="fade" mode="out-in">
                <component :is="Component" />
            </transition>
        </router-view>

        <!-- Footer -->
        <layout-footer />
        <!-- /Footer -->
    </div>
    <!-- /Main Wrapper -->
</template>

<style>
.fade-enter-from,
.fade-leave-to {
    transform: translateX(30px);
    opacity: 0;
}

.fade-enter-active,
.fade-leave-active {
    transition: all .7s ease-in-out;
}
</style>

<script>
import webApi from "./api/webAxios";

    export default {
        mounted() {
            console.log('web.')
            webApi.post("/v1/web/get_cart")
            .then((result) => {
               localStorage.setItem('cart',JSON.stringify(result.data.cart))
            })
        },
        data(){
            return {
                link : ['partners'],
            }
        },
    }
</script>
