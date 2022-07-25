<template>
    <div class="content">
        <loader v-if="loading" />
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- User Profile Details -->
                    <div class="profile">
                        <div class="profile-box">
                            <div class="provider-widget">
                                <div class="pro-info-left">
                                    <div class="provider-img">
                                        <img
                                            :src="profile.imagePath"
                                            onerror='src="/web/img/img-04.jpg"'
                                            alt="User"
                                        >
                                    </div>
                                    <div class="profile-info profile-edit-form">
                                        <h2 class="profile-title">{{ complement.nameCompany }}</h2>
                                        <div class="pro-text3">
                                            <ul class="profile-preword">
                                                <li>
                                                    <img :src="country.image_path" alt="" height="16">
                                                    {{ country.name }}
                                                </li>
                                                <li><div class="rating">
                                                    <span class="average-rating">4.6</span>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                </div></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-list">
                            <ul>
                                <li>
                                    <span class="cont bg-blue">22</span>
                                    <strong class="proj-title"> Completed Projects</strong>
                                </li>
                                <li>
                                    <span class="cont bg-red">5</span>
                                    <strong class="proj-title"> Ongoing Projects</strong>
                                </li>
                                <li>
                                    <span class="cont bg-violet">89%</span>
                                    <strong class="proj-title"> Recommended</strong>
                                </li>
                                <li>
                                    <span class="cont bg-pink">48</span>
                                    <strong class="proj-title"> Clients</strong>
                                </li>
                                <li>
                                    <span class="cont bg-navy">5</span>
                                    <strong class="proj-title"> Feedbacks</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /User Profile Details -->
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12">

                    <div class="pro-view">
                        <!-- Tab Heading -->
                        <nav class="provider-tabs mb-4">
                            <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#overview" data-bs-toggle="tab">
                                        <img class="img-fluid" alt="User Image" src="/web/img/icon/tab-icon-01.png">
                                        <p class="bg-red">نبذه عن الشركه</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#bids" data-bs-toggle="tab">
                                        <img class="img-fluid" alt="User Image" src="/web/img/icon/tab-icon-02.png">
                                        <p class="bg-blue">خدماتنا</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#portfolio" data-bs-toggle="tab">
                                        <img class="img-fluid" alt="User Image" src="/web/img/icon/tab-icon-07.png">
                                        <p class="bg-yellow">سابقه الاعمال</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#feedbacks" data-bs-toggle="tab">
                                        <img alt="User Image" height="28" src="/web/img/icon/tab-icon-06.png">
                                        <p class="bg-green">اراء العملاء</p>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- /Tab Heading -->

                        <!-- Tab Details -->
                        <div class="tab-content pt-0">

                            <!-- Overview Tab Content -->
                            <div role="tabpanel" id="overview" class="tab-pane fade show active">
                                <div class="pro-post widget-box">
                                    <div class="row">
                                        <div class="col-10">
                                            <h3 class="pro-title">عن الشركة</h3>
                                        </div>
                                    </div>
                                    <div class="pro-overview">
                                        <div class="pro-content">
                                            <div class="pro-text1">
                                                <h4 class="widget-title">الرؤيه :</h4>
                                                <p>{{detail.vision}}</p>

                                                <h4 class="widget-title">الرساله :</h4>
                                                <p>{{detail.message}}</p>

                                                <h4 class="widget-title">الاستراتيجيه :</h4>
                                                <p>{{detail.strategy}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /Overview Tab Content -->

                            <!-- Bids Tab Content -->
                            <div role="tabpanel" id="bids" class="tab-pane fade">
                                <div class="pro-post project-widget widget-box">
                                    <div class="pro-post project-widget widget-box">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h3 class="pro-title">خدمتنا</h3>
                                            </div>
                                        </div>
                                        <div class="pro-content">
                                            <div class="tags">
                                                <span
                                                    v-for="service in services"
                                                    class="badge badge-pill badge-skills"
                                                >
                                                    {{service.name}}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Portfolio Tab Content -->
                            <div role="tabpanel" id="portfolio" class="tab-pane fade">
                                <div class="pro-post project-widget widget-box">
                                    <h3 class="pro-title">سابقه الاعمال</h3>
                                    <div class="pro-content">
                                        <div class="row">
                                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                                <div class="project-widget">
                                                    <div class="pro-image">
                                                        <a href="project-details.html">
                                                            <img class="img-fluid" alt="User Image" src="/web/img/project-3.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="pro-detail">
                                                        <h3 class="pro-name">
                                                            <a href="project-details.html">Project name</a>
                                                        </h3>
                                                        <p class="pro-designation">Web design</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                                <div class="project-widget">
                                                    <div class="pro-image">
                                                        <a href="project-details.html">
                                                            <img class="img-fluid" alt="User Image" src="/web/img/project-3.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="pro-detail">
                                                        <h3 class="pro-name">
                                                            <a href="project-details.html">Project name</a>
                                                        </h3>
                                                        <p class="pro-designation">Web design</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                                <div class="project-widget">
                                                    <div class="pro-image">
                                                        <a href="project-details.html">
                                                            <img class="img-fluid" alt="User Image" src="/web/img/project-3.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="pro-detail">
                                                        <h3 class="pro-name">
                                                            <a href="project-details.html">Project name</a>
                                                        </h3>
                                                        <p class="pro-designation">Web design</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                                <div class="project-widget">
                                                    <div class="pro-image">
                                                        <a href="project-details.html">
                                                            <img class="img-fluid" alt="User Image" src="/web/img/project-3.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="pro-detail">
                                                        <h3 class="pro-name">
                                                            <a href="project-details.html">Project name</a>
                                                        </h3>
                                                        <p class="pro-designation">Web design</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                                <div class="project-widget">
                                                    <div class="pro-image">
                                                        <a href="project-details.html">
                                                            <img class="img-fluid" alt="User Image" src="/web/img/project-3.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="pro-detail">
                                                        <h3 class="pro-name">
                                                            <a href="project-details.html">Project name</a>
                                                        </h3>
                                                        <p class="pro-designation">Web design</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                                <div class="project-widget">
                                                    <div class="pro-image">
                                                        <a href="project-details.html">
                                                            <img class="img-fluid" alt="User Image" src="/web/img/project-3.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="pro-detail">
                                                        <h3 class="pro-name">
                                                            <a href="project-details.html">Project name</a>
                                                        </h3>
                                                        <p class="pro-designation">Web design</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                                <div class="project-widget">
                                                    <div class="pro-image">
                                                        <a href="project-details.html">
                                                            <img class="img-fluid" alt="User Image" src="/web/img/project-3.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="pro-detail">
                                                        <h3 class="pro-name">
                                                            <a href="project-details.html">Project name</a>
                                                        </h3>
                                                        <p class="pro-designation">Web design</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                                <div class="project-widget">
                                                    <div class="pro-image">
                                                        <a href="project-details.html">
                                                            <img class="img-fluid" alt="User Image" src="/web/img/project-3.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="pro-detail">
                                                        <h3 class="pro-name">
                                                            <a href="project-details.html">Project name</a>
                                                        </h3>
                                                        <p class="pro-designation">Web design</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                                <div class="project-widget">
                                                    <div class="pro-image">
                                                        <a href="project-details.html">
                                                            <img class="img-fluid" alt="User Image" src="/web/img/project-3.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="pro-detail">
                                                        <h3 class="pro-name">
                                                            <a href="project-details.html">Project name</a>
                                                        </h3>
                                                        <p class="pro-designation">Web design</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                                <div class="project-widget">
                                                    <div class="pro-image">
                                                        <a href="project-details.html">
                                                            <img class="img-fluid" alt="User Image" src="/web/img/project-3.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="pro-detail">
                                                        <h3 class="pro-name">
                                                            <a href="project-details.html">Project name</a>
                                                        </h3>
                                                        <p class="pro-designation">Web design</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                                <div class="project-widget">
                                                    <div class="pro-image">
                                                        <a href="project-details.html">
                                                            <img class="img-fluid" alt="User Image" src="/web/img/project-3.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="pro-detail">
                                                        <h3 class="pro-name">
                                                            <a href="project-details.html">Project name</a>
                                                        </h3>
                                                        <p class="pro-designation">Web design</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-4 col-xl-3">
                                                <div class="project-widget">
                                                    <div class="pro-image">
                                                        <a href="project-details.html">
                                                            <img class="img-fluid" alt="User Image" src="/web/img/project-3.jpg">
                                                        </a>
                                                    </div>
                                                    <div class="pro-detail">
                                                        <h3 class="pro-name">
                                                            <a href="project-details.html">Project name</a>
                                                        </h3>
                                                        <p class="pro-designation">Web design</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Portfolio Tab Content -->

                            <!-- Feedback Tab Content -->
                            <div role="tabpanel" id="feedbacks" class="tab-pane fade">
                                <div class="pro-post project-widget widget-box">
                                    <h3 class="pro-title mb-3">Feedbacks</h3>

                                    <div class="pro-post mt-4">
                                        <div class="about-author">
                                            <div class="about-author-img">
                                                <div class="author-img-wrap">
                                                    <a href="review.html"><img class="img-fluid" alt="" src="assets/img/img-01.png"></a>
                                                </div>
                                            </div>
                                            <div class="author-details">
                                                <a href="review.html" class="blog-author-name">Logo Designer</a>
                                                <h5>Techline  Oct 25, 2021 - Nov 18, 2021</h5>
                                                <p class="mb-0">I am a professional graphic designer. I have more than 10-years of experience in graphics design. If you are looking for any graphic related work, contact me, I'll glad to help you.</p>
                                            </div>
                                        </div>
                                        <div class="about-author">
                                            <div class="about-author-img">
                                                <div class="author-img-wrap">
                                                    <a href="review.html"><img class="img-fluid" alt="" src="assets/img/img-02.jpg"></a>
                                                </div>
                                            </div>
                                            <div class="author-details">
                                                <a href="review.html" class="blog-author-name">Logo Designer</a>
                                                <h5>Techline  Oct 12, 2021 - Nov 18, 2021</h5>
                                                <p class="mb-0">I am a professional graphic designer. I have more than 10-years of experience in graphics design. If you are looking for any graphic related work, contact me, I'll glad to help you.</p>
                                            </div>
                                        </div>
                                        <div class="about-author">
                                            <div class="about-author-img">
                                                <div class="author-img-wrap">
                                                    <a href="review.html"><img class="img-fluid" alt="" src="assets/img/img-03.jpg"></a>
                                                </div>
                                            </div>
                                            <div class="author-details">
                                                <a href="#" class="blog-author-name">Logo Designer</a>
                                                <h5>Techline  Oct 18, 2021 - Nov 22, 2021</h5>
                                            </div>

                                            <div class="form-group reply-group mt-5 mb-0">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Reply">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success sub-btn" type="submit">SEND</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Feedback Tab Content -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {inject, onMounted, ref, toRefs} from "vue";
import webApi from "../../api/webAxios";

export default {
    name: "design-profile",
    props: ['id'],
    setup(props){

        const {id} = toRefs(props) ;
        const emitter = inject('emitter');
        let profile = ref({});
        let complement = ref({});
        let country = ref({});
        let detail = ref({});
        let services =  ref([]);
        let loading  = ref(false);

        let getDesignProfile = () => {
            loading.value = true;

            webApi.get(`/v1/web/designProfile/${id.value}`)
                .then((res) => {
                    let l = res.data.data;
                    profile.value = l.profile;
                    complement.value = l.profile.complement;
                    country.value = l.profile.complement.country;
                    detail.value = l.profile.design_detail;
                    services.value = l.profile.design_service;

                    console.log(l);
                })
                .catch((err) => {
                    console.log(err.response);
                })
                .finally(() => {
                    loading.value = false;
                });
        };

        onMounted(() => {
            getDesignProfile();
        });

        emitter.on('get_lang_web', () => {
            getDesignProfile();
        });


        return {id,loading,profile,complement,country,detail,services}
    }
}
</script>

<style scoped>
.content {
    padding: 220px 0 50px;
}
.profile-preword li img {
    width: 20px;
}

.provider-tabs img {
    width: 30px
}

.profile-title {
    margin-top: 20px;
}

.provider-img{
    margin: 0 20px;
}

.provider-img img {
    max-width: 150px;
    max-height: 150px;
}

p {
    font-size: 17px;
}
</style>
