<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">

        <div class="content container-fluid">

            <notifications :position="this.$i18n.locale == 'ar'? 'top left': 'top right'"  />

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Setting</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'indexSetting', params: {lang: locale || 'ar'}}">Setting</router-link></li>
                            <li class="breadcrumb-item active">Edit Setting</li>
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
                                    :to="{name: 'indexSetting', params: {lang: locale || 'ar'}}"
                                    class="btn btn-custom btn-dark"
                                >
                                    back
                                </router-link>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <form @submit.prevent="editSetting" class="needs-validation">
                                        <div class="form-row row">

                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">{{$t('global.CommissionDesign')}}</label>
                                                <input type="text" class="form-control"
                                                       v-model.number="v$.commission_design.$model"
                                                       id="validationCustom01"
                                                       :placeholder="$t('global.CommissionDesign')"
                                                       :class="{'is-invalid':v$.commission_design.$error,'is-valid':!v$.commission_design.$invalid}"
                                                >
                                                <div class="valid-feedback">{{$t('global.LooksGood')}}</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.commission_design.required.$invalid">{{$t('global.CommissionDesignIsRequired')}}<br /> </span>
                                                    <span v-if="v$.commission_design.numeric.$invalid">{{$t('global.ThisFieldMustBeANumber')}}<br /> </span>
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">{{$t('global.The price per meter in the service of lifting sizes')}}</label>
                                                <input type="text" class="form-control"
                                                       v-model.number="v$.price_sizing.$model"
                                                       id="validationCustom11"
                                                       :placeholder="$t('global.The price per meter in the service of lifting sizes')"
                                                       :class="{'is-invalid':v$.price_sizing.$error,'is-valid':!v$.price_sizing.$invalid}"
                                                >
                                                <div class="valid-feedback">{{$t('global.LooksGood')}}</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.price_sizing.required.$invalid">{{$t('global.The price per meter in the service of lifting sizes Is Required ')}}<br /> </span>
                                                    <span v-if="v$.price_sizing.numeric.$invalid">{{$t('global.ThisFieldMustBeANumber')}}<br /> </span>
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">{{$t('global.Time to contact the sizing service')}}</label>
                                                <input type="text" class="form-control"
                                                       v-model.number="v$.contact_sizing.$model"
                                                       id="validationCustom10"
                                                       :placeholder="$t('global.Time to contact the sizing service')"
                                                       :class="{'is-invalid':v$.contact_sizing.$error,'is-valid':!v$.contact_sizing.$invalid}"
                                                >
                                                <div class="valid-feedback">{{$t('global.LooksGood')}}</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.contact_sizing.required.$invalid">{{$t('global.Time to contact the sizing service Is Required')}}<br /> </span>
                                                    <span v-if="v$.contact_sizing.numeric.$invalid">{{$t('global.ThisFieldMustBeANumber')}}<br /> </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">{{$t('global.CommercialRecord')}}</label>
                                                <input type="text" class="form-control"
                                                       v-model.number="v$.commercial_record.$model"
                                                       id="validationCustom12"
                                                       :placeholder="$t('global.CommercialRecord')"
                                                       :class="{'is-invalid':v$.commercial_record.$error,'is-valid':!v$.commercial_record.$invalid}"
                                                >
                                                <div class="valid-feedback">{{$t('global.LooksGood')}}</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.commercial_record.required.$invalid">{{$t('global.Time to contact the sizing service Is Required')}}<br /> </span>
                                                    <span v-if="v$.commercial_record.numeric.$invalid">{{$t('global.ThisFieldMustBeANumber')}}<br /> </span>
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">{{$t('global.AccountCurrencyEn')}}</label>
                                                <input type="text" class="form-control"
                                                       v-model.trim="v$.en.account_currency.$model"
                                                       id="validationCustom26"
                                                       :placeholder="$t('global.AccountCurrencyEn')"
                                                       :class="{'is-invalid':v$.en.account_currency.$error,'is-valid':!v$.en.account_currency.$invalid}"
                                                >
                                                <div class="valid-feedback">{{$t('global.LooksGood')}}</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.en.account_currency.required.$invalid">{{$t('global.NameEnIsRequired')}}<br /> </span>
                                                    <span v-if="v$.en.account_currency.minLength.$invalid">{{$t('global.NameEnIsMustHaveAtLeast')}} {{ v$.en.account_currency.minLength.$params.min }} {{$t('global.Letters')}} <br /></span>
                                                    <span v-if="v$.en.account_currency.maxLength.$invalid">{{$t('global.NameEnIsMustHaveAtMost')}} {{ v$.en.account_currency.maxLength.$params.max }} {{$t('global.Letters')}} </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">{{$t('global.AccountCurrencyAr')}}</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="v$.ar.account_currency.$model"
                                                       id="validationCustom02"
                                                       :class="{'is-invalid':v$.ar.account_currency.$error,'is-valid':!v$.ar.account_currency.$invalid}"
                                                       :placeholder="$t('global.AccountCurrencyAr')"
                                                >
                                                <div class="valid-feedback">{{$t('global.LooksGood')}}</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.ar.account_currency.required.$invalid">{{$t('global.NameArIsRequired')}} <br /></span>
                                                    <span v-if="v$.ar.account_currency.minLength.$invalid">{{$t('global.NameArIsMustHaveAtLeast')}} {{ v$.ar.account_currency.minLength.$params.min }} {{$t('global.Letters')}} <br /></span>
                                                    <span v-if="v$.ar.account_currency.maxLength.$invalid">{{$t('global.NameArIsMustHaveAtMost')}} {{ v$.ar.account_currency.maxLength.$params.max }} {{$t('global.Letters')}} </span>
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
import {computed, onMounted, reactive, toRefs, inject, ref, watch} from "vue";
import useVuelidate from '@vuelidate/core';
import {required, numeric, minLength, maxLength} from '@vuelidate/validators';
import adminApi from "../../../api/adminAxios";
import { notify } from "@kyvg/vue3-notification";
import {useI18n} from "vue-i18n";


export default {
    name: "createPackage",
    data(){
        return {
            errors:{}
        }
    },
    props: ['id'],
    setup(props){
        // get create Package
        let loading = ref(false);
        const { id } = toRefs(props);
        const {t} = useI18n({});
        //start design
        let addSetting =  reactive({
            data:{
                commission_design: null,
                price_sizing:null,
                commercial_record:null,
                contact_sizing:null,
                en:{ account_currency : ''},
                ar:{ account_currency : ''},

            }
        });


        const rules = computed(() => {
            return {
                commission_design:{
                    required,
                    numeric
                },
                price_sizing:{
                    required,
                    numeric
                },
                commercial_record:{
                    required,
                    numeric
                },
                contact_sizing:{
                    required,
                    numeric
                },
                en:{
                    account_currency: {
                        minLength: minLength(3),
                        maxLength:maxLength(40),
                        required
                    }
                },
                ar:{
                    account_currency: {
                        minLength: minLength(3),
                        maxLength:maxLength(40),
                        required
                    }
                }
            }
        });

        let getDATA = () => {
            loading.value = true;

            adminApi.get(`/v1/dashboard/setting/${id.value}/edit`)
                .then((res) => {
                    let l = res.data.data;
                    addSetting.data.commission_design = l.setting.commission_design;
                    addSetting.data.price_sizing = l.setting.price_sizing;
                    addSetting.data.commercial_record = l.setting.commercial_record;
                    addSetting.data.contact_sizing = l.setting.contact_sizing;
                    addSetting.data.en.account_currency = l.setting.translations[1].account_currency;
                    addSetting.data.ar.account_currency = l.setting.translations[0].account_currency;
                })
                .catch((err) => {
                    console.log(err.response.data);
                })
                .finally(() => {
                    loading.value = false;
                })
        };

        onMounted(() => {
            getDATA();
        })

        const v$ = useVuelidate(rules,addSetting.data);


        return {loading,...toRefs(addSetting),t,id,v$};
    },
    methods: {
        editSetting(){
            this.v$.$validate();

            if(!this.v$.$error){

                this.loading = true;
                this.errors = {};

                adminApi.put(`/v1/dashboard/setting/${this.id}`,this.data)
                    .then((res) => {

                        notify({
                            title: `${this.t('global.EditSuccessfully')} <i class="fas fa-check-circle"></i>`,
                            type: "success",
                            duration: 5000,
                            speed: 2000
                        });

                    })
                    .catch((err) => {
                        // this.errors = err.response.data.errors;
                        console.log(err)
                    })
                    .finally(() => {
                        this.loading = false;
                    });

            }
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

.package-feature ul li:first-child {
    margin-top: 10px;
}

.package-feature ul li::before {
    content: "\f00c";
    font-family: "Font Awesome 5 Free";
    font-weight: 600;
    color: #4B9F18;
    left: 0;
    position: absolute;
    top: 0;
}

.package-feature ul li:last-child {
    margin-bottom: 10px;
}

.ml-3{
    margin-left: 1.5rem;
}


</style>
