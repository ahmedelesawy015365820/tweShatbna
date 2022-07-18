<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{ $t('global.TrialBalance') }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <router-link :to="{name: 'dashboard', params: {lang: locale || 'ar'}}">
                                    {{ $t('dashboard.Dashboard') }}
                                </router-link>
                            </li>
                            <li class="breadcrumb-item active">{{ $t('global.TrialBalance') }} </li>
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
                                    <div class="col-12 row justify-content-end">
                                        <form @submit.prevent="getByDate" class="needs-validation">
                                            <div class="form-group row">

                                                <div class="col-md-3">
                                                    <label >{{$t('global.FromDate')}}</label>
                                                    <input type="date" class="form-control date-input"
                                                           v-model="fromDate">
                                                </div>

                                                <div class="col-md-3">
                                                    <label >{{$t('global.ToDate')}}</label>
                                                    <input type="date" class="form-control date-input" v-model="toDate">
                                                </div>

                                                <div class="col-md-5">

                                                    <label>{{$t('global.AccountName')}} </label>

                                                    <select v-model="treasury_id" class="form-select select-input" required>
                                                        <option v-for="treasury in treasuries" :kay="treasury.id" :value="treasury.id">{{treasury.name}}</option>
                                                    </select>

                                                </div>

                                                <div class="col-md-1">
                                                    <button class="btn btn-primary" type="submit">{{$t('global.Submit')}}</button>
                                                </div>

                                            </div>

                                        </form>
                                    </div>
                                    <div class="col-12 row mt-3">
                                        <div class="col-12 d-flex justify-content-center">
                                        <button @click="printExpense" class="btn btn-success print-button">
                                            {{$t('global.Print')}}
                                            <i class="fa fa-print"></i>
                                        </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive" id="printExpense">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>{{ $t('global.AccountName') }}</th>
                                        <th class="text-center">{{ $t('global.Totals') }}</th>
                                        <th></th>
                                        <th class="text-center">{{ $t('global.Holding') }}</th>

                                    </tr>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ $t('global.Debit') }}</th>
                                        <th>{{ $t('global.Creditor') }}</th>
                                        <th>{{ $t('global.Debit') }}</th>
                                        <th>{{ $t('global.Creditor') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>أصول ثابتة</td>
                                        <td>۱۰۰۰۰</td>
                                        <td>۳۰۰۰</td>
                                        <td>۷۰۰۰</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>أصول متداولة</td>
                                        <td>۳۰۰۰</td>
                                        <td>۱۰۰۰۰</td>
                                        <td></td>
                                        <td>۷۰۰۰</td>
                                    </tr>
                                    <tr>
                                        <td>{{$t('global.Total')}}</td>
                                        <td>{{$t('global.TotalsDifference')}}</td>
                                        <td>۳۰۰۰</td>
                                        <td>{{$t('global.BalanceDifference')}}</td>
                                        <td>۷۰۰۰</td>
                                    </tr>
<!--                                    <tr v-for="(item,index) in incomes" v-if="incomes" :key="item.id">-->
<!--                                        <td>{{ index + 1 }}</td>-->
<!--                                        <td>{{ item.income.name }}</td>-->
<!--                                        <td>{{ item.amount }}</td>-->
<!--                                        <td>{{ item.payer }}</td>-->
<!--                                        <td>{{ item.notes }}</td>-->
<!--                                        <td>{{ item.payment_date }}</td>-->
<!--                                        <td>{{ dateFormat(item.created_at) }}</td>-->
<!--                                        <td>{{ item.user ? item.user.name : "-&#45;&#45;&#45;&#45;" }}</td>-->

<!--                                    </tr>-->
<!--                                    <tr v-else>-->
<!--                                        <th class="text-center" colspan="7">{{ $t('global.NoDataFound') }}</th>-->
<!--                                    </tr>-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Table -->
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
        let fromDate = ref('');
        let toDate = ref('');
        let treasury_id = ref('');
        let loading = ref(false);

        let getIncome = (page = 1) => {

           loading.value = true;

           adminApi.get(`/v1/dashboard/incomeTreasuryPlatformReport?page=${page}&treasury_id=${treasury_id.value}&from_date=${fromDate.value}&to_date=${toDate.value}`)
               .then((res) => {
                   let l = res.data.data;
                   incomes.value = l.incomes.data;
               })
               .catch((err) => {
                   console.log(err.response.data);
               })
               .finally(() => {
                   loading.value = false;
               });

        }

        let getTreasuries = () => {
            loading.value = true;

            adminApi.get(`/v1/dashboard/activeTreasury`)
                .then((res) => {
                    let l = res.data.data;
                    treasuries.value= l.treasuries;
                })
                .catch((err) => {
                    console.log(err.response.data);
                })
                .finally(() => {
                    loading.value = false;
                })
        }

        let getByDate = (page = 1) => {

            loading.value = true;

            adminApi.get(`/v1/dashboard/incomeTreasuryPlatformReport?page=${page}&treasury_id=${treasury_id.value}&from_date=${fromDate.value}&to_date=${toDate.value}`)
                .then((res) => {
                    let l = res.data.data;
                    incomes.value = l.incomes.data;
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
            getIncome();
        });


        let printExpense = () => {
            var printContents = document.getElementById('printExpense').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }

        let dateFormat = (item) => {
            return new Date(item).toDateString();
        }

        return {printExpense,treasury_id,fromDate,toDate,getByDate,incomes,treasuries, loading, getIncome,dateFormat};

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
.submit-margin{
    margin-top: 38px !important;
}
.date-input{
    width: 135px !important;
    display: inline-block !important;
    margin: 0px 8px 0 8px !important;
}
.select-input{
    width: 235px !important;
    display: inline-block !important;
    margin: 0px 8px 0 8px !important;
}

</style>
