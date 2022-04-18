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
                                    <tr v-for="(item,index) in packageSale.data" :key="item.id">
                                        <td>{{index + 1}}</td>
                                        <td>{{item.package.name}}</td>
                                        <td>{{item.user[0].name}}</td>
                                        <td>
                                            <span v-if="item.check" class="badge badge-success">Checked</span>
                                            <span v-else class="badge badge-danger">Not Checked</span>
                                        </td>
                                        <td>
                                            <span v-if="item.complete" class="badge badge-success">Complete</span>
                                            <span v-else class="badge badge-danger">Not complete</span>
                                        </td>
                                        <td>
                                            <router-link v-if="!item.complete" :to="{name: 'showSale', params: {lang: locale || 'ar',id:item.id}}" class="btn btn-sm btn-info me-2">
                                                <i class="fas fa-book-open"></i>
                                            </router-link>
                                            <router-link :to="{name: 'createSale', params: {lang: locale || 'ar'}}" class="btn btn-sm btn-success me-2"><i class="far fa-edit"></i></router-link>
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
<!--                                                                <input class="form-control" :value="item.name"  type="text" readonly>-->
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<!--                                                        <button type="submit" @click.prevent="deletePackage(item.id)" class="btn btn-primary">Delete</button>-->
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
            <!-- start Pagination  -->
           <Pagination :data="packageSale" @pagination-change-page="getSalePackages">
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

export default {
    name: "index",
    setup(){
        const store = useStore();
        const emitter = inject('emitter');

        // // get sale packages
        let packageSale = computed(() => store.getters['sale/salePackage'] );
        let loading = computed(() => store.getters['sale/loading'] );
        let getSalePackages = (page = 1,preload = '') => {
            store.dispatch('sale/getSalePackage',`?page=${page}&search=${search.value}`);
        }

        emitter.on('get_lang', () => {
            getSalePackages();
        });
        //
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
        //
        // async function deletePackage(id){
        //     await store.dispatch('sale/daletePackage',id);
        //     document.querySelector('.modal-backdrop').style.display = 'none';
        // }
        //
        return {getSalePackages,loading,search,packageSale};

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
