<template>
    <!-- Page Content -->
    <div class="content">
        <loader v-if="loading" />
        <div class="container-fluid">
            <div class="row">

                <!-- sidebar -->
                <Sidebar />
                <!-- /sidebar -->
                <div class="col-xl-9 col-md-8 mx-auto">
                    <div class="freelance-title" id="plan">
                        <h3>Advertise Packages</h3>
                        <p> Choose the best pricing that suites your requirements</p>
                    </div>
                    <div class="row">

                        <div class="col-lg-4 " v-for="Package in Packages" v-if="Packages">
                            <div class="package-detail">
                                <h4>{{Package.name}} Plan</h4>
                                <h3 class="package-price">${{parseFloat(Package.price,2)}}</h3>
                                <div class="package-feature">
                                    <ul>
                                        <li>{{Package.visiter_num}} Number of Visitors</li>
                                        <li>{{Package.period}} Days visibility</li>
                                        <li>{{Package.period}} Days Package Expiry</li>
                                        <p>Ad appearance pages</p>
                                        <span v-for="pageView in Package.page_view">
                                            <li>{{pageView.page.name + ' -- '+ pageView.view.type }}</li>
                                        </span>
                                        <p>Ad appearance mobile pages</p>
                                        <span v-for="pageViewMob in Package.page_view_mobile">
                                            <li>{{pageViewMob.page_mobile.name + ' -- '+ pageViewMob.view.type }}</li>
                                        </span>
                                    </ul>
                                </div>

                                <a  data-bs-toggle="modal" @click="empty(Package.id)" :href="'#file' + Package.id" class="btn btn-primary text-center price-btn btn-block">Select Plan</a>
                            </div>

                            <!-- The Modal -->
                            <div class="modal fade" :id="'file' + Package.id">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">{{Package.name}} Package</h4>
                                            <span class="modal-close"><a href="#" :id="'modal-close-'+ Package.id" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle orange-text"></i></a></span>
                                        </div>
                                        <div class="modal-body">
                                            <form enctype="multipart/form-data" @submit.prevent="pushasePackage" :id="'pushasePackage_' + Package.id">
                                                <div class="modal-info">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="package-detail">
                                                                <h4>{{Package.name}} Plan</h4>
                                                                <h3 class="package-price">${{parseFloat(Package.price,2)}}</h3>
                                                                <div class="package-feature">
                                                                    <ul>
                                                                        <li>{{Package.visiter_num}} Number of Visitors</li>
                                                                        <li>{{Package.period}} Days visibility</li>
                                                                        <li>{{Package.period}} Days Package Expiry</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 row  align-items-center">
                                                            <div class="row justify-content-center">
                                                                <div class="col-3 checkCorrect">
                                                                    <i class="fas fa-check-circle custom-icon"></i><br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-info">
                                                    <input type="hidden" name="package" :id="'package_id_'+ Package.id" :value="Package.id">
                                                    <div class="row">
                                                        <div class="alert alert-danger text-center" v-for="error in errors" v-if="errors">{{ errors[error] }}<br /> </div>
                                                        <div class="col-md-12 row justify-content-center">
                                                            <div class="btn btn-outline-primary waves-effect">
                                                                <span>
                                                                    Choose files
                                                                    <i class="fas fa-cloud-upload-alt ml-3" aria-hidden="true"></i>
                                                                </span>
                                                                <input
                                                                    name="mediaPackage[]"
                                                                    multiple
                                                                    type="file"
                                                                    :id="'mediaPackage_'+Package.id"
                                                                    :data-package="Package.id"
                                                                    @change="preview"
                                                                    accept="image/*"
                                                                >
                                                            </div>
                                                            <p class="num-of-files">{{numberOfImage ? numberOfImage + ' Files Selected' : 'No Files Chosen' }}</p>
                                                            <div class="container-images" :id="'container-images-' + Package.id" v-show="numberOfImage"></div>
                                                            <span class="text-danger text-center" v-if="min">images en is required. <br /></span>
                                                            <span class="text-danger text-center" v-if="required">images is must have at least 1 photos<br /></span>
                                                            <span class="text-danger text-center" v-if="max">images is must have at most 5 photos. <br /></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="submit-section text-end">
                                                    <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="member-plan pro-box">
                                <div class="pro-head">
                                    <h2><i class="fa fa-check-circle orange-text" aria-hidden="true"></i> Plan Details</h2>
                                </div>
                                <div class="pro-body member-detail">
                                    <div class="row">
                                        <div class="col-6">
                                            <h4 class="mb-0">The Ultima</h4>
                                            <div class="yr-amt">Anually Price</div>
                                            <div class="expiry-on">Expiry On</div>
                                            <div class="expiry">24 JAN 2022</div>
                                        </div>
                                        <div class="col-6 change-plan">
                                            <h3>$1200</h3>
                                            <div class="yr-duration">Duration: One Year</div>
                                            <a href="#plan" class="btn btn-primary btn-plan black-btn">Change Plan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Statement</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table-box">
                                        <table class="table table-center table-hover datatable">
                                            <thead class="thead-pink">
                                            <tr>
                                                <th>Purchased Date</th>
                                                <th>Details</th>
                                                <th>Expiry Date</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th>Price</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>15 July 2021</td>
                                                <td>
                                                    <p class="mb-0">The Unlimita</p>
                                                    <a href="#" class="read-text">Invoice : IVIP12023598</a>
                                                </td>
                                                <td>15th July 2022</td>
                                                <td>Yearly</td>
                                                <td class="text-danger">Inactive</td>
                                                <td>$200.00</td>
                                            </tr>
                                            <tr>
                                                <td>15 July 2022</td>
                                                <td>
                                                    <p class="mb-0">The Unlimita</p>
                                                    <a href="#" class="read-text">Invoice : IVIP12023598</a>
                                                </td>
                                                <td>15th July 2023</td>
                                                <td>Yearly</td>
                                                <td class="text-success">Active</td>
                                                <td>$200.00</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-end mt-3">
                                        <ul class="paginations">
                                            <li><a href="#"> <i class="fas fa-angle-left"></i> Previous</a></li>
                                            <li><a href="#">1</a></li>
                                            <li><a href="#" class="active">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">4</a></li>
                                            <li><a href="#">Next <i class="fas fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /Page Content -->
</template>

<script>
import {computed, inject, onBeforeMount, ref,watch} from "vue";
import {useStore} from "vuex";
import Sidebar from "../../../components/web/sidebar";
import webApi from "../../../api/webAxios";

export default {
    name: "packages",
    components:{
        Sidebar
    },
    setup(){
        const store = useStore();
        const emitter = inject('emitter');

        // get create Package
        let Packages = ref([]);
        let loading = ref(false);


        let getPackage = () => {

            loading.value = true;

            webApi.get(`/v1/web/package`)
                .then((res) => {
                    let l =res.data.data;
                    Packages.value = l.packages;
                })
                .catch((err) => {
                    console.log(err.response.data);
                }).finally(() => {
                    loading.value = false;
                });
        }

        onBeforeMount(() => {
            getPackage();
        });

        emitter.on('get_lang_web', () => {
            getPackage();
        });

        const numberOfImage = ref(0);
        const images = ref([]);
        const closeId = ref(1);

        let empty = (id) => {
            numberOfImage.value = 0;
            let clearInput = document.querySelector('#mediaPackage_' + id).value = '';
            closeId.value = id;
            min.value = false;
            images.value = [];
            required.value = false;
            max.value = false;
            store.commit('advertise/errorsEdit',{})
        }

        let preview = (e) => {

            let id = e.target.getAttribute('data-package');
            let containerImages = document.querySelector('#container-images-' + id);
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
        const required = ref(false);

        watch(numberOfImage, (count, prevCount) => {
            if(!count || count < 1){
                min.value = true;
                required.value = true;
            }else if(count > 5){
                max.value = true;
            }else {
                min.value = false;
                required.value = false;
                max.value = false;
            }
        });

        let pushasePackage = (e) => {

            if(!min.value && !required.value && !max.value && numberOfImage.value){
                let formData = new FormData(e.target);

                for( var i = 0; i < numberOfImage.value; i++ ){
                    let file = images.value[i];
                    formData.append('files[' + i + ']', file);
                }

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                };

                loading.value = true;

                webApi.post(`/v1/web/buy_package`,formData,config)
                    .then((res) => {
                        Swal.fire({
                            icon: 'success',
                            title: 'تم اضافه صور الاعلان بنجاح و سيتم الان مراجعه الصور و الاتصال بك.',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    })
                    .catch((err) => {
                        Swal.fire({
                            icon: 'error',
                            title: 'يوجد خطا في الصور...',
                            text: 'اقصي ارتفاع للصوره يكون 500px و اقصي عرض 500px و ان حجمها لا يتعدي 2mb !',
                        });
                    }).finally(() => {
                        loading.value = false;
                     });

                 let modal = document.getElementById('modal-close-' + closeId.value);

                modal.click();
            }else {
                min.value = true;
                max.value = true;
                required.value = true;
            }

        };

        return {Packages,preview,numberOfImage,pushasePackage,empty,loading,max,min,required};
    }
}
</script>

<style scoped>
.content {
    padding: 120px 0 30px;
    position: relative;
}

.custom-icon{
    font-size: 110px;
    color: green;
}

.checkCorrect {
    margin-bottom: 30px;
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

.container-images{
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


.submit-section .submit-btn {
    margin-top: 30px;
}

</style>
