<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">

        <div class="content container-fluid">

            <notifications :position="this.$i18n.locale == 'ar'? 'top left': 'top right'"  />

            <Breadcrumb :title="$t('global.Create Company Criteria')" routeName='indexCompanyCriteria' />


            <!-- Table -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <loader v-if="loading" />
                        <div class="card-body">
                            <div class="card-header pt-0 mb-4">
                                <router-link
                                    :to="{name: 'indexCompanyCriteria', params: {lang: locale || 'ar'}}"
                                    class="btn btn-custom btn-dark"
                                >
                                    {{$t('global.back')}}
                                </router-link>
                                <InputError v-if="errors.message" :message="$t('global.'+errors.message)"/>

                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <form @submit.prevent="createCompanyCriteria(formData)" class="needs-validation">
                                        <div class="form-row row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">{{$t('global.Criteria Name in Arabic')}}</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="formData.ar.name"
                                                       id="validationCustom01"
                                                       :class="{'is-invalid':errors['ar.name']}"
                                                >
                                                <InputError v-if="errors['ar.name']" :message="errors['ar.name']"/>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">{{$t('global.Criteria Name in English')}}</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="formData.en.name"
                                                       id="validationCustom02"
                                                       :class="{'is-invalid':errors['en.name']}"
                                                >
                                              <InputError v-if="errors['en.name']" :message="errors['en.name']"/>

                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom03">{{$t('global.Percentage')}}</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="formData.percentage"
                                                       id="validationCustom03"
                                                       :class="{'is-invalid':errors.percentage}"
                                                >
                                                <InputError v-if="errors.percentage" :message="errors.percentage"/>

                                            </div>
                                        </div>

                                        <button class="btn btn-primary" type="submit">{{$t('global.Submit')}}</button>
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
import InputError from "../utilize/input_error.vue"
import { companyCriteriaComposable } from "../composables/company_criteria";

export default {
    name: "createCompanyCriteria",
    components:{
        InputError,
    },
    setup(){
        // get create Package
        const {errors,loading,formData,createCompanyCriteria} = companyCriteriaComposable()
        formData.value={
            ar:{name:''},
            en:{name:''},
            percentage:'',
        }

        return {errors,loading,formData,createCompanyCriteria};
    },

}
</script>

<style scoped>
.coustom-select {
    height: 100px;
}
.card{
    position: relative;
}

.package-feature ul li:first-child {
    margin-top: 10px;
}

.package-feature ul li::before {
    content: "\f00c";
    font-family: "Font Awesome 5 Free";
    font-weight: 600;
    color: #4B9F18;
    left: 0;
    position: absolute;
    top: 0;
}

.package-feature ul li:last-child {
    margin-bottom: 10px;
}

.ml-3{
    margin-left: 1.5rem;
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
    margin: auto;
}




</style>
