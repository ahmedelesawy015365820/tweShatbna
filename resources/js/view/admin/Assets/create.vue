<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">

        <div class="content container-fluid">

            <notifications :position="this.$i18n.locale == 'ar'? 'top left': 'top right'"  />

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{$t('global.Assets')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'indexAssets', params: {lang: locale || 'ar'}}">{{$t('global.Assets')}}</router-link></li>
                            <li class="breadcrumb-item active">{{$t('Assets.Add')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <!-- Table -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <loader v-if="loading" />
                        <div class="card-body">
                            <div class="card-header pt-0 mb-4">
                                <router-link
                                    :to="{name: 'indexAssets', params: {lang: locale || 'ar'}}"
                                    class="btn btn-custom btn-dark"
                                >
                                    {{$t('global.back')}}
                                </router-link>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="alert alert-danger text-center" v-if="errors['en.name']">{{ errors['en.name'][0] }}<br /> </div>
                                    <div class="alert alert-danger text-center" v-if="errors['ar.name']">{{ errors['ar.name'][0] }}<br /> </div>
                                    <form @submit.prevent="storeIncome" class="needs-validation">
                                        <div class="form-row row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom01">{{$t('global.NameEn')}}</label>
                                                <input type="text" class="form-control"
                                                       v-model.trim="v$.en.name.$model"
                                                       id="validationCustom01"
                                                       :placeholder="$t('global.NameEn')"
                                                       :class="{'is-invalid':v$.en.name.$error,'is-valid':!v$.en.name.$invalid}"
                                                >
                                                <div class="valid-feedback">{{$t('global.LooksGood')}}</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.en.name.required.$invalid">{{$t('global.NameEnIsRequired')}}<br /> </span>
                                                    <span v-if="v$.en.name.minLength.$invalid">{{$t('global.NameEnIsMustHaveAtLeast')}} {{ v$.en.name.minLength.$params.min }} {{$t('global.Letters')}} <br /></span>
                                                    <span v-if="v$.en.name.maxLength.$invalid">{{$t('global.NameEnIsMustHaveAtMost')}} {{ v$.en.name.maxLength.$params.max }} {{$t('global.Letters')}} </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom02">{{$t('global.NameAr')}}</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="v$.ar.name.$model"
                                                       id="validationCustom02"
                                                       :class="{'is-invalid':v$.ar.name.$error,'is-valid':!v$.ar.name.$invalid}"
                                                       :placeholder="$t('global.NameAr')"
                                                >
                                                <div class="valid-feedback">{{$t('global.LooksGood')}}</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.ar.name.required.$invalid">{{$t('global.NameArIsRequired')}} <br /></span>
                                                    <span v-if="v$.ar.name.minLength.$invalid">{{$t('global.NameArIsMustHaveAtLeast')}} {{ v$.ar.name.minLength.$params.min }} {{$t('global.Letters')}} <br /></span>
                                                    <span v-if="v$.ar.name.maxLength.$invalid">{{$t('global.NameArIsMustHaveAtMost')}} {{ v$.ar.name.maxLength.$params.max }} {{$t('global.Letters')}} </span>
                                                </div>
                                            </div>

                                            <div class="form-row row">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label">{{$t('global.AccountType')}}</label>
                                                    <div class="col-lg-9">
                                                        <select v-model="data.debit" class="form-select">
                                                            <option  :value="0">{{$t('global.Debit')}}</option>
                                                            <option  :value="1">{{$t('global.Creditor')}}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <button class="btn btn-primary" type="submit">{{$t('global.Submit')}}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Table -->
        </div>
    </div>
</template>

<script>
import {computed, onMounted, reactive,toRefs,inject,ref} from "vue";
import useVuelidate from '@vuelidate/core';
import {required,minLength,between,maxLength,alpha,integer} from '@vuelidate/validators';
import adminApi from "../../../api/adminAxios";
import { notify } from "@kyvg/vue3-notification";
import {useI18n} from "vue-i18n";


export default {
    name: "create",
    data(){
        return {
            errors:{}
        }
    },
    setup(){
        const emitter = inject('emitter');
        const {t} = useI18n({});
        // get create Package
        let loading = ref(false);


        //start design
        let addIncome =  reactive({
            data:{
                en:{ name : ''},
                ar:{ name : ''},
                main_account_id: 1,
                debit:0
            }
        });

        const rules = computed(() => {
            return {
                en:{
                    name: {
                        minLength: minLength(3),
                        maxLength:maxLength(40),
                        required
                    }
                },
                ar:{
                    name: {
                        minLength: minLength(3),
                        maxLength:maxLength(40),
                        required
                    }
                },

            }
        });


        const v$ = useVuelidate(rules,addIncome.data);


        return {t,loading,...toRefs(addIncome),v$};
    },
    methods: {
        storeIncome(){
            this.v$.$validate();

            if(!this.v$.$error){

                this.loading = true;
                this.errors = {};

                adminApi.post(`/v1/dashboard/mainAccount`,this.data)
                    .then((res) => {

                        notify({
                            title: `${this.t('global.AddedSuccessfully')} <i class="fas fa-check-circle"></i>`,
                            type: "success",
                            duration: 5000,
                            speed: 2000
                        });

                        this.resetForm();
                        this.$nextTick(() => { this.v$.$reset() });
                    })
                    .catch((err) => {
                        console.log(err);
                        this.errors = err.response.data.errors;
                    })
                    .finally(() => {
                        this.loading = false;
                    });

            }
        },
        resetForm(){
            this.data.en.name = '';
            this.data.ar.name = '';
        }
    }
}
</script>

<style scoped>
.coustom-select {
    height: 100px;
}
.card{
    position: relative;
}
</style>
