<template>
    <!-- Page Content -->
    <div class="content">
        <loader v-if="loading" />

        <!--The Modal-->
        <transition name="fade">
            <div class="success" v-if="success">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content text-center">
                        <img src="/web/img/success.png">
                        <h2>{{ $t('register.thank') }}</h2>
                        <p>
                            {{ $t('register.success-mess') }}
                        </p>
                        <button type="button" @click.prevent="successRegister">{{$t('register.ok')}}</button>
                    </div>
                </div>
            </div>
        </transition>
        <!--  /The Modal-->

        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <!-- Register Tab Content -->
                    <div class="account-content">
                        <div class="align-items-center justify-content-center">
                            <div class="login-right">
                                <div class="login-header text-center">
                                    <img src="/web/img/logo.png" alt="logo" class="img-fluid">
                                    <h3>{{ $t('register.Join') }}</h3>
                                    <p>{{ $t('register.life') }}</p>
                                </div>
                                <nav class="user-tabs mb-4">
                                    <ul role="tablist" class="nav nav-pills nav-justified">
                                        <li class="nav-item">
                                            <a href="#design" data-bs-toggle="tab"  :class="['nav-link', {active: query == 'designer'? true: false},!query ? 'active': '']">{{$t('register.design')}}</a>
                                        </li>
                                        <li class="nav-item custom-nav">
                                            <a href="#company" data-bs-toggle="tab" :class="['nav-link', {active: query == 'company'? true: false}]">{{$t('register.companies')}}</a>
                                        </li>
                                        <li class="nav-item stop-margin">
                                            <a href="#advertiser" data-bs-toggle="tab" :class="['nav-link',{active: query == 'advertiser'? true: false}]">{{$t('register.advertiser')}}</a>
                                        </li>
                                    </ul>
                                </nav>
                                <div class="tab-content pt-0">
                                    <div role="tabpanel" id="design" :class="['tab-pane','fade',query == 'designer'? 'active show': false,!query ? 'active show': '']">
                                        <design-register />
                                    </div>
                                    <div role="tabpanel" id="company" :class="['tab-pane','fade',query == 'company'? 'active show': false]">
                                        <company-register />
                                    </div>
                                    <div role="tabpanel" id="advertiser" :class="['tab-pane','fade',query == 'advertiser'? 'active show': false]">
                                        <advertiser-register />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Register Tab Content -->

                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
</template>

<script>
import {toRefs, reactive, onMounted, ref, computed, inject} from 'vue';
import {  useRoute,useRouter } from 'vue-router';
import { useStore } from 'vuex';
import advertiserRegister from "../../components/web/register/advertiser";
import designRegister from "../../components/web/register/designer";
import companyRegister from "../../components/web/register/company";

export default {
    name: "registerPartiner",
    components:{
        advertiserRegister,
        designRegister,
        companyRegister
    },
    setup(){
        const store = useStore();
        const route = useRoute();
        const router = useRouter()
        const emitter = inject('emitter');

        let loading = computed(() => store.getters['auth/loading'] );
        let success = computed(() => store.getters['auth/success'] );

        const query = ref('');

        let getCountry =  () =>{
            store.dispatch('auth/countryRegister');
        };

        let successRegister = () => {
            let locale = localStorage.getItem("langWeb") || 'ar';
           return   router.push({name: 'home', params: {lang: locale || 'ar'}});
        };

        onMounted(() => {
            query.value = route.query.p;

            // get country
            getCountry();

            // success
            store.commit('auth/editSuccess',false);

        });

        emitter.on('get_lang_web', () => {
            getCountry();
        });

        return {query,loading,success,successRegister};
    }
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

.success{
    display: block;
    background-color: #0a0a0a21;
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    z-index: 1050;
    width: 100%;
    height: 100%;
    border-radius: 10px;
    overflow: hidden;
    outline: 0;
}

.modal-dialog{
    width: 400px
}

.modal-content{
    padding: 6px 58px 20px;
    border: none;
    border-radius: 15px;
}

.success img{
    margin: 0 auto;
    width: 100px;
    margin-top: -50px;
    border-radius: 50%;
    box-shadow: 0 2px 5px rgba(0,0,0,.2);
}

.success h2{
    font-size: 38px;
    font-weight: 500;
    margin: 25px 0 10px;
}

.success button{
    width: 100%;
    margin-top: 10px;
    padding: 10px 0;
    color: #fff;
    border: 0;
    outline: 0;
    border-right: 4px;
    cursor: pointer;
    background-color: #fcb00c;
    box-shadow: 0 2px 5px rgba(0,0,0,.2);
}

.fade-enter-from, .fade-leave-to{
   opacity: 0;
}
.fade-enter-active,.fade-leave-active{
    transition:all 1s ease-in-out;
}

.login-header img{
    height: 50px;
    width: 55px;
}

.custom-nav {
    margin:0 25px;
}

.stop-margin {
    margin: 0;
}

</style>
