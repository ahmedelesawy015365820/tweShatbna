<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">

        <div class="content container-fluid">

            <notifications :position="this.$i18n.locale == 'ar'? 'top left': 'top right'"  />

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{$t('global.Sizing service data')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'indexSizingOne', params: {lang: locale || 'ar'}}">{{$t('global.Sizing service data')}}</router-link></li>
                            <li class="breadcrumb-item active">{{$t('SizingService.Edit')}}</li>
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
                                    :to="{name: 'indexSizingOne', params: {lang: locale || 'ar'}}"
                                    class="btn btn-custom btn-dark"
                                >
                                    {{$t('global.back')}}
                                </router-link>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="alert alert-danger text-center" v-if="errors['en.name']">{{ errors['en.name'][0] }}<br /> </div>
                                    <div class="alert alert-danger text-center" v-if="errors['ar.name']">{{ errors['ar.name'][0] }}<br /> </div>
                                    <div class="alert alert-danger text-center" v-if="errors['en.description']">{{ errors['en.description'][0] }}<br /> </div>
                                    <div class="alert alert-danger text-center" v-if="errors['ar.description']">{{ errors['ar.description'][0] }}<br /> </div>
                                    <form @submit.prevent="editPackage" class="needs-validation">
                                        <div class="form-row row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom01">{{$t('global.TitleEn')}}</label>
                                                <input type="text" class="form-control"
                                                       v-model.trim="v$.en.name.$model"
                                                       id="validationCustom01"
                                                       :placeholder="$t('global.TitleEn')"
                                                       :class="{'is-invalid':v$.en.name.$error,'is-valid':!v$.en.name.$invalid}"
                                                >
                                                <div class="valid-feedback">{{$t('global.LooksGood')}}</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.en.name.required.$invalid">{{$t('global.TitleEnIsRequired')}}<br /> </span>
                                                    <span v-if="v$.en.name.minLength.$invalid">{{$t('global.TitleEnIsMustHaveAtLeast')}} {{ v$.en.name.minLength.$params.min }} {{$t('global.Letters')}} <br /></span>
                                                    <span v-if="v$.en.name.maxLength.$invalid">{{$t('global.TitleEnIsMustHaveAtMost')}} {{ v$.en.name.maxLength.$params.max }} {{$t('global.Letters')}} </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom02">{{$t('global.TitleAr')}}</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="v$.ar.name.$model"
                                                       id="validationCustom02"
                                                       :class="{'is-invalid':v$.ar.name.$error,'is-valid':!v$.ar.name.$invalid}"
                                                       :placeholder="$t('global.TitleAr')"
                                                >
                                                <div class="valid-feedback">{{$t('global.LooksGood')}}</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.ar.name.required.$invalid">{{$t('global.TitleArIsRequired')}} <br /></span>
                                                    <span v-if="v$.ar.name.minLength.$invalid">{{$t('global.TitleArIsMustHaveAtLeast')}} {{ v$.ar.name.minLength.$params.min }} {{$t('global.Letters')}} <br /></span>
                                                    <span v-if="v$.ar.name.maxLength.$invalid">{{$t('global.TitleArIsMustHaveAtMost')}} {{ v$.ar.name.maxLength.$params.max }} {{$t('global.Letters')}} </span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom01">{{$t('global.DescriptionEn')}}</label>
                                                <textarea class="form-control"
                                                          v-model.trim="v$.en.description.$model"
                                                          :placeholder="$t('global.DescriptionEn')"
                                                          :class="{'is-invalid':v$.en.description.$error,'is-valid':!v$.en.description.$invalid}"
                                                ></textarea>
                                                <div class="valid-feedback">{{$t('global.LooksGood')}}</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.en.description.required.$invalid">{{$t('global.DescriptionEnIsRequired')}}<br /> </span>
                                                    <span v-if="v$.en.description.minLength.$invalid">{{$t('global.DescriptionEnIsMustHaveAtLeast')}} {{ v$.en.description.minLength.$params.min }} {{$t('global.Letters')}} <br /></span>
                                                    <span v-if="v$.en.description.maxLength.$invalid">{{$t('global.DescriptionEnIsMustHaveAtMost')}} {{ v$.en.description.maxLength.$params.max }} {{$t('global.Letters')}} </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom02">{{$t('global.DescriptionAr')}}</label>
                                                <textarea class="form-control"
                                                          v-model.trim="v$.ar.description.$model"
                                                          :class="{'is-invalid':v$.ar.description.$error,'is-valid':!v$.ar.description.$invalid}"
                                                          :placeholder="$t('global.DescriptionAr')"
                                                ></textarea>
                                                <div class="valid-feedback">{{$t('global.LooksGood')}}</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.ar.description.required.$invalid">{{$t('global.DescriptionArIsRequired')}} <br /></span>
                                                    <span v-if="v$.ar.description.minLength.$invalid">{{$t('global.DescriptionArIsMustHaveAtLeast')}} {{ v$.ar.description.minLength.$params.min }} {{$t('global.Letters')}} <br /></span>
                                                    <span v-if="v$.ar.description.maxLength.$invalid">{{$t('global.DescriptionArIsMustHaveAtMost')}} {{ v$.ar.description.maxLength.$params.max }} {{$t('global.Letters')}} </span>
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
import {required,minLength,maxLength} from '@vuelidate/validators';
import adminApi from "../../../api/adminAxios";
import { notify } from "@kyvg/vue3-notification";
import {useI18n} from "vue-i18n";


export default {
    name: "edit",
    data(){
        return {
            errors:{}
        }
    },
    props:["id"],
    setup(props){
        const emitter = inject('emitter');

        const {id} = toRefs(props)
        const {t} = useI18n({});
        let job = ref({});
        let loading = ref(false);


        let getMainPackageViews = () => {
            loading.value = true;

            adminApi.get(`/v1/dashboard/sizingOne/${id.value}/edit`)
                .then((res) => {
                    let l = res.data.data;
                    addPackage.data.en.name = l.package.translations[1].name;
                    addPackage.data.ar.name = l.package.translations[0].name;
                    addPackage.data.en.description = l.package.translations[1].description;
                    addPackage.data.ar.description = l.package.translations[0].description;
                })
                .catch((err) => {
                    console.log(err.response);
                })
                .finally(() => {
                    loading.value = false;
                })
        }

        onMounted(() => {
            getMainPackageViews();
        });

        let addPackage =  reactive({
            data:{
                en:{ name : '',
                    description : ''
                },
                ar:{ name : '',
                    description : ''
                }
            }
        });

        const rules = computed(() => {
            return {
                en:{
                    name: {
                        minLength: minLength(3),
                        maxLength:maxLength(40),
                        required
                    },
                    description: {
                        minLength: minLength(3),
                        maxLength:maxLength(300),
                        required
                    }
                },
                ar:{
                    name: {
                        minLength: minLength(3),
                        maxLength:maxLength(40),
                        required
                    },
                    description: {
                        minLength: minLength(3),
                        maxLength:maxLength(300),
                        required
                    }
                }
            }
        });


        const v$ = useVuelidate(rules,addPackage.data);


        return {t,loading,...toRefs(addPackage),v$};
    },
    methods: {
        editPackage(){
            this.v$.$validate();

            if(!this.v$.$error){

                this.loading = true;
                this.errors = {};

                adminApi.put(`/v1/dashboard/sizingOne/${this.id}`,this.data)
                    .then((res) => {

                        notify({
                            title: `${this.t('global.EditSuccessfully')} <i class="fas fa-check-circle"></i>`,
                            type: "success",
                            duration: 5000,
                            speed: 2000
                        });

                    })
                    .catch((err) => {
                        this.errors = err.response.data.errors;
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
</style>
