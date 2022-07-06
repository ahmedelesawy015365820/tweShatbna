<template>
        <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
            <div class="content container-fluid">
                <div class="notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">{{$t("notification.Notifications")}}</span>
                        <a href="#" @click.prevent="clearAll" class="clear-noti">{{$t("notification.clear")}}</a>
                    </div>
                    <div class="noti-content">
                        <ul class="notification-list">

                            <li class="notification-message">

                                <!-- start trust Design -->
                                <a
                                >
<!--                                    :to="{name:notification.data.name,params: {lang: this.$i18n.locale || 'ar',id:notification.data.design_id}}"-->
<!--                                    v-if="notification.data.name == 'showDesign'"-->
                                    <div class="media d-flex">
                                        <span class="avatar avatar-sm flex-shrink-0">
                                            <img
                                                class="avatar-img rounded-circle"
                                                src=""
                                                onerror="src='/admin/img/profiles/avatar-02.jpg'"
                                            >
                                        </span>
                                        <div class="media-body flex-grow-1">
                                            <p class="noti-details">
                                                {{`${$t("notification.trustDesign")}`}}

                                            </p>
                                            <p class="noti-time"><span class="notification-time"></span></p>
                                        </div>
                                    </div>
                                </a>
                                <!-- end trust Design -->


                                <!-- <span class="avatar-title rounded-circle bg-primary-light"><i class="far fa-user"></i></span>-->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
export default {
    name: "notifications"
}
</script>

<style scoped>

</style>
