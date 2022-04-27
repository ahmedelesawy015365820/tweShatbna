<template>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Package</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'dashboard', params: {lang: locale || 'ar'}}">{{$t('dashboard.Dashboard')}}</router-link></li>
                            <li class="breadcrumb-item active">Package</li>
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
                                            :to="{name: 'createPackage', params: {lang: locale || 'ar'}}"
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
                                        <th>Period</th>
                                        <th>Price</th>
                                        <th>Visiter</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item,index) in packages" v-if="packages" :key="item.id">
                                            <td>{{index + 1}}</td>
                                            <td>{{item.name}}</td>
                                            <td>{{item.period}}</td>
                                            <td>{{item.price}}</td>
                                            <td>{{item.visiter_num}}</td>
                                            <td><span :class="[item.status ? 'text-success': 'text-danger']">{{item.status ? 'Active': 'Inactive'}}</span></td>
                                            <td>
                                                <router-link :to="{name: 'showPackage', params: {lang: locale || 'ar',id:item.id}}" class="btn btn-sm btn-info me-2">
                                                    <i class="fas fa-book-open"></i>
                                                </router-link>
                                                <router-link :to="{name: 'editPackage', params: {lang: locale || 'ar',id:item.id}}" class="btn btn-sm btn-success me-2">
                                                    <i class="far fa-edit"></i>
                                                </router-link>
                                                <a href="#" @click="deletePackage(item.id,item.name,index)" data-bs-target="#staticBackdrop"  class="btn btn-sm btn-danger me-2">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>

                                        </tr>
                                        <tr v-else>
                                            <th class="text-center" colspan="7">No Data Found</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Table -->
            <!-- start Pagination -->
            <Pagination :data="packagesPaginate" @pagination-change-page="getPackages">
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
import {onMounted,inject,watch,ref} from "vue";
import {useStore} from "vuex";
import adminApi from "../../../api/adminAxios";

export default {
    name: "index",
    setup(){
        const emitter = inject('emitter');

        // get packages
        let packages = ref([]);
        let packagesPaginate = ref({});
        let loading = ref(false);
        const search = ref('');

        let getPackages = (page = 1) => {
            loading.value = true;

            adminApi.get(`/v1/dashboard/advertiserPackage?page=${page}&search=${search.value}`)
                .then((res) => {
                    let l = res.data.data;
                    packagesPaginate.value = l.package;
                    packages.value = l.package.data;
                })
                .catch((err) => {
                    console.log(err.response.data);
                })
                .finally(() => {
                    loading.value = false;
                });
        }

        onMounted(() => {
            getPackages();
        });

        emitter.on('get_lang', () => {
            getPackages(search.value);
        });

        watch(search, (search, prevSearch) => {
           if(search.length >= 0){
               getPackages();
           }
        });


         function deletePackage(id,packageName,index){
            Swal.fire({
                title: `Are you sure delete ? (${packageName})`,
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {

                    adminApi.delete(`/v1/dashboard/advertiserPackage/${id}`)
                        .then((res) => {
                            packages.value.splice(index,index + 1);
                        })
                        .catch((err) => {
                            console.log(err.response.data);
                        });

                    Swal.fire(
                        'Deleted!',
                        'Your package has been deleted.',
                        'success'
                    );
                }
            });
        }

        return {packages,loading,getPackages,search,deletePackage,packagesPaginate};

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
