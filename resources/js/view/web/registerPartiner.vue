<template>
    <!-- Page Content -->
    <div class="content">
        <loader v-if="loading" />

        <!-- The Modal -->
        <div class="success" v-if="success">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <img src="/web/img/success.png">
                    <h2>Thank you!</h2>
                    <p>
                        Your details has been successfully submitted. Thanks! .
                        An email will be sent after verifying your account .
                    </p>
                    <button type="button" @click.prevent="successRegister">Ok</button>
                </div>
            </div>
        </div>
        <!-- /The Modal -->

        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <!-- Register Tab Content -->
                    <div class="account-content">
                        <div class="align-items-center justify-content-center">
                            <div class="login-right">
                                <div class="login-header text-center">
                                    <img src="../../assets/img/logo-01.png" alt="logo" class="img-fluid">
                                    <h3>Join Shatbna</h3>
                                    <p>Make the most of your professional life</p>
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
                                        <form @submit.prevent='Companysubmit'>
                                            <div class="form-group form-focus">
                                                <input type="text" v-model="dataCompany.name" class="form-control floating">
                                                <label class="focus-label">name </label>
                                            </div>
                                            <div class="form-group form-focus">
                                                <input type="email" v-model="dataCompany.email" class="form-control floating">
                                                <label class="focus-label">Email</label>
                                            </div>
                                            <div class="form-group form-focus">
                                                <input type="password" v-model="dataCompany.password" class="form-control floating">
                                                <label class="focus-label">Password</label>
                                            </div>
                                            <div class="form-group form-focus mb-0">
                                                <input type="password" v-model="dataCompany.confirmtion" class="form-control floating">
                                                <label class="focus-label">Confirm Password</label>
                                            </div>
                                            <div class="form-group  mb-0">
                                                <input type="text" v-model="dataCompany.nameCompany" class="form-control">
                                                <label class="focus-label">Name company</label>
                                            </div>
                                            <div class="form-group form-focus mb-0">
                                                <input type="text" v-model="dataCompany.phone" class="form-control floating">
                                                <label class="focus-label">Phone</label>
                                            </div>
                                            <div class="form-group form-focus  mb-0">
                                                <input type="text" v-model="dataCompany.phone_second" class="form-control floating">
                                                <label class="focus-label">Second Phone</label>
                                            </div>
                                            <div class="form-group  mb-0">
                                                <label >country</label>
                                                <select v-model="dataCompany.country" class="form-control">
                                                    <option value="1">egypt</option>
                                                </select>
                                            </div>
                                            <div class="form-group mb-0">
                                                <label >state</label>
                                                <select v-model="dataCompany.state" class="form-control">
                                                    <option value="1">Alexandria</option>
                                                </select>
                                            </div>
                                            <div class="form-group form-focus mb-0">
                                                <input type="url" v-model="dataCompany.location" class="form-control floating">
                                                <label class="focus-label">Location</label>
                                            </div>
                                            <div class="dont-have">
                                                <label class="custom_check">
                                                    <input type="checkbox" v-model="dataCompany.sendEmail">
                                                    <span class="checkmark"></span> send email
                                                </label>
                                            </div>
                                            <button class="btn btn-primary btn-block btn-lg login-btn text-center" type="submit">Agree TO JOIN</button>
                                            <div class="row form-row">
                                                <div class="col-6 text-start">
                                                    <router-link class="forgot-link" to="/forgot-password">Forgot Password ?</router-link>
                                                </div>
                                                <div class="col-6 text-end dont-have">Already on Shatbna
                                                    <router-link :to="{name:'loginPartiner',params: {lang:this.$i18n.locale}}">Click here</router-link>
                                                </div>
                                            </div>
                                        </form>
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

export default {
    name: "registerPartiner",
    components:{
        advertiserRegister,
        designRegister
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

        //start company
        let company =  reactive({
            dataCompany:{
                name:'',
                email:'',
                password:'',
                confirmtion:'',
                country: null,
                state: null,
                phone: '',
                phone_second: '',
                nameCompany: '',
                sendEmail: false,
                location:''
            }
        });

        function Companysubmit (){
            store.dispatch('auth/CompanyRegister',company.dataCompany);
        }

        return {query,...toRefs(company),Companysubmit,loading,success,successRegister};
    }
}
</script>

<style scoped>
.content {
    padding: 150px 0 30px;
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
    background-color: #FF5B37;
    color: #fff;
    border: 0;
    outline: 0;
    border-right: 4px;
    cursor: pointer;
    box-shadow: 0 2px 5px rgba(0,0,0,.2);
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
