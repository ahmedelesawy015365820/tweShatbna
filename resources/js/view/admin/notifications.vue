<template>
        <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
            <div class="content container-fluid">
                <loader v-if="loading" />
                <div class="row justify-content-center">
                    <div class="col-md-7 border-media">
                        <div class="notifications">
                            <div class="topnav-dropdown-header">
                                <span class="notification-title">{{$t("notification.Notifications")}}</span>
                                <a href="#" @click.prevent="clearAll" class="clear-noti">{{$t("notification.clear")}}</a>
                            </div>
                            <div class="noti-content">
                                <ul class="notification-list">

                                    <li
                                        :class="['notification-message',!notification.read_at?'read-at':'']"
                                        v-for="(notification,index) in notifications"
                                    >

                                        <!-- start trust Design -->
                                        <router-link
                                            :to="{name:notification.data.name,params: {lang: this.$i18n.locale || 'ar',id:notification.data.design_id}}"
                                            v-if="notification.data.name == 'showDesign'"
                                        >
                                            <div class="media d-flex" @click="clearItem(notification.id)">
                                                <span class="avatar avatar-sm flex-shrink-0">
                                                <img
                                                    class="avatar-img rounded-circle"
                                                    :src="notification.data.image"
                                                    onerror="src='/admin/img/profiles/avatar-02.jpg'"
                                                >
                                                </span>
                                                <div class="media-body flex-grow-1">
                                                    <p class="noti-details">
                                                        {{`${$t("notification.trustDesign")}
                                                        ${notification.data.name_user}`}}
                                                    </p>
                                                    <p class="noti-time"><span class="notification-time">{{notification.data.timeDate}}</span></p>
                                                </div>
                                            </div>
                                        </router-link>
                                        <!-- end trust Design -->

                                    </li>

                                </ul>
                            </div>
                        </div>

                        <!-- start Pagination -->
                        <Pagination :data="notificationsPaginate" @pagination-change-page="notificationNotRead">
                            <template #prev-nav>
                                <span>&lt; {{$t('global.Previous')}}</span>
                            </template>
                            <template #next-nav>
                                <span>{{$t('global.Next')}} &gt;</span>
                            </template>
                        </Pagination>
                        <!-- end Pagination -->
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
import adminApi from "../../api/adminAxios";
import {ref,onMounted} from "vue";

export default {
    name: "notifications",
    setup(){

        let notifications = ref([]);
        let notificationsPaginate = ref({});
        let loading = ref(false);

        let notificationNotRead = () => {
            loading.value = true;

            if(localStorage.getItem("user")){
                adminApi.get(`/v1/dashboard/getAllNot`)
                    .then((res) => {
                        notificationsPaginate.value = res.data.data.Notifications;
                        notifications.value = res.data.data.Notifications.data;
                        console.log(notifications.value);
                    })
                    .catch((err) => {
                        console.log(err.response);
                    })
                    .finally(() => {
                        loading.value = false;
                    });
            }
        };

        onMounted(() => {
            notificationNotRead();
        });

        let clearItem = (id) => {
            adminApi.post(`/v1/dashboard/clearItem/${id}`)
                .then((res) => {})
                .catch((err) => {
                    console.log(err.response);
                })
        };


        let clearAll = () => {
            loading.value = true;

            adminApi.post(`/v1/dashboard/getNotNotRead`)
                .then((res) => {
                    notificationNotRead();
                })
                .catch((err) => {
                    console.log(err.response);
                })
                .finally(() => {
                    loading.value = false;
                });
        };

        return {clearItem,clearAll,notificationNotRead,loading,notifications,notificationsPaginate};
    }
}
</script>

<style scoped>
.notifications .noti-content {
    height: auto !important;
    width: auto !important;
}

.notifications ul.notification-list > li.read-at{
    background-color: #fcb00c24;
}

.notifications ul.notification-list > li a:hover{
    background-color: #fcb00c24;
}

.notifications .media > .avatar {
    margin: 0 10px !important;
}

.notifications {
    margin-bottom: 25px;
}

.border-media{
    border: 1px solid #fcb00c;
    padding: 25px;
    box-shadow: 0px 1px 6px 0px #fcb00c;
    border-radius: 15px;
    background-color: #fff;
}

.notifications ul.notification-list > li a {
    border-bottom: 1px solid #fcb00c4d;
    border-radius: 0px;
}

.topnav-dropdown-header .clear-noti {
    color: #fcb00c;
    font-size: 16px;
}

.page-wrapper > .content {
    min-height: 90vh;
    background-color: #fcb00c1c;
}

.topnav-dropdown-header {
    border-bottom: 1px solid #fcb00c;
    text-align: center;
}

.topnav-dropdown-header .notification-title {
    font-size: 18px;
}
</style>
