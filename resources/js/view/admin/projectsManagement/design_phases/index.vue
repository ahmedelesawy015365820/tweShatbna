<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
        <div class="content container-fluid">

            <Breadcrumb :title="$t('global.Design Phases')" routeName='dashboard'/>
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
                                            :to="{name: 'createDesignPhases', params: {lang: locale || 'ar'}}"
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
                                        <th>{{$t('global.Image')}}</th>
                                        <th>{{$t('global.Phase Name')}}</th>
                                        <th>{{$t('global.Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-if="Object.keys(designPhases.data?? {} ).length" v-for="(item,index) in designPhases.data" :key="item.id" >
                                            <td>{{index + 1}}</td>
                                            <td><a :href="'/web/img/general/'+item.image" target="_blank"><img :src="'/web/img/general/'+item.image" alt="" style="width:100px;height:70px"></a></td>
                                            <td>{{item.name}}</td>
                                            <td>
                                                <router-link :to="{name: 'updateDesignPhases', params: {lang: locale || 'ar',id:item.id}}" class="btn btn-sm btn-success me-2">
                                                    <i class="far fa-edit"></i>
                                                </router-link>
                                                <a href="#" @click.prevent="deleteDesignPhases(item.id,index)" data-bs-target="#staticBackdrop"  class="btn btn-sm btn-danger me-2">
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
            <Pagination :data="designPhases" @pagination-change-page="getDesignPhases">
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
import { designPhasesComposable } from "../composables/design_phases";

export default {
    name: "index",
    setup(){
        const {designPhases,search,loading,getDesignPhases,deleteDesignPhases} = designPhasesComposable()

        onMounted(() => {
            getDesignPhases();
        });


        return {loading,getDesignPhases,search,deleteDesignPhases,designPhases};

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
