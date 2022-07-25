<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Company Service</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'dashboard', params: {lang: locale || 'ar'}}">{{$t('dashboard.Dashboard')}}</router-link></li>
                            <li class="breadcrumb-item active">Company Service</li>
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
                            <div class="card-header pt-0">
                                <div class="row justify-content-between">
                                    <div class="col-5">
                                        Search:
                                        <input type="search" v-model="search" class="custom" />
                                    </div>
                                    <div class="col-5 row justify-content-end">
                                        <router-link
                                            :to="{name: 'createComService', params: {lang: locale || 'ar'}}"
                                            class="btn btn-custom btn-warning"
                                        >
                                            Add
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody v-if="services.length" >
                                        <tr v-for="(item,index) in services"  :key="item.id">
                                            <td>{{index + 1}}</td>
                                            <td>{{item.name}}</td>
                                            <td><span :class="[parseInt(item.status) ? 'text-success': 'text-danger']">{{parseInt(item.status) ? 'Active': 'Inactive'}}</span></td>
                                            <td>
                                                <router-link :to="{name: 'editComService', params: {lang: locale || 'ar',id:item.id}}" class="btn btn-sm btn-success me-2">
                                                    <i class="far fa-edit"></i>
                                                </router-link>
                                                <a href="#" @click.prevent="deleteCountry(item.id,index)" data-bs-target="#staticBackdrop"  class="btn btn-sm btn-danger me-2">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    </tbody>
                                    <body v-else>
                                        <tr>
                                            <th class="text-center" colspan="5">No Data Found</th>
                                        </tr>
                                    </body>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Table -->
            <!-- start Pagination -->
            <Pagination :data="servicesPaginate" @pagination-change-page="getServices">
                <template #prev-nav>
                    <span>&lt; Previous</span>
                </template>
                <template #next-nav>
                    <span>Next &gt;</span>
                </template>
            </Pagination>
            <!-- end Pagination -->
        </div>
        <!-- /Page Wrapper -->
    </div>
</template>

<script>
import {onBeforeMount,inject,watch,ref} from "vue";
import {useStore} from "vuex";
import adminApi from "../../../api/adminAxios";

export default {
    name: "index",
    setup(){
        const emitter = inject('emitter');

        // get packages
        let services = ref([]);
        let servicesPaginate = ref({});
        let loading = ref(false);
        const search = ref('');

        let getServices = (page = 1) => {
            loading.value = true;

            adminApi.get(`/v1/dashboard/companyService?page=${page}&search=${search.value}`)
                .then((res) => {
                    let l = res.data.data;
                    servicesPaginate.value = l.services;
                    services.value = l.services.data;
                })
                .catch((err) => {
                    console.log(err.response.data);
                })
                .finally(() => {
                    loading.value = false;
                });
        }

        onBeforeMount(() => {
            getServices();
        });

        emitter.on('get_lang', () => {
            getServices(search.value);
        });

        watch(search, (search, prevSearch) => {
           if(search.length >= 0){
               getServices();
           }
        });


         function deleteCountry(id,index){
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

                    adminApi.delete(`/v1/dashboard/companyService/${id}`)
                        .then((res) => {
                            services.value.splice(index,index + 1);

                            Swal.fire({
                                icon: 'success',
                                title: 'Your package has been deleted.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        })
                        .catch((err) => {
                            console.log(err.response)
                            if(err.response.data.errors){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'يوجد خطا في النظام...',
                                    text: 'لا ينفع حذف هذه الخدمه بسبب وجود اشخاص مشتركين فيها !',
                                });
                            }else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'يوجد خطا في النظام...',
                                    text: 'يوجد خطا في النظام !',
                                });
                            }
                        });
                }
            });
        }

        return {services,loading,getServices,search,deleteCountry,servicesPaginate};

    },
    data(){
        return {
            locale: localStorage.getItem("langAdmin")
        }
    }
}
</script>

<style scoped>
.card {
    position: relative;
}
.btn-custom {
    width: 30%;
}
.custom {
    border: 1px solid #D7D7D7;
    padding: 2px;
    border-radius: 5px;
    width: 35%;
}
.btn {
    color: #fff;
}
</style>
