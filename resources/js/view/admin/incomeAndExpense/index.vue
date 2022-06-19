<template>

    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{ $t('global.Incomes') }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <router-link :to="{name: 'dashboard', params: {lang: locale || 'ar'}}">
                                    {{ $t('dashboard.Dashboard') }}
                                </router-link>
                            </li>
                            <li class="breadcrumb-item active">{{ $t('global.Incomes') }}</li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- /Page Header -->
            <div class="card bg-white projects-card">
                <div class="card-body pt-0">
                    <div class="card-header">
                        <h5 class="card-title">{{ $t('global.IncomeAndExpense') }}</h5>
                    </div>
                    <div class="reviews-menu-links">
                        <ul role="tablist" class="nav nav-pills card-header-pills nav-justified">
                            <li class="nav-item">
                                <a href="#tab-4" data-bs-toggle="tab"
                                   class="nav-link active">{{ $t('global.Incomes') }}</a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab-5" data-bs-toggle="tab" class="nav-link">{{ $t('global.Expenses') }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content pt-0">
                        <div role="tabpanel" id="tab-4" class="tab-pane fade active show">
                            <loader v-if="loading"/>
                            <div class="row justify-content-between">
                                <div class="col-5">
                                    {{ $t('global.Search') }}:
                                    <input type="search" v-model="searchIncome" class="custom"/>
                                </div>
                                <div class="col-5 row justify-content-end">
                                    <router-link
                                        :to="{name: 'createIncomeData', params: {lang: locale || 'ar'}}"
                                        class="btn btn-custom btn-warning">
                                        {{ $t('global.Add') }}
                                    </router-link>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-center table-hover mb-0 datatable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ $t('global.Title') }}</th>
                                        <th>{{ $t('global.Notes') }}</th>
                                        <th>{{ $t('global.Amount') }}</th>
                                        <th>{{ $t('global.PaymentDate') }}</th>
                                        <th>{{ $t('global.TransactionDate') }}</th>
                                        <th>{{ $t('global.Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(item,index) in incomes" v-if="incomes" :key="item.id">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ item.income.name }}</td>
                                        <td>{{ item.notes }}</td>
                                        <td>{{ item.amount }}</td>
                                        <td>{{ item.payment_date }}</td>
                                        <td>{{dateFormat(item.created_at)}}</td>

                                        <td>

                                            <router-link
                                                :to="{name: 'editIncomeData', params: {lang: locale || 'ar',id:item.id}}"
                                                class="btn btn-sm btn-success me-2">
                                                <i class="far fa-edit"></i>
                                            </router-link>
                                            <a href="#" @click="deleteIncome(item.id,index)"
                                               data-bs-target="#staticBackdrop" class="btn btn-sm btn-danger me-2">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr v-else>
                                        <th class="text-center" colspan="7">{{ $t('global.NoDataFound') }}</th>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- start Pagination -->
                            <Pagination :data="incomesPaginate" @pagination-change-page="getIncome">
                                <template #prev-nav>
                                    <span>&lt; {{ $t('global.Previous') }}</span>
                                </template>
                                <template #next-nav>
                                    <span>{{ $t('global.Next') }} &gt;</span>
                                </template>
                            </Pagination>
                            <!-- end Pagination -->
                        </div>
                        <div role="tabpanel" id="tab-5" class="tab-pane fade">
                            <loader v-if="loading"/>
                            <div class="row justify-content-between">
                                <div class="col-5">
                                    {{ $t('global.Search') }}:
                                    <input type="search" v-model="searchExpense" class="custom"/>
                                </div>
                                <div class="col-5 row justify-content-end">
                                    <router-link
                                        :to="{name: 'createExpenseData', params: {lang: locale || 'ar'}}"
                                        class="btn btn-custom btn-warning">
                                        {{ $t('global.Add') }}
                                    </router-link>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-center table-hover mb-0 datatable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ $t('global.Title') }}</th>
                                        <th>{{ $t('global.Notes') }}</th>
                                        <th>{{ $t('global.Amount') }}</th>
                                        <th>{{ $t('global.PaymentDate') }}</th>
                                        <th>{{ $t('global.TransactionDate') }}</th>
                                        <th>{{ $t('global.Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(item,index) in expenses" v-if="expenses" :key="item.id">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ item.expense.name }}</td>
                                        <td>{{ item.notes }}</td>
                                        <td>{{ item.amount }}</td>
                                        <td>{{ item.payment_date }}</td>
                                        <td>{{dateFormat(item.created_at)}}</td>
                                        <td>

                                            <router-link
                                                :to="{name: 'editExpenseData', params: {lang: locale || 'ar',id:item.id}}"
                                                class="btn btn-sm btn-success me-2">
                                                <i class="far fa-edit"></i>
                                            </router-link>
                                            <a href="#" @click="deleteExpense(item.id,index)"
                                               data-bs-target="#staticBackdrop" class="btn btn-sm btn-danger me-2">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr v-else>
                                        <th class="text-center" colspan="7">{{ $t('global.NoDataFound') }}</th>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- start Pagination -->
                            <Pagination :data="expensesPaginate" @pagination-change-page="getExpense">
                                <template #prev-nav>
                                    <span>&lt; {{ $t('global.Previous') }}</span>
                                </template>
                                <template #next-nav>
                                    <span>{{ $t('global.Next') }} &gt;</span>
                                </template>
                            </Pagination>
                            <!-- end Pagination-->
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Wrapper -->
    </div>

</template>

<script>
import {onMounted, inject, watch, ref} from "vue";
import {useStore} from "vuex";
import adminApi from "../../../api/adminAxios";
import {useI18n} from "vue-i18n";

export default {
    name: "index",
    setup() {
        const emitter = inject('emitter');
        const {t} = useI18n({});

        // get income
        let incomes = ref([]);
        let incomesPaginate = ref({});
        let loading = ref(false);
        const searchIncome = ref('');

        //get expense
        let expenses = ref([]);
        let expensesPaginate = ref({});
        const searchExpense = ref('');

        let getIncome = (page = 1) => {
            loading.value = true;

            adminApi.get(`/v1/dashboard/calcIncome?page=${page}&search=${searchIncome.value}`)
                .then((res) => {
                    let l = res.data.data;
                    incomesPaginate.value = l.calcIncome;
                    incomes.value = l.calcIncome.data;
                })
                .catch((err) => {
                    console.log(err.response.data);
                })
                .finally(() => {
                    loading.value = false;
                });
        }

        watch(searchIncome, (searchIncome, prevSearch) => {
            if (searchIncome.length >= 0) {
                getIncome();
            }
        });

        //get expense

        let getExpense = (page = 1) => {
            loading.value = true;

            adminApi.get(`/v1/dashboard/calcExpense?page=${page}&search=${searchExpense.value}`)
                .then((res) => {
                    let l = res.data.data;
                    expensesPaginate.value = l.calcExpense;
                    expenses.value = l.calcExpense.data;
                })
                .catch((err) => {
                    console.log(err.response.data);
                })
                .finally(() => {
                    loading.value = false;
                });
        }

        onMounted(() => {
            getIncome();
            getExpense();
        });

        emitter.on('get_lang', () => {
            getIncome();
            getExpense();
        });

        watch(searchExpense, (searchExpense, prevSearch) => {
            if (searchExpense.length >= 0) {
                getExpense();
            }
        });

        let dateFormat = (item) => {
            return new Date(item).toDateString();
        }

        function deleteIncome(id, index) {
            Swal.fire({
                title: `${t('global.AreYouSureDelete')}`,
                text: `${t("global.YouWontBeAbleToRevertThis")}`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {

                    adminApi.delete(`/v1/dashboard/incomeAndExpense/${id}`)
                        .then((res) => {
                            incomes.value.splice(index, index + 1);

                            Swal.fire({
                                icon: 'success',
                                title: `${t("global.DeletedSuccessfully")}`,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        })
                        .catch((err) => {
                            Swal.fire({
                                icon: 'error',
                                title: `${t('global.ThereIsAnErrorInTheSystem')}`,
                                text: `${t('global.YouCanNotDelete')}`,
                            });
                        });
                }
            });
        }

        function deleteExpense(id, index) {
            Swal.fire({
                title: `${t('global.AreYouSureDelete')}`,
                text: `${t("global.YouWontBeAbleToRevertThis")}`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {

                    adminApi.delete(`/v1/dashboard/incomeAndExpense/${id}`)
                        .then((res) => {
                            expenses.value.splice(index, index + 1);

                            Swal.fire({
                                icon: 'success',
                                title: `${t("global.DeletedSuccessfully")}`,
                                showConfirmButton: false,
                                timer: 1500
                            });
                        })
                        .catch((err) => {
                            Swal.fire({
                                icon: 'error',
                                title: `${t('global.ThereIsAnErrorInTheSystem')}`,
                                text: `${t('global.YouCanNotDelete')}`,
                            });
                        });
                }
            });
        }

        return {dateFormat,incomes, loading, getIncome, searchIncome, deleteIncome, incomesPaginate,searchExpense,getExpense,expenses
        ,expensesPaginate,deleteExpense};

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

.hover:hover {
    border: 2px solid;
    padding: 3px;
    border-radius: 7px;
}

</style>
