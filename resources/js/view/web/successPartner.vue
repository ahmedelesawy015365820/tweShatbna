<template>
    <div class="page-wrapper">

        <loader v-if="loading" />

        <div class="position-fixed overlay" v-if="show" @click.self="show = !show">
            <div class="embed-responsive embed-responsive-21by9">
                <iframe
                    class="embed-responsive-item"
                    src="https://www.youtube.com/embed/zNrdllT1Z5s"
                    allowfullscreen
                >
                </iframe>
            </div>
        </div>

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
                                    <router-link
                                        :to="{name:'registerPartiner',params: {lang:this.$i18n.locale}}"
                                        :class="['theme-btn','btn-style-one',this.$i18n.locale != 'ar'?'btn-style-one-en':'']"
                                    >
                                        <span class="txt">{{$t('partner.register')}}</span>
                                    </router-link>
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
                                <form @submit.prevent="newsLetter">
                                    <div class="form-group">
                                        <input
                                            type="email"
                                            :class="[this.$i18n.locale == 'ar'?'email-ar':'']"
                                            :placeholder="$t('partner.banner-email')"
                                            required
                                            v-model.trim="v$.newsLatter.email.$model"
                                        >
                                        <button
                                                type="submit"
                                                :class="['theme-btn btn-style-two', this.$i18n.locale == 'ar'? 'btn-ar' : '']">
                                            <span class="txt">{{$t('partner.free')}}</span>
                                        </button>
                                        <div v-if="v$.newsLatter.email.$error">
                                            <span class="text-danger" v-if="v$.newsLatter.email.required.$invalid">email is required.<br /> </span>
                                            <span class="text-danger" v-if="v$.newsLatter.email.$invalid">must be a valid email address. </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="address">{{$t('partner.dowoload')}}</div>
                            <!--Video Box-->
                            <div :class="['video-box',this.$i18n.locale == 'ar'?'video-box-ar':'']" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <figure class="video-image">
                                    <img src="/web/page/images/resource/video.jpg" alt="">
                                </figure>
                                <a
                                    href="#"
                                   class="lightbox-image overlay-box"
                                    @click="show = !show"
                                >
                                    <span class="fa fa-play"><i class="ripple"></i></span>
                                </a>
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
                            <div class="carousel-inner" role="listbox">
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
                                    <div :class="['title',this.$i18n.locale == 'ar'?'title-ar':'']"><span>3</span>{{ $t('partner.step') }}</div>
                                    <h2>{{ $t('partner.stepH') }}</h2>
                                </div>

                                <!-- Controls-->
                                <ul class="carousel-indicators">

                                    <li data-target="#steps-thumb">
                                        <span class="number">1</span>
                                        <span class="icon"><i class="flaticon-logout"></i></span>
                                        <strong>{{ $t("partner.step1") }} </strong>
                                        {{ $t("partner.step1p") }}
                                    </li>

                                    <li data-target="#steps-thumb">
                                        <span class="number">2</span>
                                        <span class="icon"><i class="flaticon-credit-card"></i></span>
                                        <strong>{{ $t("partner.step2") }}</strong>
                                        {{ $t("partner.step2p") }}
                                    </li>

                                    <li data-target="#steps-thumb" data-slide-to="2" class="tab-btn wow" data-wow-delay="0ms" data-wow-duration="1500ms">
                                        <span class="number">3</span>
                                        <span class="icon"><i class="flaticon-gift"></i></span>
                                        <strong>{{ $t("partner.step3") }}</strong>
                                        {{ $t("partner.step3p") }}
                                    </li>

                                </ul>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
        <!-- End Steps Section -->

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
                                        <a href="/web/img/Statstics.png" class="app-1 lightbox-image">
                                            <img src="/web/img/Statstics.png" alt="" /></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Content Column -->
                            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column">
                                    <div class="icon-box">
                                        <span class="icon flaticon-settings"></span>
                                    </div>
                                    <h3>{{$t('partner.control')}}</h3>
                                    <div class="text">{{$t('partner.controlp')}}</div>
                                    <router-link :to="{name:'registerPartiner',params: {lang:this.$i18n.locale}}" class="theme-btn btn-style-two">
                                        <span class="txt">{{$t('partner.register')}}</span>
                                    </router-link>
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
                                    <h3>{{ $t('partner.opportunity') }}</h3>
                                    <div class="text">{{ $t('partner.opportunityp') }}</div>
                                    <router-link :to="{name:'registerPartiner',params: {lang:this.$i18n.locale}}"   class="theme-btn btn-style-four">
                                        <span class="txt">{{ $t('partner.start') }}</span>
                                    </router-link>
                                </div>
                            </div>

                            <!-- Image Column -->
                            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                <div class="inner-column wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="image titlt" data-tilt data-tilt-max="8">
                                        <a href="/web/img/dash-board.jfif" class="app-2 lightbox-image">
                                            <img  src="/web/img/dash-board.jfif" alt="" />
                                        </a>
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
                                <div class="text-center"><img src="/web/img/logo.png" class="img-fluid logo" alt="Logo"></div>
                                <h2>{{$t('partner.join')}}</h2>
                            </div>
                            <div class="text">{{$t('partner.joinp')}}</div>
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
                                        <div class="inner wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
                                            <div class="content">
                                                <div class="feature-icon">
                                                    <img src="/web/img/icon/FreeDesignerOrange.svg" class="img-fluid" alt="">
                                                </div>
                                                <div class="feature-content">
                                                    <h3 id="counter-1"></h3>
                                                    <p>{{$t('index.freelancer')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Column-->
                                    <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                        <div class="inner wow fadeInUp" data-wow-delay="600ms" data-wow-duration="1500ms">
                                            <div class="content">
                                                <div class="feature-icon middle">
                                                    <img src="/web/img/icon/CompanyFreeOrange.svg" class="img-fluid" alt="">
                                                </div>
                                                <div class="feature-content">
                                                    <h3 id="counter-2"></h3>
                                                    <p>{{$t('index.finish')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Column-->
                                    <div class="column counter-column col-lg-6 col-md-6 col-sm-12">
                                        <div class="inner wow fadeInUp" data-wow-delay="900ms" data-wow-duration="1500ms">
                                            <div class="content">
                                                <div class="feature-icon last">
                                                    <img src="/web/img/icon/ProjectOrange.svg" class="img-fluid" alt="">
                                                </div>
                                                <div class="feature-content">
                                                    <h3 id="counter-3"></h3>
                                                    <p>{{$t('index.project')}}</p>
                                                </div>
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
                    <h2>
                        <div><img src="/web/img/logo.png" class="img-fluid logo" alt="Logo"></div>
                        {{ $t("partner.screenshot") }}
                    </h2>
                </div>

<!--                <div class="row justify-content-center appScreenshotCarousel-container swiper-container">-->
<!--                    <div class="swiper-wrapper">-->
<!--                        <div class="swiper-slide">-->
<!--                            <img src="/web/img/screen-mobile.png" alt="screen-mobile">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    &lt;!&ndash; Add Arrows &ndash;&gt;-->
<!--                </div>-->

            </div>
        </section>
        <!-- End Screenshots Section -->

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
                                    <a href="tel:01102500000">01102500000</a><br>
                                    <a href="tel:01004007542">01004007542</a>
                                </li>
                                <li>
                                    <span :class="['icon','flaticon-invite',this.$i18n.locale == 'ar'?'icon-ar':'']"></span>
                                    <strong>{{$t('partner.mail')}}</strong>
                                    <a  href="mailto:info@shatabna.net">info@shatabna.net</a><br>
                                    <a  href="mailto:Sales@shatabna.net">Sales@shatabna.net</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Form Column -->
                    <div class="form-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title style-three">
                                <div :class="['title',this.$i18n.locale == 'ar'?'title-ar':'']"><span>{{$t('partner.co')}}</span>{{$t('partner.ntact')}}</div>
                                <h2>{{$t('partner.from-h')}}</h2>
                            </div>

                            <!-- Default Form -->
                            <div class="default-form">
                                <form @submit.prevent="support"  id="contact-form">
                                    <div class="row clearfix">

                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input
                                                type="text"
                                                :placeholder="$t('partner.first')"

                                                v-model.trim="v$.support.first.$model"
                                            >
                                            <div v-if="v$.support.first.$error">
                                                <span class="text-danger" v-if="v$.support.first.required.$invalid">first name is required.<br /> </span>
                                                <span class="text-danger" v-if="v$.support.first.minLength.$invalid">first name is must have at least {{ v$.support.first.minLength.$params.min }} letters. <br /></span>
                                                <span class="text-danger" v-if="v$.support.first.maxLength.$invalid">first name is must have at most {{ v$.support.first.maxLength.$params.max }} letters. <br /></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input
                                                type="text"
                                                :placeholder="$t('partner.last')"

                                                v-model.trim="v$.support.last.$model"
                                            >
                                            <div v-if="v$.support.last.$error">
                                                <span class="text-danger" v-if="v$.support.last.required.$invalid">last name is required.<br /> </span>
                                                <span class="text-danger" v-if="v$.support.last.minLength.$invalid">last name is must have at least {{ v$.support.last.minLength.$params.min }} letters. <br /></span>
                                                <span class="text-danger" v-if="v$.support.last.maxLength.$invalid">last name is must have at most {{ v$.support.last.maxLength.$params.max }} letters. <br /></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input
                                                type="email"
                                                :placeholder="$t('partner.mail-contact')"

                                                v-model.trim="v$.support.email.$model"
                                            >
                                            <div v-if="v$.support.email.$error">
                                                <span class="text-danger" v-if="v$.support.email.required.$invalid">email is required.<br /> </span>
                                                <span class="text-danger" v-if="v$.support.email.$invalid">must be a valid email address. </span>
                                                <span class="text-danger" v-if="v$.support.email.maxLength.$invalid">email is must have at most {{ v$.support.email.maxLength.$params.max }} letters. <br /></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                            <input
                                                type="text"
                                                :placeholder="$t('partner.phone')"

                                                v-model.trim="v$.support.phone.$model"
                                            >
                                            <div v-if="v$.support.phone.$error">
                                                <span class="text-danger" v-if="v$.support.phone.required.$invalid">phone is required.<br /> </span>
                                                <span class="text-danger" v-if="v$.support.phone.maxLength.$invalid">phone is must have at most {{ v$.support.phone.maxLength.$params.max }} numbers.<br/> </span>
                                                <span class="text-danger" v-if="v$.support.phone.integer.$invalid">must be number.<br /> </span>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <textarea
                                                :placeholder="$t('partner.message')"
                                                v-model.trim="v$.support.description.$model"
                                            ></textarea>
                                            <div v-if="v$.support.description.$error">
                                                <span class="text-danger" v-if="v$.support.description.required.$invalid">message is required.<br /> </span>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                            <button class="theme-btn submit-btn" type="submit"><span class="txt">
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
import {computed, onMounted, reactive, ref, toRefs} from 'vue'
import {alphaNum, email, integer, maxLength, minLength, required, sameAs} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import webApi from "../../api/webAxios";

export default {
    components:{
        lang
    },
    name: "successPartner",
    data(){
        return {
            locale : localStorage.getItem("langWeb") || 'ar',
            show: false
        }
    },
    mounted(){
        // remove class menu-opened from html (!important)
        document.querySelector("html").classList.remove("menu-opened");
    },
    setup(){

        const loading = ref(false);

        let counter = (num,id,time = 1000) => {

            let number = 0;

            if(num > 10000 && num < 20000 ){
                number = num - 1000;
            }
            else if(num > 20000 && num < 30000){
                number = num - 1000;
            }
            else if(num > 50000 && num < 100000){
                number =  num - 1000;
            }
            else if(num > 100000){
                number = num - 1000;
            }

            let count = setInterval(() =>{

                let element= document.getElementById("counter-"+id);

                element.innerHTML = new Intl.NumberFormat().format(number++);

                if(num < number){
                    clearInterval(count);
                }

            },time);

        };

        let data =  reactive({
            newsLatter:{
                email:''
            },
            support:{
                first: '',
                last: '',
                phone: '',
                email:'',
                description:''
            }
        });

        const rules = computed(() => {
            return {
                newsLatter: {
                    email: {
                        required,
                        email
                    }
                },
                support:{
                    first: {
                        minLength: minLength(3),
                        maxLength:maxLength(40),
                        required,
                    },
                    last: {
                        minLength: minLength(3),
                        maxLength:maxLength(40),
                        required,
                    },
                    email: {
                        required,
                        email,
                        maxLength:maxLength(80),
                    },
                    phone:{
                        required,
                        maxLength:maxLength(25),
                        integer
                    },
                    description:{
                        required,
                    }
                }
            }
        });

        const v$ = useVuelidate(rules,data);

        onMounted(() => {
            counter(20600,1,0);
            counter(67000,2,0);
            counter(105340,3,0);
        });

        return {...toRefs(data),v$,loading};
    },
    methods: {
        newsLetter(){

            this.v$.newsLatter.$validate();

            if(!this.v$.newsLatter.$error){
                this.loading = true;

                webApi.post(`/v1/web/newLetter`,this.newsLatter)
                    .then((res) => {

                        Swal.fire({
                            icon: 'success',
                            title: 'انت الان مشترك في القائمه البريديه .',
                            confirmButtonColor: '#ffbc34',
                            confirmButtonText: 'نجاح'
                        });

                        this.newsLatter.email = '';
                        this.$nextTick(() => { this.v$.$reset() });
                    })
                    .catch((err) => {
                        Swal.fire({
                            icon: 'error',
                            title: 'يوجد خطا ...',
                            text: 'يوجد خطاء في النظام يرجي اعاده الماوله مره اخري  !',
                        });
                    })
                    .finally(() => {
                        this.loading = false;
                    });
            }
        },
        support(){
            this.v$.support.$validate();

            if(!this.v$.support.$error) {

                this.loading = true;

                webApi.post(`/v1/web/support`, this.support)
                    .then((res) => {
                        Swal.fire({
                            icon: 'success',
                            title: 'انت الان مشترك في القائمه البريديه .',
                            confirmButtonColor: '#ffbc34',
                            confirmButtonText: 'نجاح'
                        });

                        this.support.email = '';
                        this.support.first = '';
                        this.support.last = '';
                        this.support.phone = '';
                        this.support.description = '';
                        this.$nextTick(() => {this.v$.$reset()});
                    })
                    .catch((err) => {
                        Swal.fire({
                            icon: 'error',
                            title: 'يوجد خطا ...',
                            text: 'يوجد خطاء في النظام يرجي اعاده الماوله مره اخري  !',
                        });
                        console.log(err.response)
                    })
                    .finally(() => {
                        this.loading = false;
                    });
            }
        }
    }
}
</script>

<style scoped>

.app-block .inner-box .image-column .image img {
    position: relative;
    width: 95%;
    height: 340px;
    display: block;
}
.content {
     background-color: transparent !important;
}
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

.overlay{
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 2000;
    background-color: rgba(0,0,0,.5);
    justify-content: center;
    align-items: center;
    display: flex;
}

.embed-responsive {
    width: 75%;
    height: 65%;
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
    left: 75px;
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

.banner-section .content-column .text {
    width: 65%;
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
.contact-section {
    padding: 0px 0px 80px;
}

.sec-title .title:before {
    left: 20px;
    top: 16px;
    background-color: #fcb00c;
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
.screenshots-section {
    padding-bottom: 0;
}

.swiper-wrapper {
    width: auto;
    padding: 30px 0 100px;
}



.screenshots-section .sec-title h2 {
    max-width: 532px;
    font-size: 29px;
    margin: auto;
}

.logo{
    width: 220px;
}

.btn-style-four{
    background-color: #fcb00c;
}

.counter-section .content-column .text {
    font-size: 20px;
}


.fact-counter .column .inner {
    padding: 20px 32px;
}

.feature-icon {
    margin-bottom: 0px;
    min-height: 70px;
    text-align: center;
    position: relative;
}

.feature-content{
    text-align: center;
}

.feature-icon::before {
    content: '';
    background: #ffb2045c;
    transform: translateX(-50%);
    width: 84px;
    border-radius: 50%;
    height: 84px;
    top: -12px;
    position: absolute;
}
 .feature-icon:nth-of-type(1)::before {
    transform: translateX(50%);
}

 .feature-icon.middle::before {
    transform: translateX(-31%);
    top: -5px;
    width: 80px;
    height: 80px;
}
 .feature-icon.middle img{
    width: 60px;
}

 .feature-icon.last::before{
    transform: translateX(50%);
}
.feature-icon.last img {
    width: 68px;
}


.feature-icon img {
    width: 75px;
}

.feature-content h3 {
    margin-bottom: 0px;
    font-size: 28px;
}

.feature-content p {
    font-size: 18px;
    text-transform: capitalize;
    letter-spacing: 1px;
    word-spacing: 1px;
}

iframe {
    width: 100% !important;
    height: 100% !important;
}

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
        left: 65px;
    }
    .banner-section .content-column .text {
        width: 75%;
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
    .screenshots-section .sec-title h2 {
        max-width: 390px;
        font-size: 27px;
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
    .screenshots-section .sec-title h2[data-v-52ade008] {
        max-width: 320px;
        font-size: 24px;
    }
    .banner-section .content-column .text {
        width: 85%;
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
    .banner-section .newsletter-form .form-group button {
        right: 0;
    }
    .lang {
        margin: 15px 10px 0 0px;
    }
    .btn-style-one-en {
        padding: 10px 4px 7px;
        font-size: 11px;
    }
}

@media only screen and (max-width: 415px) {
    .btn-style-one{
        font-size: 13px;
        padding: 10px 9px 5px;
    }
    .btn-style-one-en{
        font-size: 9px;
        padding: 10px 6px 5px;
    }
    .log-btn {
        font-size: 11px !important;
    }
    .lang.lang-ar {
        margin: 15px 10px 0 4px;
    }
}

@media only screen and (max-width: 390px) {
    .banner-section .carousel-column .inner-column .slides-box{
        margin: 0px 3%;
    }
}
</style>
