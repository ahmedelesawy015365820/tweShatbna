<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{ $t('global.treasuriesExpense') }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <router-link :to="{name: 'dashboard', params: {lang: locale || 'ar'}}">
                                    {{ $t('dashboard.Dashboard') }}
                                </router-link>
                            </li>
                            <li class="breadcrumb-item active">{{ $t('global.treasuriesExpense') }}</li>
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
                                        {{ $t('global.Search') }}:
                                        <input type="search" v-model="search" class="custom"/>
                                    </div>
                                    <div class="col-5 row justify-content-end">
                                        <select @change="getIncome" v-model="treasury_id"  class="form-select">
                                            <option value="0">{{$t('treasury.ChooseTreasury')}}</option>
                                            <option v-for="treasury in treasuries" :kay="treasury.id" :value="treasury.id">{{treasury.name}}</option>
                                        </select>

                                    </div>
                                    <div v-if="treasury_id" class="col-12 row mt-3">
<!--                                        <span v-if="treasury_id" class="amount">{{$t('global.NetTreasury')}} : {{amount}}</span>-->
<!--                                        <span v-if="treasury_id" class="amount">{{$t('global.TotalIncome')}} : {{expense}}</span>-->
<!--                                        <span v-if="treasury_id" class="amount">{{$t('global.ToalExpense')}} : {{income}}</span>-->
                                        <div class="col-4 ">
                                            <div class="amount">
                                                <h5>
                                                    {{$t('global.NetTreasury')}} : {{amount}}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="amount">
                                                <h5>
                                                    {{$t('global.TotalIncome')}} : {{expense}}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="amount">
                                                <h5>
                                                    {{$t('global.TotalExpense')}} : {{income}}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ $t('global.Band Name') }}</th>
                                        <th>{{ $t('global.Amount') }}</th>
                                        <th>{{ $t('global.RecipientsName') }}</th>
                                        <th>{{ $t('global.For') }}</th>

                                        <th>{{ $t('global.PaymentDate') }}</th>
                                        <th>{{ $t('global.TransactionDate') }}</th>
                                        <th>{{ $t('global.ProcessWriter') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(item,index) in incomes" v-if="incomes" :key="item.id">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ item.expense.name }}</td>
                                        <td>{{ item.amount }}</td>
                                        <td>{{ item.payer }}</td>
                                        <td>{{ item.notes }}</td>
                                        <td>{{ item.payment_date }}</td>
                                        <td>{{ dateFormat(item.created_at) }}</td>
                                        <td>{{ item.user ? item.user.name : "-----" }}</td>

                                    </tr>
                                    <tr v-else>
                                        <th class="text-center" colspan="7">{{ $t('global.NoDataFound') }}</th>
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
            <Pagination :data="incomesPaginate" @pagination-change-page="getIncome">
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
import {onMounted, inject, watch, ref} from "vue";
import {useStore} from "vuex";
import adminApi from "../../../api/adminAxios";
import {useI18n} from "vue-i18n";

export default {
    name: "index",
    setup() {
        const emitter = inject('emitter');
        const {t} = useI18n({});

        // get packages
        let incomes = ref([]);
        let treasuries = ref([]);
        let incomesPaginate = ref({});
        let treasury_id = ref(0);
        let amount = ref(0);
        let income = ref(0);
        let expense = ref(0);
        let loading = ref(false);
        const search = ref('');

        let getIncome = (page = 1) => {
            amount.value = 0;
            income.value = 0;
            expense.value = 0;
           if (treasury_id.value > 0){
               loading.value = true;

               adminApi.get(`/v1/dashboard/treasuriesExpense/${treasury_id.value}?page=${page}&search=${search.value}`)
                   .then((res) => {
                       let l = res.data.data;
                       incomesPaginate.value = l.incomes;
                       incomes.value = l.incomes.data;

                       let v = treasuries.value.filter((el)=> el.id == treasury_id.value);
                       amount.value = v[0].amount;
                       income.value = v[0].income;
                       expense.value = v[0].expense;
                   })
                   .catch((err) => {
                       console.log(err.response.data);
                   })
                   .finally(() => {
                       loading.value = false;
                   });
           }
        }

        let getTreasuries = () => {
            loading.value = true;

            adminApi.get(`/v1/dashboard/activeTreasury`)
                .then((res) => {
                    let l = res.data.data;
                    console.log(l);
                    treasuries.value= l.treasuries;
                })
                .catch((err) => {
                    console.log(err.response.data);
                })
                .finally(() => {
                    loading.value = false;
                })
        }

        onMounted(() => {
            getIncome();
            getTreasuries();
        });

        emitter.on('get_lang', () => {
            getIncome(search.value);
            getTreasuries();
        });

        watch(search, (search, prevSearch) => {
            if (search.length >= 0) {
                getIncome();
                getTreasuries();
            }
        });


        let dateFormat = (item) => {
            return new Date(item).toDateString();
        }

        return {expense,income,amount,treasury_id,incomes,treasuries, loading, getIncome,dateFormat, search, incomesPaginate};

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
.hover:hover{
    border: 2px solid;
    padding: 3px;
    border-radius: 7px;
}


.amount{
    background-color: #fcb00c;
    color: #000;
    padding: 10px;
}
.amount h5{
    font-weight: 700;
    text-align: center;
}

</style>
