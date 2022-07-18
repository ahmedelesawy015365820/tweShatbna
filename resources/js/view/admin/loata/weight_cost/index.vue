<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
        <div class="content container-fluid">
            <Breadcrumb :title="$t('global.Weight Cost')" routeName='dashboard' />
            <!-- Table -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <loader v-if="loading" />
                        <div class="card-body">
                            <div class="card-header pt-0">
                                <div class="row justify-content-between">
                                    <div class="col-5">
                                        <input type="search" v-model="search" class="form-control"  :placeholder="$t('Search:')"/>
                                    </div>

                                    <div class="col-2 row justify-content-end">
                                        <router-link
                                            :to="{name: 'createWeightCost', params: {lang: locale || 'ar'}}"
                                            class="btn btn-custom btn-warning w-100" style="height:44px"
                                        >
                                            {{$t('Add')}}
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{$t('global.From') + ' ' + $t('global.( Numner of kg )')}}</th>
                                        <th>{{$t('global.To') + ' ' + $t('global.( Numner of kg )')}}</th>
                                        <th>{{$t('global.Cost') +" ("+ $t('global.LE') + ")"}} </th>
                                        <th>{{$t('global.Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr  v-for="(item,index) in weightCost.data" v-if="Object.keys(weightCost.data?? {} ).length" :key="item.id" >
                                            <td>{{index + 1}}</td>
                                            <td>{{item.from}}</td>
                                            <td>{{item.to}}</td>
                                            <td><span class="text-success">{{item.cost}}</span></td>
                                            <td>
                                                <router-link :to="{name: 'updateWeightCost', params: {lang: locale || 'ar',id:item.id}}" class="btn btn-sm btn-success me-2">
                                                    <i class="far fa-edit"></i>
                                                </router-link>
                                                <a href="#" @click.prevent="deleteWeightCost(item.id,index)" data-bs-target="#staticBackdrop"  class="btn btn-sm btn-danger me-2">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>

                                        </tr>
                                        <tr v-else>
                                            <th class="text-center" colspan="5">{{$t('global.No Data Found')}}</th>
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
            <Pagination :data="weightCost" @pagination-change-page="getWeightCosts">
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
import {onMounted, ref} from "vue";
import { weightCostComosable } from "../composables/weight_cost";

export default {
    name: "index",
    setup(){
        const {weightCost,search,loading,getWeightCosts,deleteWeightCost} = weightCostComosable()

        onMounted(() => {
            getWeightCosts();
        });

        return {loading,getWeightCosts,search,deleteWeightCost,weightCost};

    },

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
