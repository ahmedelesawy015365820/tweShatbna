<template>
    <div class="content">
        <loader v-if="loading" />
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Proposals list -->
                    <div class="proposals-section">

                        <div class="page-subtitle d-flex align-items-center justify-content-center">
                            <div>
                                <img  :src="`/web/img/sponser/${sponser.media.file_name}`">
                            </div>
                        </div>

                        <h1>{{ sponser.name }}</h1>

                        <div class="row">

                            <!-- Top Instructor -->
                            <section class="section developer">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-7 col-sm-12 col-12 mx-auto">
                                            <div class="section-header text-center">
                                                <div class="section-line"></div>
                                                <h2 class="header-title">خدمات و المنتاجات</h2>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        id="developers-slider"
                                        class="owl-carousel owl-theme developers-slider"
                                        v-for="item in media"
                                    >
                                        <div class="freelance-widget">
                                            <img :src="`/web/img/sponser/${item.file_name}`">
                                        </div>
                                    </div>

                                </div>
                            </section>
                            <!-- End Developer -->

                            <section class="details-company container">
                                <h3>- نبذه عن الشركه </h3>
                                <p>{{ detail.description }}</p>
                            </section>

                            <section class="contact container">
                                <h3>- اتصل بالشركه</h3>
                                <ul class="list-unstyled">
                                    <li>
                                        <i class="fas fa-location-arrow"></i>
                                        <span>
                                            {{ detail.location }}
                                        </span>
                                    </li>
                                    <li>
                                        <i class="fas fa-phone"></i>
                                        <span>
                                            {{ detail.phone }}
                                        </span>
                                    </li>
                                    <li>
                                        <i class="fas fa-envelope"></i>
                                        <span>
                                            {{ detail.email }}
                                        </span>
                                    </li>
                                </ul>
                            </section>

                        </div>

                    </div>
                    <!-- /Proposals list -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {ref,onMounted} from 'vue';
import webApi from "../../api/webAxios";

export default {
    name: "sponser-details",
    setup(){

        let loading = ref(false);
        let sponser = ref({});
        let media = ref([]);
        let detail = ref({});

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

        let getData = () => {
            loading.value = true;
            webApi.get(`/v1/web/getSponser`)
                .then((res) => {
                    sponser.value = res.data.data.sponser;
                    detail.value = res.data.data.sponser.details;
                    media.value = res.data.data.sponser.details.media;
                    console.log(sponser.value);
                    setTimeout(() => {
                        carousel();
                    },500)
                })
                .catch((err) => {
                    console.log(err.response);
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
            getData();
        });

        return {loading,sponser,media,detail};
    }
}
</script>

<style scoped>
.content {
    padding: 180px 0 100px;
    position: relative;
    min-height: 100vh;
}

.freelancer-proposals {
    box-shadow: unset;
}
.project-proposals{
    background: #fff;
    border: 2px solid #fcbd33;
    border-radius: 10px;
}

.info-icon{
    text-align: end;
}

.details-company h3{
    font-size: 24px;
    margin: 20px 0;
}

.details-company p{
    font-size: 17px;
}

.info-icon i {
    width: 35px;
    height: 35px;
    line-height: 2;
    text-align: center;
    font-size: 20px;
    margin: 0 3px;
    cursor: pointer;
    border-radius: 50%;
    border: 1px solid;
}

.project-proposals h3{
    color: #fcbd33;
}

.info-person {
    margin-top: 5px;
}

.contact h3{
    padding: 15px 0;
}

.info-person h5{
    font-size: 14px;
    display: inline-block;
    font-weight: 500;
    margin: 0 5px;
}

.contact ul{
    font-size: 17px;
    padding: 10px;
}

.contact ul li{
    margin: 10px 0;
}

.contact ul li span{
    margin: 0 10px;
}

.info-person .col{
    padding: 0 !important;
}

h1{
    text-align: center;
    font-size: 33px;
    color: #fcbd33;
}

.skill .design-skill:hover {
    background-color: #fcbd33;
    color: #fff;
    user-select: none;
}

.info-icon .fa-heart:hover {
    border-color: #e10d0d;
    color: #e10d0d;
}

.info-icon .fa-thumbs-down:hover {
    border-color: #385898;
    color: #385898;
}

.header-title {
    font-size: 35px;
}

.info-icon .fa-flag:hover{
    border-color: #fcbd33;
    color: #fcbd33;
}

.show-project a{
    border-radius: 9px;
    border: 1px solid #fcbd33;
    color: #fcbd33;
    font-weight: 600;
    transition: all .4s ease-in-out;
}

.show-project a:hover {
    background-color: #fcbd33;
    color: #fff;
}

.font-bold:hover{
    color: #fcbd33;
}

.page-subtitle {
    margin: 0 auto 3rem;
    text-align: center;
}

.page-subtitle div{
    display: inline-block;
    height: 168px;
    width: 168px;
    box-shadow: 1px 0px 17px -4px rgb(0 0 0 / 25%);
    border-radius: 50%;
    color: #fcbd33;
    line-height: 156px;
}

.page-subtitle div i{
    font-size: 50px;
    display: inline-block;
    margin: 23% 0 0px;
}

.page-subtitle div img {
    width: 85%;
}

@media (min-width: 992px){
    .container {
        max-width: 1220px;
    }
}

@media only screen and (max-width: 574px){
    .skill .budget {
        margin: 20px auto;
    }

    .skill-group h5 {
        font-size: 22px;
        margin-top: 30px;
        text-align: center;
    }

    .info-icon i {
        width: 25px;
        height: 25px;
        font-size: 14px;
    }

    .project-proposals h3 {
        color: #fcbd33;
        font-size: 16px;
    }

    .info-person h5{
        font-size: 11px;
    }
}

</style>
