<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">

        <div class="content container-fluid">

            <notifications :position="this.$i18n.locale == 'ar'? 'top left': 'top right'"  />

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Sponser</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'indexSponser', params: {lang: locale || 'ar'}}">Sponser</router-link></li>
                            <li class="breadcrumb-item active">Edit Sponser</li>
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
                                    :to="{name: 'indexSponser', params: {lang: locale || 'ar'}}"
                                    class="btn btn-custom btn-dark"
                                >
                                    back
                                </router-link>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <form @submit.prevent="updateSponser" class="needs-validation">
                                        <div class="form-row row">

                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom01">Name (EN)</label>
                                                <input type="text" class="form-control"
                                                       v-model.trim="v$.en.name_en.$model"
                                                       id="validationCustom01"
                                                       placeholder="Name En"
                                                       :class="{'is-invalid':v$.en.name_en.$error,'is-valid':!v$.en.name_en.$invalid}"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.en.name_en.required.$invalid">name en is required.<br /> </span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom02">Name (AR)</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="v$.ar.name_ar.$model"
                                                       id="validationCustom02"
                                                       :class="{'is-invalid':v$.ar.name_ar.$error,'is-valid':!v$.ar.name_ar.$invalid}"
                                                       placeholder="Name Ar"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.ar.name_ar.required.$invalid">name ar is required. <br /></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom04">Title (en)</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="v$.en.description1_en.$model"
                                                       id="validationCustom04"
                                                       :class="{'is-invalid':v$.en.description1_en.$error,'is-valid':!v$.en.description1_en.$invalid}"
                                                       placeholder="Title En"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.en.description1_en.required.$invalid">Title en is required. <br /></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom03">Title (AR)</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="v$.ar.description1_ar.$model"
                                                       id="validationCustom03"
                                                       :class="{'is-invalid':v$.ar.description1_ar.$error,'is-valid':!v$.ar.description1_ar.$invalid}"
                                                       placeholder="Title Ar"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.ar.description1_ar.required.$invalid">Title ar is required. <br /></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom07">Location (en)</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="v$.en.location_en.$model"
                                                       id="validationCustom07"
                                                       :class="{'is-invalid':v$.en.location_en.$error,'is-valid':!v$.en.location_en.$invalid}"
                                                       placeholder="Location En"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.en.location_en.required.$invalid">Location en is required. <br /></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom08">Location (AR)</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="v$.ar.location_ar.$model"
                                                       id="validationCustom08"
                                                       :class="{'is-invalid':v$.ar.location_ar.$error,'is-valid':!v$.ar.location_ar.$invalid}"
                                                       placeholder="Location Ar"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.ar.location_ar.required.$invalid">Location ar is required. <br /></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom00">Email</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="v$.email.$model"
                                                       id="validationCustom00"
                                                       :class="{'is-invalid':v$.email.$error,'is-valid':!v$.email.$invalid}"
                                                       placeholder="Location Ar"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.email.required.$invalid">Email is required. <br /></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom000">Phone</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="v$.phone.$model"
                                                       id="validationCustom000"
                                                       :class="{'is-invalid':v$.phone.$error,'is-valid':!v$.phone.$invalid}"
                                                       placeholder="Location Ar"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.phone.required.$invalid">Phone ar is required. <br /></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom05">Description (en)</label>
                                                <textarea type="text"
                                                          class="form-control"
                                                          v-model.trim="v$.en.description2_en.$model"
                                                          id="validationCustom05"
                                                          :class="{'is-invalid':v$.en.description2_en.$error,'is-valid':!v$.en.description2_en.$invalid}"
                                                          placeholder="Description En"
                                                ></textarea>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.en.description2_en.required.$invalid">Description en is required. <br /></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom06">Description (AR)</label>
                                                <textarea type="text"
                                                          class="form-control"
                                                          v-model.trim="v$.ar.description2_ar.$model"
                                                          id="validationCustom06"
                                                          :class="{'is-invalid':v$.ar.description2_ar.$error,'is-valid':!v$.ar.description2_ar.$invalid}"
                                                          placeholder="Description Ar"
                                                ></textarea>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.ar.description2_ar.required.$invalid">Description ar is required. <br /></span>
                                                </div>
                                            </div>

                                            <div class="flex-fill col-md-3">
                                                <div class="row">
                                                    <div class="btn btn-outline-primary waves-effect">
                                                    <label>Logo</label>
                                                    <span>
                                                        Choose files
                                                        <i class="fas fa-cloud-upload-alt ml-3" aria-hidden="true"></i>
                                                    </span>
                                                        <input
                                                            type="file"
                                                            @change="preview1"
                                                            id="mediaPackage1"
                                                            accept="image/png,jepg,jpg"
                                                        >
                                                    </div>
                                                    <span class="text-danger text-center">اقصي ارتفاع للصوره يكون 105px و اقصي عرض 105px و ان حجمها لا يتعدي 2mb</span>
                                                    <p class="num-of-files">{{numberOfImage1 ? numberOfImage1 + ' Files Selected' : 'No Files Chosen' }}</p>
                                                    <div class="container-images" id="container-images1" v-show="numberOfImage1"></div>
                                                    <div class="container-images" v-show="!numberOfImage1">
                                                        <figure>
                                                            <figcaption>
                                                                <img :src="`/web/img/sponser/${image1.file_name}`">
                                                            </figcaption>
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex-fill col-md-9">
                                                <div class="row">
                                                    <div class="btn btn-outline-primary waves-effect">
                                                    <label>Banners</label>
                                                    <span>
                                                        Choose files
                                                        <i class="fas fa-cloud-upload-alt ml-3" aria-hidden="true"></i>
                                                    </span>
                                                        <input
                                                            multiple
                                                            type="file"
                                                            @change="preview2"
                                                            id="mediaPackage2"
                                                            accept="image/png,jepg,jpg"
                                                        >
                                                    </div>
                                                    <span class="text-danger text-center">اقصي ارتفاع للصوره يكون 275px و اقصي عرض 275px و ان حجمها لا يتعدي 2mb</span>
                                                    <p class="num-of-files">{{numberOfImage2 ? numberOfImage2 + ' Files Selected' : 'No Files Chosen' }}</p>
                                                    <div class="container-images" id="container-images2" v-show="numberOfImage2"></div>
                                                    <div class="container-images all-image">
                                                        <figure v-for="(item,index) in image2" class="all-image">
                                                            <a class="delete-image" @click="deleteImage(item.id,index)">x</a>
                                                            <figcaption>
                                                                <img :src="`/web/img/sponser/${item.file_name}`">
                                                            </figcaption>
                                                        </figure>
                                                    </div>
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
import {computed, reactive, toRefs, ref, watch, onMounted} from "vue";
import useVuelidate from '@vuelidate/core';
import {required} from '@vuelidate/validators';
import adminApi from "../../../api/adminAxios";
import { notify } from "@kyvg/vue3-notification";

export default {
    name: "createPackage",
    data(){
        return {
            errors:{}
        }
    },
    props:['id'],
    setup(props){
        // get create Package
        let loading = ref(false);
        let {id} = toRefs(props);
        let image1 = ref({});
        let image2 = ref([]);
        let idDetail = ref(null);

        //start design
        let sponser =  reactive({
            data:{
                ar:{ name_ar : '',description1_ar : '',description2_ar : '',location_ar : ''},
                en:{ name_en : '',description1_en : '',description2_en : '',location_en : ''},
                phone: '',
                email: '',
                file: {},
                banners: []
            }
        });

        const rules = computed(() => {
            return {
                ar:{
                    name_ar: {
                        required,
                    },
                    description1_ar: {
                        required,
                    },
                    description2_ar: {
                        required,
                    },
                    location_ar: {
                        required,
                    }
                },
                en:{
                    name_en: {
                        required,
                    },
                    description1_en: {
                        required,
                    },
                    description2_en: {
                        required,
                    },
                    location_en: {
                        required,
                    }
                },
                phone: {
                    required,
                },
                email: {
                    required,
                }
            }
        });

        let getSponser = () => {
            loading.value = true;

            adminApi.get(`/v1/dashboard/sponser/${id.value}/edit`)
                .then((res) => {
                    let l = res.data.data;
                    sponser.data.ar.name_ar = l.sponser.translations[0].name;
                    sponser.data.ar.description1_ar = l.sponser.translations[0].description;
                    sponser.data.ar.description2_ar = l.sponser.details.translations[0].description;
                    sponser.data.ar.location_ar = l.sponser.details.translations[0].location;
                    sponser.data.en.name_en = l.sponser.translations[1].name;
                    sponser.data.en.description1_en = l.sponser.translations[1].description;
                    sponser.data.en.description2_en = l.sponser.details.translations[1].description;
                    sponser.data.en.location_en = l.sponser.details.translations[1].location;
                    sponser.data.phone = l.sponser.details.phone;
                    sponser.data.email = l.sponser.details.email;
                    image1.value = l.sponser.media;
                    image2.value = l.sponser.details.media;
                    idDetail.value = l.sponser.details.id;

                })
                .catch((err) => {
                    console.log(err.response.data);
                })
                .finally(() => {
                    loading.value = false;
                });
        }

        const v$ = useVuelidate(rules,sponser.data);

        onMounted(() => {
            getSponser();
        });

        const numberOfImage1 = ref(0);
        const numberOfImage2 = ref(0);

        let preview1 = (e) => {

            let containerImages = document.querySelector('#container-images1');
            if(numberOfImage1.value){
                containerImages.innerHTML = '';
            }
            sponser.data.file = {};

            numberOfImage1.value = e.target.files.length;

            sponser.data.file = e.target.files[0];

            let reader = new FileReader();
            let figure = document.createElement('figure');
            let figcap = document.createElement('figcaption');

            figcap.innerText = sponser.data.file.name;
            figure.appendChild(figcap);

            reader.onload = () => {
                let img = document.createElement('img');
                img.setAttribute('src',reader.result);
                figure.insertBefore(img,figcap);
            }

            containerImages.appendChild(figure);
            reader.readAsDataURL(sponser.data.file);

        };

        let preview2 = (e) => {

            let containerImages = document.querySelector('#container-images2');
            if(numberOfImage2.value){
                containerImages.innerHTML = '';
            }
            sponser.data.banners = [];

            numberOfImage2.value = e.target.files.length;

            for(let i of e.target.files){

                sponser.data.banners.push(i);

                let reader = new FileReader();
                let figure = document.createElement('figure');
                let figcap = document.createElement('figcaption');

                figcap.innerText = i.name;
                figure.appendChild(figcap);

                reader.onload = () => {
                    let img = document.createElement('img');
                    img.setAttribute('src',reader.result);
                    figure.insertBefore(img,figcap);
                }

                containerImages.appendChild(figure);
                reader.readAsDataURL(i);

            }

        };

        let deleteImage = (idMedia,index) => {

            Swal.fire({
                title: `Are you sure delete ?`,
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {

                    adminApi.post(`/v1/dashboard/sponser/deleteOne/${idDetail.value}`,{idMedia :idMedia})
                        .then((res) => {
                            image2.value.splice(index,1);

                            Swal.fire({
                                icon: 'success',
                                title: 'Your image has been deleted.',
                                showConfirmButton: false,
                                timer: 1500
                            });

                        })
                        .catch((err) => {
                            Swal.fire({
                                icon: 'error',
                                title: 'يوجد خطا في النظام...',
                                text: 'لا تسنطيع حذف هذه الحزمة !',
                            });
                            console.log(err.response);
                        });
                }
            });

        };

        let empty1 = () => {
            numberOfImage1.value = 0;
            let clearInput = document.querySelector('#mediaPackage1').value = '';
            let containerImages = document.querySelector('#container-images1');
            containerImages.innerHTML = '';

        }

        let empty2 = () => {
            numberOfImage2.value = 0;
            let clearInput = document.querySelector('#mediaPackage2').value = '';
            let containerImages = document.querySelector('#container-images2');
            containerImages.innerHTML = '';
        }

        return {
            loading,
            ...toRefs(sponser),
            v$,
            preview1,
            preview2,
            numberOfImage1,
            numberOfImage2,
            id,
            image1,
            image2,
            deleteImage,
            idDetail,
            getSponser,
            empty1,
            empty2
        };
    },
    methods: {
        updateSponser(){
            this.v$.$validate();

            if(!this.v$.$error){

                this.loading = true;
                this.errors = {};

                let formData = new FormData();
                formData.append('name_en',this.data.en.name_en);
                formData.append('name_ar',this.data.ar.name_ar);
                formData.append('description1_en',this.data.en.description1_en);
                formData.append('description1_ar',this.data.ar.description1_ar);
                formData.append('description2_en',this.data.en.description2_en);
                formData.append('description2_ar',this.data.ar.description2_ar);
                formData.append('location_en',this.data.en.location_en);
                formData.append('location_ar',this.data.ar.location_ar);
                formData.append('phone',this.data.phone);
                formData.append('email',this.data.email);
                formData.append('file',this.data.file);
                for( var i = 0; i < this.numberOfImage2; i++ ){
                    let file = this.data.banners[i];
                    formData.append('files[' + i + ']', file);
                }
                formData.append('_method','PUT');

                adminApi.post(`/v1/dashboard/sponser/${this.id}`,formData)
                    .then((res) => {

                        notify({
                            title: `Successfully edited <i class="fas fa-check-circle"></i>`,
                            type: "success",
                            duration: 5000,
                            speed: 2000
                        });

                        this.data.banners = [];
                        this.data.file = {};
                        this.empty1();
                        this.empty2();
                        this.getSponser();
                    })
                    .catch((err) => {
                        this.errors = err.response.data.errors;
                        console.log(err.response);
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

textarea {
    height: 175px;
}

.all-image{
    position: relative;
}

.delete-image{
    position: absolute;
    top: 4px;
    left: 0;
    font-size: 17px;
    border-radius: 50%;
    padding: 0px 10px;
    font-weight: 700;
    z-index: 7;
    background-color: #fff;
    display: inline-block;
    cursor: pointer;
}
</style>
