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
                        <router-link :to="{name:'advertiser',params: {lang:this.$i18n.locale}}" id="dashboard-advertise" active-class="active" exact class="nav-link">
                            <i class="material-icons">verified_user</i> Dashboard
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name:'packages',params: {lang:this.$i18n.locale}}" active-class="active" class="nav-link">
                            <i class="material-icons">person_add</i> Packages
                        </router-link>
                    </li>

                    <li class="nav-item">
                        <a href="favourites.html" class="nav-link">
                            <i class="material-icons">local_play</i> Favourites
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="review.html" class="nav-link">
                            <i class="material-icons">record_voice_over</i> Reviews
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="chats.html" class="nav-link">
                            <i class="material-icons">chat</i> Messages
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="membership-plans.html" class="nav-link">
                            <i class="material-icons">person_add</i> Membership
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="milestones.html" class="nav-link">
                            <i class="material-icons">pie_chart</i> Milestones
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="verify-identity.html" class="nav-link">
                            <i class="material-icons">person_pin</i> Verify Identity
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="deposit-funds.html" class="nav-link">
                            <i class="material-icons">wifi_tethering</i> Payments
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="profile-settings.html" class="nav-link">
                            <i class="material-icons">settings</i> Settings
                        </a>
                    </li>
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
import {ref, onMounted, inject} from 'vue';
import { useRoute } from 'vue-router'

export default {
    name: "advertiseSidebar",
    setup(){

        const store = useStore();
        const emitter = inject('emitter');

        function logout(){

            store.dispatch('auth/logout');
        }

        // onMounted(() => {
        // });

        // emitter.on('get_lang_web', () => {
        // });

        return {logout}
    },
}
</script>

<style scoped>

</style>
