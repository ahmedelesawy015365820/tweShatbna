<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">

        <div class="content container-fluid">

            <notifications :position="this.$i18n.locale == 'ar'? 'top left': 'top right'"  />

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">News Letter</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'indexNewLetter', params: {lang: locale || 'ar'}}">New Letter</router-link></li>
                            <li class="breadcrumb-item active">Create News Letter</li>
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
                                    :to="{name: 'indexNewLetter', params: {lang: locale || 'ar'}}"
                                    class="btn btn-custom btn-dark"
                                >
                                    back
                                </router-link>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <form @submit.prevent="storeNewLetter" class="needs-validation">
                                        <div class="form-row row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom01">Email</label>
                                                <input type="text" class="form-control"
                                                       v-model.trim="v$.email.$model"
                                                       id="validationCustom01"
                                                       placeholder="Email"
                                                       :class="{'is-invalid':v$.email.$error,'is-valid':!v$.email.$invalid}"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span class="text-danger" v-if="v$.email.required.$invalid">email is required.<br /> </span>
                                                    <span class="text-danger" v-if="v$.email.email.$invalid">must be a valid email address. </span>
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
import {computed, reactive,ref} from "vue";
import useVuelidate from '@vuelidate/core';
import {required,email} from '@vuelidate/validators';
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
        let data =  reactive({email: ''});

        const rules = computed(() =>{
            return{
                email:{
                    required,
                    email
                }
            }
        } );

        const v$ = useVuelidate(rules,data);

        return {loading,data,v$};
    },
    methods: {
        storeNewLetter(){
            this.v$.$validate();

            if(!this.v$.$error){

                this.loading = true;
                this.errors = {};

                adminApi.post(`/v1/dashboard/newLetter`,this.data)
                    .then((res) => {

                        notify({
                            title: `Successfully added <i class="fas fa-check-circle"></i>`,
                            type: "success",
                            duration: 5000,
                            speed: 2000
                        });

                        this.data.email = '';
                        this.$nextTick(() => { this.v$.$reset() });
                    })
                    .catch((err) => {
                        Swal.fire({
                            icon: 'error',
                            title: 'يوجد خطا ...',
                            text: 'الايميل موجود مسبقا  !',
                        });
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
