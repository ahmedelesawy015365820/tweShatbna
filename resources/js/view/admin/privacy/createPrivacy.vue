<template>
    <div class="page-wrapper">

        <div class="content container-fluid">

            <notifications :position="this.$i18n.locale == 'ar'? 'top left': 'top right'"  />

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Privacy</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'indexPrivacy', params: {lang: locale || 'ar'}}">Privacy</router-link></li>
                            <li class="breadcrumb-item active">Create Privacy</li>
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
                                    :to="{name: 'indexPrivacy', params: {lang: locale || 'ar'}}"
                                    class="btn btn-custom btn-dark"
                                >
                                    back
                                </router-link>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <form @submit.prevent="storeCountry" class="needs-validation">
                                        <div class="form-row row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom01">Title En</label>
                                                <input type="text" class="form-control"
                                                       v-model.trim="v$.en.title.$model"
                                                       id="validationCustom01"
                                                       placeholder="Name En"
                                                       :class="{'is-invalid':v$.en.title.$error,'is-valid':!v$.en.title.$invalid}"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.en.title.required.$invalid">title en is required.<br /> </span>
                                                    <span v-if="v$.en.title.minLength.$invalid">title en is must have at least {{ v$.en.title.minLength.$params.min }} letters. <br /></span>
                                                    <span v-if="v$.en.title.maxLength.$invalid">title en is must have at most {{ v$.en.title.maxLength.$params.max }} letters. </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom02">Title Ar</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="v$.ar.title.$model"
                                                       id="validationCustom02"
                                                       :class="{'is-invalid':v$.ar.title.$error,'is-valid':!v$.ar.title.$invalid}"
                                                       placeholder="Name Ar"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.ar.title.required.$invalid">title en is required. <br /></span>
                                                    <span v-if="v$.ar.title.minLength.$invalid">title en is must have at least {{ v$.ar.title.minLength.$params.min }} letters. <br /></span>
                                                    <span v-if="v$.ar.title.maxLength.$invalid">title en is must have at most {{ v$.ar.title.maxLength.$params.max }} letters. </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row row">
                                            <div class="col-md-12 mb-3">
                                                <label>Description En</label>
                                                <textarea
                                                    class="form-control"
                                                    style="height: 200px"
                                                    rows="6"
                                                    v-model.trim="v$.en.description.$model"
                                                    :class="{'is-invalid':v$.en.description.$error,'is-valid':!v$.en.description.$invalid}"
                                                ></textarea>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.en.description.required.$invalid">description en is required.<br /> </span>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label>Description Ar</label>
                                                <textarea
                                                    class="form-control"
                                                    style="height: 200px"
                                                    rows="6"
                                                    v-model.trim="v$.ar.description.$model"
                                                    :class="{'is-invalid':v$.ar.description.$error,'is-valid':!v$.ar.description.$invalid}"
                                                ></textarea>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.ar.description.required.$invalid">description ar is required. <br /></span>
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
        let addPrivacy =  reactive({
            data:{
                en:{ title : '', description:''},
                ar:{ title : '', description:''},
            }
        });

        const rules = computed(() => {
            return {
                en:{
                    title: {
                        minLength: minLength(3),
                        maxLength:maxLength(40),
                        required,
                    },
                    description: {
                        required
                    }
                },
                ar:{
                    title: {
                        minLength: minLength(3),
                        maxLength:maxLength(40),
                        required
                    },
                    description: {
                        required
                    }
                },
            }
        });


        const v$ = useVuelidate(rules,addPrivacy.data);


        return {loading,...toRefs(addPrivacy),v$};
    },
    methods: {
        storeCountry(){
            this.v$.$validate();

            if(!this.v$.$error){

                this.loading = true;
                this.errors = {};

                adminApi.post(`/v1/dashboard/privacy`,this.data)
                    .then((res) => {

                        notify({
                            title: `Successfully added <i class="fas fa-check-circle"></i>`,
                            type: "success",
                            duration: 5000,
                            speed: 2000
                        });

                        this.data.en.title = '';
                        this.data.ar.title = '';
                        this.data.en.description = '';
                        this.data.ar.description = '';
                        this.$nextTick(() => { this.v$.$reset() });
                    })
                    .catch((err) => {
                        this.errors = err.response.data.errors;

                        console.log(err.response);
                    })
                    .finally(() => {
                        this.loading = false;
                    });

            }
        },
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
