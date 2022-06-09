<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Support</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'dashboard', params: {lang: locale || 'ar'}}">{{$t('dashboard.Dashboard')}}</router-link></li>
                            <li class="breadcrumb-item active">Support</li>
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
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First</th>
                                        <th>Last</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(item,index) in support" :key="item.id">
                                        <td>{{index + 1}}</td>
                                        <td>{{item.first}}</td>
                                        <td>{{item.last}}</td>
                                        <td>{{item.email}}</td>
                                        <td>
                                            <router-link  :to="{name: 'showSupport', params: {lang: locale || 'ar',id:item.id}}" class="btn btn-sm btn-info me-2">
                                                <i class="fas fa-book-open"></i>
                                            </router-link>
                                            <a
                                               href="#"
                                               v-if="!item.complete"
                                               class="btn btn-sm btn-danger me-2"
                                               @click="deleteSupport(item.id,index)"
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
           <Pagination :data="supportPaginate" @pagination-change-page="getSupport">
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
import {onMounted,watch,ref} from "vue";
import adminApi from "../../../api/adminAxios";

export default {
    name: "index",
    setup(){

        // // get sale packages
        let support = ref([]);
        let supportPaginate = ref({})
        let loading = ref(false);
        let getSupport = (page = 1,preload = '') => {

            loading.value = true;

            adminApi.get(`/v1/dashboard/support?page=${page}&search=${search.value}`)
                .then((res) => {
                    let l = res.data.data;
                    supportPaginate.value = l.supports;
                    support.value = l.supports.data;

                })
                .catch((err) => {
                    console.log(err.response);
                })
                .finally(() => {
                    loading.value = false;
                });
        }

        const search = ref('');
        watch(search, (search, prevSearch) => {
            if(search.length > 0){
                getSupport();
            }else{
                getSupport();
            }
        });

        onMounted(() => {
            getSupport();
        });

        function deleteSupport(id,index){
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

                    adminApi.delete(`/v1/dashboard/support/${id}`)
                        .then((res) => {
                            support.value.splice(index,index + 1);
                            Swal.fire({
                                icon: 'success',
                                title: 'Your message has been deleted.',
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

        return {getSupport,loading,search,support,deleteSupport,supportPaginate};

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
