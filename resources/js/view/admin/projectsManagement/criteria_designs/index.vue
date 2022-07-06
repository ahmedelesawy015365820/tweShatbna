<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
        <div class="content container-fluid">

            <Breadcrumb :title="$t('global.Design Criteria')" routeName='dashboard'/>
            <!-- Table -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <loader v-if="loading" />
                        <div class="card-body">
                            <div class="card-header pt-0">
                                <div class="row justify-content-between">
                                    <div class="col-5">
                                        {{$t('Search:')}}
                                        <input type="search" v-model="search" class="custom w-75"  />
                                    </div>
                                    <div class="col-5 row justify-content-end">
                                        <router-link
                                            :to="{name: 'createDesignCriteria', params: {lang: locale || 'ar'}}"
                                            class="btn btn-custom btn-warning"
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
                                        <th>{{$t('global.Criteria Name')}}</th>
                                        <th>{{$t('global.Percentage')}} (%)</th>
                                        <th>{{$t('global.Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr  v-for="(item,index) in designCriteria.data" v-if="designCriteria.data" :key="item.id" >
                                            <td>{{index + 1}}</td>
                                            <td>{{item.name}}</td>
                                            <td><span class="text-success">{{item.percentage}}%</span></td>
                                            <td>
                                                <router-link :to="{name: 'updateDesignCriteria', params: {lang: locale || 'ar',id:item.id}}" class="btn btn-sm btn-success me-2">
                                                    <i class="far fa-edit"></i>
                                                </router-link>
                                                <a href="#" @click.prevent="deleteDesignCriteria(item.id,index)" data-bs-target="#staticBackdrop"  class="btn btn-sm btn-danger me-2">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>

                                        </tr>
                                        <tr v-else>
                                            <th class="text-center" colspan="5">{{$t('No Data Found')}}</th>
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
            <Pagination :data="designCriteria" @pagination-change-page="getDesignCriteria">
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
import {onMounted} from "vue";
import { designCriteriaComposable } from "../composables/design_criteria";

export default {
    name: "index",
    setup(){
        const {designCriteria,search,loading,getDesignCriteria,deleteDesignCriteria} = designCriteriaComposable()

        onMounted(() => {
            getDesignCriteria();
        });


        return {loading,getDesignCriteria,search,deleteDesignCriteria,designCriteria};

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
