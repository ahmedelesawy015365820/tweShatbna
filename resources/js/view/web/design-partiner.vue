<template>
    <div class="content">
        <loader v-if="loading" />
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Proposals list -->
                    <div class="proposals-section">

                        <div class="row">

                            <div class="col-md-6 col-lg-4">

                                <div class="freelance-widget widget-author">
                                    <div class="freelance-content">
                                        <a data-bs-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="/web/img/company/img-1.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Amaze Tech <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div>
                                                <i class="fas fa-star star-background"></i>
                                                <i class="fas fa-star star-background"></i>
                                                <i class="fas fa-star star-background"></i>
                                                <i class="fas fa-star star-background"></i>
                                                <i class="far fa-star star-background"></i>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex align-items-center justify-content-center">
                                                    <div class="rate-project d-flex align-items-center justify-content-center">
                                                        <div>
                                                            <span>%60</span>
                                                            <h5>اكمال المشاريع</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col d-flex align-items-center justify-content-center">
                                                    <div class="rate-project d-flex align-items-center justify-content-center">
                                                        <div>
                                                            <span>%60</span>
                                                            <h5>تسليم بالموعد</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">UI/UX Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted Just Now</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt me-1"></i>Georgia, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-hover">
                                        <a href="project-details.html" class="btn-cart" tabindex="-1">Bid Now</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">

                                <div class="freelance-widget widget-author">
                                    <div class="freelance-content">
                                        <a data-bs-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="/web/img/company/img-1.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Amaze Tech <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div>
                                                <i class="fas fa-star star-background"></i>
                                                <i class="fas fa-star star-background"></i>
                                                <i class="fas fa-star star-background"></i>
                                                <i class="fas fa-star star-background"></i>
                                                <i class="far fa-star star-background"></i>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex align-items-center justify-content-center">
                                                    <div class="rate-project d-flex align-items-center justify-content-center">
                                                        <div>
                                                            <span>%60</span>
                                                            <h5>اكمال المشاريع</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col d-flex align-items-center justify-content-center">
                                                    <div class="rate-project d-flex align-items-center justify-content-center">
                                                        <div>
                                                            <span>%60</span>
                                                            <h5>تسليم بالموعد</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">UI/UX Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted Just Now</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt me-1"></i>Georgia, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-hover">
                                        <a href="project-details.html" class="btn-cart" tabindex="-1">Bid Now</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">

                                <div class="freelance-widget widget-author">
                                    <div class="freelance-content">
                                        <a data-bs-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="/web/img/company/img-1.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Amaze Tech <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div>
                                                <i class="fas fa-star star-background"></i>
                                                <i class="fas fa-star star-background"></i>
                                                <i class="fas fa-star star-background"></i>
                                                <i class="fas fa-star star-background"></i>
                                                <i class="far fa-star star-background"></i>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex align-items-center justify-content-center">
                                                    <div class="rate-project d-flex align-items-center justify-content-center">
                                                        <div>
                                                            <span>%60</span>
                                                            <h5>اكمال المشاريع</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col d-flex align-items-center justify-content-center">
                                                    <div class="rate-project d-flex align-items-center justify-content-center">
                                                        <div>
                                                            <span>%60</span>
                                                            <h5>تسليم بالموعد</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">UI/UX Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted Just Now</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt me-1"></i>Georgia, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-hover">
                                        <a href="project-details.html" class="btn-cart" tabindex="-1">Bid Now</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">

                                <div class="freelance-widget widget-author">
                                    <div class="freelance-content">
                                        <a data-bs-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="/web/img/company/img-1.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Amaze Tech <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div>
                                                <i class="fas fa-star star-background"></i>
                                                <i class="fas fa-star star-background"></i>
                                                <i class="fas fa-star star-background"></i>
                                                <i class="fas fa-star star-background"></i>
                                                <i class="far fa-star star-background"></i>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex align-items-center justify-content-center">
                                                    <div class="rate-project d-flex align-items-center justify-content-center">
                                                        <div>
                                                            <span>%60</span>
                                                            <h5>اكمال المشاريع</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col d-flex align-items-center justify-content-center">
                                                    <div class="rate-project d-flex align-items-center justify-content-center">
                                                        <div>
                                                            <span>%60</span>
                                                            <h5>تسليم بالموعد</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">UI/UX Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted Just Now</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt me-1"></i>Georgia, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-hover">
                                        <a href="project-details.html" class="btn-cart" tabindex="-1">Bid Now</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">

                                <div class="freelance-widget widget-author">
                                    <div class="freelance-content">
                                        <a data-bs-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                                        <div class="author-heading">
                                            <div class="profile-img">
                                                <a href="#">
                                                    <img src="/web/img/company/img-1.png" alt="author">
                                                </a>
                                            </div>
                                            <div class="profile-name">
                                                <div class="author-location">Amaze Tech <i class="fas fa-check-circle text-success verified"></i></div>
                                            </div>
                                            <div>
                                                <i class="fas fa-star star-background"></i>
                                                <i class="fas fa-star star-background"></i>
                                                <i class="fas fa-star star-background"></i>
                                                <i class="fas fa-star star-background"></i>
                                                <i class="far fa-star star-background"></i>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex align-items-center justify-content-center">
                                                    <div class="rate-project d-flex align-items-center justify-content-center">
                                                        <div>
                                                            <span>%60</span>
                                                            <h5>اكمال المشاريع</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col d-flex align-items-center justify-content-center">
                                                    <div class="rate-project d-flex align-items-center justify-content-center">
                                                        <div>
                                                            <span>%60</span>
                                                            <h5>تسليم بالموعد</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="freelance-info">
                                                <h3><a href="#">UI/UX Developer</a></h3>
                                                <div class="freelance-location mb-1"><i class="fas fa-clock"></i> Posted Just Now</div>
                                                <div class="freelance-location"><i class="fas fa-map-marker-alt me-1"></i>Georgia, USA</div>
                                            </div>
                                            <div class="freelance-tags">
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">After Effects</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Illustrator</span></a>
                                                <a href="javascript:void(0);"><span class="badge badge-pill badge-design">HTML</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-hover">
                                        <a href="project-details.html" class="btn-cart" tabindex="-1">Bid Now</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- /Proposals list -->

                    <!-- pagination -->
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>
                    <!-- /pagination -->

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import webApi from "../../api/webAxios";
import {inject, onMounted, ref} from "vue";

export default {
    name: "company-partiner",
    setup(){

        const emitter = inject('emitter');
        let loading  = ref(false);

        let getCompany = () => {
            loading.value = true;

            webApi.get(`/v1/web/allComProject`)
                .then((res) => {
                    let l = res.data.data;

                })
                .catch((err) => {

                })
                .finally(() => {
                    loading.value = false;
                });
        };

        onMounted(() => {
            // getCompany();
        });

        emitter.on('get_lang_web', () => {
            getCompany();
        });

        return {};
    }
}
</script>
<style scoped>
.content{
    padding: 150px 0 30px;
}

.star-background{
    color: #fcb00c;
}

.rate-project{
    height: 100px;
    border: 4px solid #fcb00c;
    width: 100px;
    border-radius: 50%;
    margin: 8px 0;
}

.rate-project span{
    font-size: 16px;
    font-weight: 600;
}
</style>
