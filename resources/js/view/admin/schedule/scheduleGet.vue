<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Schedule</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'dashboard', params: {lang: locale || 'ar'}}">{{$t('dashboard.Dashboard')}}</router-link></li>
                            <li class="breadcrumb-item active">Schedule</li>
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
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Company</th>
                                        <td>Advertiser</td>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Package</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="text-center" v-for="(item,index) in calender" :key="item.id">
                                        <td>{{index + 1}}</td>
                                        <td>{{item.title}}</td>
                                        <td>{{item.users.name}}</td>
                                        <td>{{dateFormate(item.start)}}</td>
                                        <td>{{dateFormate(item.end)}}</td>
                                        <td>{{item.packages.name}}</td>
                                        <td>{{item.status? 'Active' : 'Inactive'}}</td>
<!--                                        <td><span :class="[item.status ? 'text-success': 'text-danger']">{{item.status ? 'Active': 'Inactive'}}</span></td>-->
                                        <td>
<!--                                            <router-link :to="{name: 'showPackage', params: {lang: locale || 'ar',id:item.id}}" class="btn btn-sm btn-info me-2">-->
<!--                                                <i class="fas fa-book-open"></i>-->
<!--                                            </router-link>-->
                                            <router-link :to="{name: 'editSchedule', params: {lang: locale || 'ar',id:item.id}}" class="btn btn-sm btn-success me-2">
                                                <i class="far fa-edit"></i>
                                            </router-link>
                                            <a href="#" @click="deleteCalender(item.id,index)"  class="btn btn-sm btn-danger me-2">
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
            <!-- start Pagination -->
            <Pagination :data="calenderPagination" @pagination-change-page="getCalender">
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
import {computed, inject, onMounted, ref, watch} from "vue";
import adminApi from "../../../api/adminAxios";

export default {
    name: "scheduleGet",
    setup(){
        const emitter = inject('emitter');

        // get packages
        let calender = ref([]);
        let calenderPagination = ref({});
        let loading = ref(false);

        let getCalender = (page = 1) => {

            loading.value = true;

            adminApi.get(`/v1/dashboard/scheduleAdvertise?page=${page}&search=${search.value}`)
                .then((res) => {
                    let l = res.data.data;
                    calender.value = l.schedule.data;
                    calenderPagination.value = l.schedule;
                })
                .catch((err) => {
                    console.log(err.response);
                })
                .finally(() => {
                    loading.value = false;
                });
        }

        emitter.on('get_lang', () => {
            getCalender();
        });

        const search = ref('')
        watch(search, (search, prevSearch) => {
            if(search.length > 0){
                getCalender();
            }else{
                getCalender();
            }
        });

        onMounted(() => {
            getCalender();
        });

        let dateFormate = (item) => {
            return new Date(item).toDateString();
        }

        function deleteCalender(id,index){
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

                    adminApi.delete(`/v1/dashboard/scheduleAdvertise/${id}`)
                        .then((res) => {
                            calender.value.splice(index,index + 1);
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


        return {calender,loading,getCalender,search,dateFormate,deleteCalender,calenderPagination};

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
