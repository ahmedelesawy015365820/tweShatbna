<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{$t('global.Area')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'dashboard', params: {lang: locale || 'ar'}}">{{$t('dashboard.Dashboard')}}</router-link></li>
                            <li class="breadcrumb-item active">{{$t('global.Area')}}</li>
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
                                            :to="{name: 'createArea', params: {lang: locale || 'ar'}}"
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
                                        <th>{{$t('global.Name')}}</th>
                                        <th>{{$t('global.Country')}}</th>
                                        <th>{{$t('global.State')}}</th>
                                        <th>{{$t('global.Status')}}</th>
                                        <th>{{$t('global.Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(item,index) in areas" v-if="Object.keys(areas ?? {}).length" :key="item.id">
                                            <td>{{index + 1}}</td>
                                            <td>{{item.name}}</td>
                                            <td>{{item.state.country.name}}</td>
                                            <td>{{item.state.name}}</td>
                                            <td><span :class="[parseInt(item.status) ? 'text-success': 'text-danger']">{{parseInt(item.status) ? 'Active': 'Inactive'}}</span></td>
                                            <td>
                                                <router-link :to="{name: 'editArea', params: {lang: locale || 'ar',id:item.id}}" class="btn btn-sm btn-success me-2">
                                                    <i class="far fa-edit"></i>
                                                </router-link>
                                                <a href="#" @click.prevent="deleteCountry(item.id,index)" data-bs-target="#staticBackdrop"  class="btn btn-sm btn-danger me-2">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>

                                        </tr>
                                        <tr v-else>
                                            <th class="text-center" colspan="5">{{$t('global.No Data Found')}}</th>
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
            <Pagination :data="areasPaginate" @pagination-change-page="getAreas">
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
import adminApi from "../../../api/adminAxios";

export default {
    name: "index",
    setup(){
        const emitter = inject('emitter');

        // get packages
        let areas = ref([]);
        let areasPaginate = ref({});
        let loading = ref(false);
        const search = ref('');

        let getAreas = (page = 1) => {
            loading.value = true;

            adminApi.get(`/v1/dashboard/area?page=${page}&search=${search.value}`)
                .then((res) => {
                    let l = res.data.data;
                    areasPaginate.value = l.areas;
                    areas.value = l.areas.data;
                })
                .catch((err) => {
                    console.log(err.response.data);
                })
                .finally(() => {
                    loading.value = false;
                });
        }

        onBeforeMount(() => {
            getAreas();
        });

        emitter.on('get_lang', () => {
            getAreas(search.value);
        });

        watch(search, (search, prevSearch) => {
           if(search.length >= 0){
               getAreas();
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

                    adminApi.delete(`/v1/dashboard/area/${id}`)
                        .then((res) => {
                            areas.value.splice(index,index + 1);

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
                                    text: 'لا ينفع حذف هذه الدوله بسبب وجود اشخاص مشتركين فيها !',
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

        return {areas,loading,getAreas,search,deleteCountry,areasPaginate};

    },
    data(){
        return {
            locale: localStorage.getItem("langAdmin")
        }
    }
}
</script>

<style scoped>

.page-wrapper {
   max-height: 100vh;
    margin-bottom: 100px;
}

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
