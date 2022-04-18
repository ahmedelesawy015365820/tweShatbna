<template>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Package</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'package', params: {lang: locale || 'ar'}}">Package</router-link></li>
                            <li class="breadcrumb-item active">Create Sale</li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <loader v-if="loading" />
                        <div class="card-body">
                            <div class="card-header pt-0 mb-4">
                                <router-link
                                    :to="{name: 'sale', params: {lang: locale || 'ar'}}"
                                    class="btn btn-custom btn-dark"
                                >
                                    back
                                </router-link>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <form @submit.prevent="storeSale"  class="needs-validation">
                                        <div class="form-row row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Ip</label>
                                                <input type="number" class="form-control"
                                                       id="validationCustom01"
                                                       v-model.trim.number="v$.user.$model"
                                                       placeholder="Id User"
                                                       :class="{'is-invalid':v$.user.$error,'is-valid':!v$.user.$invalid}"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="!v$.user.required.$invalid">user id is required.<br> </span>
                                                    <span v-if="v$.user.minValue.$invalid">user id is must have at least {{ v$.user.minValue.$params.min }} letters. </span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Packages</label>
                                                <select
                                                    class="form-control"
                                                    v-model="v$.package.$model"
                                                    id="validationCustom02"
                                                    aria-label="Default select example"
                                                    :class="{'is-invalid':v$.package.$error,'is-valid':!v$.package.$invalid}"
                                                >
                                                    <option :value="item.id" v-for="item in packages">{{item.name}}</option>
                                                </select>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.package.required.$invalid">package is required. </span>
                                                </div>
                                            </div>
                                            <div class="card flex-fill col-md-4">
                                                <div class="p-3 text-center">
                                                    <p class="card-text f-12">Check</p>
                                                </div>
                                                <div>
                                                    <label class="form-group toggle-switch mb-0" for="notification_switch1">
                                                        <input type="checkbox" v-model="data.check" class="toggle-switch-input" id="notification_switch1">
                                                        <span class="toggle-switch-label mx-auto">
													        <span class="toggle-switch-indicator"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row flex-fill col-md-12">
                                                <div class="btn btn-outline-primary waves-effect">
                                                    <span>
                                                        Choose files
                                                        <i class="fas fa-cloud-upload-alt ml-3" aria-hidden="true"></i>
                                                    </span>
                                                    <input
                                                        name="mediaPackage[]"
                                                        multiple
                                                        type="file"
                                                        @change="preview"
                                                        id="mediaPackage"
                                                        accept="image/png,jepg,jpg"
                                                    >
                                                </div>
                                                <p class="num-of-files">{{numberOfImage ? numberOfImage + ' Files Selected' : 'No Files Chosen' }}</p>
                                                <span class="text-danger text-center" v-if="min">images is required. <br /></span>
                                                <span class="text-danger text-center" v-if="requiredn">images is must have at least 1 photos<br /></span>
                                                <span class="text-danger text-center" v-if="max">images is must have at most 5 photos. <br /></span>
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
        </div>
    </div>
</template>

<script>
import {useStore} from "vuex";
import {computed, inject, onMounted, ref, watch, reactive,toRefs} from "vue";

import useVuelidate from '@vuelidate/core';
import {required,minValue} from '@vuelidate/validators';

export default {
    name: "createSale",
    data(){
        return {
            locale: localStorage.getItem("langAdmin")
        }
    },
    setup(){
        const store = useStore();
        const emitter = inject('emitter');

        // get create Package
        let packages = computed(() => store.getters['sale/Packages'] );
        let loading = computed(() => store.getters['sale/loading'] );


        let getPackages = () => {
            store.dispatch('sale/getCreate');
        }
        onMounted(() => {
            getPackages();
        });

        emitter.on('get_lang', () => {
            getPackages();
        });

        const numberOfImage = ref(0);
        const images = ref([]);

        let empty = () => {
            numberOfImage.value = 0;
            let clearInput = document.querySelector('#mediaPackage').value = '';
            min.value = false;
            requiredn.value = false;
            max.value = false;
            store.commit('advertise/errorsEdit',{})
        }

        let preview = (e) => {

            let containerImages = document.querySelector('#container-images');
            containerImages.innerHTML = '';
            numberOfImage.value = e.target.files.length;

            for(let i of e.target.files){

                images.value.push(i);

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

        }

        // validation image
        const max = ref(false);
        const min = ref(false);
        const requiredn = ref(false);

        watch(numberOfImage, (count, prevCount) => {
            if(!count || count < 1){
                min.value = true;
                requiredn.value = true;
            }else if(count > 5){
                max.value = true;
            }else {
                min.value = false;
                requiredn.value = false;
                max.value = false;
            }
        });

        const dataSale = reactive({
            data:{
                package:'',
                user:0,
                check: false
            }
        });

        const rules = computed(() => {
            return {
                package: {
                    required,
                },
                user: {
                    required,
                    minValue: minValue(1),
                }
            }
        });


        const v$ = useVuelidate(rules,dataSale.data);

        return {packages,loading,images,max,min,requiredn,preview,numberOfImage,v$,...toRefs(dataSale)};

    },
    methods:{
        storeSale(){
            this.v$.$validate();

            if(!this.v$.$error && this.numberOfImage && this.numberOfImage < 6){

                let formData = new FormData();
                formData.append('package',this.data.package);
                formData.append('user',this.data.user);
                formData.append('check',this.data.check ? 1 : 0);

                for( var i = 0; i < this.numberOfImage; i++ ){
                    let file = this.images[i];
                    formData.append('files[' + i + ']', file);
                }

                this.$store.dispatch('sale/storeSale',formData);

            }else{
                if(!this.numberOfImage){
                    this.max = true;
                    this.min = true;
                    this.requiredn = true;
                }
            }
        }
    }
}
</script>

<style scoped>

.card {
    border: none;
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


.p-3 {
    padding: 1rem!important;
}

.btn {
    margin-top: 20px;
}
</style>
