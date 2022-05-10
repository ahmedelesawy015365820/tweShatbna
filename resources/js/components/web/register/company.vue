<template>
<form @submit.prevent='Companysubmit'>
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

        <div class="col-md-6">
            <div class="form-group form-focus">
                <input type="text" v-model.trim="v$.nameCompany.$model" class="form-control floating">
                <label class="focus-label">{{$t('register.company')}}</label>
            </div>
            <div v-if="v$.nameCompany.$error || errors.nameCompany">
                <span class="text-danger" v-if="v$.nameCompany.required.$invalid">name company is required.<br /> </span>
                <span class="text-danger" v-if="v$.nameCompany.maxLength.$invalid">nameCompany is must have at most {{ v$.nameCompany.maxLength.$params.max }} letters. </span>
                <span class="text-danger" v-if="errors.nameCompany">{{errors.nameCompany[0]}}</span>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group form-focus">
                <select v-model="dataCompany.country" @change="conutryState" class="form-control floating">
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
                <select v-model="dataCompany.state"  class="form-control floating">
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
                <input type="text" v-model.trim="v$.phone.$model" :class="['form-control','floating',dataCompany.country ? 'phone': '']">
                <label class="focus-label">{{$t('register.phone')}}</label>
                <span class="flag"  v-if="dataCompany.country" v-for="count in foucsCountry">
                        <img v-if="this.$i18n.locale == 'en'" :src="'/web/img/country/'+ count.media.file_name">
                        <span class="codeCountry" id="codeCountry">{{count.code}}</span>
                        <img v-if="this.$i18n.locale == 'ar'" :src="'/web/img/country/'+ count.media.file_name">
                </span>
            </div>
            <div v-if="v$.phone.$error || errors.phone">
                <span class="text-danger" v-if="v$.phone.required.$invalid">phone is required.<br /> </span>
                <span class="text-danger" v-if="v$.phone.maxLength.$invalid">phone is must have at most {{ v$.phone.maxLength.$params.max }} numbers.<br/> </span>
                <span class="text-danger" v-if="v$.phone.integer.$invalid">must be number.<br /> </span>
                <span class="text-danger" v-if="errors.phone">{{errors.phone[0]}}</span>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group form-focus">
                <input type="text" v-model="dataCompany.phone_second" :class="['form-control','floating',dataCompany.country ? 'phone': '']">
                <label class="focus-label">{{$t('register.second_phone')}}</label>
                <span class="flag"  v-if="dataCompany.country" v-for="count in foucsCountry">
                        <img v-if="this.$i18n.locale == 'en'" :src="'/web/img/country/'+ count.media.file_name">
                        <span class="codeCountry">{{count.code}}</span>
                        <img v-if="this.$i18n.locale == 'ar'" :src="'/web/img/country/'+ count.media.file_name">
                </span>
            </div>
            <div v-if="v$.phone_second.$error">
                <span class="text-danger" v-if="v$.phone_second.maxLength.$invalid">phone is must have at most {{ v$.phone.maxLength.$params.max }} numbers.<br/> </span>
                <span class="text-danger" v-if="v$.phone_second.integer.$invalid">must be number.<br /> </span>
            </div>
        </div>

    </div>

    <div class="form-group form-focus">
        <input type="url" v-model="dataCompany.location" class="form-control floating">
        <label class="focus-label">{{$t('register.location')}}</label>
    </div>
    <div v-if="v$.location.$error">
        <span class="text-danger" v-if="v$.location.required.$invalid">location is required.<br /> </span>
        <span class="text-danger" v-if="v$.location.url.$invalid"> must be URL. <br /></span>
    </div>

    <div class="dont-have">
        <label class="custom_check">
            <input type="checkbox" v-model="dataCompany.agree">
            <span class="checkmark"></span> {{$t('register.agree')}} <router-link to="/privacy-policy"> {{$t('register.Privacy')}} </router-link> {{$t('register.and')}} <router-link to="/privacy-policy"> {{$t('register.cookie')}} </router-link>.
        </label>
    </div>

    <button class="btn btn-primary btn-block btn-lg login-btn text-center btn-color" type="submit">{{$t('register.join')}}</button>
    <div class="row form-row forget-login">
        <div :class="['col-6','text-start', 'click-forget',this.$i18n.locale == 'ar'? 'forget-register' : '']">
            <router-link  :to="{name:'forgetPassword',params: {lang:this.$i18n.locale}}">{{$t('register.forget')}}</router-link>
        </div>
        <div :class="['col-6','text-end','click',this.$i18n.locale == 'ar'?'login-register': '']">{{$t('register.account')}}
            <router-link  :to="{name:'loginPartiner',params: {lang:this.$i18n.locale}}">{{$t('register.click')}}</router-link>
        </div>
    </div>
</form>
</template>

<script>
import {toRefs, reactive, ref, computed, inject} from 'vue';
import { useStore } from 'vuex';
import { maxLength, minLength, required,email,sameAs,alphaNum,integer,url,not} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import router from "../../../router/webRoute";
import {useI18n} from "vue-i18n";


export default {
    name: 'company',
    setup(){
        const store = useStore();
        const emitter = inject('emitter');
        const { t } = useI18n({});

        let countries = computed(()=> store.getters['auth/country']);
        let states = computed(()=> store.getters['auth/newState']);
        let errors = computed(()=> store.getters['auth/errors']);
        let foucsCountry = ref({});

        let conutryState =  () => {

            foucsCountry.value = countries._value.filter(country => country.id == company.dataCompany.country);
            store.dispatch('auth/stateRegister',company.dataCompany.country);
        };

        emitter.on('get_lang_web', () => {
            conutryState();
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
                code:'',
                phone_second: '',
                nameCompany: '',
                location:'',
                agree: false,
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
                    sameAs: sameAs(company.dataCompany.password)
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
                phone_second:{
                    maxLength:maxLength(25),
                    integer,
                },
                country:{
                    required
                },
                state:{
                    required
                },
                location:{
                    required,
                    url
                }
            }
        });

        const v$ = useVuelidate(rules,company.dataCompany);

        return  {...toRefs(company),v$,countries,conutryState,states,foucsCountry,errors};

    },
    computed: {
        success(){
            return this.$store.getters['auth/success'];
        }
    },
    methods: {
        Companysubmit(){
            this.v$.$validate();

            if(!this.v$.$error && this.dataCompany.agree){

                let item = document.getElementById('codeCountry').innerHTML;

                this.dataCompany.code = item ;

                this.$store.dispatch('auth/CompanyRegister',this.dataCompany);

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
