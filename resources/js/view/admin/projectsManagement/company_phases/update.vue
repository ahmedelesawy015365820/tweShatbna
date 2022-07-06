<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">

        <div class="content container-fluid">

            <notifications :position="this.$i18n.locale == 'ar'? 'top left': 'top right'"  />

            <Breadcrumb :title="$t('global.Update Company Phase')" routeName='indexCompanyPhases' />


            <!-- Table -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <loader v-if="loading" />
                        <div class="card-body">
                            <div class="card-header pt-0 mb-4">
                                <router-link
                                    :to="{name: 'indexCompanyPhases', params: {lang: locale || 'ar'}}"
                                    class="btn btn-custom btn-dark"
                                >
                                    {{$t('global.back')}}
                                </router-link>
                                <InputError v-if="errors.message" :message="$t('global.'+errors.message)"/>

                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <form @submit.prevent="updateCompanyPhase($event,id)" class="needs-validation">
                                        <div class="form-row row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">{{$t('global.Phase Name in Arabic')}}</label>
                                                <input type="hidden" value="put" name="_method">
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="formData.ar.name"
                                                       name="ar[name]"
                                                       id="validationCustom01"
                                                       :class="{'is-invalid':errors['ar.name']}"
                                                >
                                                <InputError v-if="errors['ar.name']" :message="errors['ar.name']"/>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">{{$t('global.Phase Name in English')}}</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="formData.en.name"
                                                       id="validationCustom02"
                                                       name="en[name]"
                                                       :class="{'is-invalid':errors['en.name']}"
                                                >
                                              <InputError v-if="errors['en.name']" :message="errors['en.name']"/>

                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom04">{{$t('global.Client Percentage')}}</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="formData.client_percentage"
                                                       id="validationCustom04"
                                                       name="client_percentage"
                                                       :class="{'is-invalid':errors['client_percentage']}"
                                                >
                                              <InputError v-if="errors['client_percentage']" :message="errors['client_percentage']"/>

                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom05">{{$t('global.Company Percentage')}}</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="formData.company_percentage"
                                                       id="validationCustom05"
                                                       name="company_percentage"
                                                       :class="{'is-invalid':errors['company_percentage']}"
                                                >
                                              <InputError v-if="errors['company_percentage']" :message="errors['company_percentage']"/>

                                            </div>
                                             <div class="col-md-4 mb-3">
                                                <label for="validationCustom03">{{$t('global.Image')}}</label>
                                                <input type="file"
                                                       class="form-control"
                                                       id="validationCustom03"
                                                       name="image"
                                                       :class="{'is-invalid':errors.image}"
                                                >
                                                <InputError v-if="errors.image" :message="errors.image"/>

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
import { companyPhasesComposable } from "../composables/company_phases";
import {  onMounted ,toRefs} from "vue";

export default {
    name: "updateCompanyCriteria",
    components:{
        InputError,
    },
    props:['id'],
    setup(props){
        // get create Package
        const {errors,loading,formData,updateCompanyPhase,getPhase} = companyPhasesComposable()
        formData.value={
            ar:{name:''},
            en:{name:''},
            client_percentage:'',
            company_percentage:'',
            id:props.id,
        }
        const {id} = toRefs(props)

        onMounted(() => {
            getPhase(id.value)
        })


        return {errors,loading,formData,updateCompanyPhase};
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
