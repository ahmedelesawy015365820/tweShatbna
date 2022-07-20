<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Sponser</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'dashboard', params: {lang: locale || 'ar'}}">{{$t('dashboard.Dashboard')}}</router-link></li>
                            <li class="breadcrumb-item active">Sponser</li>
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
                                    </div>
                                    <div class="col-5 row justify-content-end">
                                        <router-link
                                            :to="{name: 'createSponser', params: {lang: locale || 'ar'}}"
                                            class="btn btn-custom btn-warning">
                                            {{ $t('global.Add') }}
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
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody v-if="sponser.length">
                                        <tr v-for="(item,index) in sponser">
                                            <td>{{item.id + 1}}</td>
                                            <td>{{item.name}} </td>
                                            <td>
                                                <router-link :to="{name: 'editSponser', params: {lang: locale || 'ar',id:item.id}}" class="btn btn-sm btn-success me-2">
                                                    <i class="far fa-edit"></i>
                                                </router-link>

                                                <a href="#" @click.prevent="deleteSponser(item.id,index)" data-bs-target="#staticBackdrop"  class="btn btn-sm btn-danger me-2">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    </tbody>
                                    <tbody v-else>
                                        <tr>
                                            <th class="text-center" colspan="3">No Data Found</th>
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
            <Pagination :data="sponserPagination" @pagination-change-page="getSponser">
                <template #prev-nav>
                    <span>&lt; {{$t('global.Previous')}}</span>
                </template>
                <template #next-nav>
                    <span>{{$t('global.Next')}} &gt;</span>
                </template>
            </Pagination>
            <!-- end Pagination -->
        </div>
        <!-- /Page Wrapper -->
    </div>
</template>

<script>
import {onMounted,inject,watch,ref} from "vue";
import adminApi from "../../../api/adminAxios";

export default {
    name: "index",
    setup(){

        // get packages
        let sponser = ref([]);
        let sponserPagination = ref({});
        let loading = ref(false);
        const emitter = inject('emitter');

        let getSponser = () => {
            loading.value = true;

            adminApi.get('/v1/dashboard/sponser')
                .then((res) => {
                    let l = res.data.data;
                    sponser.value = l.sponser.data;
                    sponserPagination.value = l.sponser;
                })
                .catch((err) => {
                    console.log(err.response);
                })
                .finally(() => {
                    loading.value = false;
                });
        }

        onMounted(() => {
            getSponser();
        });


        emitter.on('get_lang', () => {
            getSponser();
        });

        function deleteSponser(id,index){
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

                    adminApi.delete(`/v1/dashboard/sponser/${id}`)
                        .then((res) => {
                            sponser.value.splice(index,index + 1);

                            Swal.fire({
                                icon: 'success',
                                title: 'Your package has been deleted.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        })
                        .catch((err) => {
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


        return {loading,sponser,sponserPagination,getSponser,deleteSponser};

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

img {
    width: 100px;
}
</style>
