<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">

        <div class="content container-fluid">

            <notifications :position="this.$i18n.locale == 'ar'? 'top left': 'top right'"  />

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Academic Degree</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'indexDegree', params: {lang: locale || 'ar'}}">Academic Degree</router-link></li>
                            <li class="breadcrumb-item active">Create Academic Degree</li>
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
                                    :to="{name: 'indexDegree', params: {lang: locale || 'ar'}}"
                                    class="btn btn-custom btn-dark"
                                >
                                    back
                                </router-link>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="alert alert-danger text-center" v-if="errors['en.name']">{{ errors['en.name'][0] }}<br /> </div>
                                    <div class="alert alert-danger text-center" v-if="errors['ar.name']">{{ errors['ar.name'][0]  }}<br /> </div>
                                    <form @submit.prevent="storeDegree" class="needs-validation">
                                        <div class="form-row row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Degree En</label>
                                                <input type="text" class="form-control"
                                                       v-model.trim="v$.en.name.$model"
                                                       id="validationCustom01"
                                                       placeholder="Name En"
                                                       :class="{'is-invalid':v$.en.name.$error,'is-valid':!v$.en.name.$invalid}"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.en.name.required.$invalid">name en is required.<br /> </span>
                                                    <span v-if="v$.en.name.minLength.$invalid">name en is must have at least {{ v$.en.name.minLength.$params.min }} letters. <br /></span>
                                                    <span v-if="v$.en.name.maxLength.$invalid">name en is must have at most {{ v$.en.name.maxLength.$params.max }} letters. </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Degree Ar</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="v$.ar.name.$model"
                                                       id="validationCustom02"
                                                       :class="{'is-invalid':v$.ar.name.$error,'is-valid':!v$.ar.name.$invalid}"
                                                       placeholder="Name Ar"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.ar.name.required.$invalid">name en is required. <br /></span>
                                                    <span v-if="v$.ar.name.minLength.$invalid">name en is must have at least {{ v$.ar.name.minLength.$params.min }} letters. <br /></span>
                                                    <span v-if="v$.ar.name.maxLength.$invalid">name en is must have at most {{ v$.ar.name.maxLength.$params.max }} letters. </span>
                                                </div>
                                            </div>
                                            <div class="card col-md-4" style="height: 138px;">
                                                <div class="card-body p-3 text-center">
                                                    <p class="card-text f-12">Active</p>
                                                </div>
                                                <div class="card-footer">
                                                    <label class="form-group toggle-switch mb-0" for="notification_switch1">
                                                        <input type="checkbox" v-model="data.status"  class="toggle-switch-input" id="notification_switch1">
                                                        <span class="toggle-switch-label mx-auto">
                                                        <span class="toggle-switch-indicator"></span></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Submit</button>
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
import {required,minLength,between,maxLength,alpha,integer} from '@vuelidate/validators';
import adminApi from "../../../api/adminAxios";
import { notify } from "@kyvg/vue3-notification";


export default {
    name: "createPackage",
    data(){
        return {
            errors:{}
        }
    },
    setup(){
        // get create Package
        let loading = ref(false);

        //start design
        let addDesign =  reactive({
            data:{
                en:{ name : ''},
                ar:{ name : ''},
                status: false
            }
        });


        const rules = computed(() => {
            return {
                en:{
                    name: {
                        minLength: minLength(3),
                        maxLength:maxLength(40),
                        required,
                    }
                },
                ar:{
                    name: {
                        minLength: minLength(3),
                        maxLength:maxLength(40),
                        required
                    }
                }
            }
        });


        const v$ = useVuelidate(rules,addDesign.data);


        return {loading,...toRefs(addDesign),v$};
    },
    methods: {
        storeDegree(){
            this.v$.$validate();

            if(!this.v$.$error){

                this.loading = true;
                this.errors = {};

                adminApi.post(`/v1/dashboard/degreeDesign`,this.data)
                    .then((res) => {

                        notify({
                            title: `Successfully added <i class="fas fa-check-circle"></i>`,
                            type: "success",
                            duration: 5000,
                            speed: 2000
                        });

                        this.resetForm();
                        this.$nextTick(() => { this.v$.$reset() });
                    })
                    .catch((err) => {
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
            this.data.status = false;
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
