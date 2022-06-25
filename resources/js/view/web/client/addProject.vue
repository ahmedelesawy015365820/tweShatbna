<template>
    <!-- Page Content -->
    <div class="content">

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

        <loader2 v-if="loading2" />
        <div class="container-fluid">
            <div class="row">
                <!-- sidebar -->
                <Sidebar />
                <!-- /sidebar -->
                <div class="col-xl-9 col-md-8">
                    <div class="select-project mb-4">
                        <div class="row justify-content-center">
                            <nav class="user-tabs mb-4">
                                <ul role="tablist" class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a href="#company" data-bs-toggle="tab"  :class="['nav-link','active']">شركات التشطيبات</a>
                                    </li>
                                    <li :class="['nav-item','stop-margin',$i18n.locale == 'ar'?'tab-ar' : 'tab-en']">
                                        <a href="#design" data-bs-toggle="tab" :class="['nav-link']">ديزاينير</a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="tab-content pt-0">
                                <div role="tabpanel" id="company" :class="['tab-pane','fade active show']">
                                    <form @submit.prevent="companyProject">
                                        <div class="title-box widget-box">

                                            <button
                                                type="button"
                                                @click.self="show = !show"
                                                class="btn next-btn btn-item-custom"
                                            >
                                                كيف تضيف مشروع ؟
                                            </button>

                                            <div class="row">

                                                <!-- Project Title -->
                                                <div class="title-content col-lg-6">
                                                    <div class="title-detail">
                                                        <h3>ضع عنوان للمشروع</h3>
                                                        <div class="form-group mb-0">
                                                            <input
                                                               type="text"
                                                               class="form-control"
                                                               placeholder="ضع عنوان للمشروع"
                                                               v-model="v$.company.name.$model"
                                                            >
                                                        </div>
                                                        <div v-if="v$.company.name.$error">
                                                            <span class="text-danger" v-if="v$.company.name.required.$invalid">name is required.<br /> </span>
                                                            <span class="text-danger" v-if="v$.company.name.maxLength.$invalid">address is must have at most {{ v$.company.name.maxLength.$params.max }} letters.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->

                                                <!-- Project Title -->
                                                <div class="title-content col-lg-6">
                                                    <div class="title-detail">
                                                        <h3>مساحه الوحده بالمتر</h3>
                                                        <div class="form-group mb-0">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder="مساحه الوحده بالمتر"
                                                                v-model="v$.company.area.$model"
                                                            >
                                                            <div v-if="v$.company.area.$error">
                                                                <span class="text-danger" v-if="v$.company.area.required.$invalid">area is required.<br /> </span>
                                                                <span class="text-danger" v-if="v$.company.area.numeric.$invalid">area en is number. <br /></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->

                                                <!-- Project Title -->
                                                <div class="title-content col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>ارتفاع الوحده بالمتر</h3>
                                                        <div class="form-group mb-0">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder="ارتفاع الوحده بالمتر"
                                                                v-model="v$.company.height.$model"
                                                            >
                                                            <div v-if="v$.company.height.$error">
                                                                <span class="text-danger" v-if="v$.company.height.required.$invalid">height is required.<br /> </span>
                                                                <span class="text-danger" v-if="v$.company.height.numeric.$invalid">height is number. <br /></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->

                                                <!-- Project Title -->
                                                <div class="title-content col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>عدد غرف الوحدة</h3>
                                                        <div class="form-group mb-0">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder="عدد غرف الوحدة"
                                                                v-model="v$.company.room.$model"
                                                            >
                                                            <div v-if="v$.company.room.$error">
                                                                <span class="text-danger" v-if="v$.company.room.required.$invalid">room is required.<br /> </span>
                                                                <span class="text-danger" v-if="v$.company.room.integer.$invalid">room  is number. <br /></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->

                                                <!-- Project Title -->
                                                <div class="title-content col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>عدد الحمامات</h3>
                                                        <div class="form-group mb-0">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder="عدد الحمامات"
                                                                v-model="v$.company.bathroom.$model"
                                                            >
                                                            <div v-if="v$.company.bathroom.$error">
                                                                <span class="text-danger" v-if="v$.company.bathroom.required.$invalid">bathroom is required.<br /> </span>
                                                                <span class="text-danger" v-if="v$.company.bathroom.integer.$invalid">bathroom is number. <br /></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->

                                                <!-- Category Content -->
                                                <div class="title-content col-md-6 col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>نوع الوحده</h3>
                                                        <div class="form-group mb-0">
                                                            <select
                                                                class="form-control select"
                                                                v-model="v$.company.unity.$model"
                                                            >
                                                                <option disabled>Select</option>
                                                                <option
                                                                    v-for="unity in unities"
                                                                    :value="unity.id"
                                                                    >{{ unity.name }}</option>

                                                            </select>
                                                            <div v-if="v$.company.unity.$error">
                                                                <span class="text-danger" v-if="v$.company.unity.required.$invalid">unity is required.<br /> </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Category Content -->

                                                <!-- Category Content -->
                                                <div class="title-content col-md-6 col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>اختار نوع الطراز المعماري لديك</h3>
                                                        <div class="form-group mb-0">
                                                            <select
                                                                class="form-control select"
                                                                v-model="v$.company.architectural.$model"
                                                            >
                                                                <option disabled>Select</option>
                                                                <option
                                                                    v-for="architectural in architecturals"
                                                                    :value="architectural.id"
                                                                >{{ architectural.name }}</option>
                                                            </select>
                                                            <div v-if="v$.company.architectural.$error">
                                                                <span class="text-danger" v-if="v$.company.architectural.required.$invalid">architectural is required.<br /> </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Category Content -->

                                                <!-- Category Content -->
                                                <div class="title-content col-md-6 col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>الميزانيه المتوقعه</h3>
                                                        <div class="form-group mb-0">
                                                            <select
                                                                class="form-control select"
                                                                v-model="v$.company.expected_budget.$model"
                                                            >
                                                                <option disabled>Select</option>
                                                                <option
                                                                    v-for="budget in budgets"
                                                                    :value="budget.id"
                                                                >{{ budget.from+' - ' + budget.to }}</option>
                                                            </select>
                                                            <div v-if="v$.company.expected_budget.$error">
                                                                <span class="text-danger" v-if="v$.company.expected_budget.required.$invalid">expected budget is required.<br /> </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Category Content -->

                                                <!-- /Add Document -->
                                                <div class="title-content col-lg-6">
                                                    <div class="title-detail">
                                                        <h3>اضف صور لمشروع (اختياري)</h3>
                                                        <div class="custom-file">
                                                            <input
                                                                multiple
                                                                name="fileComp[]"
                                                                @change="previewCompany"
                                                                type="file"
                                                                class="custom-file-input"
                                                                accept="image/png,jepg,jpg"
                                                            >
                                                            <label class="custom-file-label"></label>
                                                        </div>
                                                        <p class="mb-0 text-danger">Size of the Document should be Below 2MB</p>
                                                    </div>
                                                </div>
                                                <!-- /Add Document -->

                                                <!-- /Add Document -->
                                                <div class="title-content col-lg-6">
                                                    <div class="title-detail">
                                                        <h3>اضف فديو لمشروع (اختياري)</h3>
                                                        <div class="custom-file">
                                                            <input @change="vedioCompany" type="file" class="custom-file-input">
                                                            <label class="custom-file-label"></label>
                                                        </div>
                                                        <p class="mb-0 text-danger">Size of the Document should be Below 15MB(mp4,webm)</p>
                                                    </div>
                                                </div>
                                                <!-- /Add Document -->

                                                <!-- Project Title -->
                                                <div class="title-content pb-0 col-lg-12">
                                                    <div class="title-detail">
                                                        <h3>تفاصيل المشروع </h3>
                                                        <div class="form-group mb-0">
                                                            <textarea
                                                                class="form-control"
                                                                rows="5"
                                                                v-model="v$.company.description.$model"
                                                            ></textarea>
                                                            <div v-if="v$.company.description.$error">
                                                                <span class="text-danger" v-if="v$.company.description.required.$invalid">description is required.<br /> </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <div class="btn-item">
                                                        <button type="submit" class="btn next-btn">نشر المشروع علي العام</button>

                                                        <button type="button" class="btn next-btn send">ارسل المشروع لشركة محدد</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Project Title -->

                                    </form>
                                </div>
                                <div role="tabpanel" id="design" :class="['tab-pane','fade']">
                                    <form @submit.prevent="designProject">
                                        <div class="title-box widget-box">
                                            <button
                                                type="button"
                                                @click.self="show = !show"
                                                class="btn next-btn btn-item-custom"
                                            >
                                                كيف تضيف مشروع ؟
                                            </button>

                                            <div class="row">

                                                <!-- Project Title -->
                                                <div class="title-content col-lg-6">
                                                    <div class="title-detail">
                                                        <h3>ضع عنوان للمشروع</h3>
                                                        <div class="form-group mb-0">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder="ضع عنوان للمشروع"
                                                                v-model="v$.design.name.$model"
                                                            >
                                                        </div>
                                                        <div v-if="v$.design.name.$error">
                                                            <span class="text-danger" v-if="v$.design.name.required.$invalid">name is required.<br /> </span>
                                                            <span class="text-danger" v-if="v$.design.name.maxLength.$invalid">address is must have at most {{ v$.design.name.maxLength.$params.max }} letters.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->

                                                <!-- Project Title -->
                                                <div class="title-content col-lg-6">
                                                    <div class="title-detail">
                                                        <h3>مساحه الوحده بالمتر</h3>
                                                        <div class="form-group mb-0">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder="مساحه الوحده بالمتر"
                                                                v-model="v$.design.area.$model"
                                                            >
                                                            <div v-if="v$.design.area.$error">
                                                                <span class="text-danger" v-if="v$.design.area.required.$invalid">area is required.<br /> </span>
                                                                <span class="text-danger" v-if="v$.design.area.numeric.$invalid">area en is number. <br /></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->

                                                <!-- Project Title -->
                                                <div class="title-content col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>ارتفاع الوحده بالمتر</h3>
                                                        <div class="form-group mb-0">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder="ارتفاع الوحده بالمتر"
                                                                v-model="v$.design.height.$model"
                                                            >
                                                            <div v-if="v$.design.height.$error">
                                                                <span class="text-danger" v-if="v$.design.height.required.$invalid">height is required.<br /> </span>
                                                                <span class="text-danger" v-if="v$.design.height.numeric.$invalid">height is number. <br /></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->

                                                <!-- Project Title -->
                                                <div class="title-content col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>عدد غرف الوحدة</h3>
                                                        <div class="form-group mb-0">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder="عدد غرف الوحدة"
                                                                v-model="v$.design.room.$model"
                                                            >
                                                            <div v-if="v$.design.room.$error">
                                                                <span class="text-danger" v-if="v$.design.room.required.$invalid">room is required.<br /> </span>
                                                                <span class="text-danger" v-if="v$.design.room.integer.$invalid">room  is number. <br /></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->

                                                <!-- Project Title -->
                                                <div class="title-content col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>عدد الحمامات</h3>
                                                        <div class="form-group mb-0">
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                placeholder="عدد الحمامات"
                                                                v-model="v$.design.bathroom.$model"
                                                            >
                                                            <div v-if="v$.design.bathroom.$error">
                                                                <span class="text-danger" v-if="v$.design.bathroom.required.$invalid">bathroom is required.<br /> </span>
                                                                <span class="text-danger" v-if="v$.design.bathroom.integer.$invalid">bathroom is number. <br /></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->

                                                <!-- Category Content -->
                                                <div class="title-content col-md-6 col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>نوع الوحده</h3>
                                                        <div class="form-group mb-0">
                                                            <select
                                                                class="form-control select"
                                                                v-model="v$.design.unity.$model"
                                                            >
                                                                <option disabled>Select</option>
                                                                <option
                                                                    v-for="unity in unities"
                                                                    :value="unity.id"
                                                                >{{ unity.name }}</option>

                                                            </select>
                                                            <div v-if="v$.design.unity.$error">
                                                                <span class="text-danger" v-if="v$.design.unity.required.$invalid">unity is required.<br /> </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Category Content -->

                                                <!-- Category Content -->
                                                <div class="title-content col-md-6 col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>اختار نوع الطراز المعماري لديك</h3>
                                                        <div class="form-group mb-0">
                                                            <select
                                                                class="form-control select"
                                                                v-model="v$.design.architectural.$model"
                                                            >
                                                                <option disabled>Select</option>
                                                                <option
                                                                    v-for="architectural in architecturals"
                                                                    :value="architectural.id"
                                                                >{{ architectural.name }}</option>
                                                            </select>
                                                            <div v-if="v$.design.architectural.$error">
                                                                <span class="text-danger" v-if="v$.design.architectural.required.$invalid">architectural is required.<br /> </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Category Content -->

                                                <!-- Category Content -->
                                                <div class="title-content col-md-6 col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>الميزانيه المتوقعه</h3>
                                                        <div class="form-group mb-0">
                                                            <select
                                                                class="form-control select"
                                                                v-model="v$.design.expected_budget.$model"
                                                            >
                                                                <option disabled>Select</option>
                                                                <option
                                                                    v-for="budget in budgets"
                                                                    :value="budget.id"
                                                                >{{ budget.from+' - ' + budget.to }}</option>
                                                            </select>
                                                            <div v-if="v$.design.expected_budget.$error">
                                                                <span class="text-danger" v-if="v$.design.expected_budget.required.$invalid">expected budget is required.<br /> </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Category Content -->

                                                <!-- /Add Document -->
                                                <div class="title-content col-lg-6">
                                                    <div class="title-detail">
                                                        <h3>اضف صور لمشروع (اختياري)</h3>
                                                        <div class="custom-file">
                                                            <input @change="previewDesign" multiple type="file" class="custom-file-input">
                                                            <label class="custom-file-label"></label>
                                                        </div>
                                                        <p class="mb-0 text-danger">Size of the Document should be Below 2MB</p>
                                                    </div>
                                                </div>
                                                <!-- /Add Document -->

                                                <!-- /Add Document -->
                                                <div class="title-content col-lg-6">
                                                    <div class="title-detail">
                                                        <h3>اضف فديو لمشروع (اختياري)</h3>
                                                        <div class="custom-file">
                                                            <input @change="vedioDesign"  type="file" class="custom-file-input">
                                                            <label class="custom-file-label"></label>
                                                        </div>
                                                        <p class="mb-0 text-danger">Size of the Document should be Below 15MB(mp4,webm)</p>
                                                    </div>
                                                </div>
                                                <!-- /Add Document -->

                                                <!-- Project Title -->
                                                <div class="title-content pb-0 col-lg-12">
                                                    <div class="title-detail">
                                                        <h3>تفاصيل المشروع </h3>
                                                        <div class="form-group mb-0">
                                                            <textarea
                                                                class="form-control"
                                                                rows="5"
                                                                v-model="v$.design.description.$model"
                                                            ></textarea>
                                                            <div v-if="v$.design.description.$error">
                                                                <span class="text-danger" v-if="v$.design.description.required.$invalid">description is required.<br /> </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <div class="btn-item">
                                                        <button type="submit" class="btn next-btn">نشر المشروع عالي العام</button>

                                                        <button type="button" class="btn next-btn send">ارسل المشروع لديزاينر محدد</button>
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
    </div>
    <!-- /Page Content -->
</template>

<script>
import Sidebar from "../../../components/web/sidebar";
import {computed, inject, onMounted, reactive, ref,toRefs} from 'vue';
import webApi from "../../../api/webAxios";
import {alphaNum, between, integer, maxLength, numeric, required} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";

export default {
    name: "addProject",
    components: {
        Sidebar
    },
    setup(){

        let loading2 = ref(false);
        let show = ref(false);
        const emitter = inject('emitter');
        let budgets = ref([]);
        let unities = ref([]);
        let architecturals = ref([]);

        let getService = () => {
            loading2.value = true;

            webApi.get(`/v1/web/getProject`)
                .then((res) => {
                    let l =res.data.data;
                    budgets.value = l.Budgets;
                    unities.value = l.unities;
                    architecturals.value = l.architecturals;
                })
                .catch((err) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'يوجد خطا في النظام...',
                        text: 'يرجا اعاده تحميل الصفحه و المحاوله مره اخري !',
                    });
                })
                .finally(() => {
                    loading2.value = false;
                });
        };

        //start advertiser
        let data =  reactive({
            company:{
                name: '',
                area: '',
                height: '',
                room: '',
                bathroom:'',
                description: "",
                unity: null,
                architectural: null,
                expected_budget: null,
                files:[],
                vedio:{}
            },
            design: {
                name: '',
                area: '',
                height: '',
                room: '',
                bathroom:'',
                description: "",
                unity: null,
                architectural: null,
                expected_budget: null,
                files:[],
                vedio:{}
            }
        });

        const rules = computed(() => {
            return {
                company: {
                    name: {
                        required,maxLength:maxLength(100)
                    },
                    area: {
                        required, numeric
                    },
                    height: {
                       required, numeric
                    },
                    room: {
                         required, integer
                    },
                    bathroom: {
                        required, integer
                    },
                    description: {
                        required
                    },
                    unity: {
                        required
                    },
                    architectural: {
                        required
                    },
                    expected_budget: {
                        required
                    }
                },
                design: {
                    name: {
                        required,maxLength:maxLength(100)
                    },
                    area: {
                        required, numeric
                    },
                    height: {
                        required, numeric
                    },
                    room: {
                        required, integer
                    },
                    bathroom: {
                        required, integer
                    },
                    description: {
                        required
                    },
                    unity: {
                        required
                    },
                    architectural: {
                        required
                    },
                    expected_budget: {
                        required
                    }
                }
            }
        });

        const v$ = useVuelidate(rules,data);

        let previewCompany = (e) => {

            data.company.files = [];

            for(let i of e.target.files){
                data.company.files.push(i);
            }
        }

        let previewDesign = (e) => {

            data.design.files = [];

            for(let i of e.target.files){
                data.design.files.push(i);
            }
        }

        let vedioCompany = (e) => {

            data.company.vedio = {};

            data.company.vedio = e.target.files[0];
        }

        let vedioDesign = (e) => {

            data.design.vedio = {};

            data.design.vedio = e.target.files[0];
        }

        onMounted(() => {
            getService();
        });

        emitter.on('get_lang_web', () => {
            getService();
        });


       return {vedioCompany,vedioDesign,previewCompany,previewDesign,loading2,show,v$,...toRefs(data),budgets,unities,architecturals};
    },
    methods: {
       designProject() {

          this.v$.design.$validate();

          if(!this.v$.design.$error){

              Swal.fire({
                  title: 'هل انت متاكد من البيانات ؟',
                  icon: 'info',
                  showCancelButton: true,
                  confirmButtonColor: '#fcb00c',
                  cancelButtonColor: '#000',
                  confirmButtonText: 'موافق',
                  cancelButtonText: 'رجوع',
              }).then((result) => {

                  if (result.isConfirmed) {

                      let formData = new FormData();
                      this.loading2 = true;

                      formData.append('name',this.design.name);
                      formData.append('area',this.design.area);
                      formData.append('height',this.design.height);
                      formData.append('room',this.design.room);
                      formData.append('bathroom',this.design.bathroom);
                      formData.append('description',this.design.description);
                      formData.append('unity',this.design.unity);
                      formData.append('architectural',this.design.architectural);
                      formData.append('expected_budget',this.design.expected_budget);
                      for( var i = 0; i < this.design.files.length; i++ ){
                          let file = this.design.files[i];
                          formData.append('files[' + i + ']', file);
                      }
                      formData.append('vedio',this.design.vedio);

                      webApi.post(`/v1/web/addDesign`,formData)
                          .then((res) => {

                              Swal.fire(
                                  'تم الاضافه بنجاح',
                                  'تم اضافه المشروع بنجاح .',
                                  'نجاح'
                              );

                              this.resetDesign();

                          })
                          .catch((err) => {

                              if(err.response.data.errors.vedio){

                                  Swal.fire({
                                      icon: 'error',
                                      title: 'يوجد خطا في الفديو...',
                                      text: 'اقصي   حجم لافديو لايتعدي 15mb !'
                                  });

                              }else {

                                  Swal.fire({
                                      icon: 'error',
                                      title: 'يوجد خطا في الصور...',
                                      text: 'اقصي ارتفاع للصوره يكون 1000px و اقصي عرض 1000px و ان حجمها لا يتعدي 2mb !'
                                  });

                              }

                          }).finally(() => {
                                this.loading2 = false;
                          });

                  }

              });

          }
      },
       companyProject() {
          this.v$.company.$validate();

          if(!this.v$.company.$error){

              Swal.fire({
                  title: 'هل انت متاكد من البيانات ؟',
                  icon: 'info',
                  showCancelButton: true,
                  confirmButtonColor: '#fcb00c',
                  cancelButtonColor: '#000',
                  confirmButtonText: 'موافق',
                  cancelButtonText: 'رجوع',
              }).then((result) => {

                  if (result.isConfirmed) {

                      let formData = new FormData();
                      this.loading2 = true;

                      formData.append('name',this.company.name);
                      formData.append('area',this.company.area);
                      formData.append('height',this.company.height);
                      formData.append('room',this.company.room);
                      formData.append('bathroom',this.company.bathroom);
                      formData.append('description',this.company.description);
                      formData.append('unity',this.company.unity);
                      formData.append('architectural',this.company.architectural);
                      formData.append('expected_budget',this.company.expected_budget);
                      for( var i = 0; i < this.company.files.length; i++ ){
                          let file = this.company.files[i];
                          formData.append('files[' + i + ']', file);
                      }
                      formData.append('vedio',this.company.vedio);

                      webApi.post(`/v1/web/addCompany`,formData)
                          .then((res) => {

                              Swal.fire(
                                  'تم الاضافه بنجاح',
                                  'تم اضافه المشروع بنجاح .',
                                  'نجاح'
                              );

                              this.resetCompany();

                          })
                          .catch((err) => {

                              if(err.response.data.errors.vedio){

                                  Swal.fire({
                                      icon: 'error',
                                      title: 'يوجد خطا في الفديو...',
                                      text: 'اقصي   حجم لافديو لايتعدي 15mb !'
                                  });

                              }else {

                                  Swal.fire({
                                      icon: 'error',
                                      title: 'يوجد خطا في الصور...',
                                      text: 'اقصي ارتفاع للصوره يكون 1000px و اقصي عرض 1000px و ان حجمها لا يتعدي 2mb !'
                                  });

                              }

                          }).finally(() => {
                            this.loading2 = false;
                         });

                  }

              });

          }
      },
       resetCompany() {
           this.company.name = '';
           this.company.area = '';
           this.company.height = '';
           this.company.room = '';
           this.company.bathroom = '';
           this.company.description = '';
           this.company.unity = 0;
           this.company.architectural = 0;
           this.company.expected_budget = 0;
           this.company.files = [];
           this.company.vedio = {};
       },
       resetDesign() {
            this.design.name = '';
            this.design.area = '';
            this.design.height = '';
            this.design.room = '';
            this.design.bathroom = '';
            this.design.description = '';
            this.design.unity = 0;
            this.design.architectural = 0;
            this.design.expected_budget = 0;
            this.design.files = [];
            this.design.vedio = {};
        }
    },
    beforeRouteEnter(to, from,next) {
        let trust = parseInt(JSON.parse(localStorage.getItem('partner')).trust);
        if(trust){
            return next();
        }else{
            return next({name:'dashboardClient',params:{lang:localStorage.getItem('langWeb') || 'ar'}});
        }
    }
}
</script>

<style scoped>
.title-content{
    margin-bottom: 4%;
}

.custom-file-label::after{
    width: 100px !important;
    background-color:  #fcb00c;
    color: #fff;
}

.title-content h3 {
    font-weight: 600;
    font-size: 16px;
    margin-bottom: 15px;
    color: #161c2d;
}

input::placeholder,input::-webkit-input-placeholder{
    color: #8C8C8C;
}

input:focus, select:focus , textarea:focus{
    box-shadow: 0px 0px 8px -2px #fcb00c;
    border: 1px solid #fcb00c;
}

.user-tabs {
    width: 50% !important;
}

.nav-justified .nav-item, .nav-justified >.nav-link{
    margin: 0 2px
}

.next-btn {
    margin: 0 1px;
    padding: 10px 15px;
    font-weight: 500;
    font-size: 16px;
    margin-bottom: 5px;
}

.send {
    background-color: transparent;
    color: #fcb00c;
}

.btn-item-custom {
    margin: 0 1px;
    padding: 10px 15px;
    font-weight: 500;
    font-size: 13px;
    margin-bottom: 50px;
    background-color: transparent;
    color: #fcb00c;
}

.btn-item-custom:hover {
    color: #fff;
    background-color: #fcb00c;
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
</style>
