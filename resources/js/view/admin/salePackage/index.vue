<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Package</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'dashboard', params: {lang: locale || 'ar'}}">{{$t('dashboard.Dashboard')}}</router-link></li>
                            <li class="breadcrumb-item active">Sale Package</li>
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
                                            :to="{name: 'createSale', params: {lang: locale || 'ar'}}"
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
                                        <th>Package Name</th>
                                        <th>User Name</th>
                                        <th>Check</th>
                                        <th>Complete</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(item,index) in packageSale" :key="item.id">
                                        <td>{{index + 1}}</td>
                                        <td>{{item.package.name}}</td>
                                        <td>{{item.user[0].name}}</td>
                                        <td>
                                            <span v-if="parseInt(item.check)" class="badge badge-success">Checked</span>
                                            <span v-else class="badge badge-danger">Not Checked</span>
                                        </td>
                                        <td>
                                            <span v-if="parseInt(item.complete)" class="badge badge-success">Complete</span>
                                            <span v-else class="badge badge-danger">Not complete</span>
                                        </td>
                                        <td>
                                            <router-link v-if="!parseInt(item.complete)" :to="{name: 'showSale', params: {lang: locale || 'ar',id:item.id}}" class="btn btn-sm btn-info me-2">
                                                <i class="fas fa-book-open"></i>
                                            </router-link>
                                            <router-link :to="{name: 'editSale', params: {lang: locale || 'ar',id:item.id}}" class="btn btn-sm btn-success me-2"><i class="far fa-edit"></i></router-link>
                                            <a
                                               href="#"
                                               v-if="!item.complete"
                                               class="btn btn-sm btn-danger me-2"
                                               @click="deletePackage(item.id,index)"
                                            >
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Table -->
            <!-- start Pagination  -->
           <Pagination :data="packageSalePaginate" @pagination-change-page="getSalePackages">
               <template #prev-nav>
                   <span>&lt; Previous</span>
               </template>
               <template #next-nav>
                   <span>Next &gt;</span>
               </template>
           </Pagination>
           <!-- end Pagination-->
        </div>
        <!-- /Page Wrapper -->
    </div>
</template>

<script>
import {computed,onMounted,inject,watch,ref} from "vue";
import {useStore} from "vuex";
import adminApi from "../../../api/adminAxios";

export default {
    name: "index",
    setup(){
        const emitter = inject('emitter');

        // // get sale packages
        let packageSale = ref([]);
        let packageSalePaginate = ref({})
        let loading = ref(false);
        let getSalePackages = (page = 1,preload = '') => {

            loading.value = true;

            adminApi.get(`/v1/dashboard/packageSale?page=${page}&search=${search.value}`)
                .then((res) => {
                    let l = res.data.data;
                    packageSalePaginate.value = l.packageSale;
                    packageSale.value = l.packageSale.data;

                })
                .catch((err) => {
                    console.log(err.response);
                })
                .finally(() => {
                    loading.value = false;
                });
        }

        emitter.on('get_lang', () => {
            getSalePackages();
        });

        const search = ref('');
        watch(search, (search, prevSearch) => {
            if(search.length > 0){
                getSalePackages();
            }else{
                getSalePackages();
            }
        });

        onMounted(() => {
            getSalePackages();
        });

        function deletePackage(id,index){
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

                    loading.value = true;

                    adminApi.delete(`/v1/dashboard/packageSale/${id}`)
                        .then((res) => {
                            packageSale.value.splice(index,index + 1);
                            Swal.fire({
                                icon: 'success',
                                title: 'Your sale package has been deleted.',
                                showConfirmButton: false,
                                timer: 1500
                            });
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
            });
        }

        return {getSalePackages,loading,search,packageSale,deletePackage,packageSalePaginate};

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

.badge {
    padding: 8px;
    border-radius: 18px;
}

</style>
