<template>
    <div :class="['page-wrapper',this.$i18n.locale == 'ar'? 'page-wrapper-ar':'']">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Support</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'indexSupport', params: {lang: locale || 'ar'}}">Support</router-link></li>
                            <li class="breadcrumb-item active">show Support</li>
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
                                    :to="{name: 'indexSupport', params: {lang: locale || 'ar'}}"
                                    class="btn btn-custom btn-dark"
                                >
                                    back
                                </router-link>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="form-row row">
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom02">Name</label>
                                            <input type="text" class="form-control"
                                                   id="validationCustom02"
                                                   readonly
                                                   :value="support.first + support.last"
                                            >
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom06">Price</label>
                                            <input type="text" class="form-control"
                                                   id="validationCustom06"
                                                   placeholder="Price"
                                                   readonly
                                                   :value="support.email"
                                            >
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="validationCustom05">description</label>
                                            <textarea rows="5" class="form-control" id="validationCustom05" readonly>{{support.description}}</textarea>
                                        </div>
                                    </div>
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
import {onBeforeMount, toRefs,ref} from "vue";
import adminApi from "../../../api/adminAxios";

export default {
    name: "showSale",
    data(){
        return {
        }
    },
    props:['id'],
    setup(props){

        const { id } = toRefs(props);

        // get create Package
        let support = ref({});
        let loading = ref(false);

        let getSupport = () => {

            loading.value = true;

            adminApi.get(`/v1/dashboard/support/${id.value}`)
                .then((res) => {
                    let l = res.data.data;
                    support.value = l.support;

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

        onBeforeMount(() => {
            getSupport();
        });

        return {support,loading}
    }

}


</script>

<style scoped>
.card {
    border: none;
}

textarea {
    height: 150px;
}

</style>
