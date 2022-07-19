<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">

        <div class="content container-fluid">

            <notifications :position="this.$i18n.locale == 'ar'? 'top left': 'top right'"  />

            <Breadcrumb :title="$t('global.Create Product')" routeName='Products' />


            <!-- Table -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <loader v-if="loading" />
                        <div class="card-body">
                            <div class="card-header pt-0 mb-4">
                                <router-link
                                    :to="{name: 'Products', params: {lang: locale || 'ar'}}"
                                    class="btn btn-custom btn-dark"
                                >
                                    {{$t('global.back')}}
                                </router-link>
                                <InputError v-if="errors.message" :message="$t('global.'+errors.message)"/>

                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <form @submit.prevent="createProduct" class="needs-validation">
                                        <div class="form-row row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">{{$t('global.Product Name in Arabic')}}</label>
                                                <input type="text" dir="rtl"
                                                       class="form-control"
                                                       name="ar[name]"
                                                       id="validationCustom01"
                                                       :class="{'is-invalid':errors['ar.name']}"
                                                >
                                                <InputError v-if="errors['ar.name']" :message="errors['ar.name']"/>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">{{$t('global.Product Name in English')}}</label>
                                                <input type="text" dir="ltr"
                                                       class="form-control"
                                                       name="en[name]"
                                                       id="validationCustom02"
                                                       :class="{'is-invalid':errors['en.name']}"
                                                >
                                              <InputError v-if="errors['en.name']" :message="errors['en.name']"/>

                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom05">{{$t('global.Price')}}</label>
                                                <input type="text"
                                                       class="form-control"
                                                       id="validationCustom05"
                                                       name="price"
                                                       :class="{'is-invalid':errors['price']}"
                                                >
                                              <InputError v-if="errors['price']" :message="errors['price']"/>

                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom05">{{$t('global.Price After Sale')}}</label>
                                                <input type="text"
                                                       class="form-control"
                                                       id="validationCustom05"
                                                       name="sale"
                                                       :class="{'is-invalid':errors['sale']}"
                                                >
                                              <InputError v-if="errors['sale']" :message="errors['sale']"/>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom04">{{$t('global.Stock')}}</label>
                                                <input type="integer"
                                                       class="form-control"
                                                       id="validationCustom04"
                                                       name="stock"
                                                       min="1"
                                                       :class="{'is-invalid':errors['stock']}"
                                                >
                                              <InputError v-if="errors['stock']" :message="errors['stock']"/>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom00">{{$t('global.Select Category')}}</label>
                                                <select name="category_id" id="validationCustom00" class="form-control">
                                                    <option value=""></option>
                                                    <option :value="category.id" v-for="category in categories" :key="category.id">{{category.name}}</option>

                                                </select>
                                                <InputError v-if="errors['category_id']" :message="errors['category_id']"/>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationCustom000">{{$t('global.Weight')}} ( {{$t('global.kg')}} )</label>
                                                 <input type="integer"
                                                       class="form-control"
                                                       id="validationCustom000"
                                                       name="weight"
                                                       min="1"
                                                       :class="{'is-invalid':errors['weight']}"
                                                >
                                                <InputError v-if="errors['weight']" :message="errors['weight']"/>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationCustom05">{{$t('global.Expiry date')}}</label>
                                                <input type="datetime-local"
                                                       class="form-control"
                                                       id="validationCustom05"
                                                       name="expiry_date"
                                                       :class="{'is-invalid':errors['expiry_date']}"
                                                >
                                              <InputError v-if="errors['expiry_date']" :message="errors['expiry_date']"/>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationCustom03">{{$t('global.Image')}}</label>
                                                <input type="file"
                                                       class="form-control"
                                                       id="validationCustom03"
                                                       name="image"
                                                       :class="{'is-invalid':errors.image}"
                                                >
                                                <InputError v-if="errors.image" :message="errors.image"/>
                                            </div>
                                            <div class="col-md-3 mb-3">
                                                <label for="validationCustom03">{{$t('global.Group of images')}}</label>
                                                <input type="file"
                                                       class="form-control"
                                                       id="validationCustom03"
                                                       name="groupImages[]"
                                                       multiple
                                                       :class="{'is-invalid':errors.groupImages}"
                                                >
                                                <InputError v-if="errors.groupImages" :message="errors.groupImages"/>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom07">{{$t('global.Product description in Arabic')}}</label>
                                                <textarea type="text" dir="rtl"
                                                       class="form-control"
                                                       name="ar[description]"
                                                       id="validationCustom07"
                                                       :class="{'is-invalid':errors['ar.description']}"
                                                ></textarea>
                                                <InputError v-if="errors['ar.description']" :message="errors['ar.description']"/>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom08">{{$t('global.Product description in English')}}</label>
                                                <textarea type="text" dir="ltr"
                                                       class="form-control"
                                                       name="en[description]"
                                                       id="validationCustom08"
                                                       :class="{'is-invalid':errors['en.description']}"
                                                ></textarea>

                                                <InputError v-if="errors['en.description']" :message="errors['en.description']"/>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom09">{{$t('global.Product divo in Arabic')}}</label>
                                                <textarea type="text" dir="rtl"
                                                       class="form-control"
                                                       name="ar[divo]"
                                                       id="validationCustom09"
                                                       :class="{'is-invalid':errors['ar.divo']}"
                                                ></textarea>
                                                <InputError v-if="errors['ar.divo']" :message="errors['ar.divo']"/>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom010">{{$t('global.Product divo in English')}}</label>
                                                <textarea dir="ltr" type="text"
                                                       class="form-control"
                                                       name="en[divo]"
                                                       id="validationCustom010"
                                                       :class="{'is-invalid':errors['en.divo']}"
                                                ></textarea>

                                                <InputError v-if="errors['en.divo']" :message="errors['en.divo']"/>
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
import { onMounted } from '@vue/runtime-core';
import InputError from "../../projectsManagement/utilize/input_error.vue"
import { productsComposable } from "../composables/products";

export default {
    name: "createProduct",
    components:{
        InputError,
    },
    setup(){
        // get create Package
        const {errors,loading,createProduct,getCategories,categories} = productsComposable()

        onMounted(() => {
            getCategories()
        })

        return {errors,loading,createProduct,categories};
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

#validationCustom03{
    padding-right: 0px!important;
}




</style>
