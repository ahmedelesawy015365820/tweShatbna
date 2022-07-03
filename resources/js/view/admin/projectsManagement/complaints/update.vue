<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">

        <div class="content container-fluid">

            <notifications :position="this.$i18n.locale == 'ar'? 'top left': 'top right'"  />

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">{{$t('global.Create Designers Fine')}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'DesignersFines', params: {lang: locale || 'ar'}}">{{$t('global.Designers Fines')}}</router-link></li>
                            <li class="breadcrumb-item active">{{$t('global.Create Designers Fine')}}</li>
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
                                    :to="{name: 'DesignersFines', params: {lang: locale || 'ar'}}"
                                    class="btn btn-custom btn-dark"
                                >
                                    {{$t('global.back')}}
                                </router-link>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <form @submit.prevent="updateDesignerFine(formData,id)" class="needs-validation">
                                        <div class="form-row row">
                                                <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">{{$t('global.From') + ' ' + $t('global.( Numner of days )')}}</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="formData.from"
                                                       id="validationCustom02"
                                                       :class="{'is-invalid':errors.from}"
                                                       placeholder="1"
                                                >
                                                <InputError v-if="errors.from" :message="errors.from"/>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">{{$t('global.To')+ ' ' + $t('global.( Numner of days )')}}</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="formData.to"
                                                       id="validationCustom02"
                                                       :class="{'is-invalid':errors.to}"
                                                       placeholder="5"
                                                >
                                              <InputError v-if="errors.to" :message="errors.to"/>

                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom03">{{$t('global.Percentage')}}</label>
                                                <input type="text"
                                                       class="form-control"
                                                       v-model.trim="formData.percentage"
                                                       id="validationCustom03"
                                                       :class="{'is-invalid':errors.percentage}"
                                                       placeholder="10"
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
import { designersFinesComposable } from "../composables/designersFines";
import { onBeforeMount, onMounted ,toRefs} from "vue";

export default {
    name: "createDesignerFine",
    components:{
        InputError,
    },
    props:['id'],
    setup(props){
        // get create Package
        const {errors,loading,formData,updateDesignerFine,getFine} = designersFinesComposable()
        formData.value={
            to:'',
            from:'',
            percentage:'',
        }
        const {id} = toRefs(props)

        onMounted(() => {
            getFine(id.value)
        })


        return {errors,loading,formData,updateDesignerFine};
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
