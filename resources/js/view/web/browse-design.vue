<template>
    <div class="content">
        <loader v-if="loading" />
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Proposals list -->
                    <div class="proposals-section">
                        <div class="page-subtitle d-flex align-items-center justify-content-center">
                            <div>
                                <i class="fas fa-marker"></i><br>
                                <p>{{$t("browse.design")}}</p>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-lg-6" v-for="design in designs"  >
                                <!-- Proposals -->
                                <div class="freelancer-proposals">
                                    <div class="project-proposals align-items-center freelancer">

                                        <div class="row">
                                            <h3 class="col-7">{{design.name}}</h3>
                                            <div class="col-5">
                                                <div class="info-icon">
                                                    <i class="fas fa-heart"></i>
                                                    <i class="fas fa-thumbs-down"></i>
                                                    <i class="fas fa-flag"></i>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-xl-8 info-person">
                                                <div class="d-flex">
                                                    <div class="col">
                                                        <i class="fas fa-user-alt"></i>
                                                        <h5>{{design.user.name.substr(0,9)}}</h5>
                                                    </div>
                                                    <div class="col">
                                                        <i class="fas fa-clock"></i>
                                                        <h5>{{design.customDate}}</h5>
                                                    </div>
                                                    <div class="col">
                                                        <i class="fas fa-book-open"></i>
                                                        <h5>10 عروض</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="skill">
                                            <div class="row">

                                                <div class="col-sm-3 col-12">
                                                    <div class="budget">
                                                        <i class="fas fa-coins"></i>
                                                        <span class="budget-pound">{{$t("browse.budget")}} <br> {{ design.expected_badget.to }} جنيه</span>
                                                    </div>
                                                </div>

                                                <div class="col-sm-9 col-12">
                                                    <div class="skill-group">
                                                        <h5><span><i class="fas fa-drafting-compass"></i></span>  {{$t("browse.skill")}}</h5>
                                                        <div class="row design-skills">
                                                            <div class="col-sm-4 col-6" v-for="unity in design.unity">
                                                                <div class="design-skill">{{unity.name}}</div>
                                                            </div>
                                                            <div class="col-sm-4 col-6" v-for="architectural in design.architectural">
                                                                <div class="design-skill">{{architectural.name}}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="description-proposal">
                                            <h5 class="desc-title">{{$t("browse.description")}}</h5>
                                            <p>{{design.description.substr(0,250)}}....<router-link :to="{name:'browse-details',params:{lang:this.$i18n.locale,id:design.id}}"  class="text-primary font-bold">
                                                {{$t("browse.more")}}</router-link></p>
                                        </div>

                                        <div class="show-project">
                                            <router-link
                                                :to="{name:'browse-details',params:{lang:this.$i18n.locale,id:design.id}}"
                                                class='btn'
                                            >
                                                {{$t("browse.add")}}
                                            </router-link>
                                        </div>
                                    </div>
                                </div>
                                <!-- Proposals -->
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
import {inject, onMounted, ref} from "vue";
import webApi from "../../api/webAxios";

export default {
    name: "browse-company",
    setup(){

        const emitter = inject('emitter');
        let loading  = ref(false);
        let designs  = ref([]);
        let designsPaginate  = ref({});

        let getProject = () => {
            loading.value = true;

            webApi.get(`/v1/web/allDesProject`)
                .then((res) => {
                    let l = res.data.data;
                    designsPaginate.value = l.designs;
                    designs.value = l.designs.data;
                })
                .catch((err) => {


                })
                .finally(() => {
                    loading.value = false;
                });
        }

        onMounted(() => {
            getProject();
        });

        emitter.on('get_lang_web', () => {
            getProject();
        });

        return {designsPaginate,designs,loading};
    }
}
</script>

<style scoped>
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

.info-person h5{
    font-size: 14px;
    display: inline-block;
    font-weight: 500;
    margin: 0 5px;
}

.info-person .col{
    padding: 0 !important;
}

.skill{
    margin-top: 25px;
}

.skill .budget{
    height: 100px;
    width: 100px;
    margin: 20px 0 0;
    text-align: center;
    border: 3px solid #fcbd33;
    border-radius: 50%;
}

.budget-pound {
    text-align: center;
}

.skill i{
    font-size: 60px;
    line-height: 1.6;
    text-align: center;
}

.skill-group h5{
    font-size: 22px;
}

.skill-group i{
    color: #55545b;
    font-size: 22px;
}

.design-skills{
    margin-top: 25px;
}

.skill .design-skill{
    border: 1px solid #fcbd33;
    text-align: center;
    padding: 8px 0;
    border-radius: 21px;
    margin-top: 10px;
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
}

.page-subtitle div i{
    font-size: 50px;
    display: inline-block;
    margin: 23% 0 0px;
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
