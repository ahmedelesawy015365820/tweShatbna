<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Banner</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'dashboard', params: {lang: locale || 'ar'}}">{{$t('dashboard.Dashboard')}}</router-link></li>
                            <li class="breadcrumb-item active">Banner</li>
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
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title 1</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody v-if="banner.length">
                                        <tr v-for="item in banner">
                                            <td>{{item.id + 1}}</td>
                                            <td>{{item.title1}} </td>
                                            <td>
                                                <img :src="`/web/img/banner/${item.media.file_name}`">
                                            </td>
                                            <td>
                                                <router-link :to="{name: 'editBanner', params: {lang: locale || 'ar',id:item.id}}" class="btn btn-sm btn-success me-2">
                                                    <i class="far fa-edit"></i>
                                                </router-link>
                                            </td>

                                        </tr>
                                    </tbody>
                                    <tbody v-else>
                                        <tr>
                                            <th class="text-center" colspan="3">No Data Found</th>
                                        </tr>
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
import {onMounted,inject,watch,ref} from "vue";
import adminApi from "../../../api/adminAxios";

export default {
    name: "index",
    setup(){

        // get packages
        let banner = ref([]);
        let loading = ref(false);
        const emitter = inject('emitter');

        let getSetting = () => {
            loading.value = true;

            adminApi.get('/v1/dashboard/banner')
                .then((res) => {
                    let l = res.data.data;
                    banner.value = l.banner;
                })
                .catch((err) => {
                    console.log(err.response);
                })
                .finally(() => {
                    loading.value = false;
                });
        }

        onMounted(() => {
            getSetting();
        });

        emitter.on('get_lang', () => {
            getSetting();
        });

        return {loading,banner};

    },
    data(){
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

img {
    width: 100px;
}
</style>
