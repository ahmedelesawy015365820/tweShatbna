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
    export default {
        mounted() {
            console.log('web.')
        },
        data(){
            return {
                link : ['partners']
            }
        }
    }
</script>
