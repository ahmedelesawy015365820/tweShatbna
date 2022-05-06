<template>
    <div class="col-xl-3 col-md-4 theiaStickySidebar">
        <loader v-if="loading" />
        <div class="settings-widget">
            <div v-if="user" class="settings-header imageUser d-sm-flex flex-row flex-wrap text-center text-sm-start align-items-center">
                <a  href="#" @click="image">
                    <img
                        alt="profile image"
                        :src="`/web/img/user/${user.id}/${user.image}`"
                        onerror="src='/web/img/img-04.jpg'"
                        id="imgSrc"
                        class="avatar-lg rounded-circle"
                    >
                    <form enctype="multipart/form-data">
                        <input type="file"  @change="changeImageProfile" id="inputImage">
                    </form>
                </a>
                <div class="ms-sm-3 ms-md-0 infoUser mt-2 mt-sm-0 mt-md-2 mt-lg-0">
                    <p class="mb-2">مرحبا بك,</p>
                    <h3 class="mb-0">
                        {{user.custom_name}}
                    </h3>
                    <p  class="mb-0 editProfile" v-if="partner.trust">
                        <router-link :to="{name:'profile',params:{lang:this.$i18n.locale}}">تعديل الحساب</router-link>
                    </p>
                </div>
            </div>
            <div class="settings-menu">
                <ul>

                    <!-- start design  -->

                    <div class="mb-4"  v-if="roles.includes('design')">

                        <li class="nav-item">
                            <router-link
                                :to="{name:'dashboardDesign',params:{lang:this.$i18n.locale}}"
                                :class="['nav-link',$route.name == 'dashboardDesign' ? 'active' : '']"
                            >
                                <i class="material-icons">verified_user</i> الرئيسيه
                            </router-link>
                        </li>
                        <li class="nav-item" v-if="!partner.send || !partner.trust">
                            <router-link
                                :to="{name:'trust',params:{lang:this.$i18n.locale}}"
                                :class="['nav-link',$route.name == 'trust' ? 'active' : '']"
                                v-if="!partner.send"
                            >
                                <i class="material-icons">person_pin</i> تاكيد الحساب
                            </router-link>

                            <a href="javascript:void(0);" @click="sendData"  class="nav-link" v-else>
                                <i class="material-icons">person_pin</i> تاكيد الحساب
                            </a>
                        </li>
                        <li class="nav-item" v-if="partner.trust">
                            <a href="manage-projects.html" class="nav-link">
                                <i class="material-icons">business_center</i> Projects
                            </a>
                        </li>
                        <li class="nav-item" v-if="partner.trust">
                            <a href="favourites.html" class="nav-link">
                                <i class="material-icons">local_play</i> Favourites
                            </a>
                        </li>
                        <li class="nav-item" v-if="partner.trust">
                            <a href="review.html" class="nav-link">
                                <i class="material-icons">record_voice_over</i> Reviews
                            </a>
                        </li>
                        <li class="nav-item" v-if="partner.trust">
                            <a href="chats.html" class="nav-link">
                                <i class="material-icons">chat</i> Messages
                            </a>
                        </li>
                        <li class="nav-item" v-if="partner.trust">
                            <a href="membership-plans.html" class="nav-link">
                                <i class="material-icons">person_add</i> Membership
                            </a>
                        </li>
                        <li class="nav-item" v-if="partner.trust">
                            <a href="milestones.html" class="nav-link">
                                <i class="material-icons">pie_chart</i> Milestones
                            </a>
                        </li>
                        <li class="nav-item" v-if="partner.trust">
                            <a href="deposit-funds.html" class="nav-link">
                                <i class="material-icons">wifi_tethering</i> Payments
                            </a>
                        </li>
                        <li class="nav-item" v-if="partner.trust">
                            <a href="profile-settings.html" class="nav-link">
                                <i class="material-icons">settings</i> Settings
                            </a>
                        </li>

                    </div>

                    <!--   end design  -->

                    <!--    start advertise    -->

                    <div class="mb-4" v-if="roles.includes('advertiser')">

                        <li class="nav-item">
                            <router-link
                                :to="{name:'dashboardAdvertise',params:{lang:this.$i18n.locale}}"
                                :class="['nav-link', $route.name != 'dashboardAdvertise'? 'main-adver': '']"
                            >
                                <i class="material-icons">verified_user</i> الرئيسيه
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link
                                :to="{name:'packages',params: {lang:this.$i18n.locale}}"
                                :class="['nav-link',$route.name == 'packages' ? 'active' : '']"
                            >
                                <i class="material-icons">person_add</i> Packages
                            </router-link>
                        </li>

                    </div>

                    <!--    end advertise    -->

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
import {ref, computed, onBeforeMount, onMounted} from 'vue';
import webApi from "../../api/webAxios";
import { useRoute } from 'vue-router'

export default {
    name: "Sidebar",
    setup(){
        const store = useStore();

        const partner = computed(() => store.getters['auth/partner']);
        const user = computed(() => store.getters['auth/user']);
        const route = useRoute();
        let roles = ref([]);

        let sendData = () => {
            Swal.fire({
                title: 'يتم الان مراجعه بيانات حسابك لتاكيد من صحتها!',
                icon: 'info',
                confirmButtonColor: '#fcb00c',
                confirmButtonText: 'موافق',
            });
        };

        onBeforeMount(() => {
            store.dispatch('auth/userUpdate');
            store.dispatch('auth/partnerUpdate');
        });

        onMounted(() => {
            roles.value = JSON.parse(localStorage.getItem('user')).role_name;
        });

        const file = ref({});
        const loading = ref(false);
        let image = () => {document.getElementById('inputImage').click()}
        let changeImageProfile = (e) => {

            loading.value = true;
            file.value = e.target.files[0];

            if(file.value){
                let formData = new FormData();
                formData.append('file',file.value);

                webApi.post(`/v1/web/changeImage`,formData)
                    .then((res) => {
                        let reader = new FileReader();

                        reader.onload = () => {
                            let img = document.getElementById('imgSrc');
                            img.setAttribute('src',reader.result);
                        }

                        reader.readAsDataURL(e.target.files[0]);

                        Swal.fire({
                            icon: 'success',
                            title: 'تم تغير الصوره بنجاح .',
                            showConfirmButton: false,
                            timer: 2000
                        })

                    })
                    .catch((err) => {
                        Swal.fire({
                            icon: 'error',
                            title: 'يوجد خطا في الصوره...',
                            text: 'اقصي ارتفاع للصوره يكون 500px و اقصي عرض 500px و ان حجمها لا يتعدي 2mb !',
                        });
                    })
                    .finally(() => {
                        loading.value = false;
                    });
            }

        }


        function logout(){
            store.dispatch('auth/logout');
        }

        return {logout,partner,user,sendData,image,changeImageProfile,file,loading,roles}
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
.imageUser{
    cursor: pointer;
    position: relative;
}
.imageUser input{
    position: absolute;
    opacity: 0;
    z-index: -1;
}
.imageUser a{
    display: inline-block;
    margin: auto;
}
.editProfile a{
    color: #fff;
}
.settings-header h3, .settings-header h3 a {
    font-size: 20px;
}
.infoUser{
    margin: 0 1rem!important;
    width: 100%;
}
.avatar-lg {
    width: 5rem;
    height: 5rem;
}

.settings-menu ul li a.main-adver {
    color: #000 !important;
    border: 0;
}

.settings-menu ul li a.main-adver:hover {
    color: #fcb00c !important;
    border: 0;
}

</style>
