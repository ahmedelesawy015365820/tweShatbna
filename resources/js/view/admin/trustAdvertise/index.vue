<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Trust Advertise</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'dashboard', params: {lang: locale || 'ar'}}">{{$t('dashboard.Dashboard')}}</router-link></li>
                            <li class="breadcrumb-item active">Trust Advertise</li>
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
                                        <input type="search" placeholder="email or phone"  v-model="search" class="custom" />
                                    </div>
<!--                                    <div class="col-5 row justify-content-end">-->
<!--                                        <router-link-->
<!--                                            :to="{name: 'createPackage', params: {lang: locale || 'ar'}}"-->
<!--                                            class="btn btn-custom btn-warning"-->
<!--                                        >-->
<!--                                            Add-->
<!--                                        </router-link>-->
<!--                                    </div>-->
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Phone</th>
                                        <th>Device</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(item,index) in advertises" v-if="advertises" :key="item.id">
                                        <td>{{index + 1}}</td>
                                        <td>{{item.name}}</td>
                                        <td>{{item.email}}</td>
                                        <td>Advertise</td>
                                        <td>{{item.code + item.phone}}</td>
                                        <td>{{parseInt(item.complement.device) ? 'Mobile':'Web'}}</td>
                                        <td><span :class="[parseInt(item.status)? 'text-success': 'text-danger']">{{parseInt(item.status) ? 'Active': 'Inactive'}}</span></td>
                                        <td></td>
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
            <Pagination :data="advertisePaginate" @pagination-change-page="getAdvertise">
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

        // get packages
        let advertises = ref([]);
        let advertisePaginate = ref({});
        let loading = ref(false);
        const search = ref('');

        let getAdvertise = (page = 1) => {
            loading.value = true;

            adminApi.get(`/v1/dashboard/trustAdvertise?page=${page}&search=${search.value}`)
                .then((res) => {
                    let l = res.data.data;
                    advertisePaginate.value = l.advertise;
                    advertises.value = l.advertise.data;
                })
                .catch((err) => {
                    console.log(err.response.data);
                })
                .finally(() => {
                    loading.value = false;
                });
        }

        onBeforeMount(() => {
            getAdvertise();
        });

        watch(search, (search, prevSearch) => {
            if(search.length >= 0){
                getAdvertise();
            }
        });

        return {advertisePaginate,loading,getAdvertise,search,advertises};
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
