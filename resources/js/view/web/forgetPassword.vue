<template>
    <!-- Page Content -->
    <div class="content">
        <loader v-if="loading" />
        <div class="container">

            <div class="row">
                <div class="col-md-6 offset-md-3">

                    <!-- Forgot Password Content -->
                    <div class="account-content">
                        <div class="align-items-center justify-content-center">
                            <div class="login-right">
                                <div class="login-header text-center">
                                    <router-link :to="{name:'home',params: {lang:this.$i18n.locale}}">
                                        <img src="/web/img/logo.png" alt="logo" class="img-fluid">
                                    </router-link>
                                    <h3>{{$t('register.first-account')}}</h3>
                                    <p>{{$t('register.enter')}}</p>
                                </div>
                                <form @submit.prevent="forgetPassword">
                                    <div class="form-group form-focus">
                                        <input v-model="v$.email.$model" class="form-control floating">
                                        <label class="focus-label">{{$t('register.email')}}</label>
                                    </div>
                                    <div v-if="v$.email.$error">
                                        <span class="text-danger" v-if="v$.email.required.$invalid">email is required.<br /> </span>
                                        <span class="text-danger" v-if="v$.email.email.$invalid">must be a valid email address. </span>
                                    </div>

                                    <button class=" btn-color btn btn-primary btn-block btn-lg login-btn text-center" type="submit">
                                        {{$t('register.find')}}
                                    </button>
                                    <div class="row form-row forget-login">
                                        <div :class="['col-6','text-start','click-forget', this.$i18n.locale == 'ar'? 'forget-register' : '']">
                                            <router-link  :to="{name:'loginPartiner',params: {lang:this.$i18n.locale}}">{{$t('register.rememberP')}}</router-link>
                                        </div>
                                        <div :class="['col-6','text-end','click',this.$i18n.locale == 'ar'?'login-register': '']">{{$t('register.new')}}
                                            <router-link  :to="{name:'registerPartiner',params: {lang:this.$i18n.locale}}">{{$t('register.click')}}</router-link>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Forgot Password Content -->

                </div>
            </div>

        </div>

    </div>
    <!-- /Page Content -->
</template>

<script>
import {computed, reactive, ref, toRefs} from "vue";
import { required,email} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import webApi from "../../api/webAxios";

export default {
    name: "forgetPassword",
    setup(){

        let loading = ref(false);

        //start advertiser
        let forget =  reactive({
            data:{
                email:'',
            }
        });

        const rules = computed(() => {
            return {
                email: {
                    required,
                    email
                }
            }
        });

        const v$ = useVuelidate(rules,forget.data);

        return {...toRefs(forget),v$,loading};
    },
    methods:{
        forgetPassword(){
            this.v$.$validate();
            if(!this.v$.$error){
                this.loading = true;

                webApi.post(`/v1/web/forgot-password`,this.data)
                    .then((res) => {
                        console.log('good');
                        Swal.fire(
                            'تم ارسال رساله',
                            'تم ارسال رساله الي البريد الالكتروني  .',
                            'نجاح'
                        );

                        this.$router.push({name:'loginPartiner',params: {lang:this.$i18n.locale}})
                    })
                    .catch((err) => {
                        Swal.fire({
                            icon: 'error',
                            title: 'يوجد خطا في الاميل ...',
                            text: 'يرجاء اعاده كتابه الاميل بطريقه صحيحه مره اخري !',
                        });
                        console.log(err.response);
                    })
                    .finally(() => {
                        loading.value = false;
                    });

            }
        }
    }
}
</script>

<style scoped>
.content{
    padding: 100px 0;
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
</style>
