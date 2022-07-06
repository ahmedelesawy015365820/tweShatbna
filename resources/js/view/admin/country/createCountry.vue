<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">

        <div class="content container-fluid">

            <notifications :position="this.$i18n.locale == 'ar'? 'top left': 'top right'"  />

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Country</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'indexCountry', params: {lang: locale || 'ar'}}">Country</router-link></li>
                            <li class="breadcrumb-item active">Create Country</li>
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
                                    :to="{name: 'indexCountry', params: {lang: locale || 'ar'}}"
                                    class="btn btn-custom btn-dark"
                                >
                                    back
                                </router-link>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="alert alert-danger text-center" v-if="errors['en']">{{ errors['en'][0] }}<br /> </div>
                                    <div class="alert alert-danger text-center" v-if="errors['ar']">{{ errors['ar'][0]  }}<br /> </div>
                                    <div class="alert alert-danger text-center" v-if="errors['file']">{{ errors['file'][0]  }}<br /> </div>
                                    <form @submit.prevent="storeCountry" class="needs-validation">
                                        <div class="form-row row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Country En</label>
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
                                                <label for="validationCustom02">Country Ar</label>
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
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom03">Code</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="v$.code.$model"
                                                       id="validationCustom03"
                                                       :class="{'is-invalid':v$.code.$error,'is-valid':!v$.code.$invalid}"
                                                       placeholder="code"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.code.required.$invalid">code is required. <br /></span>
                                                    <span v-if="v$.code.minLength.$invalid">code is must have at least {{ v$.code.minLength.$params.min }} letters. <br /></span>
                                                    <span v-if="v$.code.maxLength.$invalid">code is must have at most {{ v$.code.maxLength.$params.max }} letters. </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
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

                                            <div class="col-md-4 row flex-fill">
                                                <div class="btn btn-outline-primary waves-effect">
                                                    <span>
                                                        Choose files
                                                        <i class="fas fa-cloud-upload-alt ml-3" aria-hidden="true"></i>
                                                    </span>
                                                    <input
                                                        name="mediaPackage"
                                                        type="file"
                                                        @change="preview"
                                                        id="mediaPackage"
                                                        accept="image/png,jepg,jpg"
                                                    >
                                                </div>
                                                <span class="text-danger text-center">اقصي ارتفاع للصوره يكون 50px و اقصي عرض 50px و ان حجمها لا يتعدي 2mb</span>
                                                <p class="num-of-files">{{numberOfImage ? numberOfImage + ' Files Selected' : 'No Files Chosen' }}</p>
                                                <span class="text-danger text-center" v-if="requiredn">images is must have at least 1 photos<br /></span>
                                                <div class="container-images" id="container-images" v-show="numberOfImage"></div>
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
        let addCountry =  reactive({
            data:{
                en:{ name : ''},
                ar:{ name : ''},
                code: '',
                status: false
            }
        });

        const numberOfImage = ref(0);
        const image = ref({});

        let empty = () => {
            numberOfImage.value = 0;
            let clearInput = document.querySelector('#mediaPackage').value = '';
            requiredn.value = false;
        }

        let preview = (e) => {

            let containerImages = document.querySelector('#container-images');
            containerImages.innerHTML = '';
            image.value = {};

            numberOfImage.value = e.target.files.length;

                image.value = e.target.files[0];

                let reader = new FileReader();
                let figure = document.createElement('figure');
                let figcap = document.createElement('figcaption');

                figcap.innerText = image.value.name;
                figure.appendChild(figcap);

                reader.onload = () => {
                    let img = document.createElement('img');
                    img.setAttribute('src',reader.result);
                    figure.insertBefore(img,figcap);
                }

                containerImages.appendChild(figure);
                reader.readAsDataURL(image.value);


        }

        // validation image
        const requiredn = ref(false);

        watch(numberOfImage, (count, prevCount) => {
            if(!count){
                requiredn.value = true;
            }else {
                requiredn.value = false;
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
                },
                code: {
                    required,
                    minLength: minLength(1),
                    maxLength:maxLength(5),
                }
            }
        });


        const v$ = useVuelidate(rules,addCountry.data);


        return {loading,empty,preview,image,...toRefs(addCountry),v$,numberOfImage,requiredn};
    },
    methods: {
        storeCountry(){
            this.v$.$validate();

            if(!this.v$.$error && this.numberOfImage){

                this.loading = true;
                this.errors = {};

                let formData = new FormData();
                formData.append('en',this.data.en.name);
                formData.append('ar',this.data.ar.name);
                formData.append('code',this.data.code);
                formData.append('status',this.data.status ? 1 : 0);
                formData.append('file',this.image);

                adminApi.post(`/v1/dashboard/country`,formData)
                    .then((res) => {

                        notify({
                            title: `Successfully added <i class="fas fa-check-circle"></i>`,
                            type: "success",
                            duration: 5000,
                            speed: 2000
                        });

                        this.image = {};
                        this.empty();
                        this.resetForm();
                        this.$nextTick(() => { this.v$.$reset() });
                    })
                    .catch((err) => {
                        this.errors = err.response.data.errors;
                    })
                    .finally(() => {
                        this.loading = false;
                    });

            }else{
                if(!this.numberOfImage){
                    this.requiredn = true;
                }
            }
        },
        resetForm(){
            this.data.en.name = '';
            this.data.ar.name = '';
            this.data.code = '';
            this.data.status = '';
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

.waves-effect {
    position: relative;
    overflow: hidden;
    cursor: pointer;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
    width: 200px;
    height: 50px;
    text-align: center;
    line-height: 34px;
    margin: auto;
}

input[type="file"] {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    padding: 0;
    margin: 0;
    cursor: pointer;
    filter: alpha(opacity=0);
    opacity: 0;
}

.num-of-files{
    text-align: center;
    margin: 20px 0 30px;
}

.container-images {
    width: 90%;
    position: relative;
    margin: auto;
    display: flex;
    justify-content: space-evenly;
    gap: 20px;
    flex-wrap: wrap;
    padding: 10px;
    border-radius: 20px;
    background-color: #f7f7f7;
}
</style>
