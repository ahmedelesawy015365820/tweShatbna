<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">

        <div class="content container-fluid">

            <notifications :position="this.$i18n.locale == 'ar'? 'top left': 'top right'"  />

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{$t('global.Expenses')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'indexIncomeAndExpense', params: {lang: locale || 'ar'}}">{{$t('global.IncomeAndExpense')}}</router-link></li>
                            <li class="breadcrumb-item active">{{$t('expense.EditExpensingAccounts')}}</li>
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
                            <div class="card-header pt-0 mb-4">
                                <router-link
                                    :to="{name: 'indexIncomeAndExpense', params: {lang: locale || 'ar'}}"
                                    class="btn btn-custom btn-dark"
                                >
                                    {{$t('global.back')}}
                                </router-link>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="alert alert-danger text-center" v-if="errors['payment_date']">{{ errors['payment_date'][0] }}<br /> </div>
                                    <div class="alert alert-danger text-center" v-if="errors['expense_id']">{{ errors['expense_id'][0] }}<br /> </div>
                                    <div class="alert alert-danger text-center" v-if="errors['notes']">{{ errors['notes'][0] }}<br /> </div>
                                    <form @submit.prevent="editExpense" class="needs-validation">
                                        <div class="form-row row">
                                            <div class="col-md-6 mb-3">
                                                <label >{{$t('expense.ChooseExpense')}}</label>
                                                <select v-model="data.expense_id" class="form-select" :class="{'is-invalid':v$.expense_id.$error,'is-valid':!v$.expense_id.$invalid}">
                                                    <option v-for="expense in mainExpense" :kay="expense.id" :value="expense.id">{{expense.name}}</option>
                                                </select>
                                                <div class="valid-feedback">{{$t('global.LooksGood')}}</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.expense_id.required.$invalid">{{$t('global.ExpenseIsRequired')}}<br /> </span>
                                                </div>

                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom01">{{$t('global.Amount')}}</label>
                                                <input type="number" class="form-control"
                                                       v-model.trim="v$.amount.$model"
                                                       id="validationCustom01"
                                                       :placeholder="$t('global.Amount')"
                                                       :class="{'is-invalid':v$.amount.$error,'is-valid':!v$.amount.$invalid}"
                                                >
                                                <div class="valid-feedback">{{$t('global.LooksGood')}}</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.amount.required.$invalid">{{$t('global.AmountIsRequired')}}<br /> </span>
                                                    <span v-if="v$.amount.numeric.$invalid">{{$t('global.AmountIsNumeric')}} <br /></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom01">{{$t('global.Notes')}}</label>
                                                <textarea rows="4" cols="5" v-model.trim="v$.notes.$model" :class="['form-control',{'is-invalid':v$.notes.$error,'is-valid':!v$.notes.$invalid}]" :placeholder="$t('global.Notes')"></textarea>
                                                <div class="valid-feedback">{{$t('global.LooksGood')}}</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.notes.required.$invalid">{{$t('global.NotesIsRequired')}}<br /> </span>
                                                    <span v-if="v$.notes.minLength.$invalid">{{$t('global.NotesIsMustHaveAtLeast')}} {{ v$.notes.minLength.$params.max }} {{$t('global.Letters')}} <br /></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom01">{{$t('global.PaymentDate')}}</label>
                                                <input type="date" class="form-control"
                                                       v-model.trim="v$.payment_date.$model"
                                                       id="validationCustom02"
                                                       :class="{'is-invalid':v$.payment_date.$error,'is-valid':!v$.payment_date.$invalid}"
                                                >
                                                <div class="valid-feedback">{{$t('global.LooksGood')}}</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.payment_date.required.$invalid">{{$t('global.PaymentDateIsRequired')}}<br /> </span>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary" type="submit">{{$t('global.Submit')}}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Table -->
        </div>
    </div>
</template>

<script>
import {computed, onMounted, reactive,toRefs,inject,ref} from "vue";
import useVuelidate from '@vuelidate/core';
import {required,minLength,numeric} from '@vuelidate/validators';
import adminApi from "../../../api/adminAxios";
import { notify } from "@kyvg/vue3-notification";
import {useI18n} from "vue-i18n";


export default {
    name: "editExpense",
    data(){
        return {
            errors:{}
        }
    },
    props:["id"],
    setup(props){
        const emitter = inject('emitter');

        const {id} = toRefs(props)
        const {t} = useI18n({});
        // get create Package
        let mainExpense = ref([]);
        let expense = ref({});
        let loading = ref(false);


        let getMainExpenseViews = () => {
            loading.value = true;

            adminApi.get(`/v1/dashboard/editExpense/${id.value}/edit`)
                .then((res) => {
                    let l = res.data.data;
                    mainExpense.value= l.mainExpense;
                    addExpense.data.amount = l.expense.amount;
                    addExpense.data.notes = l.expense.notes;
                    addExpense.data.payment_date = l.expense.payment_date;
                    addExpense.data.expense_id = l.expense.expense_id;
                    console.log(l)
                })
                .catch((err) => {
                    console.log(err.response);
                })
                .finally(() => {
                    loading.value = false;
                })
        }

        onMounted(() => {
            getMainExpenseViews();
        });


        //start design
        let addExpense =  reactive({
            data:{
                amount:null,
                notes:null,
                payment_date: null,
                expense_id: null,
            }
        });

        const rules = computed(() => {
            return {
                amount: {
                    required,
                    numeric

                },
                expense_id:{
                    required
                },
                notes:{
                    required,
                    minLength: minLength(3),
                },
                payment_date:{
                    required,
                }

            }
        });


        const v$ = useVuelidate(rules,addExpense.data);


        return {t,mainExpense,loading,...toRefs(addExpense),v$};
    },
    methods: {
        editExpense(){
            this.v$.$validate();

            if(!this.v$.$error){

                this.loading = true;
                this.errors = {};

                adminApi.put(`/v1/dashboard/incomeAndExpense/${this.id}`,this.data)
                    .then((res) => {

                        notify({
                            title: `${this.t('global.EditSuccessfully')} <i class="fas fa-check-circle"></i>`,
                            type: "success",
                            duration: 5000,
                            speed: 2000
                        });

                    })
                    .catch((err) => {
                        this.errors = err.response.data.errors;
                    })
                    .finally(() => {
                        this.loading = false;
                    });

            }
        }
    }
}
</script>

<style scoped>
.coustom-select {
    height: 100px;
}
.card{
    position: relative;
}
</style>
