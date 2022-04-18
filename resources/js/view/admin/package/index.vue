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
                                        <tr v-for="(item,index) in packages.data" :key="item.id">
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
                                                <a href="#" data-bs-toggle="modal" :data-bs-target="'#staticBackdrop' + item.id"  class="btn btn-sm btn-danger me-2"><i class="far fa-trash-alt"></i></a>
                                            </td>

                                            <!-- Modal -->
                                            <div class="modal fade" :id="'staticBackdrop' + item.id" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Delete Package</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form >
                                                                <div class="modal-body">
                                                                    <p>Sure Delete</p><br>
                                                                    <input class="form-control" :value="item.name"  type="text" readonly>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" @click.prevent="deletePackage(item.id)" class="btn btn-primary">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Modal -->

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
            <Pagination :data="packages" @pagination-change-page="getPackages">
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
import {computed,onMounted,inject,watch,ref} from "vue";
import {useStore} from "vuex";

export default {
    name: "index",
    setup(){
        const store = useStore();
        const emitter = inject('emitter');

        // get packages
        let packages = computed(() => store.getters['packageAdmin/package'] );
        let loading = computed(() => store.getters['packageAdmin/loading'] );
        let getPackages = (page = 1,preload = '') => {
            store.dispatch('packageAdmin/getPackage',`?page=${page}&search=${search.value}`);
        }

        emitter.on('get_lang', () => {
            getPackages();
        });

        const search = ref('')
        watch(search, (search, prevSearch) => {
           if(search.length > 0){
               getPackages();
           }else{
               getPackages();
           }
        });

        onMounted(() => {
            getPackages();
        });

        async function deletePackage(id){
            await store.dispatch('packageAdmin/daletePackage',id);
             document.querySelector('.modal-backdrop').style.display = 'none';
        }

        return {packages,loading,getPackages,search,deletePackage};

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
