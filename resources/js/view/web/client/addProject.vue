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
                                    <form>
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
                                                            <input type="text" class="form-control" placeholder="ضع عنوان للمشروع">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->

                                                <!-- Project Title -->
                                                <div class="title-content col-lg-6">
                                                    <div class="title-detail">
                                                        <h3>مساحه الوحده بالمتر</h3>
                                                        <div class="form-group mb-0">
                                                            <input type="text" class="form-control" placeholder="مساحه الوحده بالمتر">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->

                                                <!-- Project Title -->
                                                <div class="title-content col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>ارتفاع الوحده بالمتر</h3>
                                                        <div class="form-group mb-0">
                                                            <input type="text" class="form-control" placeholder="ارتفاع الوحده بالمتر">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->

                                                <!-- Project Title -->
                                                <div class="title-content col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>عدد غرف الوحدة</h3>
                                                        <div class="form-group mb-0">
                                                            <input type="text" class="form-control" placeholder="عدد غرف الوحدة">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->

                                                <!-- Project Title -->
                                                <div class="title-content col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>عدد الحمامات</h3>
                                                        <div class="form-group mb-0">
                                                            <input type="text" class="form-control" placeholder="عدد الحمامات">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->

                                                <!-- Category Content -->
                                                <div class="title-content col-md-6 col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>نوع الوحده</h3>
                                                        <div class="form-group mb-0">
                                                            <select  class="form-control select">
                                                                <option disabled>Select</option>
                                                                <option value="1">Apps Development</option>
                                                                <option value="2">UI Development</option>
                                                                <option value="3">Jaa</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Category Content -->

                                                <!-- Category Content -->
                                                <div class="title-content col-md-6 col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>اختار نوع الطراز المعماري لديك</h3>
                                                        <div class="form-group mb-0">
                                                            <select  class="form-control select">
                                                                <option disabled>Select</option>
                                                                <option value="1">Apps Development</option>
                                                                <option value="2">UI Development</option>
                                                                <option value="3">Jaa</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Category Content -->

                                                <!-- Category Content -->
                                                <div class="title-content col-md-6 col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>الميزانيه المتوقعه</h3>
                                                        <div class="form-group mb-0">
                                                            <select  class="form-control select">
                                                                <option disabled>Select</option>
                                                                <option value="1">Apps Development</option>
                                                                <option value="2">UI Development</option>
                                                                <option value="3">Jaa</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Category Content -->

                                                <!-- /Add Document -->
                                                <div class="title-content col-lg-6">
                                                    <div class="title-detail">
                                                        <h3>اضف صور لمشروع (اختياري)</h3>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input">
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
                                                            <input type="file" class="custom-file-input">
                                                            <label class="custom-file-label"></label>
                                                        </div>
                                                        <p class="mb-0 text-danger">Size of the Document should be Below 15MB</p>
                                                    </div>
                                                </div>
                                                <!-- /Add Document -->

                                                <!-- Project Title -->
                                                <div class="title-content pb-0 col-lg-12">
                                                    <div class="title-detail">
                                                        <h3>تفاصيل المشروع </h3>
                                                        <div class="form-group mb-0">
                                                            <textarea class="form-control summernote" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <div class="btn-item">
                                                        <button type="submit" class="btn next-btn">نشر المشروع عالي العام</button>

                                                        <button type="button" class="btn next-btn send">ارسل المشروع لشركة محدد</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Project Title -->

                                    </form>
                                </div>
                                <div role="tabpanel" id="design" :class="['tab-pane','fade']">
                                    <form>
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
                                                            <input type="text" class="form-control" placeholder="ضع عنوان للمشروع">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->

                                                <!-- Project Title -->
                                                <div class="title-content col-lg-6">
                                                    <div class="title-detail">
                                                        <h3>مساحه الوحده بالمتر</h3>
                                                        <div class="form-group mb-0">
                                                            <input type="text" class="form-control" placeholder="مساحه الوحده بالمتر">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->

                                                <!-- Project Title -->
                                                <div class="title-content col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>ارتفاع الوحده بالمتر</h3>
                                                        <div class="form-group mb-0">
                                                            <input type="text" class="form-control" placeholder="ارتفاع الوحده بالمتر">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->

                                                <!-- Project Title -->
                                                <div class="title-content col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>عدد غرف الوحدة</h3>
                                                        <div class="form-group mb-0">
                                                            <input type="text" class="form-control" placeholder="عدد غرف الوحدة">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->

                                                <!-- Project Title -->
                                                <div class="title-content col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>عدد الحمامات</h3>
                                                        <div class="form-group mb-0">
                                                            <input type="text" class="form-control" placeholder="عدد الحمامات">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Project Title -->

                                                <!-- Category Content -->
                                                <div class="title-content col-md-6 col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>نوع الوحده</h3>
                                                        <div class="form-group mb-0">
                                                            <select  class="form-control select">
                                                                <option disabled>Select</option>
                                                                <option value="1">Apps Development</option>
                                                                <option value="2">UI Development</option>
                                                                <option value="3">Jaa</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Category Content -->

                                                <!-- Category Content -->
                                                <div class="title-content col-md-6 col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>اختار نوع الطراز المعماري لديك</h3>
                                                        <div class="form-group mb-0">
                                                            <select  class="form-control select">
                                                                <option disabled>Select</option>
                                                                <option value="1">Apps Development</option>
                                                                <option value="2">UI Development</option>
                                                                <option value="3">Jaa</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Category Content -->

                                                <!-- Category Content -->
                                                <div class="title-content col-md-6 col-lg-4">
                                                    <div class="title-detail">
                                                        <h3>الميزانيه المتوقعه</h3>
                                                        <div class="form-group mb-0">
                                                            <select  class="form-control select">
                                                                <option disabled>Select</option>
                                                                <option value="1">Apps Development</option>
                                                                <option value="2">UI Development</option>
                                                                <option value="3">Jaa</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /Category Content -->

                                                <!-- /Add Document -->
                                                <div class="title-content col-lg-6">
                                                    <div class="title-detail">
                                                        <h3>اضف صور لمشروع (اختياري)</h3>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input">
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
                                                            <input type="file" class="custom-file-input">
                                                            <label class="custom-file-label"></label>
                                                        </div>
                                                        <p class="mb-0 text-danger">Size of the Document should be Below 15MB</p>
                                                    </div>
                                                </div>
                                                <!-- /Add Document -->

                                                <!-- Project Title -->
                                                <div class="title-content pb-0 col-lg-12">
                                                    <div class="title-detail">
                                                        <h3>تفاصيل المشروع </h3>
                                                        <div class="form-group mb-0">
                                                            <textarea class="form-control summernote" rows="5"></textarea>
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
import {onMounted,ref} from 'vue';

export default {
    name: "addProject",
    components: {
        Sidebar
    },
    setup(){

        let loading2 = ref(false);
        let show = ref(false);


        let  summernote = () => {
            // Summernote

            $('.summernote').summernote({
                height: 400,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: false ,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]			// set focus to editable area after initializing summernote
            });
        }

        onMounted(() => {
            summernote();
        });


       return {loading2,show};
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
