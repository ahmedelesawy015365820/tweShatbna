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
                            <a href="#card" class="btn learn-btn">LEARN MORE</a>
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
            <div class="container" id="card">
                <div class="row">
                    <div class="col-xl-9 col-md-8 mx-auto">
                        <div class="freelance-title" id="plan">
                            <h3>Employer Packages</h3>
                            <p> Choose the best pricing that suites your requirements</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="package-detail">
                                    <h4>Basic Plan</h4>
                                    <p>Go Pro, Best for the individuals</p>
                                    <h3 class="package-price">$19.00</h3>
                                    <div class="package-feature">
                                        <ul>
                                            <li>12 Project Credits</li>
                                            <li>10 Allowed Services</li>
                                            <li>20 Days visibility</li>
                                            <li>5 Featured Services</li>
                                            <li>20 Days visibility</li>
                                            <li>30 Days Package Expiry</li>
                                            <li class="non-check">Profile Featured</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="btn btn-primary price-btn btn-block">Select Plan</a>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="package-detail">
                                    <h4>Business </h4>
                                    <p>Highest selling package features</p>
                                    <h3 class="package-price">$29.00</h3>
                                    <div class="package-feature">
                                        <ul>
                                            <li>15 Project Credits</li>
                                            <li>12 Allowed Services</li>
                                            <li>25 Days visibility</li>
                                            <li>10 Featured Services</li>
                                            <li>30 Days visibility</li>
                                            <li>40 Days Package Expiry</li>
                                            <li>Profile Featured</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="btn btn-primary price-btn btn-block">Select Plan</a>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="package-detail">
                                    <h4>The Unlimita </h4>
                                    <p>Drive crazy, unlimited on the go</p>
                                    <h3 class="package-price">$79.00</h3>
                                    <div class="package-feature">
                                        <ul>
                                            <li>Unlimited Project Credits</li>
                                            <li>Unlimited Services</li>
                                            <li>Services Never Expire</li>
                                            <li>20 Featured Services</li>
                                            <li>Services Never Expire</li>
                                            <li>Package Never Expire</li>
                                            <li>Profile Featured</li>
                                        </ul>
                                    </div>
                                    <a href="#" class="btn btn-primary price-btn btn-block">Select Plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="select-project mb-4">
                    <form action="dashboard.html">
                        <div class="title-box widget-box">

                            <!-- Project Title -->
                            <div class="title-content">
                                <div class="title-detail">
                                    <h3>Project Name</h3>
                                    <div class="form-group mb-0">
                                        <input type="text" class="form-control" placeholder="Enter Project title">
                                    </div>
                                </div>
                            </div>
                            <!-- /Project Title -->

                            <div class="row">
                                <div class="col-md-12 text-end">
                                    <div class="btn-item">
                                        <button type="submit" class="btn next-btn">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Project Title -->

                    </form>
                </div>
            </div>
        </div>
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

.project-info span {
    font-size: 16px;
}


</style>
