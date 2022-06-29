<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{ $t('global.AdvisorPackage') }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <router-link :to="{name: 'dashboard', params: {lang: locale || 'ar'}}">
                                    {{ $t('dashboard.Dashboard') }}
                                </router-link>
                            </li>
                            <li class="breadcrumb-item active">{{ $t('global.AdvisorPackage') }}</li>
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
                                    <div class="col-5 row justify-content-end" v-if="advisors.length < 3">
                                        <router-link
                                            :to="{name: 'createAdvisorPackage', params: {lang: locale || 'ar'}}"
                                            class="btn btn-custom btn-warning">
                                            {{ $t('global.Add') }}
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ $t('global.Name') }}</th>
                                        <th>{{ $t('global.Price') }}</th>
                                        <th>{{ $t('global.Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(item,index) in advisors" v-if="advisors" :key="item.id">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ item.name }}</td>
                                        <td>{{item.price}}</td>

                                        <td>
                                            <router-link
                                                :to="{name: 'editAdvisorPackage', params: {lang: locale || 'ar',id:item.id}}"
                                                class="btn btn-sm btn-success me-2">
                                                <i class="far fa-edit"></i>
                                            </router-link>

                                            <router-link
                                                :to="{name: 'indexAdvisorDetail', params: {lang: locale || 'ar',id:item.id}}"
                                                class="btn btn-sm btn-info me-2">
                                                <i class="fas fa-braille"></i>
                                            </router-link>

                                            <a href="javascript:void(0);"
                                               class="btn btn-sm btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#edit-category">
                                                <i class="fab fa-leanpub"></i>
                                            </a>
                                        </td>
                                        <!-- Edit Modal -->
                                        <div class="modal fade custom-modal" id="edit-category">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">{{$t('advisorPackage.ShowAdvisorPackage')}}</h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body row">
                                                        <div class="col-md-6">
                                                            <div class="form-group col-lg-12">
                                                                <h5>{{$t('global.NameEn')}}</h5>
                                                                <p>{{item.translations[1].name}}</p>
                                                                <hr class="hr-show">
                                                            </div>
                                                            <div class="form-group col-lg-12">
                                                                <h5>{{$t('global.DescriptionEn')}}</h5>
                                                                <p>{{item.translations[1].description}}</p>
                                                                <hr class="hr-show">
                                                            </div>
                                                            <div class="form-group col-lg-12">
                                                                <ul>
                                                                    <h5>{{$t('global.AdvisorShatbnaPackageDetails')}}</h5>
                                                                    <li v-for="detail in item.advisor_details">
                                                                        {{detail.translations[1].name}}
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group col-lg-12">
                                                                <h5>{{$t('global.NameAr')}}</h5>
                                                                <p>{{item.translations[0].name}}</p>
                                                                <hr class="hr-show">
                                                            </div>
                                                            <div class="form-group col-lg-12">
                                                                <h5>{{$t('global.DescriptionAr')}}</h5>
                                                                <p>{{item.translations[0].description}}</p>
                                                                <hr class="hr-show">
                                                            </div>
                                                            <div class="form-group col-lg-12">
                                                                <ul>
                                                                    <h5>{{$t('global.AdvisorShatbnaPackageDetails')}}</h5>
                                                                    <li v-for="detail in item.advisor_details">
                                                                        {{detail.translations[0].name}}
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-12">
                                                            <hr class="hr-show">
                                                            <div class="show-price">
                                                                <h5>{{$t('global.Price')}} :</h5>
                                                                <p>{{item.price}}</p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Edit Modal -->
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
            <Pagination :data="AdvisorsPaginate" @pagination-change-page="getAdvisor">
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

        let advisors = ref([]);
        let AdvisorsPaginate = ref({});
        let loading = ref(false);
        const search = ref('');

        let getAdvisor = (page = 1) => {
            loading.value = true;

            adminApi.get(`/v1/dashboard/advisorPackage?page=${page}&search=${search.value}`)
                .then((res) => {
                    let l = res.data.data;
                    AdvisorsPaginate.value = l.packages;
                    advisors.value = l.packages.data;
                    console.log(l.packages.data);
                })
                .catch((err) => {
                    console.log(err.response.data);
                })
                .finally(() => {
                    loading.value = false;
                });
        }

        onMounted(() => {
            getAdvisor();
        });

        emitter.on('get_lang', () => {
            getAdvisor(search.value);
        });

        watch(search, (search, prevSearch) => {
            if (search.length >= 0) {
                getAdvisor();
            }
        });

        return {advisors, loading, getAdvisor, search, AdvisorsPaginate};

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
.modal-dialog{
    max-width: 700px !important;
}
.hr-show{
    color: #fcb00c;
    height: 5px;
}
.show-price{
    display: flex;
    justify-content: center;
}
.show-price h5{
    margin: 0px 5px 0px 5px;
}
.custom-modal .close span{
 top: 0 !important;
}

</style>
