<template>
<div>
    <!-- Page Content -->
    <div class="content">
        <loader v-if="loading" />
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile">
                        <div class="profile-box">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="profile-info">
                                        <h2 class="profile-title">{{ detail.name }}</h2>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex align-items-center justify-content-md-end justify-content-center">
                                        <a data-bs-toggle="modal" href="#file" class="btn bid-btn">{{$t("browse.add")}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="pro-view">

                        <!-- Senior Animator  -->
                        <div class="pro-post widget-box">
                            <h3 class="pro-title">{{$t("browse.description")}}</h3>
                            <div class="pro-content">
                                <p>
                                    {{detail.description}}
                                </p>
                            </div>
                        </div>
                        <!-- /Senior Animator  -->

                        <!-- Skills Required  -->
                        <div class="pro-post project-widget widget-box">
                            <h3 class="pro-title">{{$t("browse.skill")}}</h3>
                            <div class="pro-content">
                                <div class="tags">
                                    <a href="javascript:void(0);" v-for="unity in detail.unity">
                                        <span class="badge badge-pill badge-design">{{unity.name}}</span>
                                    </a>
                                    <a href="javascript:void(0);" v-for="architectural in detail.architectural">
                                        <span class="badge badge-pill badge-design">{{architectural.name}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /Skills Required  -->

                        <div class="pro-post widget-box">
                            <h3 class="pro-title">Project Proposals</h3>
                            <div class="proposal-cards">

                                <!-- project proposal  -->
                                <div class="bids-card">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2">
                                            <div class="author-img-wrap">
                                                <a href="#"><img class="img-fluid" alt="" src="/web/img/img-01.png"></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="author-detail">
                                                <h4><a href="#">George Wells</a></h4>
                                                <div class="rating">
                                                    <span class="average-rating">4.3</span>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <p class="mb-0">Look forward to hearing from you, I am a good designer and developer. I can handle your daily bases task with no extra effort. Please contact me as I am jobless nowadays.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="proposal-amnt text-end">
                                                <h3>$17.00</h3>
                                                <p class="mb-0">in 7 days</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /project proposal  -->

                                <!-- project proposal  -->
                                <div class="bids-card">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2">
                                            <div class="author-img-wrap">
                                                <a href="#"><img class="img-fluid" alt="" src="/web/img/img-02.jpg"></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="author-detail">
                                                <h4><a href="#">Tony Ingle</a></h4>
                                                <div class="rating">
                                                    <span class="average-rating">4.6</span>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown.</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="proposal-amnt text-end">
                                                <h3>$22.00</h3>
                                                <p class="mb-0">in 13 days</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /project proposal  -->

                                <!-- project proposal  -->
                                <div class="bids-card">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2">
                                            <div class="author-img-wrap">
                                                <a href="#"><img class="img-fluid" alt="" src="/web/img/img-03.jpg"></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="author-detail">
                                                <h4><a href="#">James Douglas</a></h4>
                                                <div class="rating">
                                                    <span class="average-rating">3.8</span>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <p class="mb-0">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="proposal-amnt text-end">
                                                <h3>$19.00</h3>
                                                <p class="mb-0">in 18 days</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /project proposal  -->

                            </div>
                            <div class="proposal-btns mt-3">
                                <a href="view-proposals.html" class="pro-btn">View all 18 Propsals</a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Blog Sidebar -->
                <div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">

                    <div class="freelance-widget widget-author mt-2 pro-post">
                        <div class="freelance-content">
                            <a data-bs-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                            <div class="author-heading">
                                <div class="profile-img">
                                    <a href="#">
                                        <img
                                            :src="user.imagePath"
                                            onerror="src='/web/img/company/img-1.png'"
                                            alt="author"
                                        >
                                    </a>
                                </div>
                                <div class="profile-name">
                                    <div class="author-location">
                                        {{user['name']}}
                                        <i class="fas fa-check-circle text-success verified"></i>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="text-sm  mb-0">
                                                Member Since
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="text-sm">{{ detail.customDate }}</span>
                                        </div>
                                    </div>
                                    <hr class="my-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="text-sm  mb-0">
                                                Total Jobs
                                            </h6>
                                        </div>
                                        <div class="col-auto">
                                            <span class="text-sm">127</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /Blog Sidebar -->

            </div>
        </div>
    </div>
    <!-- /Page Content -->
</div>
</template>

<script>
import {inject, ref, toRefs,onMounted} from "vue";
import webApi from "../../api/webAxios";

export default {
    name: "browse-details",
    props:['id'],
    setup(props){

        // get create Package
        const { id } = toRefs(props);
        const emitter = inject('emitter');
        let loading  = ref(false);
        let detail  = ref({});
        let user  = ref({});

        let getDetails = () => {
            loading.value = true;

            webApi.get(`/v1/web/showComDetail/${id.value}`)
                .then((res) => {
                    let l = res.data.data;
                    detail.value = l.detail;
                    user.value = l.detail.user;
                })
                .catch((err) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'يوجد خطا ...',
                        text: 'يوجد خطاء في النظام يرجي اعاده الماوله مره اخري  !',
                    });
                })
                .finally(() => {
                    loading.value = false;
                });
        };

        onMounted(() => {
            getDetails();
        });


        emitter.on('get_lang_web', () => {
            getDetails();
        });

        return {loading,detail,user};

    }
}
</script>

<style scoped>
.breadcrumb-bar {
    min-height: auto !important;
    padding-top: 100px !important;
}

.profile {
    box-shadow: 0 4px 14px rgb(0 0 0 / 15%) !important;
}

.profile-box {
    margin-top: 100px;
}

.bid-btn {
    background-color: #fcbd33;
}

.profile-title {
    font-size: 30px !important;
}
</style>
