<template>
    <!-- Page Content -->
    <div :class="['content', !user.email_verified_at ?'trust':'']">
        <loader v-if="loading" />
        <div class="container-fluid">
            <div class="row justify-content-center">

                <div class="error-trust alert-danger" v-if="!user.email_verified_at">
                    يجب عليك تاكيد البريد الالكتروني
                    لشراء الحزم .
                </div>

                <!-- sidebar -->
                <Sidebar />
                <!--   /sidebar -->
                <div class="col-xl-9 col-md-8">
                    <div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="dash-widget">
                                    <div class="dash-info">
                                        <div class="dash-widget-info">Projects Posted</div>
                                        <div class="dash-widget-count">
                                            {{nuMalePackages}}
                                        </div>
                                    </div>
                                    <div class="dash-widget-more">
                                        <a href="#" @click="openModel" class="d-flex">View Details <i class="fas fa-arrow-right ms-auto"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!-- The Modal -->
                            <div class="model_sale" @click.self="closeModel">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content text-center">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Sale Package</h4>
                                            <span class="modal-close"><a href="#" @click="closeModel" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times-circle"></i></a></span>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>Start</th>
                                                    <th>End</th>
                                                    <th>Price</th>
                                                    <th>Period</th>
                                                    <th>Number of Visitors</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for="(salePackage, index)  in salePackages.data">
                                                    <th>{{index + 1}}</th>
                                                    <th>{{salePackage.packages.name}}</th>
                                                    <th>{{dateFormate(salePackage.start)}}</th>
                                                    <th>{{dateFormate(salePackage.end)}}</th>
                                                    <th>{{salePackage.packages.price}}$</th>
                                                    <th>{{salePackage.packages.period}}</th>
                                                    <th>{{salePackage.packages.visiter_num}}</th>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <Pagination :data="salePackages" @pagination-change-page="getSalePackages">
                                            <template #prev-nav>
                                                <span>&lt; Previous</span>
                                            </template>
                                            <template #next-nav>
                                                <span>Next &gt;</span>
                                            </template>
                                        </Pagination>

                                    </div>
                                </div>
                            </div>
                            <!-- /The Modal -->



                            <div class="col-md-6 col-lg-4">
                                <div class="dash-widget">
                                    <div class="dash-info">
                                        <div class="dash-widget-info">Ongoing Projects</div>
                                        <div class="dash-widget-count">5</div>
                                    </div>
                                    <div class="dash-widget-more">
                                        <a href="ongoing-projects.html" class="d-flex">View Details <i class="fas fa-arrow-right ms-auto"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="dash-widget">
                                    <div class="dash-info">
                                        <div class="dash-widget-info">Completed Projects</div>
                                        <div class="dash-widget-count">25</div>
                                    </div>
                                    <div class="dash-widget-more">
                                        <a href="completed-projects.html" class="d-flex">View Details <i class="fas fa-arrow-right ms-auto"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Chart Content -->
                        <div class="row">
                            <div class="col-xl-8 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">Profile Views</h5>
                                            <div class="dropdown">
                                                <button class="btn btn-white btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Monthly
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-start">
                                                    <a href="javascript:void(0);" class="dropdown-item">Weekly</a>
                                                    <a href="javascript:void(0);" class="dropdown-item">Monthly</a>
                                                    <a href="javascript:void(0);" class="dropdown-item">Yearly</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="chartprofile"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">Static Analytics</h5>
                                            <div class="dropdown">
                                                <button class="btn btn-white btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Monthly
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-start">
                                                    <a href="javascript:void(0);" class="dropdown-item">Weekly</a>
                                                    <a href="javascript:void(0);" class="dropdown-item">Monthly</a>
                                                    <a href="javascript:void(0);" class="dropdown-item">Yearly</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div id="chartradial"></div>
                                        <ul class="static-list">
                                            <li><span><i class="fas fa-circle text-violet me-1"></i> Applied Jobs</span> <span class="sta-count">30</span></li>
                                            <li><span><i class="fas fa-circle text-pink me-1"></i> Active Proposals</span> <span class="sta-count">30</span></li>
                                            <li><span><i class="fas fa-circle text-yellow me-1"></i> Applied Proposals</span> <span class="sta-count">30</span></li>
                                            <li><span><i class="fas fa-circle text-blue me-1"></i> Bookmarked Projects</span> <span class="sta-count">30</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Chart Content -->

                        <!-- Past Earnings -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-table">
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col">
                                                <h4 class="card-title">Recently Posted Jobs</h4>
                                            </div>
                                            <div class="col-auto">
                                                <a href="manage-projects.html" class="btn-right btn btn-sm fund-btn">
                                                    View All
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive table-job">
                                            <table class="table table-hover table-center mb-0">
                                                <thead class="thead-pink">
                                                <tr>
                                                    <th>Details</th>
                                                    <th>Job Type</th>
                                                    <th>Budget</th>
                                                    <th>Created on</th>
                                                    <th>Proposals</th>
                                                    <th class="text-end">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <span class="detail-text">I want some customization and installation on wordpress</span>
                                                        <span class="d-block text-expiry">Expiring on : February 3, 2019</span>
                                                    </td>
                                                    <td>Full-Time</td>
                                                    <td><span class="table-budget">BUDGET</span> <span class="d-block text-danger">$600 - $1500</span></td>
                                                    <td>12 July, 2021</td>
                                                    <td>47</td>
                                                    <td class="text-end"><a href="view-project-detail.html" class="text-success">View</a></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="detail-text">I want some customization and installation on wordpress</span>
                                                        <span class="d-block text-expiry">Expiring on : February 3, 2019</span>
                                                    </td>
                                                    <td>Full-Time</td>
                                                    <td><span class="table-budget">BUDGET</span> <span class="d-block text-danger">$600 - $1500</span></td>
                                                    <td>12 July, 2021</td>
                                                    <td>47</td>
                                                    <td class="text-end"><a href="view-project-detail.html" class="text-success">View</a></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="detail-text">I want some customization and installation on wordpress</span>
                                                        <span class="d-block text-expiry">Expiring on : February 3, 2019</span>
                                                    </td>
                                                    <td>Full-Time</td>
                                                    <td><span class="table-budget">BUDGET</span> <span class="d-block text-danger">$600 - $1500</span></td>
                                                    <td>12 July, 2021</td>
                                                    <td>47</td>
                                                    <td class="text-end"><a href="view-project-detail.html" class="text-success">View</a></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <span class="detail-text">I want some customization and installation on wordpress</span>
                                                        <span class="d-block text-expiry">Expiring on : February 3, 2019</span>
                                                    </td>
                                                    <td>Full-Time</td>
                                                    <td><span class="table-budget">BUDGET</span> <span class="d-block text-danger">$600 - $1500</span></td>
                                                    <td>12 July, 2021</td>
                                                    <td>47</td>
                                                    <td class="text-end"><a href="view-project-detail.html" class="text-success">View</a></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Past Earnings -->

                        <div class="row">
                            <!-- Plan  Details-->
                            <div class="col-xl-6 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-header">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col">
                                                <h5 class="card-title">Membership Plan Details</h5>
                                            </div>
                                            <div class="col-auto">
                                                <a href="javascript:void(0);" class="btn-right btn btn-sm fund-btn">
                                                    View
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="plan-details">
                                                    <h4>The Ultima</h4>
                                                    <div class="yr-amt">Anually Price</div>
                                                    <h4>$1200</h4>
                                                    <div class="yr-duration">Duration: One Year</div>
                                                    <div class="expiry">Expiry: 24 JAN 2022</div>
                                                    <a href="membership-plans.html" class="btn btn-primary btn-plan">Change Plan</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="plan-feature">
                                                    <ul>
                                                        <li>12 Project Credits</li>
                                                        <li>10 Allowed Services</li>
                                                        <li>20 Days visibility</li>
                                                        <li>5 Featured Services</li>
                                                        <li>20 Days visibility</li>
                                                        <li>30 Days Package Expiry</li>
                                                        <li>Profile Featured</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Plan  Details -->

                            <!-- Notifications -->
                            <div class="col-xl-6 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-header">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col">
                                                <h5 class="card-title">Notifications</h5>
                                            </div>
                                            <div class="col-auto">
                                                <a href="freelancer-ongoing-projects.html" class="btn-right btn btn-sm fund-btn">
                                                    View All
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pro-body p-0">
                                        <div class="news-feature">
                                            <img class="avatar-sm rounded-circle" src="/web/img/img-02.jpg" alt="User Image">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. At diam sit erat et eros. </p>
                                        </div>
                                        <div class="news-feature">
                                            <img class="avatar-sm rounded-circle" src="/web/img/img-03.jpg" alt="User Image">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. At diam sit erat et eros. </p>
                                        </div>
                                        <div class="news-feature">
                                            <img class="avatar-sm rounded-circle" src="/web/img/img-04.jpg" alt="User Image">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. At diam sit erat et eros. </p>
                                        </div>
                                        <div class="news-feature">
                                            <img class="avatar-sm rounded-circle" src="/web/img/img-05.jpg" alt="User Image">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. At diam sit erat et eros. </p>
                                        </div>
                                        <div class="news-feature">
                                            <img class="avatar-sm rounded-circle" src="/web/img/img-01.png" alt="User Image">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. At diam sit erat et eros. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Notifications -->
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</template>

<script>

import Sidebar from "../../../components/web/sidebar.vue";
import {computed, inject, onMounted, ref,watch} from "vue";
import {useStore} from "vuex";
import webApi from "../../../api/webAxios";


export default {
    name: "dashboardAdvertise",
    components:{
        Sidebar
    },
    setup(){

        const emitter = inject('emitter');
        const store = useStore();
        let salePackages = ref([]);
        let nuMalePackages = ref(0);
        let loading = ref(false);
        const user = computed(() => store.getters['auth/user']);

        let getSalePackage =  () => {

            loading.value = true;

            webApi.get(`/v1/web/numPackage`)
                .then((res) => {
                    let l =res.data.data;
                    nuMalePackages.value = l.numPackage;
                })
                .catch((err) => {
                }).finally(() => {
                    loading.value = false;
                });
        }

        let getSalePackages =  (page = 1) => {

            loading.value = true;

            webApi.get(`/v1/web/salePackage?page=${page}`)
                .then((res) => {
                    let l =res.data.data;
                    salePackages.value = l.advertises;
                })
                .catch((err) => {
                }).finally(() => {
                    loading.value = false;
                });

        }

        let openModel = () => {
            document.querySelector('.model_sale').classList.add('open')
        }

        let closeModel = () => {
            document.querySelector('.model_sale').classList.remove('open')
        }

        onMounted(() => {
            getSalePackage();
            getSalePackages();
        });

        emitter.on('get_lang_web', () => {
            getSalePackage();
        });

        let dateFormate = (item) => new Date(item).toDateString();

        return {salePackages,user,nuMalePackages,loading,openModel,closeModel,dateFormate,getSalePackages};
    }
}
</script>

<style scoped>
.content {
    padding: 120px 0 30px;
    position: relative;
    min-height: 100vh;
}

.content.trust{
    padding: 150px 0 30px;
}

.error-trust{
    margin: 0 auto;
    position: absolute;
    top: 0;
    transform: translate(0%, 65%);
    padding: 10px;
    text-align: center;
    width: 43%;
}

.model_sale{
    display: none;
    background-color: #0a0a0a21;
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    z-index: 1050;
    width: 100%;
    height: 100%;
    border-radius: 10px;
    overflow: hidden;
    outline: 0;
}

.model_sale.open{
    display: block;
}

.modal-title ,.modal-close a i{
    color: #fcb00c
}

.modal-dialog{
    max-width: 700px;
    min-width: 300px;
}

.modal-content{
    padding: 6px 58px 20px;
    border: none;
    border-radius: 15px;
}
</style>
