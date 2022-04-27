<template>
    <div class="col-xl-3 col-md-4 theiaStickySidebar">
        <div class="settings-widget">
            <div class="settings-header d-sm-flex flex-row flex-wrap text-center text-sm-start align-items-center">
                <a href="user-account-details.html"><img alt="profile image" src="/web/img/img-04.jpg" class="avatar-lg rounded-circle"></a>
                <div class="ms-sm-3 ms-md-0 ms-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
                    <p class="mb-2">Welcome,</p>
                    <a href="user-account-details.html"><h3 class="mb-0">John Danie S.</h3></a>
                    <p class="mb-0">@johndaniee</p>
                </div>
            </div>
            <div class="settings-menu">
                <ul>

                    <li class="nav-item">
                        <router-link
                            :to="{name:'dashboardDesign',params:{lang:this.$i18n.locale}}"
                            :class="['nav-link',$route.name == 'dashboardDesign' ? 'active' : '']"
                        >
                            <i class="material-icons">verified_user</i> الرئيسيه
                        </router-link>
                    </li>

                    <li class="nav-item">
                        <router-link
                            :to="{name:'trust',params:{lang:this.$i18n.locale}}"
                            :class="['nav-link',$route.name == 'trust' ? 'active' : '']"
                        >
                            <i class="material-icons">person_pin</i> تاكيد الحساب
                        </router-link>
                    </li>

<!--                    <li class="nav-item">-->
<!--                        <a href="manage-projects.html" class="nav-link">-->
<!--                            <i class="material-icons">business_center</i> Projects-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a href="favourites.html" class="nav-link">-->
<!--                            <i class="material-icons">local_play</i> Favourites-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a href="review.html" class="nav-link">-->
<!--                            <i class="material-icons">record_voice_over</i> Reviews-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a href="chats.html" class="nav-link">-->
<!--                            <i class="material-icons">chat</i> Messages-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a href="membership-plans.html" class="nav-link">-->
<!--                            <i class="material-icons">person_add</i> Membership-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a href="milestones.html" class="nav-link">-->
<!--                            <i class="material-icons">pie_chart</i> Milestones-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a href="deposit-funds.html" class="nav-link">-->
<!--                            <i class="material-icons">wifi_tethering</i> Payments-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class="nav-item">-->
<!--                        <a href="profile-settings.html" class="nav-link">-->
<!--                            <i class="material-icons">settings</i> Settings-->
<!--                        </a>-->
<!--                    </li>-->
                    <li class="nav-item">
                        <button @click="logout" type="submit"  class="nav-link">
                            <i class="material-icons">power_settings_new</i> Logout
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import {useStore} from "vuex";

export default {
    name: "designSidebar",
    setup(){
        const store = useStore();

        function logout(){
            store.dispatch('auth/logout');
        }

        return {logout}
    }
}
</script>

<style scoped>
.settings-menu ul li a i {
    margin-left: 8px;
}
.ms-lg-3 {
    margin-right: 1rem!important;
}
</style>
