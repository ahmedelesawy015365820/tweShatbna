<template>
    <!-- Page Content -->
    <div :class="['content']">
        <loader2 v-if="loading2" />

        <div class="container-fluid">
            <div class="row justify-content-center">

                <!-- sidebar -->
                <Sidebar />
                <!-- /sidebar -->

                <div class="col-xl-9 col-md-8" >

                    <div class="dashboard-sec" >

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
    <!-- /Page Content -->
</template>

<script>
import {ref} from 'vue';

export default {
    name: "showProject",
    setup(){

        let loading2 = ref(false)

        return {loading2};
    }
}
</script>

<style scoped>

</style>
