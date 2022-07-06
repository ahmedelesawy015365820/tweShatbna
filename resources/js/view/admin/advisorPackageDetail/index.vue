<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{ $t('global.AdvisorShatbnaPackageDetails') }}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <router-link :to="{name: 'dashboard', params: {lang: locale || 'ar'}}">
                                    {{ $t('dashboard.Dashboard') }}
                                </router-link>
                            </li>
                            <li class="breadcrumb-item">
                                <router-link :to="{name: 'indexAdvisorPackage', params: {lang: locale || 'ar'}}">
                                    {{ $t('global.AdvisorPackage') }}
                                </router-link>
                            </li>
                            <li class="breadcrumb-item active">{{ $t('global.AdvisorShatbnaPackageDetails') }}</li>
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
                                        <router-link
                                            :to="{name: 'createAdvisorDetail', params: {lang: locale || 'ar',id}}"
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
                                        <th>{{ $t('global.Title') }}</th>
                                        <th>{{ $t('global.Action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(item,index) in advisors" v-if="advisors" :key="item.id">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ item.name }}</td>

                                        <td>
                                            <router-link
                                                :to="{name: 'editAdvisorDetail', params: {lang: locale || 'ar',idAdvisor:id,idDetail:item.id}}"
                                                class="btn btn-sm btn-success me-2">
                                                <i class="far fa-edit"></i>
                                            </router-link>
                                            <a href="#" @click="deleteDetails(item.id,item.name,index)"
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
import {onMounted, inject, watch, ref, toRefs} from "vue";
import {useStore} from "vuex";
import adminApi from "../../../api/adminAxios";
import {useI18n} from "vue-i18n";

export default {

    name: "index",
    props:["id"],

    setup(props) {

        const emitter = inject('emitter');
        const {id} = toRefs(props)
        const {t} = useI18n({});

        let advisors = ref([]);
        let AdvisorsPaginate = ref({});
        let loading = ref(false);
        const search = ref('');

        let getAdvisor = (page = 1) => {
            loading.value = true;

            adminApi.get(`/v1/dashboard/advisorDetail/${id.value}?page=${page}&search=${search.value}`)
                .then((res) => {
                    let l = res.data.data;
                    AdvisorsPaginate.value = l.packages;
                    advisors.value = l.packages.data;
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

        function deleteDetails(id, advisorsName, index) {
            Swal.fire({
                title: `${t('global.AreYouSureDelete')} (${advisorsName})`,
                text: `${t("global.YouWontBeAbleToRevertThis")}`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {

                    adminApi.delete(`/v1/dashboard/advisorDetail/${id}`)
                        .then((res) => {
                            advisors.value.splice(index, index + 1);

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

        return {advisors,deleteDetails, loading, getAdvisor, search, AdvisorsPaginate};

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
