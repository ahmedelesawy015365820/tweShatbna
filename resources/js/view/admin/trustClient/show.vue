<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">show User Client</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'indexCompany', params: {lang: locale || 'ar'}}">Advertises</router-link></li>
                            <li class="breadcrumb-item active">show User</li>
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
                                    :to="{name: 'indexClient', params: {lang: locale || 'ar'}}"
                                    class="btn btn-custom btn-dark"
                                >
                                    back
                                </router-link>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-row row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Name User</label>
                                            <input type="text" class="form-control"
                                                   id="validationCustom02"
                                                   placeholder="Package Name"
                                                   readonly
                                                   :value="user.name"
                                            >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom06">Email</label>
                                            <input type="text" class="form-control"
                                                   id="validationCustom06"
                                                   placeholder="Price"
                                                   readonly
                                                   :value="user.email"
                                            >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom05">Phone</label>
                                            <input type="text" class="form-control"
                                                   id="validationCustom05"
                                                   placeholder="period"
                                                   readonly
                                                   :value="user.code + user.phone"
                                            >
                                        </div>
                                        <div class="card flex-fill col-md-3">
                                                <div class="p-3 text-center">
                                                    <p class="card-text f-12">Status</p>
                                                </div>
                                                <div>
                                                    <label class="form-group toggle-switch mb-0" for="notification_switch1">
                                                        <input
                                                            type="checkbox"
                                                            class="toggle-switch-input"
                                                            id="notification_switch1"
                                                            v-model="status"
                                                            :checked="status"
                                                            @change="statusUser"
                                                        >
                                                        <span class="toggle-switch-label mx-auto">
													        <span class="toggle-switch-indicator"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="card col-md-3">
                                                <div class="p-3 text-center">
                                                    <p class="card-text f-12">Trust</p>
                                                </div>
                                                <div>
                                                    <label class="form-group toggle-switch mb-0" for="notification_switch2">
                                                        <input
                                                            type="checkbox"
                                                            class="toggle-switch-input"
                                                            id="notification_switch2"
                                                            v-model="trust"
                                                            :checked="trust"
                                                            @change="trustUser"
                                                        >
                                                        <span class="toggle-switch-label mx-auto">
													        <span class="toggle-switch-indicator"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        <div class="row flex-fill col-md-12">
                                            <div class="container-images row" id="container-images">
                                                <a v-for="image in userClient.media" class="col-md-3" download :href="'/web/img/trustClient/'+ id+'/' + image.file_name">
                                                    <figure>
                                                        <img :src="'/web/img/trustClient/'+ id +'/' + image.file_name" />
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
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
import {inject, onBeforeMount, toRefs,ref} from "vue";
import adminApi from "../../../api/adminAxios";

export default {
    name: "showSale",
    data(){
        return {
        }
    },
    props:['id'],
    setup(props){
        const { id } = toRefs(props);

        // get create Package
        let user = ref({});
        let userClient =  ref({});
        let complement = ref({});
        const status = ref(false);
        const trust = ref(false);
        let loading = ref(false);

        let getAdvertise = () => {

            loading.value = true;

            adminApi.get(`/v1/dashboard/trustClient/${id.value}`)
                .then((res) => {
                    let l = res.data.data.client;

                    user.value = l;
                    userClient.value = l.client;
                    complement.value = l.complement
                    status.value = parseInt(l.status);
                    trust.value =  parseInt(l.client.trust);
                })
                .catch((err) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'يوجد خطا في النظام...',
                        text: 'يرجا اعاده تحميل الصفحه و المحاوله مره اخري !',
                    });
                })
                .finally(() => {
                    loading.value = false;
                });
        }

        onBeforeMount(() => {
            getAdvertise();
        });


        let statusUser = () => {

            loading.value = true;

            adminApi.post(`/v1/dashboard/trustClient/status`,{status: status.value,id: id.value})
                .then((res) => {
                    Swal.fire({
                        icon: 'success',
                        title: 'تم بنجاح التعديل .',
                        showConfirmButton: false,
                        timer: 1500
                    });
                })
                .catch((err) => {
                    console.log(err.response.data);
                })
                .finally(() => {
                    loading.value = false;
                });
        };

        let trustUser = () => {

            loading.value = true;

            adminApi.post(`/v1/dashboard/trustClient/trust`,{trust: trust.value,id: id.value})
                .then((res) => {
                    Swal.fire({
                        icon: 'success',
                        title: 'تم بنجاح التعديل .',
                        showConfirmButton: false,
                        timer: 1500
                    });
                })
                .catch((err) => {
                })
                .finally(() => {
                    loading.value = false;
                });
        };

        return {loading,statusUser,trustUser,status,trust,user,userClient,complement}
    }

}


</script>

<style scoped>
textarea.form-control{
    height: auto !important;
}
.card {
    border: none;
}
.p-3 {
    padding: 1rem!important;
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

img{
    height: 200px;
    width: 200px;
}

.calendar {
    margin-top: 50px;
    position: relative;
}

.calendar .shodow{
    position: absolute;
    top: 100px;
    left: 0;
    right: 34px;
    bottom: 30px;
    z-index: 100;
}

.modal-dialog {
    z-index: 100;
}

.custom-modal .shodow{
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #0000004a;
}

.fc-title:hover {
    cursor: pointer;
}

.cal-icon:after {
    display: none;
}

.toggle-switch-input:checked:disabled + .toggle-switch-label {
    background-color: #fcb00c;
}

.event-pointer{
    pointer-events: none;
}

</style>
