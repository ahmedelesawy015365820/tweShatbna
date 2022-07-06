<template>
    <!-- Page Content -->
    <div class="content">
        <loader v-if="loading" />

        <div class="container-fluid">
            <div class="row justify-content-center">

                <!-- sidebar -->
                <Sidebar />
                <!-- /sidebar -->

                <div class="col-xl-9 col-md-8" >

                    <div class="dashboard-sec" >
                        <div class="row">

                            <!--   subject degree   -->
                            <div class="col-12">
                                <div class="all">
                                    <form @submit.prevent="infoStore">
                                        <h3 class="know-you">معلومات عنك .</h3>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationServer05">قم بتسجيل الدرجه العلميه</label>
                                                <select
                                                    class="custom-select form-control"
                                                    multiple id="validationServer05"
                                                    v-model="v$.person.nameService.$model"
                                                >
                                                    <option selected disabled>اختار...</option>
                                                    <option v-for="service in services" :value="service.id">
                                                        {{ service.name }}
                                                    </option>
                                                </select>
                                                <div v-if="v$.person.nameService.$error">
                                                    <span class="text-danger" v-if="v$.person.nameService.required.$invalid">Degree is required.<br /> </span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="validationServer04">اختر خدمات الديزاير</label>
                                                <select class="custom-select form-control"
                                                        multiple id="validationServer04"
                                                        v-model="v$.person.nameDegree.$model"
                                                >
                                                    <option selected disabled >اختار...</option>
                                                    <option v-for="degree in degrees" :value="degree.id">
                                                        {{ degree.name }}
                                                    </option>
                                                </select>
                                                <div v-if="v$.person.nameDegree.$error">
                                                    <span class="text-danger" v-if="v$.person.nameDegree.required.$invalid">bank name is required.<br /> </span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom01">اسم مجال الدراسه</label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="(كليه تجاره- علوم -حقوق - هندسه)"
                                                    id="validationCustom01"
                                                    v-model="v$.person.subject.$model"
                                                >
                                                <div v-if="v$.person.subject.$error">
                                                    <span class="text-danger" v-if="v$.person.subject.required.$invalid">subject is required.<br /> </span>
                                                    <span class="text-danger" v-if="v$.person.subject.maxLength.$invalid">subject is must have at most {{ v$.person.subject.maxLength.$params.min }} letters. <br /></span>
                                                    <span class="text-danger" v-if="v$.person.subject.minLength.$invalid">subject is must have at least {{ v$.person.subject.minLength.$params.max }} letters.</span>
                                                </div>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom02">اضف سنوات الخبره</label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    id="validationCustom02"
                                                    v-model="v$.person.experience.$model"
                                                >
                                                <div v-if="v$.person.experience.$error">
                                                    <span class="text-danger" v-if="v$.person.experience.required.$invalid">experience is required.<br /> </span>
                                                    <span v-if="v$.person.experience.integer.$invalid">experience  is number. <br /></span>
                                                    <span class="text-danger" v-if="v$.person.experience.between.$invalid">must be between {{ v$.person.experience.between.$params.min }} and {{ v$.person.experience.between.$params.max }}</span>
                                                </div>
                                            </div>

                                            <div class=" col-12 mb-3 positionTextarea">
                                                <span class="spaceLength">{{350 - (person.description ? person.description.length : 0)}}</span>
                                                <label for="validationTextarea">وصف مجال الدراسه الخاص بك</label>
                                                <textarea
                                                    maxlength="350"
                                                    class="form-control"
                                                    rows="5" id="validationTextarea"
                                                    v-model="v$.person.description.$model"
                                                >
                                                        </textarea>
                                                <div v-if="v$.person.description.$error">
                                                    <span class="text-danger" v-if="v$.person.description.required.$invalid">description is required.<br /> </span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row justify-content-between">
                                            <button type="submit"  class="btn next">ارسال</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!--   info    -->
                            <div class="col-12">
                                <div class="all">
                                    <h3 class="know-you">معلومات اضافية .</h3>

                                    <form @submit.prevent="detailStore">
                                        <div class="form-row">
                                            <div class="col-12 mb-3 positionTextarea">
                                                <span class="spaceLength">{{350 - info.vision.length}}</span>
                                                <label for="validationTextarea1">الرؤيه</label>
                                                <textarea
                                                    class="form-control"
                                                    rows="5" id="validationTextarea1"
                                                    placeholder="مطلوب *"
                                                    maxlength="350"
                                                    required
                                                    v-model="v$.info.vision.$model"

                                                >
                                                        </textarea>
                                                <div v-if="v$.info.vision.$error">
                                                    <span class="text-danger" v-if="v$.info.vision.required.$invalid">vision is required.<br /> </span>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3 positionTextarea">
                                                <span class="spaceLength">{{350 - info.message.length}}</span>
                                                <label for="validationTextarea2">الرساله</label>
                                                <textarea
                                                    class="form-control"
                                                    maxlength="350"
                                                    rows="5" id="validationTextarea2"
                                                    placeholder="مطلوب *"
                                                    required
                                                    v-model="v$.info.message.$model"
                                                >
                                                        </textarea>
                                                <div v-if="v$.info.message.$error">
                                                    <span class="text-danger" v-if="v$.info.message.required.$invalid">message is required.<br /> </span>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-3 positionTextarea">
                                                <span class="spaceLength">{{350 - info.strategy.length}}</span>
                                                <label for="validationTextarea3">الاستراتيجيات</label>
                                                <textarea
                                                    maxlength="350"
                                                    class="form-control"
                                                    rows="5" id="validationTextarea3"
                                                    placeholder="مطلوب *"
                                                    required
                                                    v-model="v$.info.strategy.$model"
                                                >
                                                        </textarea>
                                                <div v-if="v$.info.strategy.$error">
                                                    <span class="text-danger" v-if="v$.info.strategy.required.$invalid">strategy is required.<br /> </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-between">
                                            <button type="submit"  class="btn next">ارسال</button>
                                        </div>
                                    </form>

                                </div>
                            </div>

                            <!--   bank    -->
                            <div class="col-12">
                                <div class="all">
                                    <h3 class="know-you">الحسابات البنكية .</h3>
                                    <div class="row">

                                        <div class="col-md-6" v-if="banks" v-for="(bank,key) in banks">
                                            <div class="bank">
                                                <span class="delete" @click="deleteBank(bank.id)" v-if="(banks.length > 1  && key > 0 )">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                                <i class="fas fa-university"></i><br>
                                                <span>{{bank.name}}</span><br>
                                                <span>{{ bank.iban }}.....</span>
                                            </div>
                                        </div>

                                        <div class="col-md-6" v-if="banks.length < 3">
                                            <div class="bank plus" @click="hide = !hide">
                                                <i class="fas fa-plus"></i><br>
                                                <span>اضافه بنك اخر</span><br>
                                            </div>
                                        </div>

                                        <transition name="fade">
                                            <div class="col-12" v-if="hide">
                                                <form @submit.prevent="bankStore">
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-8">
                                                            <div class="form-row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationServer01">اسم البنك</label>
                                                                    <input type="text"
                                                                           class="form-control"
                                                                           id="validationServer01"
                                                                           placeholder="مطلوب *"
                                                                           v-model.trim="v$.bank.name.$model"
                                                                           required
                                                                    >
                                                                    <div v-if="v$.bank.name.$error">
                                                                        <span class="text-danger" v-if="v$.bank.name.required.$invalid">bank name is required.<br /> </span>
                                                                        <span class="text-danger" v-if="v$.bank.name.maxLength.$invalid">bank name is must have at most {{ v$.bank.name.maxLength.$params.max }} letters.</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="address">عنوان فرع البنك</label>
                                                                    <input type="text"
                                                                           class="form-control"
                                                                           id="address"
                                                                           placeholder="مطلوب *"
                                                                           v-model.trim="v$.bank.address.$model"
                                                                           required
                                                                    >
                                                                    <div v-if="v$.bank.address.$error">
                                                                        <span class="text-danger" v-if="v$.bank.address.required.$invalid">address is required.<br /> </span>
                                                                        <span class="text-danger" v-if="v$.bank.address.maxLength.$invalid">address is must have at most {{ v$.bank.address.maxLength.$params.max }} letters.</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationServer0sjh">رقم الحساب البنكي IBAN</label>
                                                                    <input
                                                                        type="text"
                                                                        class="form-control"
                                                                        id="validationServer0sjh"
                                                                        placeholder="مطلوب *"
                                                                        v-model.trim="v$.bank.iban.$model"
                                                                        required
                                                                    >
                                                                    <div v-if="v$.bank.iban.$error">
                                                                        <span class="text-danger" v-if="v$.bank.iban.required.$invalid">iban is required.<br /> </span>
                                                                        <span class="text-danger" v-if="v$.bank.iban.alphaNum.$invalid">must be letters or numbers. </span>
                                                                        <span class="text-danger" v-if="v$.bank.iban.maxLength.$invalid">address is must have at most {{ v$.bank.iban.maxLength.$params.max }} letters.</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="validationServer02">سويفت كود</label>
                                                                    <input
                                                                        type="text"
                                                                        class="form-control"
                                                                        id="validationServer02"
                                                                        v-model.trim="v$.bank.swift.$model"
                                                                    >
                                                                    <div v-if="v$.bank.swift.$error">
                                                                        <span class="text-danger" v-if="v$.bank.swift.alphaNum.$invalid">must be letters or numbers. </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row justify-content-between">
                                                                <button type="submit"  class="btn next">ارسال</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </transition>

                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="all">
                                    <h3 class="know-you">تغير كلمه المرور .</h3>

                                    <form @submit.prevent="editPassword">
                                        <div class="form-row" >

                                            <div class="col-md-7 mb-3">
                                                <label for="validationCustom0156">كلمه المرور القديمة</label>
                                                <input
                                                    type="password"
                                                    class="form-control"
                                                    placeholder="****************"
                                                    id="validationCustom0156"
                                                    v-model="v$.password.oldPassword.$model"
                                                >
                                                <div v-if="v$.password.oldPassword.$error">
                                                    <span class="text-danger" v-if="v$.password.oldPassword.required.$invalid">old password  is required.<br /> </span>
                                                </div>
                                            </div>

                                            <div class="col-md-7 mb-3">
                                                <label for="validationCustom015">كلمه المرور الجديده</label>
                                                <input
                                                    type="password"
                                                    class="form-control"
                                                    placeholder="****************"
                                                    id="validationCustom015"
                                                    v-model="v$.password.newPassword.$model"
                                                >
                                                <div v-if="v$.password.newPassword.$error">
                                                    <span class="text-danger" v-if="v$.password.newPassword.required.$invalid">new password is required.<br /> </span>
                                                    <span class="text-danger" v-if="v$.password.newPassword.alphaNum.$invalid">must be letters or numbers. <br /></span>
                                                    <span class="text-danger" v-if="v$.password.newPassword.minLength.$invalid">new password is must have at least {{ v$.password.newPassword.minLength.$params.min }} letters. <br /></span>
                                                    <span class="text-danger" v-if="v$.password.newPassword.maxLength.$invalid">new password is must have at most {{ v$.password.newPassword.maxLength.$params.max }} letters. </span>
                                                </div>
                                            </div>

                                            <div class="col-md-7 mb-3">
                                                <label for="validationCustom016">اعاده كلمه المرورالجديدة</label>
                                                <input
                                                    type="password"
                                                    class="form-control"
                                                    placeholder="****************"
                                                    id="validationCustom016"
                                                    v-model="v$.password.newRepeatPassword.$model"
                                                >
                                                <div v-if="v$.password.newRepeatPassword.$error">
                                                    <span class="text-danger" v-if="v$.password.newRepeatPassword.$invalid">repeat password is required.<br /> </span>
                                                    <span class="text-danger" v-if="v$.password.newRepeatPassword.sameAs.$invalid">repeat password other must match. <br /></span>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row justify-content-between">
                                            <button type="submit"  class="btn next">ارسال</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import Sidebar from '../../../components/web/sidebar';
import {computed, reactive,toRefs,ref,onMounted} from "vue";
import {alphaNum, between, integer, maxLength,sameAs, minLength, required} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import webApi from "../../../api/webAxios";

export default {
    name: "profile",
    components: {
        Sidebar
    },
    setup(){

        const hide = ref(false);
        const loading = ref(false);

        //start advertiser
        let data =  reactive({
            bank:{
                name: '',
                address: '',
                iban: '',
                swift: '',
            },
            person: {
                nameService: [],
                nameDegree: [],
                experience: 0,
                subject: '',
                description: '',
            },
            info: {
                vision: '',
                message: '',
                strategy: ''
            },
            password: {
                oldPassword: '',
                newPassword: '',
                newRepeatPassword: '',
            }
        });

        const rules = computed(() => {
            return {
                bank: {
                    name: {required,maxLength:maxLength(50)},
                    address: {required,maxLength:maxLength(150)},
                    iban: {required, alphaNum,maxLength:maxLength(150)},
                    swift: {alphaNum,maxLength:maxLength(150)}
                },
                person: {
                    nameService: {required},
                    nameDegree: {required},
                    experience: {required,integer,between:between(0,30)},
                    subject: {required,minLength:minLength(0),maxLength:maxLength(50)},
                    description: {required}
                },
                info: {
                    vision: {required},
                    message: {required},
                    strategy: {required},
                },
                password: {
                    oldPassword: {required},
                    newPassword: {required,alphaNum,minLength: minLength(8),maxLength:maxLength(16)},
                    newRepeatPassword: {required,sameAs:sameAs(data.password.newPassword)},
                }
            }
        });

        const v$ = useVuelidate(rules,data);

        let banks = ref([]);
        const getBanks = () =>{
            loading.value = true;
            webApi.get(`/v1/web/getBank`)
                .then((res) => {
                    let l =res.data.data;
                    banks.value = l.banks;
                })
                .catch((err) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'يوجد خطا في النظام...',
                        text: 'يرجا اعاده تحميل الصفحه و المحاوله مره اخري !',
                    });
                })
                .finally(() => {
                    loading.value = false;
                });
        };
        const deleteBank = (id) => {

            Swal.fire({
                title: 'هل انت متاكد من حذف هذا الحساب البنكي ؟',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#fcb00c',
                cancelButtonColor: '#000',
                confirmButtonText: 'موافق',
                cancelButtonText: 'رجوع',
            }).then((result) => {

                if (result.isConfirmed) {

                    loading.value = true;
                    webApi.post(`/v1/web/deleteBank/${id}`)
                        .then((res) => {
                            Swal.fire({
                                icon: 'success',
                                title: 'تم حذف  البيانات بنجاح .',
                                showConfirmButton: false,
                                timer: 1500
                            });

                            getBanks();
                        })
                        .catch((err) => {
                            console.log(err.response.data.errors);
                        })
                        .finally(() => {
                            loading.value = false;
                        });

                }

            });
        };

        const getDetail = () =>{
            webApi.get(`/v1/web/getDesignDetails`)
                .then((res) => {
                    let l =res.data.data.detail;
                    data.info.vision = l.vision;
                    data.info.message = l.message;
                    data.info.strategy = l.strategy;
                })
                .catch((err) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'يوجد خطا في النظام...',
                        text: 'يرجا اعاده تحميل الصفحه و المحاوله مره اخري !',
                    });
                })
        }

        let services = ref([]);
        let degrees = ref([]);
        const getInfo = () => {
            loading.value = true;
            webApi.get(`/v1/web/getInfo`)
                .then((res) => {
                    data.person.experience = res.data.data.info.experience;
                    data.person.description = res.data.data.info.description;
                    data.person.subject = res.data.data.info.subject;
                    res.data.data.degree.forEach((e) => {
                        data.person.nameDegree.push(e.id);
                    });
                    res.data.data.service.forEach((e) => {
                        data.person.nameService.push(e.id);
                    });
                    services.value = res.data.data.services;
                    degrees.value = res.data.data.degrees;
                })
                .catch((err) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'يوجد خطا في النظام...',
                        text: 'يرجا اعاده تحميل الصفحه و المحاوله مره اخري !',
                    });
                })
                .finally(() => {
                    loading.value = false;
                });
        }


        onMounted(() => {
            getBanks();
            getDetail();
            getInfo();
        });

        return {degrees,services,banks,getDetail,v$,...toRefs(data),hide,loading,getBanks,deleteBank};
    },
    methods:{
        bankStore() {
            this.v$.bank.$validate();
            if(!this.v$.bank.$error){

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

                        this.loading = true;
                        webApi.post(`/v1/web/storeBank`,this.bank)
                            .then((res) => {

                                this.getBanks();
                                this.hide = false;

                                Swal.fire(
                                    'تم الاضافه بنجاح',
                                    'تستطيع استقبال الاموال علي هذا الحساب .',
                                    'نجاح'
                                );

                                this.resetFromBank();
                                this.$nextTick(() => { this.v$.$reset() });

                            })
                            .catch((err) => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'يوجد خطا في النظام...',
                                    text: 'يرجا اعاده تحميل الصفحه و المحاوله مره اخري !',
                                });
                            })
                            .finally(() => {
                                this.loading = false;
                            });

                    }

                });

            }
        },
        detailStore() {
            this.v$.info.$validate();
            if(!this.v$.info.$error){

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

                        this.loading = true;
                        webApi.post(`/v1/web/storeDesignDetail`,this.info)
                            .then((res) => {

                                Swal.fire(
                                    'تم الاضافه بنجاح',
                                    'تم تغير المعلومات بنجاح .',
                                    'نجاح'
                                );

                            })
                            .catch((err) => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'يوجد خطا في النظام...',
                                    text: 'يرجا اعاده تحميل الصفحه و المحاوله مره اخري !',
                                });
                            })
                            .finally(() => {
                                this.loading = false;
                            });

                    }

                });

            }
        },
        infoStore(){
            this.v$.person.$validate();
            if(!this.v$.person.$error){
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

                        this.loading = true;
                        webApi.post(`/v1/web/storeInfo`,this.person)
                            .then((res) => {

                                Swal.fire(
                                    'تم الاضافه بنجاح',
                                    'تم تغير المعلومات بنجاح .',
                                    'نجاح'
                                );

                            })
                            .catch((err) => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'يوجد خطا في النظام...',
                                    text: 'يرجا اعاده تحميل الصفحه و المحاوله مره اخري !',
                                });
                            })
                            .finally(() => {
                                this.loading = false;
                            });

                    }

                });
            }
        },
        editPassword(){
            this.v$.password.$validate();
            if(!this.v$.password.$error){
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

                        this.loading = true;
                        webApi.post(`/v1/web/editPassword`,this.password)
                            .then((res) => {
                                Swal.fire(
                                    'تم الاضافه بنجاح',
                                    'تم تغير المعلومات بنجاح .',
                                    'نجاح'
                                );

                                this.resetFromPassword();
                                this.$nextTick(() => { this.v$.password.$reset() });

                            })
                            .catch((err) => {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'يوجد خطا ...',
                                    text: 'يوجد خطاء في الرقم السري القديم !',
                                });
                            })
                            .finally(() => {
                                this.loading = false;
                            });

                    }

                });
            }

        },
        resetFromBank(){
            this.bank.name = '';
            this.bank.address = '';
            this.bank.iban = '';
            this.bank.swift = '';
        },
        resetFromPassword(){
            this.password.oldPassword = '';
            this.password.newPassword = '';
            this.password.newRepeatPassword = '';
        }
    },
    beforeRouteEnter(to, from,next) {
        let trust = parseInt(JSON.parse(localStorage.getItem('partner')).trust);
        if(trust){
            return next();
        }else{
            return next({name:'dashboardDesign',params:{lang:localStorage.getItem('langWeb') || 'ar'}});
        }
    }
}
</script>

<style scoped>
.content {
    padding: 120px 0 30px;
    position: relative;
    min-height: 100vh;
}

.all{
    margin-bottom: 25px;
    padding: 30px;
    transition: all .4s;
}

.all:hover {
    box-shadow: 0px 0px 9px -4px #000;
}

.all h3{
    margin-bottom: 30px;
}

input::placeholder,input::-webkit-input-placeholder{
    color: #8C8C8C;
}

input:focus, select:focus , textarea:focus{
    box-shadow: 0px 0px 8px -2px #fcb00c;
    border: 1px solid #fcb00c;
}

.form-check-input:checked {
    background-color: #fcb00c;
    border-color: #fcb00c;
}

.next{
    width: 100px;
    background: #fdc650;
    color: #fff;
    margin: 20px;
    font-weight: 600;
    text-align: center;
    transition: all .3s ease-in-out;
}
.next:hover{
    background-color: #fcb00c;
}

.positionTextarea{
    position: relative;
}

.spaceLength{
    position: absolute;
    top: 132px;
    left: 25px;
    font-size: 19px;
}

.bank{
    padding: 19px 0;
    border: 1px dashed #fcb00c;
    text-align: center;
    background-color: #fbf7f7;
    margin-bottom: 20px;
    position: relative;
}

.bank i{
    font-size: 45px;
    color: #fcb00c;
    padding: 15px;
    border: 1px solid;
    border-radius: 50%;
    transition: all .5s;
}
.bank.plus{
    padding: 30px;
}
.bank.plus:hover{
    cursor: pointer;
    opacity: .7;
}
.bank .delete{
    position: absolute;
    top: 7px;
    left: 12px;
    width: 30px;
    height: 30px;
    border: 1px solid #fcb00c;
    line-height: 30px;
    border-radius: 50%;
    cursor: pointer;
}
.bank .delete:hover{
    background-color: #9d9999;
}

.bank .delete i{
    color: #fcb00c;
    font-size: 16px;
    padding: 0;
    border: none;
    transform: rotate(45deg);
}

.fade-enter-from, .fade-leave-to{
    opacity: 0;
}
.fade-enter-active,.fade-leave-active{
    transition:all 1s ease-in-out;
}

</style>
