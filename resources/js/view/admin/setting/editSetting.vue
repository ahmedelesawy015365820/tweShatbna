<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">

        <div class="content container-fluid">

            <notifications :position="this.$i18n.locale == 'ar'? 'top left': 'top right'"  />

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Setting</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'indexSetting', params: {lang: locale || 'ar'}}">Setting</router-link></li>
                            <li class="breadcrumb-item active">Edit Setting</li>
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
                                    :to="{name: 'indexSetting', params: {lang: locale || 'ar'}}"
                                    class="btn btn-custom btn-dark"
                                >
                                    back
                                </router-link>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <form @submit.prevent="editSetting" class="needs-validation">
                                        <div class="form-row row">

                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Commission Design</label>
                                                <input type="text" class="form-control"
                                                       v-model.number="v$.commission_design.$model"
                                                       id="validationCustom01"
                                                       placeholder="Name En"
                                                       :class="{'is-invalid':v$.commission_design.$error,'is-valid':!v$.commission_design.$invalid}"
                                                >
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">
                                                    <span v-if="v$.commission_design.required.$invalid">commission design is required.<br /> </span>
                                                    <span v-if="v$.commission_design.numeric.$invalid">commission design is number.<br /> </span>
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
import {computed, onMounted, reactive, toRefs, inject, ref, watch} from "vue";
import useVuelidate from '@vuelidate/core';
import {required,numeric} from '@vuelidate/validators';
import adminApi from "../../../api/adminAxios";
import { notify } from "@kyvg/vue3-notification";


export default {
    name: "createPackage",
    data(){
        return {
            errors:{}
        }
    },
    props: ['id'],
    setup(props){
        // get create Package
        let loading = ref(false);
        const { id } = toRefs(props);

        //start design
        let addSetting =  reactive({
            data:{
                commission_design: null
            }
        });


        const rules = computed(() => {
            return {
                commission_design:{
                    required,
                    numeric
                }
            }
        });

        let getDATA = () => {
            loading.value = true;

            adminApi.get(`/v1/dashboard/setting/${id.value}/edit`)
                .then((res) => {
                    let l = res.data.data;
                    addSetting.data.commission_design = l.setting.commission_design;
                })
                .catch((err) => {
                    console.log(err.response.data);
                })
                .finally(() => {
                    loading.value = false;
                })
        };

        onMounted(() => {
            getDATA();
        })

        const v$ = useVuelidate(rules,addSetting.data);


        return {loading,...toRefs(addSetting),id,v$};
    },
    methods: {
        editSetting(){
            this.v$.$validate();

            if(!this.v$.$error){

                this.loading = true;
                this.errors = {};

                adminApi.put(`/v1/dashboard/setting/${this.id}`,this.data)
                    .then((res) => {

                        notify({
                            title: `Successfully edited <i class="fas fa-check-circle"></i>`,
                            type: "success",
                            duration: 5000,
                            speed: 2000
                        });

                    })
                    .catch((err) => {
                        this.errors = err.response.data.errors;
                    })
                    .finally(() => {
                        this.loading = false;
                    });

            }
        }
    }
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


</style>
