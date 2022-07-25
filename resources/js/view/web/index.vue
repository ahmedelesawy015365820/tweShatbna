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










        <!-- products section  -->
        <productSection />









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
                    <div v-for="sponser in sponsers" class="freelance-widget">
                        <div class="freelance-content">
                            <div class="freelance-img">
                                <a href="#">
                                    <img :src="`/web/img/sponser/${sponser.media.file_name}`" alt="User Image">
                                </a>
                            </div>
                            <div class="freelance-info">
                                <h3><a href="#">{{ sponser.name }}</a></h3>
                                <div class="freelance-specific row justify-content-center">
                                    <span>
                                        {{ sponser.description }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="cart-hover">
                            <router-link
                                :to="{name:'sponser',params:{lang:this.$i18n.locale,id:sponser.id}}"
                                class="btn-cart"
                                tabindex="-1"
                            >
                                {{$t('index.more')}}
                            </router-link>
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
import productSection from "./loata/products.vue"
import webApi from "../../api/webAxios";

export default {
    components:{
        productSection
    },
    setup(){

        const emitter = inject('emitter');
        const loading = ref(false);
        const banners = ref({});
        const media = ref({});
        const sponsers = ref([]);

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

        onBeforeMount(() => {
            getData();
            counter(20600,1,0);
            counter(67000,2,0);
            counter(105340,3,0);
        });

        let getData = () => {
            loading.value = true;
            webApi.get(`/v1/web/home`)
                .then((res) => {
                    banners.value = res.data.data.banner;
                    media.value = res.data.data.banner.media;
                    sponsers.value = res.data.data.sponser;
                    setTimeout(() => {
                        carousel();
                    },500);

                    console.log(res.data.data.sponser);
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
            getData();
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

        return {counter,loading,banners,media,sponsers};
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
