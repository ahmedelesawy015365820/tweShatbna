<template>
    <!-- Page Content -->
    <div class="content">
        <loader v-if="loading" />
        <div class="container-fluid">
            <div class="row justify-content-center">

                <div class="error-trust alert-danger">
                    يجب عليك توثيق حسابك لعرض مشاريع العملاء عليك
                </div>

                <div class="trust> col-10" >
                    <div class="row">
                        <router-link class="btn main-page" :to="{name:'dashboardCompany',params:{lang:this.$i18n.locale}}">
                            العوده للرئيسية
                        </router-link>
                        <ul class="col-12">
                            <div class="row justify-content-center">

                                <li class="col-lg-4  col-sm-6">
                                    <div class="text-center">
                                        <i :class="['fas','fa-check-circle',step <= 4 ?'active' : '']"></i>
                                        <h4 :class="['step-text',step <= 4 ?'active' : '']">تاكيد الهويه</h4>
                                    </div>
                                </li>

                                <li :class="['col-lg-4','col-sm-6','wazard1',(step > 1 && this.$i18n.locale == 'ar') ?'active' : '',(step > 1 && this.$i18n.locale != 'ar') ?'active-en' : '']">
                                    <div class="text-center">
                                        <i :class="['fas','fa-money-check',(step > 1 && step <= 4)?'active' : '']"></i>
                                        <h4 :class="['step-text',(step > 1 && step <= 4)?'active' : '']">الحساب البنكي</h4>
                                    </div>
                                </li>

                                <li :class="['col-lg-4' ,'col-sm-6' ,'wazard2',(step > 2 && this.$i18n.locale == 'ar')?'active' : '',(step > 2 && this.$i18n.locale != 'ar') ?'active-en' : '']">
                                    <div class="text-center">
                                        <i :class="['fas','fa-user-cog',(step > 2 && step <= 4)?'active' : '']"></i>
                                        <h4 :class="['step-text',(step > 2 && step <= 3)?'active' : '']">معلومات عن الشركة</h4>
                                    </div>
                                </li>


                            </div>
                        </ul>

                        <div class="col-12">
                            <div class="form">
                                <form @submit.prevent="step3Resault" enctype="multipart/form-data">
                                    <div class="row justify-content-center">

                                        <div :class="['col-lg-10',step == 1?'active' : '']">
                                            <h3 class="know-you">توثيق الهوية</h3>
                                            <div class="form-row justify-content-center">

                                                <div class="col-lg-4 text-center">

                                                    <label class="text-center d-block">قم برفع صورة للسجل التجاري لتوثيق الهوية تظهر فيها جميع المعلومات واضحة</label>
                                                    <div class="btn btn-outline-primary waves-effect">
                                                    <span>
                                                        Choose files
                                                        <i class="fas fa-cloud-upload-alt ml-3" aria-hidden="true"></i>
                                                    </span>
                                                        <input
                                                            required
                                                            type="file"
                                                            id="mediaPackage1"
                                                            accept="image/*"
                                                            @change="preview1"
                                                        >
                                                    </div>
                                                    <p class="num-of-files">{{numberOfImage1 ? numberOfImage1 + ' Files Selected' : 'No Files Chosen' }}</p>
                                                    <div class="container-images" id="container-images-1" v-show="numberOfImage1"></div>
                                                </div>

                                                <div class="col-lg-4 text-center">
                                                    <label class="text-center d-block">قم برفع صورة البطاقة الضريبية لتوثيق الهوية تظهر فيها جميع المعلومات واضحة</label>
                                                    <div class="btn btn-outline-primary waves-effect">
                                                    <span>
                                                        Choose files
                                                        <i class="fas fa-cloud-upload-alt ml-3" aria-hidden="true"></i>
                                                    </span>
                                                        <input
                                                            required
                                                            type="file"
                                                            id="mediaPackage2"
                                                            accept="image/*"
                                                            @change="preview2"
                                                        >
                                                    </div>
                                                    <p class="num-of-files">{{numberOfImage2 ? numberOfImage2 + ' Files Selected' : 'No Files Chosen' }}</p>
                                                    <div class="container-images" id="container-images-2" v-show="numberOfImage2"></div>
                                                </div>

                                            </div>
                                            <div class="row justify-content-between">
                                                <button
                                                    type="button"
                                                    class="btn next add"
                                                    @click="step1Func"
                                                    :disabled="!numberOfImage1 || !numberOfImage2"
                                                >
                                                    التالي
                                                </button>
                                            </div>
                                        </div>

                                        <div :class="['col-lg-7', step == 2?'active' : '']">
                                            <h3 class="know-you">بيانات الحسابات البنكيه</h3>

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
                                                <button type="button" @click="step1FuncBack1" class="btn back">السابق</button>
                                                <button type="button" @click="step2Func" class="btn next">التالي</button>
                                            </div>
                                        </div>

                                        <div :class="['col-lg-10',step == 3?'active' : '']">
                                            <div>
                                                <div class="form-row">
                                                    <h3 class="know-you col-12">معلومات اضافية .</h3>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="validationServer05">اختر خدمات شركات التشطيبات</label>
                                                        <select
                                                            class="custom-select form-control"
                                                            multiple id="validationServer05"
                                                            v-model="v$.info.nameService.$model"
                                                        >
                                                            <option selected disabled>اختار...</option>
                                                            <option :value="service.id" v-for="service in services">{{service.name}}</option>
                                                        </select>
                                                        <div v-if="v$.info.nameService.$error">
                                                            <span class="text-danger" v-if="v$.info.nameService.required.$invalid">Degree is required.<br /> </span>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mb-3 positionTextarea">
                                                        <span class="spaceLength">{{350 - info.vision.length}}</span>
                                                        <label for="validationTextarea1">الرؤيه</label>
                                                        <textarea
                                                            class="form-control"
                                                            rows="5" id="validationTextarea1"
                                                            placeholder="مطلوب *"
                                                            maxlength="350"
                                                            v-model.trim="v$.info.vision.$model"
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
                                                            v-model.trim="v$.info.message.$model"
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
                                                            v-model.trim="v$.info.strategy.$model"
                                                        >
                                                        </textarea>
                                                        <div v-if="v$.info.strategy.$error">
                                                            <span class="text-danger" v-if="v$.info.strategy.required.$invalid">strategy is required.<br /> </span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row justify-content-between">
                                                    <button type="button" @click="step1FuncBack2" class="btn back">السابق</button>
                                                    <button type="submit"  class="btn next">ارسال</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
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
import {computed, inject, onMounted, reactive, ref, toRefs} from "vue";
import {alphaNum, between, integer, maxLength, minLength, required} from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";
import webApi from "../../../api/webAxios";

export default {
    name: "trust",
    setup(){

        const emitter = inject('emitter');

        let loading = ref(false);
        const numberOfImage1 = ref(0);
        const numberOfImage2 = ref(0);

        const step =  ref(1);

        let preview1 = (e) => {

            let containerImages = document.querySelector('#container-images-1');
            containerImages.innerHTML = '';
            numberOfImage1.value = e.target.files.length;

            data.bank.file1 =  e.target.files[0];

            for(let i of e.target.files){

                let reader = new FileReader();

                let figure = document.createElement('figure');
                figure.setAttribute('class','single');

                let figcap = document.createElement('figcaption');

                figcap.innerText = i.name;
                figure.appendChild(figcap);

                reader.onload = () => {
                    let img = document.createElement('img');
                    img.setAttribute('src',reader.result);
                    figure.insertBefore(img,figcap);
                }

                containerImages.appendChild(figure);
                reader.readAsDataURL(i);

            }

        }

        let preview2 = (e) => {

            let containerImages = document.querySelector('#container-images-2');
            containerImages.innerHTML = '';
            numberOfImage2.value = e.target.files.length;
            data.bank.file2 = e.target.files[0];

            for(let i of e.target.files){

                let reader = new FileReader();
                let figure = document.createElement('figure');
                figure.setAttribute('class','single');

                let figcap = document.createElement('figcaption');

                figcap.innerText = i.name;
                figure.appendChild(figcap);

                reader.onload = () => {
                    let img = document.createElement('img');
                    img.setAttribute('src',reader.result);
                    figure.insertBefore(img,figcap);
                }

                containerImages.appendChild(figure);
                reader.readAsDataURL(i);

            }

        }

        let step1Func = () =>{step.value = 2;}
        let step1FuncBack1 = () =>{step.value = 1;}
        let step1FuncBack2 = () =>{step.value = 2;}

        //start advertiser
        let data =  reactive({
            bank:{
                name: '',
                address: '',
                iban: '',
                swift: '',
                file1:{},
                file2:{},
            },
            info: {
                nameService:[],
                vision: '',
                message: '',
                strategy: ''
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
                info: {
                    nameService:{required},
                    vision: {required},
                    message: {required},
                    strategy: {required},
                }
            }
        });

        const v$ = useVuelidate(rules,data);

        const services = ref([]);

        let getService = () => {
            loading.value = true;

            webApi.get(`/v1/web/companyService`)
                .then((res) => {
                    let l =res.data.data;
                    services.value = l.services;
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

        onMounted(() => {
            getService();
        });

        emitter.on('get_lang_web', () => {
            getService();
        });

        return {loading,services,...toRefs(data),numberOfImage1,numberOfImage2,preview1,preview2,step,step1Func,step1FuncBack1,step1FuncBack2,v$}
    },
    methods: {
        step2Func (){
            this.v$.bank.$validate();

            if(!this.v$.bank.$error){
                this.step = 3;
            }
        },
        step3Resault (){

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

                        let formData = new FormData();
                        this.loading = true;

                        formData.append('name',this.bank.name);
                        formData.append('address',this.bank.address);
                        formData.append('iban',this.bank.iban);
                        formData.append('swift',this.bank.swift);
                        formData.append('files[0]',this.bank.file1);
                        formData.append('files[1]',this.bank.file2);
                        formData.append('vision',this.info.vision);
                        formData.append('message',this.info.message);
                        formData.append('strategy',this.info.strategy);
                        formData.append('nameService[]',this.info.nameService);

                        webApi.post(`/v1/web/trustCompanyOne`,formData)
                            .then((res) => {

                                Swal.fire(
                                    'تم الاضافه بنجاح',
                                    'سيتم مراجعه ملفك و سنرسل رساله الي البريد الالكتروني بعد الانتهاء من المراجعه .',
                                    'نجاح'
                                );

                                setTimeout(() => {
                                    return this.$router.push({name:'dashboardCompany',params:{lang:this.$i18n.locale}});
                                },1000);

                            })
                            .catch((err) => {

                                console.log(err.response.data)
                                if(err.response.data.errors.error == 'image'){

                                    this.step = 1;
                                    this.button = false;
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'يوجد خطا في الصور...',
                                        text: 'اقصي ارتفاع للصوره يكون 1000px و اقصي عرض 1000px و ان حجمها لا يتعدي 2mb !'
                                    });

                                }else {

                                    Swal.fire({
                                        icon: 'error',
                                        title: 'يوجد خطا في النظام...',
                                        text: 'يرجا اعاده تحميل الصفحه و المحاوله مره اخري !',
                                    });

                                }

                            }).finally(() => {
                                this.loading = false;
                            });

                    }

                });

            }
        }
    },
    beforeRouteEnter(to, from,next) {
        let send = parseInt(JSON.parse(localStorage.getItem('partner')).send);
        if(!send){
            return next();
        }else{
            return next({name:'dashboardCompany',params:{lang:localStorage.getItem('langWeb') || 'ar'}});
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

.error-trust{
    margin: 0 auto;
    position: absolute;
    top: 0px;
    transform: translate(0%, 65%);
    padding: 10px;
    text-align: center;
    width: 43%;
}

.main-page{
    border-radius: 5px;
    width: 131px;
    margin-bottom: 30px;
    padding: 10px 0;
    color: #fff;
    font-weight: 600;
    text-align: center;
    background-color: #000;
    transition: all .4s;
}
.main-page:hover{
    background-color: #fcb00c;
}


.fa-user-cog, .fa-cogs , .fa-check-circle, .fa-money-check{
    font-size: 40px;
    padding: 20px;
    border: 1px solid;
    border-radius: 37px 10px 37px 10px;
    color: #919191;
    transition: all .3s ease-in-out;
}

.fa-user-cog.active, .fa-cogs.active , .fa-check-circle.active, .fa-money-check.active{
    color: #fcb00c;
}

.step-text{
    margin-top: 14px;
    color: #919191;
    transition: all .3s ease-in-out;
    user-select: none;
    margin-bottom: 20px;
}
.step-text.active{
    color: #fcb00c;
}

.form{
    margin: 70px 0 0;
    padding: 0 40px;
}
.form form .row > div{
    display: none;
}
.form .active{
    display: block !important;
    animation: fade .8s normal ease-in-out;
}

@keyframes fade {
    from{
        opacity: 0;
    }
    to{
        opacity: 1;
    }
}

.form-check {
    margin-top: 10px;
    padding: 0;
}
.form-check-input[type=checkbox]{
    margin: 15px 0px 0 0;
}
.form-check-label{
    margin: 10px 22px 0;
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
.next.add{
    margin: 50px 20px 20px;
}

.back{
    width: 100px;
    background: #10100fab;
    color: #fff;
    margin: 20px;
    font-weight: 600;
    text-align: center;
    transition: all .3s ease-in-out;
}

.know-you{
    margin-bottom: 25px;
}

.next:hover{
    background-color: #fcb00c;
}
.back:hover{
    background-color: #000;
}

.wazard1,.wazard2{
    position: relative;
}

.wazard1::before,.wazard2::before,.wazard3::before{
    content: '';
    position: absolute;
    top: 32%;
    display: none;
    height: 10px;
    border-radius: 4px;
}
.wazard1::after,.wazard2::after,.wazard3::after{
    content: '';
    position: absolute;
    top: 28%;
    display: none;
    height: 10px;
    border-radius: 4px;
}

.wazard1.active::before,.wazard2.active::before, .wazard3.active::before{
    background-color: #fcb00c;
    display: block;
}
.wazard1.active-en::after,.wazard2.active-en::after, .wazard3.active-en::after{
    background-color: #fcb00c;
    display: block;
}

.wazard1::before{
    left: 66%;
    width: 70%;
}
.wazard2::before{
    left: 66%;
    width: 68%;
}
.wazard3::before {
    left: 66%;
    width: 68%;
}

.wazard1::after{
    right: 66%;
    width: 70%;
}
.wazard2::after{
    right: 66%;
    width: 68%;
}
.wazard3::after {
    right: 22.2%;
    width: 14%;
    top: 18%;
}


.waves-effect {
    position: relative;
    overflow: hidden;
    cursor: pointer;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
    width: 200px;
    height: 50px;
    text-align: center;
    line-height: 34px;
}

input[type="file"] {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    padding: 0;
    margin: 0;
    cursor: pointer;
    filter: alpha(opacity=0);
    opacity: 0;
}

.num-of-files{
    text-align: inherit;
    margin: 20px 48px 30px;

}

.container-images{
    width: 90%;
    position: relative;
    margin: auto;
    display: flex;
    justify-content: space-evenly;
    gap: 20px;
    flex-wrap: wrap;
    padding: 10px;
    border-radius: 20px;
    background-color: #f7f7f7;
    left: 20px;
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

.positionTextarea{
    position: relative;
}

.spaceLength{
    position: absolute;
    top: 132px;
    left: 25px;
    font-size: 19px;
}

@media only screen and (max-width: 1150px){
    .wazard1::before{
        left: 69%;
        width: 63%;
    }
    .wazard2::before{
        left: 70%;
        width: 60%;
    }
    .wazard3::before {
        left: 69%;
        width: 61%
    }

    .wazard1::after{
        right: 69%;
        width: 63%;
    }
    .wazard2::after{
        right: 70%;
        width: 60%;
    }
    .wazard3::after {
        right: 22.66%;
        width: 12.78%;
    }
}

@media only screen and (max-width: 1030px){
    .wazard1::before{
        left: 72%;
        width: 58%;
    }
    .wazard2::before{
        left: 72%;
        width: 56%;
    }
    .wazard3::before {
        left: 72%;
        width: 56%
    }

    .wazard1::after{
        right: 72%;
        width: 58%;
    }
    .wazard2::after{
        right: 72%;
        width: 56%;
    }
    .wazard3::after {
        right: 23.18%;
        width: 11.78%;
    }
}

@media only screen and (max-width: 992px){
    .wazard1::before,.wazard2::before,.wazard3::before {
        display: none !important;
    }
    .wazard1::after,.wazard2::after,.wazard3::after {
        display: none !important;
    }
    .main-page {
        width: 110px;
        font-size: 11px;
    }
}

@media only screen and (max-width: 630px){
    .main-page {
        margin-top: 30px;
    }
}

</style>
