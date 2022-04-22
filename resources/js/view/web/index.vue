<template>
    <div>
        <!-- Home Banner -->
        <section class="section home-banner row-middle">
            <div class="container">
                <div class="row align-items-center custom-row">
                    <div class="col-md-9 col-lg-8 custom-col">
                        <div class="banner-content">
                            <div class="rating d-flex">
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <i class="fas fa-star checked"></i>
                                <h5>{{$t('index.trused')}}</h5>
                            </div>
                            <h1>{{$t('index.best')}}</h1>
                            <p>{{$t('index.finishing')}}</p>
                            <form class="form" id="store">
                                <div class="form-inner">
                                    <div class="input-group">
											<span class="drop-detail">
                                                <span class="border-cutom-en" v-show="this.$i18n.locale != 'ar'"></span>
												<select class="form-control select" name="storeID">
													<option value="project.html">{{$t('index.company')}}</option>
												</select>
                                                <span class="border-cutom-ar" v-show="this.$i18n.locale == 'ar'"></span>
											</span>
                                        <input type="text" class="form-control" :placeholder="$t('index.search')">
                                        <button class="btn btn-primary sub-btn" type="submit">{{ $t('index.search-new') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Home Banner -->

        <!-- Our Feature -->
        <section class="section feature">
            <div class="container">
                <div class="row">

                    <!-- Feature Item -->
                    <div class="col-md-4">
                        <div class="feature-item freelance-count">
                            <div class="feature-icon">
                                <img src="web/img/icon/icon-01.png" class="img-fluid" alt="">
                            </div>
                            <div class="feature-content">
                                <h3>919,207</h3>
                                <p>freelance Developers</p>
                            </div>
                        </div>
                    </div>
                    <!-- /Feature Item -->

                    <!-- Feature Item -->
                    <div class="col-md-4">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <img src="web/img/icon/icon-02.png" class="img-fluid" alt="">
                            </div>
                            <div class="feature-content">
                                <h3>25 - 100+</h3>
                                <p>Developers  per project</p>
                            </div>
                        </div>
                    </div>
                    <!-- /Feature Item -->

                    <!-- Feature Item -->
                    <div class="col-md-4">
                        <div class="feature-item comp-project">
                            <div class="feature-icon">
                                <img src="web/img/icon/icon-03.png" class="img-fluid" alt="">
                            </div>
                            <div class="feature-content">
                                <h3>388,615</h3>
                                <p>completed projects</p>
                            </div>
                        </div>
                    </div>
                    <!-- /Feature Item -->

                </div>
            </div>
        </section>
        <!-- /Our Feature -->

        <!--- Developed Project  -->
        <section class="section work">
            <div class="container-fluid">
                <div class="row">

                    <!-- Feature Item -->
                    <div class="col-md-6 work-box bg1">
                        <div class="work-content">
                            <h2>{{$t('index.search-company')}}</h2>
                            <p>{{$t('index.parge-company')}}</p>
                            <div class="row justify-content-between">
                                <div class="col-4"></div>
                                <a href="#" class="col-2">
                                    <i :class="['fas',this.$i18n.locale != 'ar'?'fa-long-arrow-alt-right':'fa-long-arrow-alt-left','long-arrow']"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Feature Item -->

                    <div class="col-md-6 work-box bg2">
                        <div class="work-content">
                            <h2>{{$t('index.search-design')}}</h2>
                            <p>{{$t('index.parge-company')}}</p>
                            <div class="row justify-content-between">
                                <div class="col-4"></div>
                                <a href="#" class="col-2">
                                    <i :class="['fas',this.$i18n.locale != 'ar'?'fa-long-arrow-alt-right':'fa-long-arrow-alt-left','long-arrow']"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--- /Developed Project  -->

        <!-- Projects -->
        <section class="section projects">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-12 mx-auto">
                        <div class="section-header text-center">
                            <div class="section-line"></div>
                            <h2 class="header-title">Get Inspired<br> By Development Projects</h2>
                            <p>High Performing Solutions To Your</p>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <!--- Project Item  -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="project-item">
                            <div class="project-img">
                                <a href="project.html"><img src="web/img/project/project-01.jpg" alt="" class="img-fluid"></a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="project-content">
                                    <h4>45</h4>
                                    <h5>ANDROID APPS</h5>
                                </div>
                                <div class="pro-icon">
                                    <div class="project-icon">
                                    </div>
                                </div>
                                <div class="project-content">
                                    <h4>20</h4>
                                    <h5>Developers</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- /Project Item  -->

                    <!--- Project Item  -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="project-item">
                            <div class="project-img">
                                <a href="project.html"><img src="web/img/project/project-02.jpg" alt="" class="img-fluid"></a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="project-content">
                                    <h4>45</h4>
                                    <h5>LARAVEL</h5>
                                </div>
                                <div class="pro-icon">
                                    <div class="project-icon">
                                    </div>
                                </div>
                                <div class="project-content">
                                    <h4>20</h4>
                                    <h5>Developers</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- /Project Item  -->

                    <!--- Project-Item  -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="project-item">
                            <div class="project-img">
                                <a href="project.html"><img src="web/img/project/project-03.jpg" alt="" class="img-fluid"></a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="project-content">
                                    <h4>45</h4>
                                    <h5>React</h5>
                                </div>
                                <div class="pro-icon">
                                    <div class="project-icon">
                                    </div>
                                </div>
                                <div class="project-content">
                                    <h4>20</h4>
                                    <h5>Developers</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- /Project Item  -->

                    <!--- Project Item  -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="project-item">
                            <div class="project-img">
                                <a href="project.html"><img src="web/img/project/project-04.jpg" alt="" class="img-fluid"></a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="project-content">
                                    <h4>45</h4>
                                    <h5>GOLANG</h5>
                                </div>
                                <div class="pro-icon">
                                    <div class="project-icon">
                                    </div>
                                </div>
                                <div class="project-content">
                                    <h4>20</h4>
                                    <h5>Developers</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- /Project Item  -->

                    <!--- Project Item  -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="project-item">
                            <div class="project-img">
                                <a href="project.html"><img src="web/img/project/project-01.jpg" alt="" class="img-fluid"></a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="project-content">
                                    <h4>45</h4>
                                    <h5>.NET</h5>
                                </div>
                                <div class="pro-icon">
                                    <div class="project-icon">
                                    </div>
                                </div>
                                <div class="project-content">
                                    <h4>20</h4>
                                    <h5>Developers</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- /Project Item  -->

                    <!--- Project Item  -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="project-item">
                            <div class="project-img">
                                <a href="project.html"><img src="web/img/project/project-04.jpg" alt="" class="img-fluid"></a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="project-content">
                                    <h4>45</h4>
                                    <h5>JAVA</h5>
                                </div>
                                <div class="pro-icon">
                                    <div class="project-icon">
                                    </div>
                                </div>
                                <div class="project-content">
                                    <h4>20</h4>
                                    <h5>Developers</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- /Project Item  -->

                    <!--- Project Item  -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="project-item">
                            <div class="project-img">
                                <a href="project.html"><img src="web/img/project/project-03.jpg" alt="" class="img-fluid"></a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="project-content">
                                    <h4>45</h4>
                                    <h5>PYTHON</h5>
                                </div>
                                <div class="pro-icon">
                                    <div class="project-icon">
                                    </div>
                                </div>
                                <div class="project-content">
                                    <h4>20</h4>
                                    <h5>Developers</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- /Project Item  -->

                    <!--- Project-Item  -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="project-item">
                            <div class="project-img">
                                <a href="project.html"><img src="web/img/project/project-01.jpg" alt="" class="img-fluid"></a>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="project-content">
                                    <h4>45</h4>
                                    <h5>ANGULAR</h5>
                                </div>
                                <div class="pro-icon">
                                    <div class="project-icon">
                                    </div>
                                </div>
                                <div class="project-content">
                                    <h4>20</h4>
                                    <h5>Developers</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- /Project Item  -->

                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="see-all">
                            <a href="project.html" class="btn all-btn">SEE ALL PROJECT</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Projects -->

        <!-- Subscribe -->
        <section class="section subscribe">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-5 "><h1 class="text-center">مساحه اعلانيه</h1></div>
                </div>
            </div>
        </section>
        <!-- End Subscribe -->

        <!-- Top Instructor -->
        <section class="section developer">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-12 col-12 mx-auto">
                        <div class="section-header text-center">
                            <div class="section-line"></div>
                            <h2 class="header-title">Most Hired Developers</h2>
                            <p>Work with talented people at the most affordable price</p>
                        </div>
                    </div>
                </div>

                <div id="developers-slider" class="owl-carousel owl-theme developers-slider">
                    <div class="freelance-widget">
                        <div class="freelance-content">
                            <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                            <div class="freelance-img">
                                <a href="#">
                                    <img src="web/img/user/avatar-1.jpg" alt="User Image">
                                    <span class="verified"><i class="fas fa-check-circle"></i></span>
                                </a>
                            </div>
                            <div class="freelance-info">
                                <h3><a href="#">George Wells</a></h3>
                                <div class="freelance-specific">UI/UX Designer</div>
                                <div class="freelance-location"><i class="fas fa-map-marker-alt me-1"></i>Alabama, USA</div>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="average-rating">4.7 (32)</span>
                                </div>
                                <div class="freelance-tags">
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
                                </div>
                                <div class="freelancers-price">$25 Hourly</div>
                            </div>
                        </div>
                        <div class="cart-hover">
                            <a href="developer-details.html" class="btn-cart" tabindex="-1">View Profile</a>
                        </div>
                    </div>
                    <div class="freelance-widget">
                        <div class="freelance-content">
                            <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                            <div class="freelance-img">
                                <a href="#">
                                    <img src="web/img/user/avatar-2.jpg" alt="User Image">
                                    <span class="verified"><i class="fas fa-check-circle"></i></span>
                                </a>
                            </div>
                            <div class="freelance-info">
                                <h3><a href="#">Timothy Smith</a></h3>
                                <div class="freelance-specific">PHP Developer</div>
                                <div class="freelance-location"><i class="fas fa-map-marker-alt me-1"></i>Illinois, USA</div>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="average-rating">3.5 (25)</span>
                                </div>
                                <div class="freelance-tags">
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
                                </div>
                                <div class="freelancers-price">Free</div>
                            </div>
                        </div>
                        <div class="cart-hover">
                            <a href="developer-details.html" class="btn-cart" tabindex="-1">View Profile</a>
                        </div>
                    </div>
                    <div class="freelance-widget">
                        <div class="freelance-content">
                            <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                            <div class="freelance-img">
                                <a href="#">
                                    <img src="web/img/user/avatar-3.jpg" alt="User Image">
                                    <span class="verified"><i class="fas fa-check-circle"></i></span>
                                </a>
                            </div>
                            <div class="freelance-info">
                                <h3><a href="#">Janet Paden</a></h3>
                                <div class="freelance-specific">Graphic Designer</div>
                                <div class="freelance-location"><i class="fas fa-map-marker-alt me-1"></i>New York, USA</div>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="average-rating">4.1 (30)</span>
                                </div>
                                <div class="freelance-tags">
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
                                </div>
                                <div class="freelancers-price">$27 Hourly</div>
                            </div>
                        </div>
                        <div class="cart-hover">
                            <a href="developer-details.html" class="btn-cart" tabindex="-1">View Profile</a>
                        </div>
                    </div>
                    <div class="freelance-widget">
                        <div class="freelance-content">
                            <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                            <div class="freelance-img">
                                <a href="#">
                                    <img src="web/img/img-03.jpg" alt="User Image">
                                    <span class="verified"><i class="fas fa-check-circle"></i></span>
                                </a>
                            </div>
                            <div class="freelance-info">
                                <h3><a href="#">James Douglas</a></h3>
                                <div class="freelance-specific">iOS Developer</div>
                                <div class="freelance-location"><i class="fas fa-map-marker-alt me-1"></i>Florida, USA</div>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="average-rating">4.3 (31)</span>
                                </div>
                                <div class="freelance-tags">
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
                                </div>
                                <div class="freelancers-price">$23 Hourly</div>
                            </div>
                        </div>
                        <div class="cart-hover">
                            <a href="developer-details.html" class="btn-cart" tabindex="-1">View Profile</a>
                        </div>
                    </div>
                    <div class="freelance-widget">
                        <div class="freelance-content">
                            <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                            <div class="freelance-img">
                                <a href="#">
                                    <img src="web/img/img-03.jpg" alt="User Image">
                                    <span class="verified"><i class="fas fa-check-circle"></i></span>
                                </a>
                            </div>
                            <div class="freelance-info">
                                <h3><a href="#">Richard Wilson</a></h3>
                                <div class="freelance-specific">UI/UX Designer</div>
                                <div class="freelance-location"><i class="fas fa-map-marker-alt me-1"></i>Alabama, USA</div>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="average-rating">4.7 (32)</span>
                                </div>
                                <div class="freelance-tags">
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
                                </div>
                                <div class="freelancers-price">$25 Hourly</div>
                            </div>
                        </div>
                        <div class="cart-hover">
                            <a href="developer-details.html" class="btn-cart" tabindex="-1">View Profile</a>
                        </div>
                    </div>
                    <div class="freelance-widget">
                        <div class="freelance-content">
                            <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                            <div class="freelance-img">
                                <a href="#">
                                    <img src="web/img/img-03.jpg" alt="User Image">
                                    <span class="verified"><i class="fas fa-check-circle"></i></span>
                                </a>
                            </div>
                            <div class="freelance-info">
                                <h3><a href="#">Richard Wilson</a></h3>
                                <div class="freelance-specific">UI/UX Designer</div>
                                <div class="freelance-location"><i class="fas fa-map-marker-alt me-1"></i>Alabama, USA</div>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="average-rating">4.7 (32)</span>
                                </div>
                                <div class="freelance-tags">
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
                                </div>
                                <div class="freelancers-price">$25 Hourly</div>
                            </div>
                        </div>
                        <div class="cart-hover">
                            <a href="developer-details.html" class="btn-cart" tabindex="-1">View Profile</a>
                        </div>
                    </div>
                    <div class="freelance-widget">
                        <div class="freelance-content">
                            <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                            <div class="freelance-img">
                                <a href="#">
                                    <img src="web/img/img-03.jpg" alt="User Image">
                                    <span class="verified"><i class="fas fa-check-circle"></i></span>
                                </a>
                            </div>
                            <div class="freelance-info">
                                <h3><a href="#">Richard Wilson</a></h3>
                                <div class="freelance-specific">UI/UX Designer</div>
                                <div class="freelance-location"><i class="fas fa-map-marker-alt me-1"></i>Alabama, USA</div>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="average-rating">4.7 (32)</span>
                                </div>
                                <div class="freelance-tags">
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
                                </div>
                                <div class="freelancers-price">$25 Hourly</div>
                            </div>
                        </div>
                        <div class="cart-hover">
                            <a href="developer-details.html" class="btn-cart" tabindex="-1">View Profile</a>
                        </div>
                    </div>
                    <div class="freelance-widget">
                        <div class="freelance-content">
                            <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                            <div class="freelance-img">
                                <a href="#">
                                    <img src="web/img/img-03.jpg" alt="User Image">
                                    <span class="verified"><i class="fas fa-check-circle"></i></span>
                                </a>
                            </div>
                            <div class="freelance-info">
                                <h3><a href="#">Richard Wilson</a></h3>
                                <div class="freelance-specific">UI/UX Designer</div>
                                <div class="freelance-location"><i class="fas fa-map-marker-alt me-1"></i>Alabama, USA</div>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="average-rating">4.7 (32)</span>
                                </div>
                                <div class="freelance-tags">
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
                                </div>
                                <div class="freelancers-price">$25 Hourly</div>
                            </div>
                        </div>
                        <div class="cart-hover">
                            <a href="developer-details.html" class="btn-cart" tabindex="-1">View Profile</a>
                        </div>
                    </div>
                    <div class="freelance-widget">
                        <div class="freelance-content">
                            <a data-toggle="modal" href="#rating" class="favourite favourited"><i class="fas fa-star"></i></a>
                            <div class="freelance-img">
                                <a href="#">
                                    <img src="web/img/img-04.jpg" alt="User Image">
                                    <span class="verified"><i class="fas fa-check-circle"></i></span>
                                </a>
                            </div>
                            <div class="freelance-info">
                                <h3><a href="#">Richard Wilson</a></h3>
                                <div class="freelance-specific">UI/UX Designer</div>
                                <div class="freelance-location"><i class="fas fa-map-marker-alt me-1"></i>Alabama, USA</div>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="average-rating">4.8 (55)</span>
                                </div>
                                <div class="freelance-tags">
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
                                </div>
                                <div class="freelancers-price">$25 Hourly</div>
                            </div>
                        </div>
                        <div class="cart-hover">
                            <a href="developer-details.html" class="btn-cart" tabindex="-1">View Profile</a>
                        </div>
                    </div>
                    <div class="freelance-widget">
                        <div class="freelance-content">
                            <a data-toggle="modal" href="#rating" class="favourite"><i class="fas fa-star"></i></a>
                            <div class="freelance-img">
                                <a href="#">
                                    <img src="web/img/img-03.jpg" alt="User Image">
                                    <span class="verified"><i class="fas fa-check-circle"></i></span>
                                </a>
                            </div>
                            <div class="freelance-info">
                                <h3><a href="#">Richard Wilson</a></h3>
                                <div class="freelance-specific">UI/UX Designer</div>
                                <div class="freelance-location"><i class="fas fa-map-marker-alt me-1"></i>Alabama, USA</div>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="average-rating">5.0 (4)</span>
                                </div>
                                <div class="freelance-tags">
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Web Design</span></a>
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">UI Design</span></a>
                                    <a href="javascript:void(0);"><span class="badge badge-pill badge-design">Node Js</span></a>
                                </div>
                                <div class="freelancers-price">Free</div>
                            </div>
                        </div>
                        <div class="cart-hover">
                            <a href="developer-details.html" class="btn-cart" tabindex="-1">View Profile</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Developer -->

        <!-- Review -->
        <section class="section testimonial-section review">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-header text-center">
                            <div class="section-line"></div>
                            <h2 class="header-title">Top Reviews</h2>
                            <p>High Performing Developers To Your</p>
                        </div>
                    </div>
                </div>
                <div id="testimonial-slider"
                     class="owl-carousel owl-theme testimonial-slider"
                >

                    <!-- Review Widget -->
                    <div class="review-blog">
                        <div class="review-top d-flex align-items-center">
                            <div class="review-img">
                                <a href="review.html"><img class="img-fluid" src="/web/img/review/review-01.jpg" alt="Post Image"></a>
                            </div>
                            <div class="review-info">
                                <h3>Davis Payerf</h3>
                                <h5>CEO</h5>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="average-rating">4.7</span>
                                </div>
                            </div>
                        </div>
                        <div class="review-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean.</p>
                        </div>
                    </div>
                    <!-- / Review Widget -->

                    <!-- Review Widget -->
                    <div class="review-blog">
                        <div class="review-top d-flex align-items-center">
                            <div class="review-img">
                                <a href="review.html"><img class="img-fluid" src="/web/img/review/review-02.jpg" alt="Post Image"></a>
                            </div>
                            <div class="review-info">
                                <h3>Davis Payerf</h3>
                                <h5>PROJECT LEAD</h5>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="average-rating">4.8</span>
                                </div>
                            </div>
                        </div>
                        <div class="review-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean.</p>
                        </div>
                    </div>
                    <!-- /Review Widget -->

                    <!-- Review Widget -->
                    <div class="review-blog">
                        <div class="review-top d-flex align-items-center">
                            <div class="review-img">
                                <a href="review.html"><img class="img-fluid" src="/web/img/review/review-03.jpg" alt="Post Image"></a>
                            </div>
                            <div class="review-info">
                                <h3>Davis Payerf</h3>
                                <h5>TEAM LEAD</h5>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="average-rating">5.0</span>
                                </div>
                            </div>
                        </div>
                        <div class="review-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean.</p>
                        </div>
                    </div>
                    <!-- /Review Widget -->

                    <!-- Review Widget -->
                    <div class="review-blog">
                        <div class="review-top d-flex align-items-center">
                            <div class="review-img">
                                <a href="review.html"><img class="img-fluid" src="/web/img/review/review-02.jpg" alt="Post Image"></a>
                            </div>
                            <div class="review-info">
                                <h3>Davis Payerf</h3>
                                <h5>PROJECT LEAD</h5>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="average-rating">3.2</span>
                                </div>
                            </div>
                        </div>
                        <div class="review-content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Volutpat orci enim, mattis nibh aliquam dui, nibh faucibus aenean.</p>
                        </div>
                    </div>
                    <!-- /Review Widget -->
                </div>

            </div>
        </section>
        <!-- / Review -->

    </div>
</template>

<script>
import {onMounted,onBeforeMount,inject,ref} from 'vue';

export default {
    setup(){

        const emitter = inject('emitter');

        let carousel = () => {
            $('#developers-slider').removeClass('owl-hidden');
            $('#testimonial-slider').removeClass('owl-hidden');
            //start owl-carousel
            if($('#developers-slider').length > 0 ){
                $('#developers-slider').owlCarousel({
                    rtl: true,
                    items: 5,
                    margin: 30,
                    dots : false,
                    nav: true,
                    navText: [
                        '<i class="fas fa-chevron-left"></i>',
                        '<i class="fas fa-chevron-right"></i>'
                    ],
                    loop: true,
                    responsiveClass:true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        768 : {
                            items: 3
                        },
                        1170: {
                            items: 4
                        }
                    }
                });
            }

            if($('#testimonial-slider').length > 0 ){
                $('#testimonial-slider').owlCarousel({
                    rtl: true,
                    items: 5,
                    margin: 30,
                    dots : false,
                    nav: true,
                    navText: [
                        '<i class="fas fa-chevron-left"></i>',
                        '<i class="fas fa-chevron-right"></i>'
                    ],
                    loop: true,
                    responsiveClass:true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        768 : {
                            items: 3
                        },
                        1170: {
                            items: 3
                        }
                    }
                });
            }
            //end owl-carousel
        }

        onMounted(() => {
            carousel();
        });

        emitter.on('get_lang_web', () => {

        });

        return {};
    }
}
</script>

<style scoped>
section{
   overflow: hidden;
}

.home-banner {
    background-image: url(/web/img/Slider.jfif);
    height: 100vh !important;
    background-position: unset;
    padding-top: 0;
}

.custom-row{
    height: 100vh;
}

.custom-col{
    margin: 0 30px;
}

.banner-content .rating i{
    font-size: 22px;
}

.banner-content .rating h5{
    color: #fff;
    font-size: 22px;
    text-shadow: 2px 1px 9px #000;
}

.banner-content h1 {
    font-size: 35px;
    color: #fcb00c;
    margin-bottom: 10px;
    margin-top: 25px;
    text-shadow: 2px 1px 9px #000;
}

.banner-content p {
    color: #fff;
    text-shadow: 2px 1px 9px #000;
    font-size: 45px;
}

.form{
    width: 75%;
}

.form select{
    color: #7c7777;
    appearance: auto;
}
.drop-detail{
    position: relative;
}

input.form-control{
    padding: 0 30px;
}

.form-control::-webkit-input-placeholder, .form-control::placeholder{
    color: #7c777766 !important;
}

.border-cutom-ar{
    position: absolute;
    width: 1px;
    height: 60%;
    left: -12px;
    top: 16px;
    background-color: #7c7777;
    margin-right: 4px;
    z-index: 10
}

.border-cutom-en{
    position: absolute;
    width: 1px;
    height: 60%;
    right: -12px;
    top: 16px;
    background-color: #7c7777;
    margin-right: 4px;
    z-index: 10
}

/*.work-content h2:after{*/
/*    display: none;*/
/*}*/

.work-content h2 {
    font-size: 32px;
}

.work-content {
    width: 95%;
}

.work-content p {
    font-size: 22px;
}

.subscribe {
    padding: 125px 0;
}
.subscribe h1{
    color: #fff;
}

@media only screen and (max-width: 992px){
    .banner-content .rating, .banner-content .rating h5 {
        font-size: 17px;
    }
    .banner-content h1{
        font-size: 30px;
    }
    .banner-content p {
        font-size: 36px;
    }
    .work-content h2 {
        font-size: 20px;
    }
    .work-content p {
        font-size: 16px;
    }
}

@media only screen and (max-width: 768px) {
    .banner-content h1{
        margin-bottom: 20px;
    }
    .banner-content p {
        margin-bottom: 35px;
    }
    .work-content h2 {
        font-size: 24px;
    }
    .work-content p {
        font-size: 16px;
    }
}

@media only screen and (max-width: 600px) {
    .banner-content .rating i, .banner-content .rating h5 {
        font-size: 11px;
    }
    .banner-content h1 {
        font-size: 25px;
    }
    .banner-content p[data-v-0939d6eb] {
        font-size: 24px;
    }
}
</style>
