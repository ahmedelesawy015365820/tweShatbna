<template>
    <loader v-if="loading" />
    <div class="header">

        <!-- Logo -->
        <div class="header-left">
            <a href="index.html" class="logo">
                <img src="/web/img/logo.png" class="big" alt="Logo">
            </a>
            <a href="index.html" class="logo logo-small">
                <img src="/web/img/logo.png" alt="Logo" width="30" height="30">
            </a>
            <!-- Sidebar Toggle -->
            <a href="javascript:void(0);" id="toggle_btn">
                <i class="feather-chevrons-left"></i>
            </a>
            <!-- /Sidebar Toggle -->

            <!-- Mobile Menu Toggle -->
            <a class="mobile_btn" id="mobile_btn">
                <i class="feather-chevrons-left"></i>
            </a>
            <!-- /Mobile Menu Toggle -->
        </div>
        <!-- /Logo -->

        <!-- Search -->
        <div class="top-nav-search">
            <form>
                <input type="text" class="form-control" placeholder="Start typing your Search...">
                <button class="btn" type="submit"><i class="feather-search"></i></button>
            </form>
        </div>
        <!-- /Search -->

        <!-- Header Menu -->
        <ul class="nav user-menu">

            <!-- Notifications -->
            <Notification />
            <!-- /Notifications -->

            <!-- lang -->
            <lang />
            <!-- lang -->

            <!-- User Menu -->
            <li class="nav-item dropdown has-arrow main-drop">
                <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                    <span class="user-img">
                        <img src="/admin/img/profiles/avatar-07.jpg" alt="">
                        <span class="status online"></span>
                    </span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"><i data-feather="user" class="me-1"></i> Profile</a>
                    <a class="dropdown-item" href="#"><i data-feather="settings" class="me-1"></i> Settings</a>
                    <a class="dropdown-item" href="#" @click="logout"><i data-feather="log-out" class="me-1"></i> Logout</a>
                </div>
            </li>
            <!-- /User Menu -->

        </ul>
        <!-- /Header Menu -->

    </div>
</template>

<script>
    import lang from './Lang.vue';
    import Notification from './notification.vue';
    import {useStore} from "vuex";
    import {computed,ref,onMounted} from "vue";
    import Cookies from "js-cookie";

export default {
    setup(){
        const store = useStore();
        const userId = ref(0);

        let loading = computed(() => {
            return store.getters['authAdmin/loading'];
        });

        onMounted(() => {
            if (Cookies.get("tokenAdmin")){
                userId.value = JSON.parse(localStorage.getItem("user")).id
            }
        });

        Echo.private(`App.Models.User.1`)
            .notification((notification) => {
                console.log(notification);
            });

        function logout(){
            store.dispatch('authAdmin/logout');
        }

        return {logout,loading,userId};
    },
    components: {
        lang,
        Notification
    }
}
</script>

<style>
.big {
    max-height: 80px !important;
    width: auto;
}
</style>
