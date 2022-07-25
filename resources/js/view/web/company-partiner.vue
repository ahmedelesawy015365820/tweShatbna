<template>
    <div class="content">
            <loader v-if="loading" />
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Proposals list -->
                        <div class="proposals-section">

                            <div class="row">

                                <div class="col-md-6 col-lg-4" v-for="profile in profiles">

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
                                                    <div class="author-location">{{ profile.complement.nameCompany }} <i class="fas fa-check-circle text-success verified"></i></div>
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
                                                    <div class="freelance-location"><i class="fas fa-map-marker-alt me-1"></i>{{ profile.complement.state.name }}, {{ profile.complement.country.name }}</div>
                                                </div>
                                                <div class="freelance-tags">
                                                    <a href="javascript:void(0);" v-for="service in profile.company_service">
                                                        <span class="badge badge-pill badge-design">{{ service.name }}</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-hover">
                                            <router-link
                                                :to="{name:'company-profile',params:{lang: this.$i18n.locale,id:profile.id}}"
                                                class="btn-cart"
                                                tabindex="-1"
                                            >
                                                Read More
                                            </router-link>
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
        let profiles = ref([]);
        let profilePaginate = ref({});

        let getCompany = () => {
            loading.value = true;

            webApi.get(`/v1/web/companyShowGet`)
                .then((res) => {
                    let l = res.data.data;
                    profiles.value = l.profiles.data;
                    profilePaginate.value = l.profiles;
                })
                .catch((err) => {
                    console.log(err.response);
                })
                .finally(() => {
                    loading.value = false;
                });
        };

        onMounted(() => {
            getCompany();
        });

        emitter.on('get_lang_web', () => {
            getCompany();
        });

        return {profiles,profilePaginate,loading};
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

.widget-author .profile-img a img{
    border-radius: 50%;
}

.fa-map-marker-alt {
    margin: 0 4px;
}

.widget-author .profile-img {
    padding: 5px;
}
</style>
