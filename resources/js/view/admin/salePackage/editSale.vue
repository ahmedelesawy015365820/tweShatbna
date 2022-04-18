<template>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Package</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'package', params: {lang: locale || 'ar'}}">Package</router-link></li>
                            <li class="breadcrumb-item active">Edit Sale</li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <loader v-if="loading" />
                        <div class="card-body">
                            <div class="card-header pt-0 mb-4">
                                <router-link
                                    :to="{name: 'sale', params: {lang: locale || 'ar'}}"
                                    class="btn btn-custom btn-dark"
                                >
                                    back
                                </router-link>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <form @submit.prevent="editSale"  class="needs-validation">
                                        <div class="form-row row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Packages</label>
                                                <select
                                                    class="form-control"
                                                    v-model="packageIdE.advertising_package_id"
                                                    id="validationCustom02"
                                                    aria-label="Default select example"
                                                    required
                                                >
                                                    <option
                                                        :value="item.id"
                                                         v-for="item in packages"
                                                    >
                                                            {{item.name}}
                                                    </option>
                                                </select>
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

        </div>
    </div>
</template>

<script>
import {useStore} from "vuex";
import {computed, inject, onMounted,toRefs,ref} from "vue";

export default {
    name: "editSale",
    data(){
        return {
            locale: localStorage.getItem("langAdmin")
        }
    },
    props:['id'],
    setup(props){
        const store = useStore();
        const emitter = inject('emitter');
        const { id } = toRefs(props);

        // get create Package
        let packages = computed(() => store.getters['sale/Packages'] );
        let packageIdE = computed(() => store.getters['sale/packageId'] );
        let loading = computed(() => store.getters['sale/loading'] );

        let getPackages = () => {
            store.dispatch('sale/getCreate');
            store.dispatch('sale/packageIdE',id.value);
        }
        onMounted(() => {
            getPackages();
        });

        emitter.on('get_lang', () => {
            getPackages();
        });

        let editSale = () => {
            packageIdE._value._method = "PUT";
            store.dispatch('sale/updateSalePackage',packageIdE._value);
        }


        return {packages,loading,packageIdE,editSale};

    }
}
</script>

<style scoped>

</style>
