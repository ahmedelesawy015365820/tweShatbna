<template>
    <div>
        <loader2 v-if="loading" />
        <!-- Home Banner -->
        <section
            class="section home-banner row-middle"
            :style="{'background-image': media ? 'url(/web/img/banner/'+media.file_name+')' : '' }"
        >
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
                                <h5>{{banners.title1}}</h5>
                            </div>
                            <h1>{{banners.title2}}</h1>
                            <p>{{banners.title3}}</p>
                            <form class="form" id="store">
                                <div class="form-inner">
                                    <div class="input-group">
											<span class="drop-detail">
                                                <span class="border-cutom-en" v-show="this.$i18n.locale != 'ar'"></span>
												<select class="form-control select" name="storeID">
													<option value="project.html" class="option">{{$t('index.company')}}</option>
                                                    <option value="project.html" class="option">{{$t('index.design')}}</option>
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
            <div class="container container-custom">
                <div class="row">

                    <!-- Feature Item -->
                    <div class="col-md-4">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <img src="/web/img/icon/FreeDesignerOrange.svg" class="img-fluid" alt="">
                            </div>
                            <div class="feature-content">
                                <h3 id="counter-1"></h3>
                                <p>{{$t('index.freelancer')}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /Feature Item -->

                    <!-- Feature Item -->
                    <div class="col-md-4">
                        <div class="feature-item">
                            <div class="feature-icon middle">
                                <img src="/web/img/icon/CompanyFreeOrange.svg" class="img-fluid" alt="">
                            </div>
                            <div class="feature-content">
                                <h3 id="counter-2"></h3>
                                <p>{{$t('index.finish')}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /Feature Item -->

                    <!-- Feature Item -->
                    <div class="col-md-4">
                        <div class="feature-item">
                            <div class="feature-icon last">
                                <img src="/web/img/icon/ProjectOrange.svg" class="img-fluid" alt="">
                            </div>
                            <div class="feature-content">
                                <h3 id="counter-3"></h3>
                                <p>{{$t('index.project')}}</p>
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
                    <div class="col-md-6 work-box bg12">
                        <div class="work-content">
                            <h2>{{$t('index.search-company')}}</h2>
                            <p>{{$t('index.parge-company')}}</p>
                            <div class="row justify-content-between align-items-end">
                                <div class="col-4">
                                    <img src="/web/img/icon/AHMED12.svg">
                                </div>
                                <a href="#" class="col-2">
                                    <i :class="['fas',this.$i18n.locale != 'ar'?'fa-long-arrow-alt-right':'fa-long-arrow-alt-left','long-arrow']"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Feature Item -->

                    <div class="col-md-6 work-box bg10">
                        <div class="work-content">
                            <h2>{{$t('index.search-design')}}</h2>
                            <p>{{$t('index.parge-company')}}</p>
                            <div class="row justify-content-between align-items-end">
                                <div class="col-4">
                                    <img src="/web/img/icon/DesignerSearchBlack.svg">
                                </div>
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
            <div class="container container-custom">
                <div class="row">
                    <div class="col-12 col-md-12 mx-auto">
                        <div class="section-header text-center">
                            <div class="section-line"></div>
                            <h2 class="header-title">{{$t('index.bargain')}}</h2>
                            <div class="row justify-content-center">
                                <p>{{$t('index.decBargain')}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <!--- Project Item  -->
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="project-item">
                            <span :class="[this.$i18n.locale == 'ar'? 'price-ar':'price']">
                                <div>
                                    <span>500</span>
                                    <span class="coin">EGP</span>
                                </div>
                            </span>
                            <div class="row">
                                <div class="project-img col-6">
                                    <a href="project.html"><img src="/web/img/icon/chair.svg"></a>
                                </div>
                                <div class="col-6 row align-items-center">
                                    <h4>
                                        {{$t('index.decProduct')}}
                                    </h4>
                                </div>
                            </div>
                            <div class="d-flex  align-items-center">
                                <div class="project-content button">
                                    <button class="subscribe">
                                        <span>{{$t('index.subscribe')}}</span>
                                        <div><img src="/web/img/icon/AHMED11.svg"></div>
                                    </button>
                                    <button class="share">
                                        <span>{{$t('index.share')}}</span>
                                        <div><img src="/web/img/icon/share.svg"></div>
                                    </button>
                                </div>
                                <div class="project-content">
                                    <div class="time-container">
                                        <h4>{{$t('index.show')}}</h4>
                                        <div class="time">
                                            <div class="second">
                                                <span>05</span>
                                                <small :class="[this.$i18n.locale != 'ar'?'en':'']">{{$t('index.second')}}</small>
                                            </div>
                                            <span class="point">:</span>
                                            <div class="minute">
                                                <span>23</span>
                                                <small :class="[this.$i18n.locale != 'ar'?'en':'']">{{$t('index.minute')}}</small>
                                            </div>
                                            <span class="point">:</span>
                                            <div class="hour">
                                                <span>33</span>
                                                <small :class="[this.$i18n.locale != 'ar'?'en':'']">{{$t('index.hour')}}</small>
                                            </div>
                                            <span class="point">:</span>
                                            <div class="day">
                                                <span>15</span>
                                                <small>{{$t('index.day')}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- /Project Item  -->

                    <!--- Project Item  -->
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="project-item">
                            <span :class="[this.$i18n.locale == 'ar'? 'price-ar':'price']">
                                <div>
                                    <span>500</span>
                                    <span class="coin">EGP</span>
                                </div>
                            </span>
                            <div class="row">
                                <div class="project-img col-6">
                                    <a href="project.html"><img src="/web/img/icon/chair.svg"></a>
                                </div>
                                <div class="col-6 row align-items-center">
                                    <h4>
                                        {{$t('index.decProduct')}}
                                    </h4>
                                </div>
                            </div>
                            <div class="d-flex  align-items-center">
                                <div class="project-content button">
                                    <button class="subscribe">
                                        <span>{{$t('index.subscribe')}}</span>
                                        <div><img src="/web/img/icon/AHMED11.svg"></div>
                                    </button>
                                    <button class="share">
                                        <span>{{$t('index.share')}}</span>
                                        <div><img src="/web/img/icon/share.svg"></div>
                                    </button>
                                </div>
                                <div class="project-content">
                                    <div class="time-container">
                                        <h4>{{$t('index.show')}}</h4>
                                        <div class="time">
                                            <div class="second">
                                                <span>05</span>
                                                <small :class="[this.$i18n.locale != 'ar'?'en':'']">{{$t('index.second')}}</small>
                                            </div>
                                            <span class="point">:</span>
                                            <div class="minute">
                                                <span>23</span>
                                                <small :class="[this.$i18n.locale != 'ar'?'en':'']">{{$t('index.minute')}}</small>
                                            </div>
                                            <span class="point">:</span>
                                            <div class="hour">
                                                <span>33</span>
                                                <small :class="[this.$i18n.locale != 'ar'?'en':'']">{{$t('index.hour')}}</small>
                                            </div>
                                            <span class="point">:</span>
                                            <div class="day">
                                                <span>15</span>
                                                <small>{{$t('index.day')}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- /Project Item  -->

                    <!--- Project Item  -->
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="project-item">
                            <span :class="[this.$i18n.locale == 'ar'? 'price-ar':'price']">
                                <div>
                                    <span>500</span>
                                    <span class="coin">EGP</span>
                                </div>
                            </span>
                            <div class="row">
                                <div class="project-img col-6">
                                    <a href="project.html"><img src="/web/img/icon/chair.svg"></a>
                                </div>
                                <div class="col-6 row align-items-center">
                                    <h4>
                                        {{$t('index.decProduct')}}
                                    </h4>
                                </div>
                            </div>
                            <div class="d-flex  align-items-center">
                                <div class="project-content button">
                                    <button class="subscribe">
                                        <span>{{$t('index.subscribe')}}</span>
                                        <div><img src="/web/img/icon/AHMED11.svg"></div>
                                    </button>
                                    <button class="share">
                                        <span>{{$t('index.share')}}</span>
                                        <div><img src="/web/img/icon/share.svg"></div>
                                    </button>
                                </div>
                                <div class="project-content">
                                    <div class="time-container">
                                        <h4>{{$t('index.show')}}</h4>
                                        <div class="time">
                                            <div class="second">
                                                <span>05</span>
                                                <small :class="[this.$i18n.locale != 'ar'?'en':'']">{{$t('index.second')}}</small>
                                            </div>
                                            <span class="point">:</span>
                                            <div class="minute">
                                                <span>23</span>
                                                <small :class="[this.$i18n.locale != 'ar'?'en':'']">{{$t('index.minute')}}</small>
                                            </div>
                                            <span class="point">:</span>
                                            <div class="hour">
                                                <span>33</span>
                                                <small :class="[this.$i18n.locale != 'ar'?'en':'']">{{$t('index.hour')}}</small>
                                            </div>
                                            <span class="point">:</span>
                                            <div class="day">
                                                <span>15</span>
                                                <small>{{$t('index.day')}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- /Project Item  -->

                    <!--- Project Item  -->
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="project-item">
                            <span :class="[this.$i18n.locale == 'ar'? 'price-ar':'price']">
                                <div>
                                    <span>500</span>
                                    <span class="coin">EGP</span>
                                </div>
                            </span>
                            <div class="row">
                                <div class="project-img col-6">
                                    <a href="project.html"><img src="/web/img/icon/chair.svg"></a>
                                </div>
                                <div class="col-6 row align-items-center">
                                    <h4>
                                        {{$t('index.decProduct')}}
                                    </h4>
                                </div>
                            </div>
                            <div class="d-flex  align-items-center">
                                <div class="project-content button">
                                    <button class="subscribe">
                                        <span>{{$t('index.subscribe')}}</span>
                                        <div><img src="/web/img/icon/AHMED11.svg"></div>
                                    </button>
                                    <button class="share">
                                        <span>{{$t('index.share')}}</span>
                                        <div><img src="/web/img/icon/share.svg"></div>
                                    </button>
                                </div>
                                <div class="project-content">
                                    <div class="time-container">
                                        <h4>{{$t('index.show')}}</h4>
                                        <div class="time">
                                            <div class="second">
                                                <span>05</span>
                                                <small :class="[this.$i18n.locale != 'ar'?'en':'']">{{$t('index.second')}}</small>
                                            </div>
                                            <span class="point">:</span>
                                            <div class="minute">
                                                <span>23</span>
                                                <small :class="[this.$i18n.locale != 'ar'?'en':'']">{{$t('index.minute')}}</small>
                                            </div>
                                            <span class="point">:</span>
                                            <div class="hour">
                                                <span>33</span>
                                                <small :class="[this.$i18n.locale != 'ar'?'en':'']">{{$t('index.hour')}}</small>
                                            </div>
                                            <span class="point">:</span>
                                            <div class="day">
                                                <span>15</span>
                                                <small>{{$t('index.day')}}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- /Project Item  -->

                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="see-all">
                            <a href="project.html" class="btn all-btn">{{$t('index.productEver')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
                            <h2 class="header-title">{{$t('index.patrons')}}</h2>
                        </div>
                    </div>
                </div>

                <div id="developers-slider" class="owl-carousel owl-theme developers-slider">
                    <div class="freelance-widget">
                        <div class="freelance-content">
                            <a
                                data-toggle="modal"
                               href="#rating"
                               :class="['favourite', this.$i18n.locale != 'ar'?'favourite-ar':'']"
                            >
                                <i class="fas fa-star"></i>
                            </a>
                            <div class="freelance-img">
                                <a href="#">
                                    <img src="/web/img/user/avatar-1.jpg" alt="User Image">
                                </a>
                            </div>
                            <div class="freelance-info">
                                <h3><a href="#">Sponser Name</a></h3>
                                <div class="freelance-specific row justify-content-center">
                                    <span>
                                        من اكبر مصنعي الاساس في مصر
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="cart-hover">
                            <a href="developer-details.html" class="btn-cart" tabindex="-1">{{$t('index.more')}}</a>
                        </div>
                    </div>
                    <div class="freelance-widget">
                        <div class="freelance-content">
                            <a
                                data-toggle="modal"
                                href="#rating"
                                :class="['favourite', this.$i18n.locale != 'ar'?'favourite-ar':'']"
                            >
                                <i class="fas fa-star"></i>
                            </a>
                            <div class="freelance-img">
                                <a href="#">
                                    <img src="/web/img/user/avatar-1.jpg" alt="User Image">
                                </a>
                            </div>
                            <div class="freelance-info">
                                <h3><a href="#">Sponser Name</a></h3>
                                <div class="freelance-specific row justify-content-center">
                                    <span>
                                        من اكبر مصنعي الاساس في مصر
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="cart-hover">
                            <a href="developer-details.html" class="btn-cart" tabindex="-1">{{$t('index.more')}}</a>
                        </div>
                    </div>
                    <div class="freelance-widget">
                        <div class="freelance-content">
                            <a
                                data-toggle="modal"
                                href="#rating"
                                :class="['favourite', this.$i18n.locale != 'ar'?'favourite-ar':'']"
                            >
                                <i class="fas fa-star"></i>
                            </a>
                            <div class="freelance-img">
                                <a href="#">
                                    <img src="/web/img/user/avatar-1.jpg" alt="User Image">
                                </a>
                            </div>
                            <div class="freelance-info">
                                <h3><a href="#">Sponser Name</a></h3>
                                <div class="freelance-specific row justify-content-center">
                                    <span>
                                        من اكبر مصنعي الاساس في مصر
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="cart-hover">
                            <a href="developer-details.html" class="btn-cart" tabindex="-1">{{$t('index.more')}}</a>
                        </div>
                    </div>
                    <div class="freelance-widget">
                        <div class="freelance-content">
                            <a
                                data-toggle="modal"
                                href="#rating"
                                :class="['favourite', this.$i18n.locale != 'ar'?'favourite-ar':'']"
                            >
                                <i class="fas fa-star"></i>
                            </a>
                            <div class="freelance-img">
                                <a href="#">
                                    <img src="/web/img/user/avatar-1.jpg" alt="User Image">
                                </a>
                            </div>
                            <div class="freelance-info">
                                <h3><a href="#">Sponser Name</a></h3>
                                <div class="freelance-specific row justify-content-center">
                                    <span>
                                        من اكبر مصنعي الاساس في مصر
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="cart-hover">
                            <a href="developer-details.html" class="btn-cart" tabindex="-1">{{$t('index.more')}}</a>
                        </div>
                    </div>
                    <div class="freelance-widget">
                        <div class="freelance-content">
                            <a
                                data-toggle="modal"
                                href="#rating"
                                :class="['favourite', this.$i18n.locale != 'ar'?'favourite-ar':'']"
                            >
                                <i class="fas fa-star"></i>
                            </a>
                            <div class="freelance-img">
                                <a href="#">
                                    <img src="/web/img/user/avatar-1.jpg" alt="User Image">
                                </a>
                            </div>
                            <div class="freelance-info">
                                <h3><a href="#">Sponser Name</a></h3>
                                <div class="freelance-specific row justify-content-center">
                                    <span>
                                        من اكبر مصنعي الاساس في مصر
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="cart-hover">
                            <a href="developer-details.html" class="btn-cart" tabindex="-1">{{$t('index.more')}}</a>
                        </div>
                    </div>
                    <div class="freelance-widget">
                        <div class="freelance-content">
                            <a
                                data-toggle="modal"
                                href="#rating"
                                :class="['favourite', this.$i18n.locale != 'ar'?'favourite-ar':'']"
                            >
                                <i class="fas fa-star"></i>
                            </a>
                            <div class="freelance-img">
                                <a href="#">
                                    <img src="/web/img/user/avatar-1.jpg" alt="User Image">
                                </a>
                            </div>
                            <div class="freelance-info">
                                <h3><a href="#">Sponser Name</a></h3>
                                <div class="freelance-specific row justify-content-center">
                                    <span>
                                        من اكبر مصنعي الاساس في مصر
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="cart-hover">
                            <a href="developer-details.html" class="btn-cart" tabindex="-1">{{$t('index.more')}}</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Developer -->

    </div >

</template>

<script>
import {onMounted,onBeforeMount,inject,ref} from 'vue';
import webApi from "../../api/webAxios";

export default {
    setup(){

        const emitter = inject('emitter');
        const loading = ref(false);
        const banners = ref({});
        const media = ref({});

        let carousel = () => {
            $('#developers-slider').removeClass('owl-hidden');
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
            //end owl-carousel
        };

        onMounted(() => {
            carousel();
            banner();
            counter(20600,1,0);
            counter(67000,2,0);
            counter(105340,3,0);
        });

        let banner = () => {
            loading.value = true;
            webApi.get(`/v1/web/banner`)
                .then((res) => {
                    banners.value = res.data.data.banner;
                    media.value = res.data.data.banner.media
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

        emitter.on('get_lang_web', () => {
            banner();
        });

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

        return {counter,loading,banners,media};
    }
}
</script>

<style scoped>

section{
   overflow: hidden;
}

/*start banner*/

.home-banner {
    height: 100vh !important;
    background-position: unset;
    padding-top: 5%;
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

.banner-content .sub-btn{
    display: inline-block;
    margin-left: 20px;
    height: 54px;
    padding: 0 45px;
    margin-top: 10px;
}

/*end banner*/

.feature-item {
    padding: 20px 30px;
    box-shadow: 0px 0px 5px -2px rgb(0 0 0 / 37%);
}

.feature .feature-icon {
    margin-bottom: 0px;
    min-height: 70px;
}

.feature .feature-icon::before {
    content: '';
    background: #ffb2045c;
    transform: translateX(-50%);
    width: 84px;
    border-radius: 50%;
    height: 84px;
    top: -12px;
}
 .feature .feature-icon:nth-of-type(1)::before {
     transform: translateX(1%);
 }

.feature .feature-icon.middle::before {
    transform: translateX(0%);
    top: -5px;
    width: 80px;
    height: 80px;
}
.feature .feature-icon.middle img{
    width: 60px;
}

.feature .feature-icon.last::before{
    transform: translateX(-112%);
}
.feature .feature-icon.last img[data-v-0939d6eb] {
    width: 68px;
}



.feature .feature-icon img {
    width: 65px;
}

.feature .feature-content h3 {
     margin-bottom: 0px;
    font-size: 28px;
}

.feature .feature-content p {
    font-size: 18px;
    text-transform: capitalize;
    letter-spacing: 1px;
    word-spacing: 1px;
}

/*start work-content*/
.bg12{
    background-color: #fcb00c;
}

.bg10{
    background-color: #f5ae1473;
}

.bg10 .work-content h2{
    color: #000;
}
.bg10 .work-content h2:after{
    background-color: #000;
}

.bg10 .work-content p{
    color: #000000de;
}

.bg10 .work-content .long-arrow {
    background: #000;
    color: #fff;
}

.work-content h2 {
    font-size: 32px;
}

.work-content {
    width: 95%;
}

.work-content p {
    font-size: 22px;
}

.work-content img{
    width: 90%;
}

.subscribe {
    padding: 125px 0;
}
.subscribe h1{
    color: #fff;
}

/*start work-content*/


/*start product*/
.container-custom{
    max-width: 1160px;
}
.projects .header-title{
    color: #fcb00c;
}

.projects  .section-header p{
    width: 30%;
    font-size: 28px;
}

.project-item {
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0px 0px 5px -2px rgb(0 0 0 / 37%);
}
.project-item{
    position: relative;
}
.project-item .price{
    position: absolute;
    color: #fcb00c;
    right: 3%;
    font-size: 35px;
    top: 7%;
    font-weight: 600;
}
.project-item .price-ar{
    position: absolute;
    color: #fcb00c;
    left: 3%;
    top: 7%;
    font-size: 35px;
    font-weight: 600;
}
.price .coin ,.price-ar .coin {
    font-size: 18px;
    margin: 0 10px;
    font-weight: 500;
}
.project-item h4{
    font-size: 19px;
    color: #4e4949;
}

.project-content {
    margin: 0 auto;
}
.project-content.button{
    position: relative;
    top: 20px;
}

.project-content button.subscribe{
    margin: 5px 3px;
    padding: 3px 3px;
    font-size: 15px;
    background: #fcb00c;
    color: #fff;
    border-radius: 22px;
}
.project-content button.share{
    margin: 0 3px;
    padding: 2px 0;
    font-size: 15px;
    color: #fcb00c;
    border: 1px solid  #fcb00c;
    background-color: transparent;
    border-radius: 22px;
}

.project-content button div{
    display: inline-block;
    border-radius: 50%;
    padding: 0 5px;
}

.project-content button.share div {
    border: 1px solid #fcb00c;
}
.project-content button.subscribe div {
    border: 1px solid #fff;
}
.project-content button.subscribe span{
    margin: 0 8px;
}
.project-content button.share span{
    margin: 0 20px;
}
.project-content button img{
    width: 13px;
}
.project-content h4 {
    font-weight: bold;
    font-size: 11px;
    text-transform: lowercase;
    color: #fcb00c;
    text-align: start;
    padding: 0 20px;
}
.project-content .time-container{
    position: relative;
    right: 42px;
}
.project-content .time{
    position: relative;
}
.project-content .time .point{
    top: 6px;
    position: relative;
    font-size: 19px;
    color: #000;
    font-weight: 600;
}
.project-content .time div{
    display: inline-block;
    background: #000;
    position: relative;
    color: #fff;
    border-radius: 5px;
    margin: 2px 4px;
    text-align: center;
    padding: 0px 10px 9px;
}
.project-content .time div.day{
    padding: 0 11px 9px;
}
.project-content .time div small {
    display: block;
    position: absolute;
    top: 13px;
    margin: 0;
    font-size: 9px;
}
.project-content .time div.minute small {
    left: 7px;
}
.project-content .time div.hour small.en {
    left: 10px;
}
.project-content .time div.minute small.en, .project-content .time div small.en{
    left: 5px;
}
.project-content .time div.hour small {
    left: 7px;
}
/*end product*/


.header-title {
    font-size: 36px;
}

.freelance-widget .freelance-content{
    box-shadow: 0 3px 18px -8px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);
    border: none;
}

.freelance-widget:hover .favourite,
.freelance-widget:hover .btn-cart{
    color: #fff;
    background-color: #fcb00c;
}

.freelance-info h3 {
    font-size: 22px;
    font-weight: 600;
}

.freelance-info h3 a:hover{
    color: #fcb00c;
}

.freelance-specific span{
    font-size: 18px;
    width: 65%;
}

.btn-cart {
    background: #fcb00cd6;
    transition: all .5s ease-in-out;
}

@media only screen and (max-width: 992px){
    .home-banner{
        height: 80vh !important;
    }
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
    .project-content .time-container{
        position: initial;
    }
    .project-content {
        margin: 0 auto;
        text-align: initial;
        width: 52%;
    }
    .project-content .time div {
        margin: 2px 2px;
        padding: 0px 9px 9px;
    }
    .project-content h4 {
        padding: 0 3px;
    }
    .projects .section-header p{
        width: 44%;
        font-size: 28px;
    }
    .project-content button.share{
        margin: 0 3px 13px;
        padding: 1px 8px 2px 3px;
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
    .project-content h4 {
        font-size: 14px;
        text-transform: lowercase;
        text-align: start;
        padding: 0px 0%;
    }
    .projects .section-header p {
        width: 58%;
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
    .projects .section-header p{
        width: 65%;
        font-size: 27px;
        line-height: 1.1;
    }
    .project-item .price-ar,.project-item .price {
        font-size: 30px;
    }
    .project-item h4{
        font-size: 13px;
        color: #4e4949;
    }
    .project-content .time-container{
        position: initial;
    }
    .project-content h4{
        color: #fcb00c;
    }
    .project-content {
        margin: 0 auto;
        text-align: initial;
         width: 52%;
    }

    .project-content button.share{
        margin: 0px 3px 15px;
        font-size: 14px;
    }
    .project-content .time div {
        margin: 2px 2px;
    }
    .project-content h4{
        padding: 0 6px;
    }
    .custom-row {
        height: 90vh;
    }
}
</style>
