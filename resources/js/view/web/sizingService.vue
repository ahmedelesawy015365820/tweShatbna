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
                        <h3>{{$t('advisor.AdvisorShatbnaPackages')}}</h3>
                        <p> {{$t('advisor.WeHelpYouToGetTheBestQualityThroughOurShutbanaConsultant')}}</p>
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
                                                    <select v-model="data.country_id"
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
                                                <h3>{{$t('register.country')}}</h3>
                                                <div class="form-group mb-0">
                                                    <select v-model="data.country_id"
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

<!--                                        <div class="form-group  col-sm-12">-->
<!--                                            <input id="pac-input" class="form-control col-4" type="text"-->
<!--                                                   placeholder="Search"/>-->
<!--                                            <label for="map">*</label>-->
<!--                                            <div id="map" style="height:350px"></div>-->
<!--                                        </div>-->


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
                                                <h3>{{$t('register.email')}}</h3>
                                                <div class="form-group mb-0">
                                                    <input type="email" v-model.trim="data.email" class="form-control"
                                                           :placeholder="$t('register.email')">
                                                    <div v-if="v$.email.$error">
                                                        <span class="text-danger" v-if="v$.email.required.$invalid">{{ $t('advisor.EmailIsRequired') }}<br/> </span>
                                                        <span class="text-danger" v-if="v$.email.email.$invalid">{{ $t('advisor.ThisFieldMastBeEmail') }}<br/> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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

                                        <div class="title-content col-md-6">
                                            <div class="title-detail">
                                                <h3>{{$t('register.country')}}</h3>
                                                <div class="form-group mb-0">
                                                    <select v-model="data.country_id"
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
                                                <h3>{{$t('advisor.address')}}</h3>
                                                <div class="form-group mb-0">
                                                    <input type="text" v-model.trim="data.address" class="form-control"
                                                           :placeholder="$t('advisor.address')">
                                                    <div v-if="v$.address.$error">
                                                        <span class="text-danger" v-if="v$.address.required.$invalid">{{ $t('advisor.AddressIsRequired') }}<br/> </span>
                                                        <span class="text-danger" v-if="v$.address.minLength.$invalid">{{ $t('advisor.AddressIsMustHaveAtLeast') }} {{v$.address.minLength.$params.min}} {{ $t('advisor.Letters') }} <br/></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="title-content col-md-6">
                                            <div class="title-detail">
                                                <h3>{{$t('advisor.Notes')}}</h3>
                                                <div class="form-group mb-0">
                                                    <textarea class="form-control" v-model.trim="data.note"
                                                              :placeholder="$t('advisor.Notes')"></textarea>
                                                    <div v-if="v$.note.$error">
                                                        <span class="text-danger" v-if="v$.note.required.$invalid">{{ $t('advisor.NotesIsRequired') }}<br/> </span>
                                                        <span class="text-danger" v-if="v$.address.minLength.$invalid">{{ $t('advisor.NotesIsMustHaveAtLeast') }} {{v$.address.minLength.$params.min}} {{ $t('advisor.Letters') }} <br/></span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-12 text-end">
                                                <div class="btn-item">
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



    <transition name="active" mode="out-in" @click.self="show= !show">

        <div class="position-fixed overlay" v-if="show">
            <div class="container">
                <div class="row card-foerm">
                    <div class="col-md-6">
                        <!-- Modal Header -->
                        <div class="select-project mb-4">

                            <form @submit.prevent='storeAdvisor'>

                                <div class="title-box widget-box row">
                                    <div class="modal-header">
                                        <h4 class="modal-title">{{$t('header.advisor')}}</h4>

                                        <button type="button" @click="show= !show" class="close"
                                                data-bs-dismiss="modal"><span>&times;</span></button>
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
                                            <h3>{{$t('register.email')}}</h3>
                                            <div class="form-group mb-0">
                                                <input type="email" v-model.trim="data.email" class="form-control"
                                                       :placeholder="$t('register.email')">
                                                <div v-if="v$.email.$error">
                                                    <span class="text-danger" v-if="v$.email.required.$invalid">{{ $t('advisor.EmailIsRequired') }}<br/> </span>
                                                    <span class="text-danger" v-if="v$.email.email.$invalid">{{ $t('advisor.ThisFieldMastBeEmail') }}<br/> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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

                                    <div class="title-content col-md-6">
                                        <div class="title-detail">
                                            <h3>{{$t('register.country')}}</h3>
                                            <div class="form-group mb-0">
                                                <select v-model="data.country_id"
                                                        class="form-control select select2-hidden-accessible">
                                                    <option :value="country.id" v-for="country in countries">
                                                        {{country.name}}
                                                    </option>
                                                </select>
                                                <div v-if="v$.country_id.$error">
                                                    <span class="text-danger" v-if="v$.country_id.required.$invalid">{{ $t('advisor.CountryIsRequired') }}<br/> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="title-content col-md-6">
                                        <div class="title-detail">
                                            <h3>{{$t('advisor.address')}}</h3>
                                            <div class="form-group mb-0">
                                                <input type="text" v-model.trim="data.address" class="form-control"
                                                       :placeholder="$t('advisor.address')">
                                                <div v-if="v$.address.$error">
                                                    <span class="text-danger" v-if="v$.address.required.$invalid">{{ $t('advisor.AddressIsRequired') }}<br/> </span>
                                                    <span class="text-danger" v-if="v$.address.minLength.$invalid">{{ $t('advisor.AddressIsMustHaveAtLeast') }} {{v$.address.minLength.$params.min}} {{ $t('advisor.Letters') }} <br/></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="title-content col-md-6">
                                        <div class="title-detail">
                                            <h3>{{$t('advisor.Notes')}}</h3>
                                            <div class="form-group mb-0">
                                                <textarea class="form-control" v-model.trim="data.note"
                                                          :placeholder="$t('advisor.Notes')"></textarea>
                                                <div v-if="v$.note.$error">
                                                    <span class="text-danger" v-if="v$.note.required.$invalid">{{ $t('advisor.NotesIsRequired') }}<br/> </span>
                                                    <span class="text-danger" v-if="v$.address.minLength.$invalid">{{ $t('advisor.NotesIsMustHaveAtLeast') }} {{v$.address.minLength.$params.min}} {{ $t('advisor.Letters') }} <br/></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12 text-end">
                                            <div class="btn-item">
                                                <button type="submit" class="btn next-btn">{{$t('advisor.Submit')}}
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
    </transition>

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
        let Packages = ref([]);
        let ones = ref([]);
        let show = ref(false);
        const {t} = useI18n({});
        let map;
        let input;
        let searchBox;
        let markers = [];

        let getSectionOne = () => {

            loading.value = true;

            webApi.get(`/v1/web/sectionOne`)
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
        let getPackage = () => {

            loading.value = true;

            webApi.get(`/v1/web/getAdvisor`)
                .then((res) => {
                    let l = res.data.data;
                    Packages.value = l.packages;
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
            getPackage();
            getSectionOne();
        });

        emitter.on('get_lang_web', () => {
            getPackage();
            getCountry();
            getSectionOne();
        });

        let getCountry = () => {
            store.dispatch('auth/countryRegister');
        };

        let addAdvisor = reactive({
            data: {
                country_id: '',
                email: '',
                phone: '',
                address: '',
                note: '',
                advisor_package_id: '',
                name: '',
            }
        });

        const rules = computed(() => {
            return {
                country_id: {required},
                email: {
                    email,
                    required
                },
                phone: {
                    minLength: minLength(11),
                    integer,
                    required
                },
                address: {
                    required,
                    minLength: minLength(5),
                },
                note: {
                    required,
                    minLength: minLength(5),
                },
                advisor_package_id: {required},
                name: {
                    minLength: minLength(3),
                    required
                },
            }
        });

        const v$ = useVuelidate(rules, addAdvisor.data);

        onMounted(() => {
            getCountry();
            initAutocomplete();
        });

        const initAutocomplete = () => {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {lat: 21.543333, lng: 39.172779},
                zoom: 13,
                mapTypeId: "roadmap",
                mapTypeControl: false,
                fullscreenControl: false
            });
            // This event listener will call addMarker() when the map is clicked.
            map.addListener("click", (event) => {
                setMapOnAll(null);
                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                addMarker(event.latLng);
            });
            // Create the search box and link it to the UI element.
            createSearchBox();
            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });
            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();
                if (places.length == 0) {
                    return;
                }
                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    // Create a marker for each place.
                    addMarker(place.geometry.location);
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }
        // Adds a marker to the map and push to the array.
        const addMarker = (position) => {
            const marker = new google.maps.Marker({
                position,
                map,
            });
            markers.push(marker);
            //  @this.set('geoLocation',marker.getPosition().lat()+","+marker.getPosition().lng())
        }
        // Sets the map on all markers in the array.
        const setMapOnAll = (variable) => {
            for (let i = 0; i < Object.keys(markers).length; i++) {
                markers[i].setMap(variable);
            }
            markers = []

        }

        // Create the search box and link it to the UI element.
        const createSearchBox = () => {
            input = document.getElementById("pac-input");
            searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        }


        let showStore = (id) => {
            addAdvisor.data.advisor_package_id = id;
            show.value = true;
        }

        return {...toRefs(addAdvisor), t, Packages, errors, ones, loading, countries, v$, showStore, show};

    },
    methods: {

        storeAdvisor() {
            this.v$.$validate();

            if (!this.v$.$error) {

                this.loading = true;
                // this.errors = {};

                webApi.post(`/v1/web/advisorClientStore`, this.data)
                    .then((res) => {
                        this.show = false;
                        Swal.fire(
                            `${this.t('advisor.SentSuccessfully')}`,
                            `${this.t('advisor.YouWillBeContactedByOurStaffWithin4WorkingDays')}
                             <br>
                             ${this.t('advisor.ForAnyFurtherEmail')} info@shatbna.net
                             <br>
                             ${this.t('advisor.ForAnyFurtherCallUS')} 011111111111
                            `,
                            `${this.t('advisor.Success')}`
                        );

                        this.resetForm();
                        this.$nextTick(() => {
                            this.v$.$reset()
                        });
                    })
                    .catch((err) => {
                        this.show = false;
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
            this.data.email = '';
            this.data.phone = '';
            this.data.address = '';
            this.data.note = '';
            this.data.advisor_package_id = '';
            this.data.name = '';
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
    transition: opacity 1s ease;
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

</style>
