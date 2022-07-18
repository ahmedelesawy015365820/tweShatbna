<template>
    <!-- Page Content -->
    <div :class="['content']">
        <loader2 v-if="loading" />

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-7">

                    <router-link class="btn main-page" :to="{name:'dashboardCompany',params:{lang:this.$i18n.locale}}">
                        العوده للرئيسية
                    </router-link>

                    <!-- Notifications -->
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col">
                                        <h5 class="card-title">Notifications</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-body p-0">
                                <div  v-for="notification in notifications">
<!--                                <img class="avatar-sm rounded-circle" src="/web/img/img-02.jpg" alt="User Image">-->
                                    <div :class="['news-feature']" v-if="notification.data.verify == 'verify account'">
                                        <span class="avatar-sm custom-span rounded-circle bg-primary-light"><i class="far fa-user"></i></span>
                                        <p>{{$t('notification.verify')}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- /Notifications -->
                </div>

            </div>
        </div>
    </div>
    <!-- /Page Content -->
</template>

<script>
import Sidebar from "../../components/web/sidebar";
import {ref,onMounted} from "vue";
import webAxios from "../../api/webAxios";

export default {
    name: "notifications",
    components: {
        Sidebar
    },
    setup(){

        const loading = ref(false);
        const notificationsPaginate = ref({});
        const notifications = ref([]);

        let notificationNot = () => {

            loading.value = true;

            webAxios.get(`/v1/dashboard/getAllNot`)
                .then((res) => {
                    notificationsPaginate.value = res.data.data.Notifications;
                    notifications.value = res.data.data.Notifications.data;
                })
                .catch((err) => {
                    console.log(err.response);
                })
                .finally(() => {
                    loading.value = false;
                });
        };

        onMounted(() => {
            notificationNot();
        });

        return {loading,notifications};
    }
}
</script>

<style scoped>
.content {
    padding: 200px 0 30px;
    position: relative;
    min-height: 100vh !important;
    background-color: #fcb00c12;
}

.card {
    border: 1px solid #fcb00c;
    background-color: #fff;
    box-shadow: 0px 0px 3px 3px #fcb00c4d;
    margin-bottom: 30px;
    padding-bottom: 50px;
}

.news-feature img ,.news-feature span {
    margin: 0 15px;
}

.news-feature {
    cursor: context-menu;
    border-bottom: 1px solid #fcb00c4d;
}

.card .card-header {
    border-bottom: 1px solid #ffc40082;
}

.news-feature:hover {
    background-color: #fcb00c26;
}

.news-feature:not(:last-child) {
    border-bottom: 1px solid #fcb00c4d;
}

.but-custom{
    margin: 0 3px;
}

.but-custom:hover{
    background-color: #fcb00c;
}

.main-page{
    border-radius: 5px;
    width: 131px;
    margin-bottom: 30px;
    padding: 10px 0;
    color: #fff;
    font-weight: 600;
    text-align: center;
    background-color: #000;
    transition: all .4s;
}
.main-page:hover{
    background-color: #fcb00c;
}

.custom-span{
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
