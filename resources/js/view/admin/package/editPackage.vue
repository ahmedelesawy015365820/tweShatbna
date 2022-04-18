<template>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Package</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'package', params: {lang: locale || 'ar'}}">{{$t('dashboard.Dashboard')}}</router-link></li>
                            <li class="breadcrumb-item active">Edit Package</li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- /Page Header -->
            <!-- Table -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <loader v-if="loading" />
                        <div class="card-body">
                            <div class="card-header pt-0 mb-4">
                                <router-link
                                    :to="{name: 'package', params: {lang: locale || 'ar'}}"
                                    class="btn btn-custom btn-dark"
                                >
                                    back
                                </router-link>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <form @submit.prevent="editPackage" class="needs-validation">
                                        <div class="form-row row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom01">Name En</label>
                                                <input type="text" class="form-control"
                                                       v-model.trim="v$.translations[1].name.$model"
                                                       id="validationCustom01"
                                                       name="name_en"
                                                       placeholder="Name En"
                                                       :class="{'is-invalid':v$.translations[1].name.$error,'is-valid':!v$.translations[1].name.$invalid}"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="!v$.translations[1].name.required.$invalid">name en is required. <br></span>
                                                    <span v-if="!v$.translations[1].name.minLength.$invalid">name en is must have at least {{ v$.translations[1].name.minLength.$params.min }} letters. <br></span>
                                                    <span v-if="!v$.translations[1].name.maxLength.$invalid">name en is must have at least {{ v$.translations[1].name.maxLength.$params.max }} letters. <br></span>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom02">Name Ar</label>
                                                <input type="text"
                                                       class="form-control"
                                                       name="name_ar"
                                                       v-model.trim="v$.translations[0].name.$model"
                                                       id="validationCustom02"
                                                       :class="{'is-invalid':v$.translations[0].name.$error,'is-valid':!v$.translations[0].name.$invalid}"
                                                       placeholder="Name Ar"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="!v$.translations[0].name.required.$invalid">name en is required. <br></span>
                                                    <span v-if="!v$.translations[0].name.minLength.$invalid">name en is must have at least {{ v$.translations[0].name.minLength.$params.min }} letters.<br> </span>
                                                    <span v-if="!v$.translations[0].name.maxLength.$invalid">name en is must have at least {{ v$.translations[0].name.maxLength.$params.max }} letters.<br> </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom04">Period</label>
                                                <input type="number"
                                                       class="form-control"
                                                       v-model.number.lazy="v$.period.$model"
                                                       id="validationCustom04"
                                                       name="period"
                                                       placeholder="Period"
                                                       :class="{'is-invalid':v$.period.$error,'is-valid':!v$.period.$invalid}"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="!v$.period.required.$invalid">name en is required. <br></span>
                                                    <span v-if="!v$.period.between.$invalid">must be between {{ v$.period.between.$params.min }} and {{ v$.period.between.$params.max }}. <br></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom05">Visiter Num</label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    v-model.number.lazy="v$.visiter_num.$model"
                                                    id="validationCustom05"
                                                    name="visiter_num"
                                                    :class="{'is-invalid':v$.visiter_num.$error,'is-valid':!v$.visiter_num.$invalid}"
                                                    placeholder="Visiter Num"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="!v$.visiter_num.required.$invalid">name en is required. <br></span>
                                                    <span v-if="!v$.visiter_num.between.$invalid">must be between {{ v$.visiter_num.between.$params.min }} and {{ v$.visiter_num.between.$params.max }}. <br></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom05">Price</label>
                                                <input
                                                    type="number"
                                                    class="form-control"
                                                    name="price"
                                                    v-model.number.lazy="v$.price.$model"
                                                    id="validationCustom06"
                                                    placeholder="Price"
                                                    :class="{'is-invalid':v$.price.$error,'is-valid':!v$.price.$invalid}"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="!v$.price.required.$invalid">name en is required. <br></span>
                                                    <span v-if="!v$.price.between.$invalid">must be between {{ v$.price.between.$params.min }} and {{ v$.price.between.$params.max }}. <br></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="WebsitePages">Website Pages</label>
                                                    <select
                                                        multiple
                                                        class="form-control coustom-select"
                                                        id="WebsitePages"
                                                        name="pageView_id[]"
                                                        v-if="pageWeb"
                                                        v-model="idPageView"
                                                    >
                                                        <optgroup
                                                            v-for="page in pageWeb"
                                                            :key="page.id"
                                                            :label="page.name"
                                                        >
                                                            <option
                                                                v-for="view in page.views"
                                                                :value="view.pivot.id"
                                                            >
                                                                {{ page.name+ ' -- ' + view.type}}
                                                            </option>
                                                        </optgroup>
                                                    </select>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">
<!--                                                        <span v-if="!$v.pageView_id.required.$invalid">name en is required.</span>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="MobilePages">Mobile Pages</label>
                                                    <select
                                                        multiple
                                                        class="form-control coustom-select"
                                                        id="MobilePages"
                                                        name="pageViewMobile_id[]"
                                                        v-if="pageMobile"
                                                        v-model="idPageViewMobile"
                                                    >
                                                        <optgroup
                                                            v-for="page in pageMobile"
                                                            :key="page.id"
                                                            :label="page.name"
                                                        >
                                                            <option
                                                                v-for="view in page.views"
                                                                :value="view.pivot.id"
                                                            >
                                                                {{ page.name+ ' -- '  +view.type}}
                                                            </option>
                                                        </optgroup>
                                                    </select>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">
<!--                                                        <span v-if="!$v.pageView_id.required.$invalid">name en is required.</span>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Table -->
        </div>
    </div>
</template>

<script>
import {computed, onMounted, reactive,toRefs,ref} from "vue";
import {useStore} from "vuex";
import useVuelidate from '@vuelidate/core';
import {required,minLength,between,maxLength} from '@vuelidate/validators';

export default {
    name: "editPackage",
    props: ['id'],
    setup(props){
        const store = useStore();

        const { id } = toRefs(props);

        // get create Package
        let pageWeb = computed(() => store.getters['packageAdmin/pageWeb'] );
        let pageMobile = computed(() => store.getters['packageAdmin/pageMobile'] );
        let getPackage = computed(() => store.getters['packageAdmin/packageEdit'] );
        let idPageView = computed(() => store.getters['packageAdmin/idPageView'] );
        let idPageViewMobile = computed(() => store.getters['packageAdmin/idPageViewMobile'] );
        let loading = computed(() => store.getters['packageAdmin/loading'] );
        let getPagesViews = () => {
            store.dispatch('packageAdmin/getEditPages',id.value);
        }
        const i = ref(getPackage);

         onMounted(() => {
            getPagesViews();
        });

        const rules = computed(() => {
            return {
                translations:[
                {name: {minLength: minLength(3), maxLength: maxLength(40), required}},
                {name: {minLength: minLength(3), maxLength: maxLength(40), required}}
                ],
                period: {between: between(1, 360),required},
                price: {required,between: between(1, 4000)},
                visiter_num: {required,between: between(1, 4000)}
            }
        });


        const v$ = useVuelidate(rules,getPackage);


        return {pageWeb,pageMobile,loading,v$,getPackage,idPageView,idPageViewMobile};
    },
    methods:{
        editPackage (e){

            let formData = new FormData(e.target);
            formData.append('id',this.id);
            formData.append('_method','PUT');
            console.log(formData.get('idPageView'));
            console.log(formData.get('pageViewMobile_id'));

            this.v$.$validate();

            if(!this.v$.$error){

                this.$store.dispatch('packageAdmin/updatePackage',formData);

            }
        }
    }
}
</script>

<style scoped>
.page-wrapper{
    min-height: 100vh;
}
.coustom-select {
    height: 100px;
}
.card{
    position: relative;
}
</style>
