<template>
    <form @submit.prevent='Advertisersubmit'>
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

        <div class="form-group form-focus">
            <input type="text" v-model.trim="v$.nameCompany.$model" class="form-control floating">
            <label class="focus-label">{{$t('register.company')}}</label>
        </div>

        <div v-if="v$.nameCompany.$error || errors.nameCompany">
            <span class="text-danger" v-if="v$.nameCompany.required.$invalid">name company is required.<br /> </span>
            <span class="text-danger" v-if="v$.nameCompany.maxLength.$invalid">nameCompany is must have at most {{ v$.nameCompany.maxLength.$params.max }} letters. </span>
            <span class="text-danger" v-if="errors.nameCompany">{{errors.nameCompany[0]}}</span>
        </div>

        <div class="row">

            <div class="col-md-3">
                <div class="form-group form-focus">
                    <select v-model="dataAdvertiser.country" @change="conutryState" class="form-control floating">
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
                    <select v-model="dataAdvertiser.state"  class="form-control floating">
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
                    <input type="text" v-model.trim="v$.phone.$model" :class="['form-control','floating',dataAdvertiser.country ? 'phone': '']">
                    <label class="focus-label">{{$t('register.phone')}}</label>
                    <span class="flag"  v-if="dataAdvertiser.country" v-for="count in foucsCountry">
                        <img v-if="this.$i18n.locale == 'en'" :src="'/web/img/country/'+ count.media.file_name">
                        <span class="codeCountry">{{count.code}}</span>
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
                <input type="checkbox" v-model="dataAdvertiser.agree">
                <span class="checkmark"></span> {{$t('register.agree')}} <router-link :to="{name:'privacy',params: {lang:this.$i18n.locale}}" > {{$t('register.Privacy')}} </router-link>
                <div v-if="v$.agree.$error">
                    <span class="text-danger" v-if="v$.agree.mustBeCool.$invalid">You must agree to the terms and conditions.<br /> </span>
                </div>
            </label>
        </div>

        <button class="btn btn-primary btn-block btn-lg login-btn text-center btn-color" type="submit">{{$t('register.join')}}</button>
        <div class="row form-row forget-login">
            <div :class="['col-6','text-start','click-forget' ,this.$i18n.locale == 'ar'? 'forget-register' : '']">
                <router-link  :to="{name:'forgetPassword',params: {lang:this.$i18n.locale}}">{{$t('register.forget')}}</router-link>
            </div>
            <div :class="['col-6','text-end','click',this.$i18n.locale == 'ar'?'login-register': '']">{{$t('register.account')}}
                <router-link :to="{name:'loginPartiner',params: {lang:this.$i18n.locale}}">{{$t('register.click')}}</router-link>
            </div>
        </div>
    </form>
</template>

<script>
import {computed, reactive, toRefs, inject, ref, watch} from "vue";
import { maxLength, minLength, required,email,sameAs,alphaNum,integer} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import {useStore} from 'vuex';

export default {
    name: "advertiser",
    setup(){

        let store = useStore();
        const emitter = inject('emitter');

        let countries = computed(()=> store.getters['auth/country']);
        let states = computed(()=> store.getters['auth/newState']);
        let errors = computed(()=> store.getters['auth/errors']);
        let foucsCountry = ref({});

        let conutryState =  () => {

            foucsCountry.value = countries._value.filter(country => country.id == advertiser.dataAdvertiser.country);
            advertiser.dataAdvertiser.code = foucsCountry.value[0].code;
            store.dispatch('auth/stateRegister',advertiser.dataAdvertiser.country);
        };

        emitter.on('get_lang_web', () => {
            conutryState();
        });

        //start advertiser
        let advertiser =  reactive({
            dataAdvertiser:{
                name:'',
                email:'',
                password:'',
                confirmtion:'',
                nameCompany: '',
                country: '',
                state: '',
                phone: '',
                code:'',
                agree: false,
            }
        });

        const mustBeCool = (value) => value ;

        const  validPhone = ref(true);

        watch(() => advertiser.dataAdvertiser.phone, (currentValue, oldValue) => {
            var re = /^\+(20\d{10}|971\d{8}|966\d{9}|964\d{8}|249\d{9}|218\d{8})$/;

            if (re.test(advertiser.dataAdvertiser.code+currentValue)) {
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
                    sameAs: sameAs(advertiser.dataAdvertiser.password)
                },
                nameCompany:{
                    required,
                    maxLength:maxLength(60),
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

        const v$ = useVuelidate(rules,advertiser.dataAdvertiser);

        return {v$,validPhone,...toRefs(advertiser),countries,conutryState,states,foucsCountry,errors};
    },
    methods: {
         Advertisersubmit (){
             this.v$.$validate();

            if(!this.v$.$error && this.validPhone && this.dataAdvertiser.phone){

                this.$store.dispatch('auth/advertiserRegister', this.dataAdvertiser);

            }else {
                var re = /^\+(20\d{10}|971\d{8}|966\d{9}|964\d{8}|249\d{9}|218\d{8})$/;

                if (!re.test(this.dataAdvertiser.code+this.dataAdvertiser.phone)) {
                    this.validPhone = false;
                }
            }
        }
    }
}
</script>

<style scoped>
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

</style>
