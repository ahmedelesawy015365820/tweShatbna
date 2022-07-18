<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">

        <div class="content container-fluid">

            <notifications :position="this.$i18n.locale == 'ar'? 'top left': 'top right'"  />

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Banner</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'indexBanner', params: {lang: locale || 'ar'}}">Banner</router-link></li>
                            <li class="breadcrumb-item active">Edit Banner</li>
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
                                    :to="{name: 'indexBanner', params: {lang: locale || 'ar'}}"
                                    class="btn btn-custom btn-dark"
                                >
                                    back
                                </router-link>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="alert alert-danger text-center" v-if="errors['en.name']">{{ errors['en.name'][0] }}<br /> </div>
                                    <div class="alert alert-danger text-center" v-if="errors['ar.name']">{{ errors['ar.name'][0]  }}<br /> </div>
                                    <form @submit.prevent="editBanner" class="needs-validation">
                                        <div class="form-row row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom01">Title 1 (EN)</label>
                                                <input type="text" class="form-control"
                                                       v-model.trim="v$.en.title1.$model"
                                                       id="validationCustom01"
                                                       placeholder="Name En"
                                                       :class="{'is-invalid':v$.en.title1.$error,'is-valid':!v$.en.title1.$invalid}"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.en.title1.required.$invalid">name en is required.<br /> </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom02">Title 1 (AR)</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="v$.ar.title1.$model"
                                                       id="validationCustom02"
                                                       :class="{'is-invalid':v$.ar.title1.$error,'is-valid':!v$.ar.title1.$invalid}"
                                                       placeholder="Name Ar"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.ar.title1.required.$invalid">name en is required. <br /></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom03">Title 2 (EN)</label>
                                                <input type="text" class="form-control"
                                                       v-model.trim="v$.en.title2.$model"
                                                       id="validationCustom03"
                                                       placeholder="Name En"
                                                       :class="{'is-invalid':v$.en.title2.$error,'is-valid':!v$.en.title2.$invalid}"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.en.title2.required.$invalid">name en is required.<br /> </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom04">Title 2 (AR)</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="v$.ar.title2.$model"
                                                       id="validationCustom04"
                                                       :class="{'is-invalid':v$.ar.title2.$error,'is-valid':!v$.ar.title2.$invalid}"
                                                       placeholder="Name Ar"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.ar.title2.required.$invalid">name en is required. <br /></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom05">Title 3 (EN)</label>
                                                <input type="text" class="form-control"
                                                       v-model.trim="v$.en.title3.$model"
                                                       id="validationCustom05"
                                                       placeholder="Name En"
                                                       :class="{'is-invalid':v$.en.title3.$error,'is-valid':!v$.en.title3.$invalid}"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.en.title3.required.$invalid">name en is required.<br /> </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom06">Title 3 (AR)</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="v$.ar.title3.$model"
                                                       id="validationCustom06"
                                                       :class="{'is-invalid':v$.ar.title3.$error,'is-valid':!v$.ar.title3.$invalid}"
                                                       placeholder="Name Ar"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.ar.title3.required.$invalid">name en is required. <br /></span>
                                                </div>
                                            </div>

                                            <div class="col-md-12 row flex-fill">
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
                                                <span class="text-danger text-center">اقصي ارتفاع للصوره يكون 600px و اقصي عرض 1000px و ان حجمها لا يتعدي 2mb</span>
                                                <p class="num-of-files">{{numberOfImage ? numberOfImage + ' Files Selected' : 'No Files Chosen' }}</p>
                                                <div class="container-images" id="container-images" v-show="data.file && numberOfImage"></div>
                                                <div class="container-images" v-show="!numberOfImage">
                                                    <figure>
                                                        <figcaption>
                                                            <img :src="`/web/img/banner/${image}`">
                                                        </figcaption>
                                                    </figure>
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
    props: ['id'],
    setup(props){
        // get create Package
        let loading = ref(false);
        const { id } = toRefs(props);
        const image = ref('');

        //start design
        let banner =  reactive({
            data:{
                en:{ title1 : '',title2 : '',title3 : ''},
                ar:{ title1 : '',title2 : '',title3 : ''},
                file: {}
            }
        });


        const rules = computed(() => {
            return {
                en:{
                    title1: {
                        required,
                    },
                    title2: {
                        required,
                    },
                    title3: {
                        required,
                    }
                },
                ar:{
                    title1: {
                        required,
                    },
                    title2: {
                        required,
                    },
                    title3: {
                        required,
                    }
                }
            }
        });

        let getDATA = () => {
            loading.value = true;

            adminApi.get(`/v1/dashboard/banner/${id.value}/edit`)
                .then((res) => {
                    let l = res.data.data;
                    banner.data.en.title1 = l.banner.translations[1].title1;
                    banner.data.ar.title1 = l.banner.translations[0].title1;
                    banner.data.en.title2 = l.banner.translations[1].title2;
                    banner.data.ar.title2 = l.banner.translations[0].title2;
                    banner.data.en.title3 = l.banner.translations[1].title3;
                    banner.data.ar.title3 = l.banner.translations[0].title3;
                    image.value = l.banner.media.file_name;

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

        const v$ = useVuelidate(rules,banner.data);

        const numberOfImage = ref(0);

        let preview = (e) => {

            let containerImages = document.querySelector('#container-images');
            if(numberOfImage.value){
                containerImages.innerHTML = '';
            }
            banner.data.file = {};

            numberOfImage.value = e.target.files.length;

            banner.data.file = e.target.files[0];

            let reader = new FileReader();
            let figure = document.createElement('figure');
            let figcap = document.createElement('figcaption');

            figcap.innerText = banner.data.file.name;
            figure.appendChild(figcap);

            reader.onload = () => {
                let img = document.createElement('img');
                img.setAttribute('src',reader.result);
                figure.insertBefore(img,figcap);
            }

            containerImages.appendChild(figure);
            reader.readAsDataURL(banner.data.file);

        };


        return {loading,...toRefs(banner),id,v$,preview,numberOfImage,image};
    },
    methods: {
        editBanner(){
            this.v$.$validate();

            if(!this.v$.$error){

                this.loading = true;
                this.errors = {};

                let formData = new FormData();
                formData.append('title1_ar',this.data.en.title1);
                formData.append('title1_en',this.data.ar.title1);
                formData.append('title2_ar',this.data.en.title2);
                formData.append('title2_en',this.data.ar.title2);
                formData.append('title3_ar',this.data.en.title3);
                formData.append('title3_en',this.data.ar.title3);
                formData.append('file',this.data.file);
                formData.append('_method','PUT');

                adminApi.put(`/v1/dashboard/banner/${this.id}`,formData)
                    .then((res) => {

                        notify({
                            title: `Successfully edited <i class="fas fa-check-circle"></i>`,
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
