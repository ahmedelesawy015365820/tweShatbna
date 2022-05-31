<template>
       <!-- Page Content -->
        <div class="content">
            <loader v-if="loading" />

            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">

                        <!-- Login Content -->
                        <div class="account-content">
                            <div class="align-items-center justify-content-center">
                                <div class="login-right">
                                    <div class="login-header text-center">
                                       <img src="/web/img/logo.png" alt="logo" class="img-fluid">
                                        <h3>{{$t('register.welcome')}}</h3>
                                        <p>{{$t('register.miss')}}</p>
                                    </div>
                                    <nav class="user-tabs mb-4">
                                        <ul role="tablist" class="nav nav-pills nav-justified">
                                            <li class="nav-item">
                                                <a href="#client" data-bs-toggle="tab"  :class="['nav-link','active']">{{$t('register.client')}}</a>
                                            </li>
                                            <li :class="['nav-item','stop-margin',$i18n.locale == 'ar'?'tab-ar' : 'tab-en']">
                                                <a href="#success-partiner" data-bs-toggle="tab" :class="['nav-link']">{{$t('header.partner')}}</a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <div class="alert alert-danger text-center" v-if="errors.message">
                                        {{errors.message}}
                                    </div>
                                    <div class="tab-content pt-0">
                                        <div role="tabpanel" id="client" :class="['tab-pane','fade active show']">
                                            <form @submit.prevent='Loginsubmit'>
                                                <div class="form-group form-focus">
                                                    <input type="text" v-model.trim="data.email" class="form-control floating">
                                                    <label class="focus-label">{{$t('register.emailPhone')}}</label>
                                                </div>
                                                <div class="form-group form-focus">
                                                    <input type="password" v-model.trim="data.password" class="form-control floating">
                                                    <label class="focus-label">{{$t('register.password')}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="custom_check">
                                                        <input type="checkbox" v-model="data.remmeber_me">
                                                        <span class="checkmark"></span> {{$t('register.remember')}}
                                                    </label>
                                                </div>
                                                <button class="btn btn-color btn-primary btn-block btn-lg login-btn text-center" type="submit">{{$t('register.login')}}</button>
                                                <div class="login-or">
                                                    <p>Or login with</p>
                                                </div>
                                                <div class="row justify-content-center social-login">
                                                    <div class="col-6 google">
                                                        <a href="#" @click="authSocial('google')" class="btn btn-google btn-block text-center">Google</a>
                                                    </div>
                                                </div>
                                                <div class="row form-row forget-login">
                                                    <div :class="['col-6','text-start','click-forget', this.$i18n.locale == 'ar'? 'forget-register' : '']">
                                                        <router-link  :to="{name:'forgetPassword',params: {lang:this.$i18n.locale}}">{{$t('register.forget')}}</router-link>
                                                    </div>
                                                    <div :class="['col-6','text-end','click',this.$i18n.locale == 'ar'?'login-register': '']">{{$t('register.new')}}
                                                        <router-link  :to="{name:'registerPartiner',params: {lang:this.$i18n.locale}}">{{$t('register.click')}}</router-link>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div role="tabpanel" id="success-partiner" :class="['tab-pane','fade']">
                                            <form @submit.prevent='Loginsubmit'>
                                                <div class="form-group form-focus">
                                                    <input type="text" v-model.trim="data.email" class="form-control floating">
                                                    <label class="focus-label">{{$t('register.emailPhone')}}</label>
                                                </div>
                                                <div class="form-group form-focus">
                                                    <input type="password" v-model.trim="data.password" class="form-control floating">
                                                    <label class="focus-label">{{$t('register.password')}}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="custom_check">
                                                        <input type="checkbox" v-model="data.remmeber_me">
                                                        <span class="checkmark"></span> {{$t('register.remember')}}
                                                    </label>
                                                </div>
                                                <button class="btn btn-color btn-primary btn-block btn-lg login-btn text-center" type="submit">{{$t('register.login')}}</button>
                                                <div class="row form-row forget-login">
                                                    <div :class="['col-6','text-start','click-forget', this.$i18n.locale == 'ar'? 'forget-register' : '']">
                                                        <router-link  :to="{name:'forgetPassword',params: {lang:this.$i18n.locale}}">{{$t('register.forget')}}</router-link>
                                                    </div>
                                                    <div :class="['col-6','text-end','click',this.$i18n.locale == 'ar'?'login-register': '']">{{$t('register.new')}}
                                                        <router-link  :to="{name:'registerPartiner',params: {lang:this.$i18n.locale}}">{{$t('register.click')}}</router-link>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Login Content -->

                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
</template>
<script>
import {toRefs, reactive, computed,onMounted} from 'vue';
import { useStore } from 'vuex';
import axios from "axios";

export default {
    setup(){
        const store = useStore();

        let errors = computed(()=> store.getters['auth/errors']);
        let loading = computed(() => store.getters['auth/loading'] );

        //start design
        let login =  reactive({
            data:{
                email:'',
                password:'',
                remmeber_me: false
            }
        });

        function Loginsubmit (){
            store.dispatch('auth/login',login.data);
        }

        function authSocial($social){
            axios.get(`http://shatbna.com/register/${$social}`)
                .then((res) => {
                    console.log(res)
                    let l = res.data.data;
                    store.commit('auth/editUser', l.user);
                    store.commit('auth/editComplement', l.complement);
                    store.commit('auth/editPartner', l.partner);
                    store.commit('editToken', l.access_token);

                    let locale = localStorage.getItem("langWeb");

                    if (l.user.role_name[0] == 'client'){
                        return router.push({name: 'dashboardClient', params: {lang: locale || 'ar'}});
                    }
                })
                .catch((err) => {
                    // commit('editErrors',err.response.data.errors);
                    console.log(err.response);
                })
        }

        onMounted(() => {
            store.commit('auth/editErrors', {});
        });

        return {Loginsubmit,...toRefs(login),errors,loading,authSocial};

    },
}
</script>

<style scoped>
.content {
    padding: 150px 0 30px;
}

.login-right .login-header img{
    height: 100px;
    width: 210px;
}

.login-header img{
    height: 50px;
    width: 55px;
}

.login-right .dont-have a, .forget-register a:hover ,.login-register a {
    color: #fcb00c;
}

.btn-color:hover{
    background-color: #fcb00c;
    border-color: #fcb00c ;
}

.login-right .dont-have a, .click-forget a:hover ,.click a{
    color: #fcb00c;
}

.google a{
    font-size: 18px;
}

.user-tabs ul li + li.tab-en {
    margin-left: 26px;
}

.user-tabs ul li + li.tab-ar {
    margin-right: 26px;
}

</style>
