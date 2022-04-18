<template>
    <!-- Header -->
    <header class="header">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
                </a>
                <a href="index.html" class="navbar-brand logo">
                    <img src="/web/img/logo.png" class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="index.html" class="menu-logo">
                        <img src="/web/img/logo.png" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="javascript:void(0);">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
                <ul class="main-nav">
                    <li :class="[$route.name == 'home' ? 'active' : '']">
                        <router-link :to="{name:'home',params: {lang:this.$i18n.locale}}">Home</router-link>
                    </li>
                    <li class="">
                        <a href="index.html">Companies</a>
                    </li>
                    <li class="">
                        <a href="index.html">Designers</a>
                    </li>
                    <li class="">
                        <a href="index.html">sizing service</a>
                    </li>
                    <li class="">
                        <a href="index.html">Bargain</a>
                    </li>
                </ul>
            </div>
            <ul class="nav header-navbar-rht">
                <li v-if="token">
                    <router-link :to="{name:role,params: {lang:this.$i18n.locale}}" class="partner">
                        Ahmed Mohamed
                    </router-link>
                </li>
                <li v-if="!token">
                    <router-link :to="{name:'partners',params: {lang:this.$i18n.locale}}" class="partner">
                        Success Partners
                    </router-link>
                </li>
                <li v-if="!token">
                    <router-link :to="{name:'registerPartiner',params: {lang:this.$i18n.locale}}" class="reg-btn custom">
                        <i class="fas fa-user"></i> Register
                    </router-link>
                </li>
                <li v-if="!token">
                    <router-link :to="{name:'loginPartiner',params: {lang:this.$i18n.locale}}" class="log-btn custom">
                        <i class="fas fa-lock"></i>
                        Login
                    </router-link >
                </li>
                <lang  />
                <li><a href="post-project.html" class="login-btn">Post a Project</a></li>
            </ul>
        </nav>
    </header>
    <!-- /Header -->
</template>

<script>
import lang from './LangWeb.vue';
import {useStore} from 'vuex';
import {computed} from 'vue';

export default {
    name: "layout-header",
    components:{
        lang
    },
    data(){
        return {
        }
    },
    setup(){

        const store = useStore();
        const token = computed(() => store.getters['auth/token']);
        const role = computed(() => store.getters['auth/roles'].split(',')[0]);
        return {token,role};
    }
}
</script>

<style scoped>
    .header{
        background-color: #fff;
    }

    .logo{
        width: 140px;
    }
    .main-nav li a{
        font-size: 15px !important;
    }
    .main-nav li a:hover{
        color: #fcb00c;
    }
    .main-nav > li.active > a{
        color: #fcb00c;
    }
    .main-nav > li.active > a::after {
    background: #fcb00c;
    }

    .header-navbar-rht .reg-btn:hover {
        color: #fcb00c !important;
    }
    .header-navbar-rht .login-btn {
    background-color: #fcb00c;
    border-color: #fcb00c;
    padding: 10px 10px;
    font-size: 12px;
    box-shadow: none;
    }
    .header-navbar-rht .custom{
            font-size: 13px !important;
    }

    .header-navbar-rht .partner{
        color: #fcb00c;
        padding: 10px 10px;
        font-size: 12px;
        box-shadow: none;
        border: 1px solid #fcb00c;
        border-radius: 50px;
    }
    .header-navbar-rht .partner:hover{
       background-color: #fcb00c !important;
       color: #fff !important;
    }
</style>
