<template>
<div>
    <loader v-if="loading" />
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <h2 class="breadcrumb-title">{{privacy.title}}</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <router-link :to="{name:'home',params: {lang:this.$i18n.locale}}"> {{$t('header.home')}} </router-link>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{$t('header.PRIVACY')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <!-- Page Content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="terms-content" v-html="privacy.description">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->
</div>
</template>

<script>
import {inject, onMounted, ref} from 'vue';
import webApi from "../../api/webAxios";

export default {
    name: "privacy",
    setup(){

        let privacy = ref({});
        let loading = ref(false);
        const emitter = inject('emitter');

        let getPrivacy = () => {
            loading.value = true;

            webApi.get(`/v1/web/privacy`)
                .then((res) => {
                    privacy.value = res.data.data.privacy;
                })
                .catch((err) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'يوجد خطا ...',
                        text: 'يوجد خطاء في النظام يرجي اعاده الماوله مره اخري  !',
                    });
                })
                .finally(() => {
                    loading.value = false;
                });
        }

        onMounted(() => {
            getPrivacy();
        });

        emitter.on('get_lang_web', () => {
            getPrivacy();
        });

        return {privacy,loading};
    }
}
</script>

<style scoped>

</style>
