<template>
    <!-- Page Content -->
    <div class="content">
        <loader v-if="loading"/>

        <div class="breadcrumb-bar">
            <div class="container">
                <div class="row align-items-center inner-banner">
                    <div class="col-md-12 col-12 text-center">
                        <h2 class="breadcrumb-title">{{ $t('header.advisor') }}</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <router-link :to="{name:'home',params: {lang:this.$i18n.locale}}">
                                        {{ $t('header.home') }}
                                    </router-link>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $t('header.advisor') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- About -->
        <section class="section about">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="about-content">
                            <h2>{{ $t('advisor.Advisor') }} <span class="orange-text">{{ $t('advisor.Shatbna') }}</span>
                            </h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est modi, saepe hic esse maxime
                                quasi, sapiente ex debitis quis dolorum unde, neque quibusdam eveniet nobis enim porro
                                repudiandae nesciunt quidem.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni delectus soluta adipisci
                                beatae ullam quisquam, quia recusandae rem assumenda, praesentium porro sequi eaque
                                doloremque tenetur incidunt officiis explicabo optio perferendis.</p>
                            <a href="project.html" class="btn learn-btn">LEARN MORE</a>
                        </div>
                    </div>
                    <div class=" col-lg-5">
                        <div class="about-img">
                            <img class="img-fluid" src="/web/img/about.png" alt="Post Image">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /About -->
        <section class="section advisor">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 mx-auto">
                        <div class="section-header text-center">
                            <div class="section-line"></div>
                            <h2 class="header-title">Get Inspired<br> By Development Projects</h2>
                            <p>High Performing Solutions To Your</p>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <div class="projects-delete-details align-items-center">
                            <div class="project-info">
                                <h2>Create website wordpress for a Brand </h2>
                                <span>Dreamguystech</span>

                            </div>
                            <div class="project-hire-info">
                                <div class="content-divider"></div>
                                <div class="projects-amount">
                                    <h3>$500.00</h3>
                                </div>
                                <div class="content-divider"></div>
                                <div class="projects-action text-center">
                                    <a href="#" class="projects-btn">Repost </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <div class="projects-delete-details align-items-center">
                            <div class="project-info">
                                <h2>Create website wordpress for a Brand </h2>
                                <span>Dreamguystech</span>

                            </div>
                            <div class="project-hire-info">
                                <div class="content-divider"></div>
                                <div class="projects-amount">
                                    <h3>$500.00</h3>
                                </div>
                                <div class="content-divider"></div>
                                <div class="projects-action text-center">
                                    <a href="#" class="projects-btn">Repost </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <div class="projects-delete-details align-items-center">
                            <div class="project-info">
                                <h2>Create website wordpress for a Brand </h2>
                                <span>Dreamguystech</span>

                            </div>
                            <div class="project-hire-info">
                                <div class="content-divider"></div>
                                <div class="projects-amount">
                                    <h3>$500.00</h3>
                                </div>
                                <div class="content-divider"></div>
                                <div class="projects-action text-center">
                                    <a href="#" class="projects-btn">Repost </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- /Page Content -->
</template>
<script>
import {toRefs, reactive, computed, onMounted} from 'vue';
import {useStore} from 'vuex';
import axios from "axios";

export default {
    setup() {
        const store = useStore();

        let errors = computed(() => store.getters['auth/errors']);
        let loading = computed(() => store.getters['auth/loading']);

        //start design
        let login = reactive({
            data: {
                email: '',
                password: '',
                remmeber_me: false
            },
            dataClient: {
                email: '',
                password: '',
                remmeber_me: false
            }
        });

        function Loginsubmit() {
            store.dispatch('auth/login', login.data);
        }

        function LoginClient() {
            store.dispatch('auth/loginClient', login.dataClient);
        }

        function authSocial($social) {
            axios.get(`http://shatbna.com/register/${$social}`)
                .then((res) => {
                    console.log(res)
                    let l = res.data.data;
                    store.commit('auth/editUser', l.user);
                    store.commit('auth/editComplement', l.complement);
                    store.commit('auth/editPartner', l.partner);
                    store.commit('editToken', l.access_token);

                    let locale = localStorage.getItem("langWeb");

                    if (l.user.role_name[0] == 'client') {
                        return router.push({name: 'dashboardClient', params: {lang: locale || 'ar'}});
                    }
                })
                .catch((err) => {
                    // commit('editErrors',err.response.data.errors);
                    console.log(err.response);
                })
        }

        onMounted(() => {
            store.commit('auth/editErrors', {});
        });

        return {Loginsubmit, ...toRefs(login), errors, loading, authSocial, LoginClient};

    },
}
</script>

<style scoped>
.content {
    padding: 0px !important;
}

.breadcrumb-bar {
    background: url("/web/img/inner-banner.jpg");
    padding-top: 0px !important;
}
.advisor{
    margin: 0px 40px 0px 40px;
}
.project-info span{
    font-size: 16px;
}


</style>
