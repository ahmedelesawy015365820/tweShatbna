<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
        <div class="content container-fluid">
            <Breadcrumb :title="$t('global.Fines')" routeName='dashboard' />
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
                                     <div class="col-md-5 mb-3">
                                        <select class='form-control' id="type" v-model="type" @change="getDesignersFines">
                                            <option value="">{{$t('global.All Fines')}}</option>
                                            <option value="2">{{$t('global.Designers Fine')}}</option>
                                            <option value="1">{{$t('global.Companies Fine')}}</option>
                                        </select>
                                    </div>
                                    <div class="col-2 row justify-content-end">
                                        <router-link
                                            :to="{name: 'DesignersFinesCreate', params: {lang: locale || 'ar'}}"
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
                                        <th>{{$t('From') + ' ' + $t('global.( Numner of days )')}}</th>
                                        <th>{{$t('To') + ' ' + $t('global.( Numner of days )')}}</th>
                                        <th>{{$t('Fine type')}}</th>
                                        <th>{{$t('Percentage')}} (%)</th>
                                        <th>{{$t('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-if="Object.keys(designersFines.data?? {} ).length"  v-for="(item,index) in designersFines.data"  :key="item.id" >
                                            <td>{{index + 1}}</td>
                                            <td>{{item.from}}</td>
                                            <td>{{item.to}}</td>
                                            <td>{{item.type == 0 ? $t('global.Designers Fine') : $t('global.Companies Fine')}}</td>
                                            <td><span class="text-success">{{item.percentage}}%</span></td>
                                            <td>
                                                <router-link :to="{name: 'DesignersFinesUpdate', params: {lang: locale || 'ar',id:item.id}}" class="btn btn-sm btn-success me-2">
                                                    <i class="far fa-edit"></i>
                                                </router-link>
                                                <a href="#" @click.prevent="deleteDesignersFine(item.id,index)" data-bs-target="#staticBackdrop"  class="btn btn-sm btn-danger me-2">
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
            <Pagination :data="designersFines" @pagination-change-page="getDesignersFines">
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
import { designersFinesComposable } from "../composables/designersFines";

export default {
    name: "index",
    setup(){
        const {designersFines,search,loading,getDesignersFines,deleteDesignersFine,type} = designersFinesComposable()

        onMounted(() => {
            getDesignersFines();
        });

        return {loading,getDesignersFines,search,deleteDesignersFine,designersFines,type};

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
