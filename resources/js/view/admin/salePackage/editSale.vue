<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
        <div class="content container-fluid">

            <notifications :position="this.$i18n.locale == 'ar'? 'top left': 'top right'"  />

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Package</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'package', params: {lang: locale || 'ar'}}">Package</router-link></li>
                            <li class="breadcrumb-item active">Edit Sale</li>
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
                                    <form @submit.prevent="editSale"  class="needs-validation">
                                        <div class="form-row row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Packages</label>
                                                <select
                                                    class="form-control"
                                                    v-model="v$.package.$model"
                                                    id="validationCustom02"
                                                    aria-label="Default select example"
                                                    :class="{'is-invalid':v$.package.$error,'is-valid':!v$.package.$invalid}"
                                                    required
                                                >
                                                    <option
                                                        :value="item.id"
                                                         v-for="item in packages"
                                                    >
                                                            {{item.name}}
                                                    </option>
                                                </select>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.package.required.$invalid">package is required. </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row flex-fill col-md-12">
                                            <div class="container-images row">
                                                <div v-for="(image,index) in packageIdE.media" class="col-md-3 all-image">
                                                    <a class="delete-image" @click="deleteImage(image.id,index)">x</a>
                                                    <figure>
                                                        <img :src="'/web/img/advertise/'+ id +'/' + image.file_name" />
                                                    </figure>
                                                </div>
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
                                            <span class="text-danger text-center" v-if="max">images is must have at most 5 photos. <br /></span>
                                            <div class="container-images" id="container-images" v-show="numberOfImage"></div>
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
import {computed, inject, onMounted, toRefs, ref, reactive} from "vue";
import adminApi from "../../../api/adminAxios";
import {minValue, required} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import {notify} from "@kyvg/vue3-notification";

export default {
    name: "editSale",
    data(){
        return {
            locale: localStorage.getItem("langAdmin")
        }
    },
    props:['id'],
    setup(props){

        const emitter = inject('emitter');
        const { id } = toRefs(props);

        // get create Package
        let packages = ref([]);
        let packageIdE = ref({});
        let loading = ref(false);
        let images = ref([]);
        let numberOfImage = ref(0);

        const dataSale = reactive({
            data:{
                package:'',
            }
        });

        const rules = computed(() => {
            return {
                package: {
                    required,
                }
            }
        });

        const v$ = useVuelidate(rules,dataSale.data);

        let empty = () => {
            numberOfImage.value = 0;
            let clearInput = document.querySelector('#mediaPackage').value = '';
            min.value = false;
            requiredn.value = false;
            max.value = false;
        }

        let preview = (e) => {

            let containerImages = document.querySelector('#container-images');
            containerImages.innerHTML = '';
            images.value = [];

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

        let getPackages = () => {
            loading.value = true;

            adminApi.get(`/v1/dashboard/packageSale/${id.value}/edit`)
                .then((res) => {
                    let l = res.data.data;
                    packages.value = l.packages;
                    dataSale.data.package = l.package.advertising_package_id;
                    packageIdE.value = l.package;
                })
                .catch((err) => {
                    console.log(err.response.data);
                })
                .finally(() => {
                    loading.value = false;
                });
        }

        onMounted(() => { getPackages(); });

        emitter.on('get_lang', () => { getPackages(); });

        let editSale = () => {

            let formData = new FormData();

            formData.append('package', dataSale.data.package);
            formData.append('_method',"PUT");

            for( var i = 0; i < this.numberOfImage; i++ ){
                let file = this.images[i];
                formData.append('files[' + i + ']', file);
            }

            loading.value = true;

            adminApi.post(`/v1/dashboard/packageSale/${id.value}`,formData)
                .then((res) => {
                    empty();
                    getPackages();
                })
                .catch((err) => {
                    console.log(err.response);
                })
                .finally(() => {
                    loading.value = false;
                });
        }

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

                    adminApi.post(`/v1/dashboard/packageSale/deleteOne/${id.value}`,{idMedia :idMedia})
                        .then((res) => {
                            packageIdE.value.media.splice(index,1);

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
                        });
                }
            });

        };

        return {packages,empty,getPackages,v$,...toRefs(dataSale),loading,preview,packageIdE,deleteImage,min,max,numberOfImage,images};

    },
    methods: {
        editSale(){

            this.v$.$validate();

            if(!this.v$.$error  && this.numberOfImage < 6){

                let formData = new FormData();

                formData.append('package', this.data.package);
                formData.append('_method',"PUT");

                for( let y = 0; y < this.numberOfImage; y++ ){
                    let file = this.images[y];
                    formData.append('files[' + y + ']', file);
                }

                this.loading = true;

                adminApi.post(`/v1/dashboard/packageSale/${this.id}`,formData)
                    .then((res) => {
                        this.empty();
                        this.getPackages();
                        notify({
                            title: `Edited successfully <i class="fas fa-check-circle"></i>`,
                            type: "success",
                            duration: 5000,
                            speed: 2000
                        });

                        console.log(res.data)
                    })
                    .catch((err) => {
                        console.log(err.response);
                    })
                    .finally(() => {
                        this.loading = false;
                    });

            }else{
                if(!this.numberOfImage){
                    this.max = true;
                    this.min = true;
                }
            }
        }
    }
}
</script>

<style scoped>
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
    margin-bottom: 30px;
    padding: 10px;
    border-radius: 20px;
    background-color: #f7f7f7;
}

.all-image{
    position: relative;
}

.delete-image{
    position: absolute;
    top: 4px;
    left: 21px;
    font-size: 17px;
    border-radius: 50%;
    padding: 0px 10px;
    font-weight: 700;
    z-index: 7;
    background-color: #fff;
    display: inline-block;
    cursor: pointer;
}

.delete-image:hover{
    background-color: #eee;
}

img{
    height: 200px;
    width: 200px;
}
</style>
