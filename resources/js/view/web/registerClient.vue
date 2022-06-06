<template>
    <!-- Page Content -->
    <div class="content">
        <loader v-if="loading" />

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
                                <div class="tab-content pt-0">
                                    <div role="tabpanel" id="design" :class="['tab-pane','fade','active show']">
                                        <form @submit.prevent='clientsubmit'>
                                            <div class="form-group form-focus">
                                                <input type="text" v-model.trim="v$.name.$model" class="form-control floating">
                                                <label class="focus-label">{{$t('register.full_name')}}</label>
                                            </div>
                                            <div v-if="v$.name.$error">
                                                <span class="text-danger" v-if="v$.name.required.$invalid">full name is required.<br /> </span>
                                                <span class="text-danger" v-if="v$.name.minLength.$invalid">full name is must have at least {{ v$.name.minLength.$params.min }} letters. <br /></span>
                                                <span class="text-danger" v-if="v$.name.maxLength.$invalid">full name is must have at most {{ v$.name.maxLength.$params.max }} letters. <br /></span>
                                            </div>

                                            <div class="form-group form-focus">
                                                <input type="email" v-model.trim="v$.email.$model" class="form-control floating">
                                                <label class="focus-label">{{$t('register.email')}}</label>
                                            </div>
                                            <div v-if="v$.email.$error || errors.email">
                                                <span class="text-danger" v-if="v$.email.required.$invalid">email is required.<br /> </span>
                                                <span class="text-danger" v-if="v$.email.email.$invalid">must be a valid email address. </span>
                                                <span class="text-danger" v-if="errors.email">{{errors.email[0]}}</span>
                                            </div>

                                            <div class="form-group form-focus">
                                                <input type="password" v-model.trim="v$.password.$model" class="form-control floating">
                                                <label class="focus-label">{{$t('register.password')}}</label>
                                            </div>
                                            <div v-if="v$.password.$error">
                                                <span class="text-danger" v-if="v$.password.required.$invalid">password is required.<br /> </span>
                                                <span class="text-danger" v-if="v$.password.alphaNum.$invalid">must be letters or numbers. <br /></span>
                                                <span class="text-danger" v-if="v$.password.minLength.$invalid">password is must have at least {{ v$.password.minLength.$params.min }} letters. <br /></span>
                                                <span class="text-danger" v-if="v$.password.maxLength.$invalid">password is must have at most {{ v$.password.maxLength.$params.max }} letters. </span>
                                            </div>

                                            <div class="form-group form-focus">
                                                <input type="password" v-model.trim="v$.confirmtion.$model" class="form-control floating">
                                                <label class="focus-label">{{$t('register.confirm')}}</label>
                                            </div>
                                            <div v-if="v$.confirmtion.$error">
                                                <span class="text-danger" v-if="v$.confirmtion.required.$invalid">confirmtion is required.<br /> </span>
                                                <span class="text-danger" v-if="v$.confirmtion.sameAs.$invalid">confirmtion other must match. <br /></span>
                                            </div>

                                            <div class="row">

                                                <div class="col-md-3">
                                                    <div class="form-group form-focus">
                                                        <select v-model="dataClient.country" @change="conutryState" class="form-control floating">
                                                            <option :value="country.id" v-for="country in countries">
                                                                {{country.name}}
                                                            </option>
                                                        </select>
                                                        <label class="focus-label">{{$t('register.country')}}</label>
                                                    </div>
                                                    <div v-if="v$.country.$error">
                                                        <span class="text-danger" v-if="v$.country.required.$invalid">country is required.<br /> </span>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group form-focus">
                                                        <select v-model="dataClient.state"  class="form-control floating">
                                                            <option v-if="states" :value="state.id" v-for="state in states">
                                                                {{state.name}}
                                                            </option>
                                                        </select>
                                                        <label class="focus-label">{{$t('register.state')}}</label>
                                                    </div>
                                                    <div v-if="v$.state.$error">
                                                        <span class="text-danger" v-if="v$.state.required.$invalid">state is required.<br /> </span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <input type="text" v-model.trim="v$.phone.$model" :class="['form-control','floating',dataClient.country ? 'phone': '']">
                                                        <label class="focus-label">{{$t('register.phone')}}</label>
                                                        <span class="flag"  v-if="dataClient.country" v-for="count in foucsCountry">
                                                            <img v-if="this.$i18n.locale == 'en'" :src="'/web/img/country/'+ count.media.file_name">
                                                            <span class="codeClient">{{count.code}}</span>
                                                            <img v-if="this.$i18n.locale == 'ar'" :src="'/web/img/country/'+ count.media.file_name">
                                                        </span>
                                                    </div>
                                                    <div v-if="v$.phone.$error || errors.phone || !validPhone">
                                                        <span class="text-danger" v-if="v$.phone.required.$invalid">phone is required.<br /> </span>
                                                        <span class="text-danger" v-if="v$.phone.maxLength.$invalid">phone is must have at most {{ v$.phone.maxLength.$params.max }} numbers.<br/> </span>
                                                        <span class="text-danger" v-if="v$.phone.integer.$invalid">must be number.<br /> </span>
                                                        <span class="text-danger" v-if="!validPhone">phone is not valid.<br /> </span>
                                                        <span class="text-danger" v-if="errors.phone">{{errors.phone[0]}}</span>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="dont-have">
                                                <label class="custom_check">
                                                    <input type="checkbox" v-model="dataClient.agree">
                                                    <span class="checkmark"></span> {{$t('register.agree')}} <router-link to="/privacy-policy"> {{$t('register.Privacy')}} </router-link>
                                                    <div v-if="v$.agree.$error">
                                                        <span class="text-danger" v-if="v$.agree.mustBeCool.$invalid">You must agree to the terms and conditions.<br /> </span>
                                                    </div>
                                                </label>
                                            </div>

                                            <button class="btn btn-primary btn-block btn-lg login-btn text-center btn-color" type="submit">{{$t('register.join')}}</button>

                                            <div class="login-or">
                                                <p>Or login with</p>
                                            </div>

                                            <div class="row justify-content-center social-login">
                                                <div class="col-6 google">
                                                    <a href="#" class="btn btn-google btn-block text-center">Google</a>
                                                </div>
                                            </div>

                                            <div class="row form-row forget-login">
                                                <div :class="['col-6','text-start','click-forget' ,this.$i18n.locale == 'ar'? 'forget-register' : '']">
                                                    <router-link  :to="{name:'forgetPassword',params: {lang:this.$i18n.locale}}">{{$t('register.forget')}}</router-link>
                                                </div>
                                                <div :class="['col-6','text-end','click',this.$i18n.locale == 'ar'?'login-register': '']">{{$t('register.account')}}
                                                    <router-link :to="{name:'loginPartiner',params: {lang:this.$i18n.locale}}">{{$t('register.click')}}</router-link>
                                                </div>
                                            </div>
                                        </form>
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
import {toRefs, reactive, onMounted, ref, computed, inject, watch} from 'vue';
import { useStore } from 'vuex';
import {alphaNum, email, integer, maxLength, minLength, required, sameAs} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";

export default {
    name: "registerClient",
    setup(){
        const store = useStore();
        const emitter = inject('emitter');
        let countries = computed(()=> store.getters['auth/country']);
        let states = computed(()=> store.getters['auth/newState']);
        let errors = computed(()=> store.getters['auth/errors']);
        let foucsCountry = ref({});


        let loading = computed(() => store.getters['auth/loading'] );

        let getCountry =  () =>{
            store.dispatch('auth/countryRegister');
        };

        let conutryState =  () => {

            foucsCountry.value = countries._value.filter(country => country.id == client.dataClient.country);
            client.dataClient.code = foucsCountry.value[0].code;
            store.dispatch('auth/stateRegister',client.dataClient.country);
        };

        //start client
        let client =  reactive({
            dataClient:{
                name:'',
                email:'',
                password:'',
                confirmtion:'',
                country: '',
                state: '',
                phone: '',
                code:'',
                agree: false,
            }
        });

        const mustBeCool = (value) => value ;

        const  validPhone = ref(true);

        watch(() => client.dataClient.phone, (currentValue, oldValue) => {
            var re = /^\+(20\d{10}|971\d{8}|966\d{9}|964\d{8}|249\d{9}|218\d{8})$/;

            if (re.test(client.dataClient.code+currentValue)) {
                validPhone.value = true;
            }else{
                validPhone.value = false;
            }
        });

        const rules = computed(() => {
            return {
                name: {
                    minLength: minLength(3),
                    maxLength:maxLength(80),
                    required,
                },
                email: {
                    required,
                    email
                },
                password: {
                    required,
                    minLength: minLength(8),
                    maxLength:maxLength(16),
                    alphaNum
                }
                ,
                confirmtion: {
                    required,
                    sameAs: sameAs(client.dataClient.password)
                },
                phone:{
                    required,
                    maxLength:maxLength(25),
                    integer
                },
                country:{
                    required
                },
                state:{
                    required
                },
                agree: {
                mustBeCool
            }
            }
        });

        const v$ = useVuelidate(rules,client.dataClient);

        onMounted(() => {
            // get country
            getCountry();
        });

        emitter.on('get_lang_web', () => {
            getCountry();
            if(client.dataClient.country){
                conutryState();
            }
        });

        return {validPhone,loading,v$,...toRefs(client),countries,conutryState,states,foucsCountry,errors};

    },
    methods:{
        clientsubmit (){
            this.v$.$validate();

            if(!this.v$.$error && this.validPhone && this.dataClient.phone ){

                this.$store.dispatch('auth/clientRegister', this.dataClient);

            }else {
                var re = /^\+(20\d{10}|971\d{8}|966\d{9}|964\d{8}|249\d{9}|218\d{8})$/;

                if (!re.test(this.dataClient.code+this.dataClient.phone)) {
                    this.validPhone = false;
                }
            }
        }
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

img {
    width: 30px;
    height: 20px;
}

.flag{
    top: 34px;
    left: 10px;
    position: absolute;
}

.phone {
    padding-left: 70px;
    text-align: left;
}

.login-right .dont-have a, .click-forget a:hover ,.click a{
    color: #fcb00c;
}

.btn-color:hover{
    background-color: #fcb00c;
    border-color: #fcb00c ;
}

.google a{
    font-size: 18px;
}

</style>
