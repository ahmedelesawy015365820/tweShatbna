<template>
    <div class="page-wrapper">
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
                                    <tr class="text-center" v-for="(item,index) in calender.data" :key="item.id">
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
                                            <a href="#" data-bs-toggle="modal" :data-bs-target="'#staticBackdrop' + item.id"  class="btn btn-sm btn-danger me-2"><i class="far fa-trash-alt"></i></a>
                                        </td>

<!--                                        &lt;!&ndash; Modal &ndash;&gt;-->
<!--                                        <div class="modal fade" :id="'staticBackdrop' + item.id" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">-->
<!--                                            <div class="modal-dialog">-->
<!--                                                <div class="modal-content">-->
<!--                                                    <div class="modal-header">-->
<!--                                                        <h5 class="modal-title" id="staticBackdropLabel">Delete Package</h5>-->
<!--                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--                                                    </div>-->
<!--                                                    <div class="modal-body">-->
<!--                                                        <form >-->
<!--                                                            <div class="modal-body">-->
<!--                                                                <p>Sure Delete</p><br>-->
<!--                                                                <input class="form-control" :value="item.name"  type="text" readonly>-->
<!--                                                            </div>-->
<!--                                                        </form>-->
<!--                                                    </div>-->
<!--                                                    <div class="modal-footer">-->
<!--                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
<!--                                                        <button type="submit" @click.prevent="deletePackage(item.id)" class="btn btn-primary">Delete</button>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        &lt;!&ndash; /Modal &ndash;&gt;-->

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
            <Pagination :data="calender" @pagination-change-page="getCalender">
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
import {useStore} from "vuex";
import {computed, inject, onMounted, ref, watch} from "vue";

export default {
    name: "scheduleGet",
    setup(){
        const store = useStore();
        const emitter = inject('emitter');

        // get packages
        let calender = computed(() => store.getters['calender/getCal'] );
        let loading = computed(() => store.getters['calender/loading'] );
        let getCalender = (page = 1,preload = '') => {
            store.dispatch('calender/getCalender',`?page=${page}&search=${search.value}`);
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

        // async function deletePackage(id){
        //     await store.dispatch('packageAdmin/daletePackage',id);
        //     document.querySelector('.modal-backdrop').style.display = 'none';
        // }

        return {calender,loading,getCalender,search,dateFormate};

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
