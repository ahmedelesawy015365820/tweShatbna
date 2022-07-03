<template>
    <!-- Page Content -->
    <div class="content">
        <loader v-if="loading"/>

        <div class="breadcrumb-bar">
            <div class="container">
                <div class="row align-items-center inner-banner">
                    <div class="col-md-12 col-12 text-center">
                        <h2 class="breadcrumb-title">{{ $t('header.size') }}</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <router-link :to="{name:'home',params: {lang:this.$i18n.locale}}">
                                        {{ $t('header.home') }}
                                    </router-link>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $t('header.size') }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <section class="section about" v-if="ones">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="about-content">
                            <h2 class="orange-text">{{$t('header.size')}}</h2>
                            <div v-for="item in ones">
                                <h5>{{item.name}}</h5>
                                <p>{{item.description}}</p>
                            </div>
                            <a href="#card" class="btn learn-btn">{{$t('advisor.BookNow')}}</a>
                        </div>
                    </div>
                    <div class=" col-lg-5">
                        <div class="about-img">
                            <img class="img-fluid" src="/web/img/sizing.jpg" alt="Post Image">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container" id="card">
            <div class="row">
                <div class="col-xl-12 col-md-12 mx-auto text-center">
                    <div class="freelance-title" id="plan">
                        <h3>{{$t('SizingService.upload your property size now')}}</h3>
                        <p> {{$t('SizingService.The best way to get more accurate Your unit details')}}</p>
                    </div>
                    <div class="row card-foerm">
                        <div class="col-md-8">
                            <!-- Modal Header -->
                            <div class="select-project mb-4">

                                <form @submit.prevent='storeAdvisor'>

                                    <div class="title-box widget-box row">

                                        <div class="title-content col-md-6">
                                            <div class="title-detail">
                                                <h3>{{$t('register.country')}}</h3>
                                                <div class="form-group mb-0">
                                                    <select v-model="data.country_id" @change="countryState"
                                                            class="form-control select select2-hidden-accessible">
                                                        <option :value="country.id" v-for="country in countries">
                                                            {{country.name}}
                                                        </option>
                                                    </select>
                                                    <div v-if="v$.country_id.$error">
                                                        <span class="text-danger"
                                                              v-if="v$.country_id.required.$invalid">{{ $t('advisor.CountryIsRequired') }}<br/> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="title-content col-md-6">
                                            <div class="title-detail">
                                                <h3>{{$t('register.state')}}</h3>
                                                <div class="form-group mb-0">
                                                    <select v-model="data.state_id"
                                                            class="form-control select select2-hidden-accessible">
                                                        <option v-if="states" :value="state.id" v-for="state in states">
                                                            {{state.name}}
                                                        </option>
                                                    </select>
                                                    <div v-if="v$.state_id.$error">
                                                        <span class="text-danger"
                                                              v-if="v$.state_id.required.$invalid">{{ $t('advisor.CountryIsRequired') }}<br/> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="title-content col-md-6">
                                            <div class="title-detail">
                                                <h3>{{$t('SizingService.location')}}</h3>
                                                <div class="form-group mb-0">
                                                    <input type="text" v-model.trim="data.location" class="form-control"
                                                           :placeholder="$t('SizingService.location')">
                                                    <div v-if="v$.location.$error">
                                                        <span class="text-danger" v-if="v$.location.required.$invalid">{{ $t('advisor.AddressIsRequired') }}<br/> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="title-content col-md-6">
                                            <div class="title-detail">
                                                <h3>{{$t('SizingService.Unit area in meters')}}</h3>
                                                <div class="form-group mb-0">
                                                    <input type="number" v-model.trim="data.space" class="form-control"
                                                           :placeholder="$t('SizingService.Unit area in meters')">
                                                       <div class="sizing-service" v-if="data.space">
                                                           <h6>{{$t('SizingService.cost')}} : {{data.space * priceSizing}}</h6>
                                                           <h6>{{$t('SizingService.date uploaded')}} : {{contactSizing}}</h6>
                                                       </div>


                                                    <div v-if="v$.space.$error">
                                                        <span class="text-danger" v-if="v$.space.required.$invalid">{{ $t('SizingService.Unit area in meters iS required') }}<br/> </span>
                                                        <span class="text-danger" v-if="v$.space.integer.$invalid">{{ $t('advisor.ThisFieldMastBeInteger') }}<br/> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Project Title -->
                                        <div class="title-content col-md-6">
                                            <div class="title-detail">
                                                <h3> {{$t('register.full_name')}}</h3>
                                                <div class="form-group mb-0">
                                                    <input type="text" v-model.trim="data.name" class="form-control"
                                                           :placeholder="$t('register.full_name')">
                                                    <div v-if="v$.name.$error">
                                                        <span class="text-danger" v-if="v$.name.required.$invalid">{{$t('advisor.NameIsRequired')}}<br/> </span>
                                                        <span class="text-danger" v-if="v$.name.minLength.$invalid">{{$t('advisor.NameIsMustHaveAtLeast')}} {{ v$.name.minLength.$params.min }} {{$t('advisor.Letters')}} <br/></span>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- /Project Title -->

                                        <div class="title-content col-md-6">
                                            <div class="title-detail">
                                                <h3>{{$t('register.phone')}}</h3>
                                                <div class="form-group mb-0">
                                                    <input type="text" v-model.trim="data.phone" class="form-control"
                                                           :placeholder="$t('register.phone')">
                                                    <div v-if="v$.phone.$error">
                                                        <span class="text-danger" v-if="v$.phone.required.$invalid">{{ $t('advisor.PhoneIsRequired') }}<br/> </span>
                                                        <span class="text-danger" v-if="v$.phone.minLength.$invalid">{{ $t('advisor.PhoneIsMustHaveAtLeast') }} {{v$.phone.minLength.$params.min }} {{ $t('advisor.Letters') }} <br/></span>
                                                        <span class="text-danger" v-if="v$.phone.integer.$invalid">{{ $t('advisor.ThisFieldMastBeInteger') }}<br/> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="title-content col-md-12 ">
                                            <div class="title-detail">
                                                <h3>{{$t('advisor.Notes')}}</h3>
                                                <div class="form-group mb-0">
                                                    <textarea class="form-control" v-model.trim="data.note"
                                                              :placeholder="$t('advisor.Notes')"></textarea>
                                                    <div v-if="v$.note.$error">
                                                        <span class="text-danger" v-if="v$.note.required.$invalid">{{ $t('advisor.NotesIsRequired') }}<br/> </span>
                                                        <span class="text-danger" v-if="v$.note.minLength.$invalid">{{ $t('advisor.NotesIsMustHaveAtLeast') }} {{v$.note.minLength.$params.min}} {{ $t('advisor.Letters') }} <br/></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 text-end">
                                                <div class="btn-item text-center">
                                                    <button type="submit" class="btn next-btn">
                                                        {{$t('advisor.Submit')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- Project Title -->

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- /Page Content -->


</template>
<script>
import {inject, toRefs, reactive, computed, onMounted, ref, onBeforeMount} from 'vue';
import {maxLength, minLength, required, integer, email} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import {useStore} from 'vuex';
import webApi from "../../api/webAxios";
import {useI18n} from "vue-i18n";


export default {
    setup() {
        const store = useStore();
        const emitter = inject('emitter');
        let errors = computed(() => store.getters['auth/errors']);
        let loading = computed(() => store.getters['auth/loading']);
        let countries = computed(() => store.getters['auth/country']);
        let ones = ref([]);
        let contactSizing = ref(0);
        let priceSizing= ref(0);
        const {t} = useI18n({});
        let states = computed(()=> store.getters['auth/newState']);

        let getSectionOne = () => {

            loading.value = true;

            webApi.get(`/v1/web/SizingSectionOne`)
                .then((res) => {
                    let l = res.data.data;
                    ones.value = l.advisorOnes;
                })
                .catch((err) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'يوجد خطا في النظام...',
                        text: 'يرجا اعاده تحميل الصفحه و المحاوله مره اخري !',
                    });
                }).finally(() => {
                loading.value = false;
            });
        }
        let getSetting = () => {

            loading.value = true;

            webApi.get(`/v1/web/SizingSetting`)
                .then((res) => {

                    let l =res.data.data;
                    contactSizing.value = l.setting.contact_sizing;
                    priceSizing.value = l.setting.price_sizing;
                })
                .catch((err) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'يوجد خطا في النظام...',
                        text: 'يرجا اعاده تحميل الصفحه و المحاوله مره اخري !',
                    });
                }).finally(() => {
                loading.value = false;
            });
        }
        onBeforeMount(() => {
            getSectionOne();
            getSetting();
        });

        emitter.on('get_lang_web', () => {
            getCountry();
            getSectionOne();
            getSetting();
        });

        let getCountry = () => {
            store.dispatch('auth/countryRegister');
        };

        let countryState =  () => {
            store.dispatch('auth/stateRegister',addAdvisor.data.country_id);
        };

        let addAdvisor = reactive({
            data: {
                country_id: '',
                state_id: '',
                location: '',
                space: '',
                name: '',
                phone: '',
                note: '',
            }
        });

        const rules = computed(() => {
            return {
                country_id: {required},
                state_id: {required},
                location: {required},
                space: {
                    required,
                    integer
                },
                name: {
                    minLength: minLength(3),
                    required
                },
                phone: {
                    minLength: minLength(11),
                    integer,
                    required
                },

                note: {
                    required,
                    minLength: minLength(5),
                },
            }
        });

        const v$ = useVuelidate(rules, addAdvisor.data);

        onMounted(() => {
            getCountry();
        });

        emitter.on('get_lang_web', () => {
            getCountry();
            if(addAdvisor.data.country_id){
                countryState();
            }
        });


        return {...toRefs(addAdvisor), t, errors, ones,countryState,states, loading,contactSizing,priceSizing, countries, v$};

    },
    methods: {

        storeAdvisor() {
            this.v$.$validate();

            if (!this.v$.$error) {

                this.loading = true;
                // this.errors = {};

                webApi.post(`/v1/web/SizingClientStore`, this.data)
                    .then((res) => {
                        Swal.fire(
                            `${this.t('advisor.SentSuccessfully')}`,
                            `${this.t('advisor.YouWillBeContactedByOurStaff')}
                             `,
                            `${this.t('advisor.Success')}`
                        );

                        this.resetForm();
                        this.$nextTick(() => {
                            this.v$.$reset()
                        });
                    })
                    .catch((err) => {
                        Swal.fire({
                            icon: `${this.t('advisor.error')}`,
                            title: `${this.t('advisor.ThereIsAnErrorInTheSystem')}`,
                            text: `${this.t('advisor.PleaseTryAgainLater')}`,
                        });

                        this.errors = err.response.data.errors;
                        console.log(err.response);
                    })
                    .finally(() => {
                        this.loading = false;
                    });

            }
        },
        resetForm() {
            this.data.country_id = '';
            this.data.state_id = '';
            this.data.location = '';
            this.data.space = '';
            this.data.name = '';
            this.data.phone = '';
            this.data.note = '';
        }
    }
}
</script>

<style scoped>
.content {
    padding: 0px !important;
}

.breadcrumb-bar {
    background: url("/web/img/inner-banner.jpg");
    padding-top: 0px !important;
}

.project-info span {
    font-size: 16px;
}

.card-foerm {
    justify-content: center;
}

.active-enter-active,
.active-leave-active {
    transition: opacity 0.1s ease;
}

.active-enter-from,
.active-leave-to {
    opacity: 0;
}

.overlay {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 2000;
    background-color: rgba(0, 0, 0, .5);
    justify-content: center;
    align-items: center;
    display: flex;
}

.title-content h3 {
    margin-bottom: 5px !important;
    margin-top: 10px !important;
}

.modal-header .close {
    margin: 0 !important;
}
.sizing-service{
    width: 100%;
    height: 100%;
    border: 5px dotted #fcb00cd6;
}
textarea{
    height: 150px !important;
}

</style>
