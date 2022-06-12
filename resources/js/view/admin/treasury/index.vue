<template>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{$t('treasury.TreasuryManagement')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <router-link :to="{name: 'dashboard', params: {lang: locale || 'ar'}}">
                                    {{ $t('dashboard.Dashboard') }}
                                </router-link>
                            </li>
                            <li class="breadcrumb-item active">{{$t('treasury.TreasuryManagement')}}</li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- /Page Header -->
            <!-- Table -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <loader v-if="loading"/>
                        <div class="card-body">
                            <div class="card-header pt-0">
                                <div class="row justify-content-between">
                                    <div class="col-5">
                                        {{$t('treasury.Search')}}:
                                        <input type="search" v-model="search" class="custom"/>
                                    </div>
                                    <div class="col-5 row justify-content-end">
                                        <router-link
                                            :to="{name: 'createTreasury', params: {lang: locale || 'ar'}}"
                                            class="btn btn-custom btn-warning">
                                            {{$t('treasury.Add')}}
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{$t('treasury.Name')}}</th>
                                        <th>{{$t('treasury.RelatedTo')}}</th>
                                        <th>{{$t('treasury.Incomes')}}</th>
                                        <th>{{$t('treasury.Expenses')}}</th>
                                        <th>{{$t('treasury.Status')}}</th>
                                        <th>{{$t('treasury.Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(item,index) in treasuries" v-if="treasuries" :key="item.id">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ item.name }}</td>
                                        <td>{{ item.treasury_parent ? item.treasury_parent.name :  $t('treasury.NotRelated')}}</td>
                                        <td>{{ item.income }}</td>
                                        <td>{{ item.expense }}</td>
                                        <td><span
                                            :class="[parseInt(item.active) ? 'text-success': 'text-danger']">{{ parseInt(item.active) ? $t('treasury.Active') : $t('treasury.Inactive') }}</span>
                                        </td>
                                        <td>

                                            <router-link
                                                :to="{name: 'editTreasury', params: {lang: locale || 'ar',id:item.id}}"
                                                class="btn btn-sm btn-success me-2">
                                                <i class="far fa-edit"></i>
                                            </router-link>
                                            <a href="#" @click="deleteTreasury(item.id,item.name,index)"
                                               data-bs-target="#staticBackdrop" class="btn btn-sm btn-danger me-2">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>

                                    </tr>
                                    <tr v-else>
                                        <th class="text-center" colspan="7">{{$t('treasury.NoDataFound')}}</th>
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
            <Pagination :data="treasuriesPaginate" @pagination-change-page="getTreasuries">
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
import {onMounted, inject, watch, ref} from "vue";
import {useStore} from "vuex";
import adminApi from "../../../api/adminAxios";

export default {
    name: "index",
    setup() {
        const emitter = inject('emitter');

        // get packages
        let treasuries = ref([]);
        let treasuriesPaginate = ref({});
        let loading = ref(false);
        const search = ref('');

        let getTreasuries = (page = 1) => {
            loading.value = true;

            adminApi.get(`/v1/dashboard/treasury?page=${page}&search=${search.value}`)
                .then((res) => {
                    let l = res.data.data;
                    treasuriesPaginate.value = l.treasuries;
                    treasuries.value = l.treasuries.data;
                })
                .catch((err) => {
                    console.log(err.response.data);
                })
                .finally(() => {
                    loading.value = false;
                });
        }

        onMounted(() => {
            getTreasuries();
        });

        emitter.on('get_lang', () => {
            getTreasuries(search.value);
        });

        watch(search, (search, prevSearch) => {
            if (search.length >= 0) {
                getTreasuries();
            }
        });


        function deleteTreasury(id, treasuryName, index) {
            Swal.fire({
                title: `Are you sure delete ? (${treasuryName})`,
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {

                    adminApi.delete(`/v1/dashboard/treasury/${id}`)
                        .then((res) => {
                            treasuries.value.splice(index, index + 1);

                            Swal.fire({
                                icon: 'success',
                                title: 'Your package has been deleted.',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        })
                        .catch((err) => {
                            Swal.fire({
                                icon: 'error',
                                title: 'يوجد خطا في النظام...',
                                text: 'لا تسنطيع حذف هذه الحزمة !',
                            });
                        });
                }
            });
        }

        return {treasuries, loading, getTreasuries, search, deleteTreasury, treasuriesPaginate};

    },
    data() {
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
