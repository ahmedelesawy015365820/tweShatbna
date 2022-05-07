<template>
    <div class="page-wrapper">

        <!-- Main Header-->
        <header class="main-header">

            <!--Header-Upper-->
            <div class="header-upper">
                <div class="auto-container">
                    <div class="d-flex justify-content-between">

                        <div class="pull-left">
                            <div class="logo">
                                <router-link :to="{name:'home',params: {lang:this.$i18n.locale}}">
                                    <img src="/web/img/logo.png" alt="shatbna">
                                </router-link >
                            </div>
                        </div>
                        <div class="nav-outer clearfix">
                            <div class="outer-box">
                                <div class="d-flex">
                                    <router-link :to="{name:'registerPartiner',params: {lang:this.$i18n.locale}}"  class="theme-btn btn-style-one"><span class="txt">{{$t('partner.register')}}</span></router-link>
                                    <div :class="['lang', this.$i18n.locale == 'ar'? 'lang-ar':'']">
                                        <lang />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Upper-->

        </header>
        <!--End Main Header -->

        <!--Banner Section-->
        <section class="banner-section" id="home-banner">
            <div
                 :class="['patern-layer-one',this.$i18n.locale == 'ar' ? 'patern-layer-one-ar' : '']"
                 :style="{'background-image': this.$i18n.locale != 'ar' ? 'url(/web/img/partner/banner-bg.png)' : 'url(/web/img/partner/Reflect.png)'}"
            >
            </div>
            <div class="bg-layer"
                 style="background-image: url(/web/img/partner/2.jpg)"
            ></div>

            <div class="auto-container">
                <div class="row">

                    <!-- Content Column -->
                    <div class="content-column col-lg-7 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <h1>{{$t('partner.banner-h1')}}</h1>
                            <div class="text">{{$t('partner.banner-p1')}}</div>
                            <div class="newsletter-form">
                                <form>
                                    <div class="form-group">
                                        <input type="email" :class="[this.$i18n.locale == 'ar'?'email-ar':'']" name="email" value="" :placeholder="$t('partner.banner-email')" required>
                                        <button
                                                type="submit"
                                                :class="['theme-btn btn-style-two', this.$i18n.locale == 'ar'? 'btn-ar' : '']">
                                            <span class="txt">{{$t('partner.free')}}</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="address">{{$t('partner.dowoload')}}</div>
                            <!--Video Box-->
                            <div :class="['video-box',this.$i18n.locale == 'ar'?'video-box-ar':'']" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <figure class="video-image">
                                    <img src="/web/page/images/resource/video.jpg" alt="">
                                </figure>
                                <a href="https://www.youtube.com/watch?v=kxPCFljwJws" class="lightbox-image overlay-box"><span class="fa fa-play"><i class="ripple"></i></span></a>
                            </div>
                        </div>
                    </div>

                    <!-- Carousel Column -->
                    <div class="carousel-column col-lg-5 col-md-12 col-sm-12">
                        <div class="inner-column">

                            <div class="slider-outer">

                                <!-- Custom Pager -->
                                <div :class="['pager-box',this.$i18n.locale == 'ar'?'pager-box-ar':'']">
                                    <div :class="['inner-box',this.$i18n.locale == 'ar'?'inner-box-ar':'']">
                                        <div class="banner-pager clearfix" id="banner-pager">
                                            <a :class="['pager','one',this.$i18n.locale == 'ar'?'one-ar':'']" href="">
                                                <div class="image img-circle">1</div>
                                            </a>
                                            <a :class="['pager','two',this.$i18n.locale == 'ar'?'two-ar':'']" href="#">
                                                <div class="image img-circle">2</div>
                                            </a>
                                            <a :class="['pager' ,'three',this.$i18n.locale == 'ar'?'three-ar':'']" href="#">
                                                <div class="image img-circle">3</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- Column / Slides -->
                                <div class="slides-box" style="background-image: url(/web/img/partner/Category4.svg)">
                                    <div class="inner-box">

                                        <div class="banner-slider">

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--End Banner Section-->


        <!--Banner Section-->
        <section class="register" >
            <div class="auto-container">
                <div class="row justify-content-center">

                    <div class="col-lg-4 col-md-6">
                        <div class="register-container one">
                            <div class="row">
                                <div class="register-info text-center col-7">
                                    <h4>{{$t('partner.design')}}</h4>
                                    <p>{{$t('partner.design-p')}}</p>
                                    <router-link :to="{name:'registerPartiner',params: {lang:this.$i18n.locale},query:{p:'designer'}}" class="btn">
                                        {{$t('partner.start')}}
                                    </router-link>
                                </div>
                                <div class="register-img text-center col-5">
                                    <img src="/web/img/partner/Category3.svg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="register-container twe">
                            <div class="row">
                                <div class="register-info text-center col-7">
                                    <h4>{{$t('partner.company')}}</h4>
                                    <p>{{$t('partner.company-p')}}</p>
                                    <router-link :to="{name:'registerPartiner',params: {lang:this.$i18n.locale},query:{p:'company'}}" class="btn">
                                        {{$t('partner.start')}}
                                    </router-link>
                                </div>
                                <div class="register-img text-center col-5">
                                    <img src="/web/img/partner/Category2.svg">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="register-container three">
                            <div class="row">
                                <div class="register-info text-center col-7">
                                    <h4>{{$t('partner.advertise')}}</h4>
                                    <p>{{$t('partner.advertise-p')}}</p>
                                    <router-link :to="{name:'registerPartiner',params: {lang:this.$i18n.locale},query:{p:'advertiser'}}" class="btn">
                                        {{$t('partner.start')}}
                                    </router-link>
                                </div>
                                <div class="register-img text-center col-5">
                                    <img src="/web/img/partner/Category1.svg">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--End Banner Section-->

        <!-- Steps Section -->
        <section class="steps-section">
            <div class="patern-layer-one" style="background-image: url(/web/img/partner/pattern-2.png)"></div>
            <div class="patern-layer-two" style="background-image: url(/web/img/partner/pattern-3.png)"></div>
            <div class="patern-layer-three" style="background-image: url(/web/img/partner/pattern-4.png)" ></div>
            <div class="auto-container">

                <!-- Carousel Wrapper -->
                <div id="steps-thumb" class="carousel slide carousel-thumbnails" data-ride="carousel">
                    <div class="row clearfix">

                        <!-- Carousel Column -->
                        <div class="carousel-column col-lg-6 col-md-12 col-sm-12">
                            <!-- Slides -->
                            <div class="carousel-inner" role="listbox" style="background-image: url(/web/page/images/resource/mobile.png)">
                                <div class="slides">

                                    <div class="carousel-item active">
                                        <div class="content">
                                            <div class="image">
                                                <a href="#" data-fancybox="steps" data-caption="" class="image-link lightbox-image">
                                                    <img src="/web/img/partner/Category5.svg" alt="" />
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="blocks-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">

                                <!-- Sec Title -->
                                <div class="sec-title style-two">
                                    <div class="title"><span>St</span>eps</div>
                                    <h2>We have some <span> eas</span>y <span>ste</span>p<span>s</span>! </h2>
                                </div>

                                <!-- Controls-->
                                <ul class="carousel-indicators">

                                    <li data-target="#steps-thumb" data-slide-to="0" class="tab-btn active wow" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <span class="number">1</span>
                                        <span class="icon"><i class="flaticon-logout"></i></span>
                                        <strong>Download as a free trial!</strong>
                                        Lorem Ipsum is simply dummy text of the printing setting industry. Lorem Ipsum has been industry's dard dummy text ever since the 1500s.
                                    </li>

                                    <li data-target="#steps-thumb" data-slide-to="1" class="tab-btn wow" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <span class="number">2</span>
                                        <span class="icon"><i class="flaticon-credit-card"></i></span>
                                        <strong>Login your account</strong>
                                        Lorem Ipsum is simply dummy text of the printing setting industry. Lorem Ipsum has been industry's dard dummy text ever since the 1500s.
                                    </li>

                                    <li data-target="#steps-thumb" data-slide-to="2" class="tab-btn wow" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <span class="number">3</span>
                                        <span class="icon"><i class="flaticon-gift"></i></span>
                                        <strong>Enjoy the app!</strong>
                                        Lorem Ipsum is simply dummy text of the printing setting industry. Lorem Ipsum has been industry's dard dummy text ever since the 1500s.
                                    </li>

                                </ul>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- End Steps Section -->

        <!-- Featured Section -->
        <section class="featured-section" id="featured">
            <div class="auto-container">
                <div class="row clearfix">

                    <!-- Content Column -->
                    <div class="content-column col-lg-5 col-md-12 col-sm-12">
                        <div class="iner-column">
                            <div class="sec-title">
                                <div class="title"><span>Fe</span>atures</div>
                                <h2>Learn the features of new Beautiful <span>lifest</span>y<span>le</span> app!</h2>
                            </div>
                            <div class="text">
                                <p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's stan dard dummy text ever since the 1500s.</p>
                                <p>The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts.</p>
                            </div>
                            <ul class="list-style-one">
                                <li>Identfy the most trending sessions & exibitors.</li>
                                <li>24 hours customer supports facilites.</li>
                                <li>Take action to improve your event value.</li>
                            </ul>
                            <a href="contact.html" class="theme-btn btn-style-three"><span class="txt">Contact Us</span></a>
                        </div>
                    </div>

                    <!-- Blocks Column -->
                    <div class="blocks-column col-lg-7 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <!-- Cloud Icon -->
                            <div class="cloud-icon">
                                <img src="/web/page/images/icons/cloud-icon.png" alt="" />
                            </div>
                            <div class="row clearfix">

                                <!-- Featured Block -->
                                <div class="featured-block titlt col-lg-6 col-md-6 col-sm-12" data-tilt data-tilt-max="8">
                                    <div class="inner-box">
                                        <div class="icon-box">
                                            <span class="icon flaticon-writing"></span>
                                        </div>
                                        <h3>Easy to edit</h3>
                                        <div class="text">Save time and edit like a pro! Yes! you will be able to edit your application on the easy way.</div>
                                    </div>
                                </div>

                                <!-- Featured Block -->
                                <div class="featured-block titlt style-two col-lg-6 col-md-6 col-sm-12" data-tilt data-tilt-max="6">
                                    <div class="inner-box">
                                        <div class="icon-box">
                                            <span class="icon flaticon-protection-shield-with-a-check-mark"></span>
                                        </div>
                                        <h3>Full protection</h3>
                                        <div class="text">The app needs to be running in the background, as it tracks BLE regions. </div>
                                    </div>
                                </div>

                                <!-- Featured Block -->
                                <div class="featured-block titlt style-three col-lg-6 col-md-6 col-sm-12" data-tilt data-tilt-max="10">
                                    <div class="inner-box">
                                        <div class="icon-box">
                                            <span class="icon flaticon-dashboard"></span>
                                        </div>
                                        <h3>Hi speedy app</h3>
                                        <div class="text">Speedy App provides instant information on thousands of hire and buy products.</div>
                                    </div>
                                </div>

                                <!-- Featured Block -->
                                <div class="featured-block style-four col-lg-6 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="icon-box">
                                            <span class="icon flaticon-writing"></span>
                                        </div>
                                        <h3>Easy to edit</h3>
                                        <div class="text">Save time and edit like a pro! Yes! you will be able to edit your application on the easy way.</div>
                                    </div>
                                </div>

                            </div>
                            <!-- Side Image -->
                            <div class="side-image">
                                <img src="/web/page/images/resource/girl-icon.png" alt="" />
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End Featured Section -->

        <!-- Apps Section -->
        <section class="apps-section" id="how-works">
            <div class="auto-container">

                <div class="ct-dot-animated">
                    <div class="ct-dot-container">
                        <div class="ct-dot-item">
                            <span></span>
                        </div>
                        <div class="ct-dot-item">
                            <span></span>
                        </div>
                        <div class="ct-dot-item">
                            <span></span>
                        </div>
                        <div class="ct-dot-item">
                            <span></span>
                        </div>
                        <div class="ct-dot-item">
                            <span></span>
                        </div>
                        <div class="ct-dot-item">
                            <span></span>
                        </div>
                    </div>
                </div>

                <!-- App Block -->
                <div class="app-block">
                    <div class="inner-box">
                        <div class="row clearfix">

                            <!-- Image Column -->
                            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="image titlt" data-tilt data-tilt-max="8">
                                        <a href="/web/page/images/resource/app-1.png" class="app-1 lightbox-image"><img src="/web/page/images/resource/dash-board.png" alt="" /></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Content Column -->
                            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="icon-box">
                                        <span class="icon flaticon-settings"></span>
                                    </div>
                                    <h3>Easy to Manage Your All Data by This App!</h3>
                                    <div class="text">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry.</div>
                                    <a href="#" class="theme-btn btn-style-two"><span class="txt">Contact team</span></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End App Block -->

                <!-- App Block -->
                <div class="app-block style-two">
                    <div class="inner-box">
                        <div class="row clearfix">

                            <!-- Content Column -->
                            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="icon-box">
                                        <span class="icon flaticon-dashboard"></span>
                                    </div>
                                    <h3>Bug free responsive app with high performence speed!</h3>
                                    <div class="text">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry.</div>
                                    <a href="#" class="theme-btn btn-style-four"><span class="txt">Read more</span></a>
                                </div>
                            </div>

                            <!-- Image Column -->
                            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="image titlt" data-tilt data-tilt-max="8">
                                        <a href="/web/page/images/resource/app-2.png" class="app-2 lightbox-image"><img src="/web/page/images/resource/app-2.png" alt="" /></a>
                                    </div>
                                    <div class="small-image titlt wow slideInRight" data-wow-delay="300ms" data-wow-duration="1500ms" data-tilt data-tilt-max="15">
                                        <a href="/web/page/images/resource/app-3.png" class="app-2 lightbox-image"><img src="/web/page/images/resource/app-3.png" alt="" /></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End App Block -->

            </div>
        </section>
        <!-- End Apps Section -->

        <!-- Counter Section -->
        <section class="counter-section">
            <div class="patern-layer-one" style="background-image: url(/web/page/images/background/pattern-5.png)"></div>
            <div class="patern-layer-two" style="background-image: url(/web/page/images/background/pattern-6.png)"></div>
            <div class="patern-layer-three" style="background-image: url(web/page/images/background/pattern-7.png)"></div>
            <div class="patern-layer-four" style="background-image: url(web/page/images/background/pattern-8.png)"></div>
            <!-- Flower Image -->
            <div class="flower-image">
                <!-- Image One -->
                <div class="image paroller" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60" data-paroller-type="foreground" data-paroller-direction="horizontal" style="background-image:url(/web/page/images/resource/flower.png)"></div>
            </div>
            <div class="auto-container">
                <div class="row clearfix">

                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title style-three">
                                <div class="title"><span>Fu</span>nfacts</div>
                                <h2>We have a g<span>reat funfact</span> which <br> we want to show you!</h2>
                            </div>
                            <div class="text">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's stan dard dummy text ever since the 1500s.</div>
                            <div class="download">Download a trial version to make life easy!</div>
                            <div class="google-btns">
                                <a href="#"><img src="/web/page/images/icons/google.png" alt="" /></a>
                                <a href="#"><img src="/web/page/images/icons/app.png" alt="" /></a>
                            </div>
                        </div>
                    </div>

                    <!-- Counter Column -->
                    <div class="counter-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">

                            <!-- Fact Counter -->
                            <div class="fact-counter">
                                <div class="row clearfix">

                                    <!--Column-->
                                    <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                        <div class="inner wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                            <div class="content">
                                                <div class="icon-box">
                                                    <span class="icon flaticon-user"></span>
                                                </div>
                                                <div class="count-outer count-box">
                                                    <span class="count-text" data-speed="2500" data-stop="1200">0</span>+
                                                </div>
                                                <h5 class="counter-title">Satisfied Clients</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Column-->
                                    <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                        <div class="inner wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                                            <div class="content">
                                                <div class="icon-box">
                                                    <span class="icon flaticon-cube"></span>
                                                </div>
                                                <div class="count-outer count-box alternate">
                                                    <span class="count-text" data-speed="3000" data-stop="850">0</span>+
                                                </div>
                                                <h5 class="counter-title">Agents Team</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Column-->
                                    <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                        <div class="inner wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                                            <div class="content">
                                                <div class="icon-box">
                                                    <span class="icon flaticon-followers"></span>
                                                </div>
                                                <div class="count-outer count-box">
                                                    <span class="count-text" data-speed="3000" data-stop="154">0</span>+
                                                </div>
                                                <h5 class="counter-title">Success Mission</h5>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Column-->
                                    <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                        <div class="inner wow fadeInUp" data-wow-delay="900ms" data-wow-duration="1500ms">
                                            <div class="content">
                                                <div class="icon-box">
                                                    <span class="icon flaticon-heart"></span>
                                                </div>
                                                <div class="count-outer count-box">
                                                    <span class="count-text" data-speed="2500" data-stop="1360">0</span>+
                                                </div>
                                                <h5 class="counter-title">Awards</h5>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End Counter Section -->

        <!-- Screenshots Section -->
        <section class="screenshots-section">
            <div class="auto-container">
                <div class="sec-title centered style-two">
                    <div class="title"><span>Ap</span>p Screenshots</div>
                    <h2>App screenshots will be <span>im</span>p<span>ortant</span> <br> to know properly the app! lifestyle app!</h2>
                </div>

                <div class="row appScreenshotCarousel-container swiper-container">
                    <div class="screen-mobile-image"></div>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="background-image:url(/web/page/images/resource/slider-01.jpg)"></div> <!-- style="background-image:url(web/page/images/resource/slider-01.jpg)" -->
                        <div class="swiper-slide" style="background-image:url(/web/page/images/resource/slider-02.png)"></div> <!-- style="background-image:url(web/page/images/resource/slider-02.png)" -->
                        <div class="swiper-slide" style="background-image:url(/web/page/images/resource/slider-03.png)"></div> <!-- style="background-image:url(web/page/images/resource/slider-03.png)" -->
                        <div class="swiper-slide" style="background-image:url(/web/page/images/resource/slider-04.png)"></div> <!-- style="background-image:url(web/page/images/resource/slider-04.png)" -->
                        <div class="swiper-slide" style="background-image:url(/web/page/images/resource/slider-05.png)"></div> <!--  -->
                        <div class="swiper-slide" style="background-image:url(/web/page/images/resource/slider-02.png)" ></div> <!-- -->
                        <div class="swiper-slide" style="background-image:url(web/page/images/resource/slider-01.jpg)"></div> <!-- style="background-image:url(web/page/images/resource/slider-01.jpg)" -->
                        <div class="swiper-slide" style="background-image:url(web/page/images/resource/slider-02.png)"></div> <!-- style="background-image:url(web/page/images/resource/slider-02.png)" -->
                        <div class="swiper-slide" style="background-image:url(web/page/images/resource/slider-03.png)"></div> <!-- style="background-image:url(web/page/images/resource/slider-03.png)" -->
                        <div class="swiper-slide" style="background-image:url(web/page/images/resource/slider-04.png)" ></div>
                        <div class="swiper-slide" style="background-image:url(web/page/images/resource/slider-05.png)"></div>
                    </div>
                    <!-- Add Arrows -->
                </div>
                <!-- Navigations -->
                <div class="banner-navigation">
                    <div class="swiper-button-prev"><span class="icons-left-arrow-1"></span></div>
                    <div class="swiper-button-next"><span class="icons-right-arrow-1"></span></div>
                </div>
            </div>
        </section>
        <!-- End Screenshots Section -->

        <!-- Integration Section -->
        <section class="integration-section">
            <div class="patern-layer-one" style="background-image: url(web/page/images/background/pattern-5.png)"></div>
            <div class="patern-layer-two" style="background-image: url(web/page/images/background/pattern-6.png)"></div>
            <div class="patern-layer-three" style="background-image: url(web/page/images/background/pattern-10.png)"></div>
            <div class="patern-layer-four" style="background-image: url(web/page/images/background/pattern-10.png)"></div>
            <div class="auto-container">
                <div class="sec-title centered">
                    <div class="title"><span>In</span>tegrations</div>
                    <h2>We use some plugins to do premium <br> quality <span>inte</span>g<span>rations</span></h2>
                </div>
            </div>

            <!-- Outer Container -->
            <div class="outer-container">

                <div class="bubbles-wrapper">
                    <div class="animations m-0">
                        <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-md">
                            <img src="/web/page/images/resource/Integrations-1.jpg" alt="" class="img-responsive">
                            <span class="badge badge-contrast shadow-box">HTML-5</span>
                        </div>
                        <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-xxl">
                            <img src="/web/page/images/resource/Integrations-2.jpg" alt="" class="img-responsive">
                            <span class="badge badge-contrast shadow-box">Envato</span>
                        </div>
                        <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-lg">
                            <img src="/web/page/images/resource/Integrations-3.jpg" alt="" class="img-responsive">
                            <span class="badge badge-contrast shadow-box">Elementor</span>
                        </div>
                        <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-xl">
                            <img src="/web/page/images/resource/Integrations-4.jpg" alt="" class="img-responsive">
                            <span class="badge badge-contrast shadow-box">Fingerprint</span>
                        </div>
                        <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-md">
                            <img src="/web/page/images/resource/Integrations-5.jpg" alt="" class="img-responsive">
                            <span class="badge badge-contrast shadow-box">Amplify</span>
                        </div>
                        <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-lg">
                            <img src="/web/page/images/resource/Integrations-6.jpg" alt="" class="img-responsive">
                            <span class="badge badge-contrast shadow-box">Firebase Integration</span>
                        </div>
                        <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-md">
                            <img src="/web/page/images/resource/Integrations-7.jpg" alt="" class="img-responsive">
                            <span class="badge badge-contrast shadow-box">Google-Plus</span>
                        </div>
                        <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-xl">
                            <img src="/web/page/images/resource/Integrations-8.jpg" alt="" class="img-responsive">
                            <span class="badge badge-contrast shadow-box">Jio Tv</span>
                        </div>
                        <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-lg">
                            <img src="/web/page/images/resource/Integrations-9.jpg" alt="" class="img-responsive">
                            <span class="badge badge-contrast shadow-box">Paypal</span>
                        </div>
                        <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-xxl">
                            <img src="/web/page/images/resource/Integrations-10.jpg" alt="" class="img-responsive">
                            <span class="badge badge-contrast shadow-box">Stripe</span>
                        </div>
                        <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-md">
                            <img src="/web/page/images/resource/Integrations-11.jpg" alt="" class="img-responsive">
                            <span class="badge badge-contrast shadow-box">Goola Map</span>
                        </div>
                        <div class="bubble bg-contrast rounded-circle p-2 shadow icon icon-xl">
                            <img src="/web/page/images/resource/Integrations-12.jpg" alt="" class="img-responsive">
                            <span class="badge badge-contrast shadow-box">Microsoft</span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="btn-box text-center">
                <a href="#" class="theme-btn btn-style-five"><span class="txt">All Integretions</span></a>
            </div>

        </section>
        <!-- End Integration Section -->

        <!-- Team Section -->
        <section class="team-section">
            <div class="auto-container">

                <!-- Ct Dot Animated -->
                <div class="ct-dot-animated">
                    <div class="ct-dot-container">
                        <div class="ct-dot-item">
                            <span></span>
                        </div>
                        <div class="ct-dot-item">
                            <span></span>
                        </div>
                        <div class="ct-dot-item">
                            <span></span>
                        </div>
                        <div class="ct-dot-item">
                            <span></span>
                        </div>
                        <div class="ct-dot-item">
                            <span></span>
                        </div>
                        <div class="ct-dot-item">
                            <span></span>
                        </div>
                    </div>
                </div>

                <div class="sec-title centered">
                    <div class="title"><span>Te</span>am member</div>
                    <h2>Really we have <span>an ex</span>p<span>ert</span> team <br> to develop many apps!</h2>
                </div>

                <div class="team-carousel owl-carousel owl-theme">

                    <!-- Team Block -->
                    <div class="team-block">
                        <div class="inner-box">
                            <div class="image-outer">
                                <div class="image">
                                    <a href="#"><img src="/web/page/images/resource/team-1.png" alt="" /></a>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3>Romeo Poro</h3>
                                <div class="designation">Android Developer</div>
                                <div class="social-boxed">
                                    <div class="social-inner">
                                        <span class="share-now fa fa-share-alt"></span>
                                        <a href="#"><span class="fa fa-facebook"></span></a>
                                        <a href="#"><span class="fa fa-twitter"></span></a>
                                        <a href="#"><span class="fa fa-dribbble"></span></a>
                                        <a href="#"><span class="fa fa-behance"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team Block -->
                    <div class="team-block style-two">
                        <div class="inner-box">
                            <div class="image-outer">
                                <div class="image">
                                    <a href="#"><img src="/web/page/images/resource/team-2.png" alt="" /></a>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3>David Roger</h3>
                                <div class="designation">iOS Developer</div>
                                <div class="social-boxed">
                                    <div class="social-inner">
                                        <span class="share-now fa fa-share-alt"></span>
                                        <a href="#"><span class="fa fa-facebook"></span></a>
                                        <a href="#"><span class="fa fa-twitter"></span></a>
                                        <a href="#"><span class="fa fa-dribbble"></span></a>
                                        <a href="#"><span class="fa fa-behance"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team Block -->
                    <div class="team-block style-three">
                        <div class="inner-box">
                            <div class="image-outer">
                                <div class="image">
                                    <a href="#"><img src="/web/page/images/resource/team-3.png" alt="" /></a>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3>Jasmin Duke</h3>
                                <div class="designation">App Designer</div>
                                <div class="social-boxed">
                                    <div class="social-inner">
                                        <span class="share-now fa fa-share-alt"></span>
                                        <a href="#"><span class="fa fa-facebook"></span></a>
                                        <a href="#"><span class="fa fa-twitter"></span></a>
                                        <a href="#"><span class="fa fa-dribbble"></span></a>
                                        <a href="#"><span class="fa fa-behance"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team Block -->
                    <div class="team-block">
                        <div class="inner-box">
                            <div class="image-outer">
                                <div class="image">
                                    <a href="#"><img src="/web/page/images/resource/team-1.png" alt="" /></a>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3>Romeo Poro</h3>
                                <div class="designation">Android Developer</div>
                                <div class="social-boxed">
                                    <div class="social-inner">
                                        <span class="share-now fa fa-share-alt"></span>
                                        <a href="#"><span class="fa fa-facebook"></span></a>
                                        <a href="#"><span class="fa fa-twitter"></span></a>
                                        <a href="#"><span class="fa fa-dribbble"></span></a>
                                        <a href="#"><span class="fa fa-behance"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team Block -->
                    <div class="team-block style-two">
                        <div class="inner-box">
                            <div class="image-outer">
                                <div class="image">
                                    <a href="#"><img src="web/page/images/resource/team-2.png" alt="" /></a>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3>David Roger</h3>
                                <div class="designation">iOS Developer</div>
                                <div class="social-boxed">
                                    <div class="social-inner">
                                        <span class="share-now fa fa-share-alt"></span>
                                        <a href="#"><span class="fa fa-facebook"></span></a>
                                        <a href="#"><span class="fa fa-twitter"></span></a>
                                        <a href="#"><span class="fa fa-dribbble"></span></a>
                                        <a href="#"><span class="fa fa-behance"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Team Block -->
                    <div class="team-block style-three">
                        <div class="inner-box">
                            <div class="image-outer">
                                <div class="image">
                                    <a href="#"><img src="web/page/images/resource/team-3.png" alt="" /></a>
                                </div>
                            </div>
                            <div class="lower-content">
                                <h3>Jasmin Duke</h3>
                                <div class="designation">App Designer</div>
                                <div class="social-boxed">
                                    <div class="social-inner">
                                        <span class="share-now fa fa-share-alt"></span>
                                        <a href="#"><span class="fa fa-facebook"></span></a>
                                        <a href="#"><span class="fa fa-twitter"></span></a>
                                        <a href="#"><span class="fa fa-dribbble"></span></a>
                                        <a href="#"><span class="fa fa-behance"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Team Section -->

        <!-- Contact Section -->
        <section class="contact-section" id="contact">
            <div class="auto-container">
                <div class="row clearfix">

                    <!-- Info Column -->
                    <div class="info-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div
                                  class="patern-layer-one"
                                 :style="{'background-image': this.$i18n.locale != 'ar'?'url(/web/page/images/background/pattern-12.png)' : 'url(/web/page/images/background/pattern-20.png)'}">
                            </div>
                            <div class="patern-layer-two" :style="{'background-image': this.$i18n.locale != 'ar'?'url(/web/page/images/background/pattern-13.png)':'url(/web/page/images/background/pattern-21.png)'}"></div>
                            <div class="patern-layer-three paroller" :style="{'background-image': this.$i18n.locale != 'ar'?'url(/web/page/images/background/pattern-14.png)':'url(/web/page/images/background/pattern-22.png)'}" data-paroller-factor="-0.10" data-paroller-factor-lg="0.08" data-paroller-type="foreground" data-paroller-direction="horizontal" ></div>
                            <ul :class="['info-list',this.$i18n.locale == 'ar'?'info-list-ar':'']">
                                <li>
                                    <span :class="['icon','flaticon-address',this.$i18n.locale == 'ar'?'icon-ar':'']"></span>
                                    <strong>{{$t('partner.contact-h')}}</strong>
                                    {{$t('partner.address')}}
                                </li>
                                <li>
                                    <span :class="['icon','flaticon-telephone',this.$i18n.locale == 'ar'?'icon-ar':'']"></span>
                                    <strong>{{$t('partner.call')}}</strong>
                                    <a href="tel:469-537-2410">469-537-2410</a><br>
                                    <a href="tel:469-537-2410">469-537-2410</a>
                                </li>
                                <li>
                                    <span :class="['icon','flaticon-invite',this.$i18n.locale == 'ar'?'icon-ar':'']"></span>
                                    <strong>{{$t('partner.mail')}}</strong>
                                    <a class="mailto:noreply@envato.com" href="#">noreply@envato.com</a><br>
                                    <a class="mailto:noreply@envato.com" href="#">noreply@topapp.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Form Column -->
                    <div class="form-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title style-three">
                                <div :class="['title',this.$i18n.locale == 'ar'?'title-ar':'']"><span>{{$t('partner.co')}}</span>{{$t('partner.ntact')}}</div>
                                <h2>{{$t('partner.from-h')}} <br> {{$t('partner.during')}}
                                    <span>{{$t('partner.emer')}}</span>{{$t('partner.g')}}<span>{{$t('partner.enc')}}</span>{{$t('partner.y')}}
                                </h2>
                            </div>

                            <!-- Default Form -->
                            <div class="default-form">
                                <form method="post"  id="contact-form">
                                    <div class="row clearfix">

                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="text" name="username" :placeholder="$t('partner.first')" required>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="text" name="lastname" :placeholder="$t('partner.last')" required>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="email" name="email" :placeholder="$t('partner.mail-contact')" required>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input type="text" name="phone" :placeholder="$t('partner.phone')" required>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <textarea name="message" :placeholder="$t('partner.message')"></textarea>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <button class="theme-btn submit-btn" type="submit" name="submit-form"><span class="txt">
                                                <i class="fa fa-arrow-circle-right"></i> &nbsp; {{ $t('partner.send') }}</span>
                                            </button>
                                        </div>

                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End Contact Section -->

    </div>
</template>

<script>
import lang from "../../components/web/general/LangWeb";

export default {
    components:{
        lang
    },
    name: "successPartner",
    data(){
        return {
            locale : localStorage.getItem("langWeb") || 'ar'
        }
    },
    mounted(){

        // remove class menu-opened from html (!important)
        document.querySelector("html").classList.remove("menu-opened");
    }
}
</script>

<style scoped>
.fa {
    font-size: 39px;
}

/*start header*/
.lang{
    margin: 15px -29px 0 15px;
}
.lang.lang-ar{
    margin: 15px 22px 0 -84px;
}
.logo a img{
    width: 225px;
}
.main-header .nav-outer{
    padding-top: 0;
}
.btn-style-one{
    background-color: #fcb00c;
    border-radius: 32px;
}
.btn-style-one:hover{
    color: #fff !important;
}
.main-header.fixed-header .header-upper .outer-box {
    padding-top: 36px;
}

.main-header.fixed-header {
    background-color: #fff;
    box-shadow: 0px 0px 12px -6px #000;
}

.main-header.fixed-header .logo a img{
    width: 155px;
}
.main-header.fixed-header .header-upper .outer-box {
    padding-top: 13px;
}
/*end header*/

/*start banner*/
.banner-pager .pager{
    pointer-events: none;
}
.video-box figure{
    width: 100%;
}
.banner-section .patern-layer-one.patern-layer-one-ar {
    left: 260px;
    width: 104%;
}
.banner-section .newsletter-form .form-group button.btn-ar {
    right: unset;
    left: 55px;
}
section .newsletter-form .form-group input[type="email"].email-ar {
    left: 195px;
}
.banner-section .carousel-column .inner-column .pager-box.pager-box-ar {
    left: unset;
    right: 0;
}
.banner-section .content-column .video-box.video-box-ar {
    position: absolute;
    left: 0px;
    right: unset;
}
.banner-section .carousel-column .inner-column .pager-box .pager.one {
    background-color: #cb2467;
}
.banner-section .carousel-column .inner-column .pager-box .pager.two {
    background-color: #20b3a1;
}
.banner-section .carousel-column .inner-column .pager-box .pager.three{
    background-color: #8610f2;
}
.banner-section .newsletter-form .form-group button {
    right: 10px;
}
/*end banner*/

/*start register*/
.register{
    padding: 120px 0 0px;
}
.register-container{
    padding: 10px 5px;
    border-radius: 7px;
    margin-bottom: 20px;
}
.register-container.one{
    background-color: #8610f2;
}
.register-container.twe{
    background-color: #20b3a1;
}
.register-container.three{
    background-color: #cb2467;
}
.register-info h4 {
    color: #fff;
    font-size: 16px;
    margin: 25px 0 0;
}
.register-container.one p {
    margin-bottom: 5px;
}
.register-info p{
    color: #fff;
    font-size: 11px;
}
.register-info a{
    color: #fff;
    border: 1px solid #fff;
    padding: 6px 30px;
    border-radius: 15px;
    transition: all .5s;
}
.register-info a:hover{
    background-color: #fff;
}
.register-container.one .register-info a:hover{
    color: #6610f2;
}
.register-container.twe .register-info a:hover{
    color: #6610f2;
}
.register-container.three .register-info a:hover{
    color: #cb2467;
}
/*end register*/

/*start steps-section*/
.steps-section .carousel-item{
    margin: 0!important;
}
.steps-section .content {
     padding: 0;
}
/*end steps-section*/

/*start contact*/
.sec-title .title:before {
    left: 20px;
    top: 16px;
}
.sec-title .title.title-ar:before {
    right: 22px;
    left: unset;
    top: 16px;
}
.contact-section .info-column .info-list.info-list-ar {
    margin-left: 0px;
    margin-right: 120px;
}
.contact-section .info-column .info-list li .icon.icon-ar {
    right: -48px;
    left: unset;
}
/*end contact*/

@media only screen and (min-width: 1140px) {
    .banner-section .carousel-column .inner-column .pager-box .pager.one.one-ar{
        right: -75px;
    }
    .banner-section .carousel-column .inner-column .pager-box .pager.two.two-ar{
        left: 35px;
    }
    .banner-section .carousel-column .inner-column .pager-box .pager.three.three-ar{
        left: -160px;
    }
}

@media only screen and (max-width: 1140px) {
    .main-header {
        background-color: #fff;
    }
    .lang{
        margin: 15px 10px 0 15px;
    }
    .banner-section .newsletter-form .form-group button.btn-ar {
        right: unset;
        left: 45px;
    }
}
@media only screen and (max-width: 1115px){
    .banner-section .content-column .video-box .video-image {
        position: relative;
        margin: 0px;
        top: 36px;
        left: 57px;
    }
    section .content-column .video-box .overlay-box span {
        left: 50%;
        top: 30%;
    }
    .main-header.fixed-header {
        background-color: #fff;
    }
    .banner-section .patern-layer-one.patern-layer-one-ar{
        left: 0px;
    }
    .banner-section .content-column .video-box.video-box-ar {
        display: none;
    }
    section .newsletter-form .form-group input[type="email"].email-ar {
        left: 185px;
    }
}
@media only screen and (max-width: 1055px){
    .register-container.one p {
        margin-bottom: 15px;
    }
}

@media only screen and (max-width: 1023px) {
    .main-header {
        background-color: #fff;
    }
    .logo a img {
        width: 185px;
    }
    .main-header .nav-outer {
        width: unset;
    }
    .btn-style-one {
        line-height: 20px;
        font-size: 15px;
        padding: 15px 13px 15px;
    }
    .main-header .header-upper .outer-box {
        padding-top: 19px;
    }
    .lang.lang-ar{
        margin: 15px 34px 0 4px;
    }
}

@media only screen and (max-width: 992px){
    .video-box{
        display: none;
    }
}

@media only screen and (max-width: 767px){
    .main-header .nav-outer {
        margin-top: 0px;
    }
    .nav-outer .outer-box{
        display: block !important;
    }
    .btn-style-one {
        font-size: 16px;
        padding: 10px 13px 12px;
    }

    .main-header .header-upper .outer-box {
        padding-top: 29px;
    }
    .main-header.fixed-header .header-upper .outer-box{
        padding-top: 20px;
    }
    .register-info h4 {
        color: #fff;
        font-size: 28px;
        margin: 14% 0 0;
    }
    .register-container.one p{
        margin-bottom: 20px;
        font-size: 16px;
    }
}

@media only screen and (max-width: 600px){
    .logo a img {
        width: 160px;
    }
    .main-header .header-upper .outer-box {
        padding-top: 20px;
    }
    .btn-style-one {
        line-height: 19px;
        font-size: 12px;
        padding: 10px 6px 12px;
    }
    .btn-style-one {
        padding: 10px 15px 7px;
    }
    .register-info h4 {
        font-size: 20px;
        margin: 14% 0 0;
    }
    .register-container.one p {
        margin-bottom: 20px;
        font-size: 14px;
    }
}

@media only screen and (max-width: 479px){
    .banner-section .carousel-column .inner-column .slides-box {
         margin-left: 0px;
    }
    section .newsletter-form .form-group input[type="email"].email-ar {
         left: 0px;
    }
    .banner-section .newsletter-form .form-group button.btn-ar {
         left: 0px;
    }
    .main-header .header-upper .outer-box{
        padding-top: 23px;
    }
    .banner-section .carousel-column .inner-column .slides-box {
        margin: 0 11%;
    }
    .register-container.one p {
        margin-bottom: 10px;
        font-size: 13px;
    }
    .register-container.one p{
        font-size: 12px;
    }
    .register-info a{
        padding: 4px 23px;
        font-size: 14px;
    }
}

@media only screen and (max-width: 390px) {
    .banner-section .carousel-column .inner-column .slides-box{
        margin: 0px 3%;
    }
}
</style>
