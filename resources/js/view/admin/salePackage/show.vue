<template>
    <div class="page-wrapper">
        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Sale Package</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><router-link :to="{name: 'package', params: {lang: locale || 'ar'}}">Package</router-link></li>
                            <li class="breadcrumb-item active">Create Sale</li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <loader v-if="loading" />
                        <loader v-if="loadingCalender" />
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
                                    <div class="form-row row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Packages</label>
                                            <input type="text" class="form-control"
                                                   id="validationCustom02"
                                                   placeholder="Package Name"
                                                   readonly
                                                   :value="valuePackage.name"
                                            >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom06">Price</label>
                                            <input type="text" class="form-control"
                                                   id="validationCustom06"
                                                   placeholder="Price"
                                                   readonly
                                                   :value="valuePackage.price"
                                            >
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom05">Period</label>
                                            <input type="text" class="form-control"
                                                   id="validationCustom05"
                                                   placeholder="period"
                                                   readonly
                                                   :value="valuePackage.period"
                                            >
                                        </div>
                                        <div class="row" v-for="item in sale.user">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">User Name</label>
                                                <input type="text"
                                                       class="form-control"
                                                       id="validationCustom01"
                                                       placeholder="User Name"
                                                       readonly
                                                       :value="item.name"
                                                >
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom03">Company Name</label>
                                                <input type="text" class="form-control"
                                                       id="validationCustom03"
                                                       placeholder="Company"
                                                       readonly
                                                       :value="item.complement.nameCompany"
                                                >
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom04">Phone</label>
                                                <input type="text" class="form-control"
                                                       id="validationCustom04"
                                                       placeholder="Phone"
                                                       readonly
                                                       :value="item.complement.phone"
                                                >
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom07">Email</label>
                                                <input type="text" class="form-control"
                                                       id="validationCustom07"
                                                       placeholder="Phone"
                                                       readonly
                                                       :value="item.email"
                                                >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="card flex-fill col-md-4">
                                                <div class="p-3 text-center">
                                                    <p class="card-text f-12">Check</p>
                                                </div>
                                                <div>
                                                    <label class="form-group toggle-switch mb-0" for="notification_switch1">
                                                        <input
                                                            type="checkbox"
                                                            class="toggle-switch-input"
                                                            id="notification_switch1"
                                                            @change="checkPackage"
                                                            v-model="check"
                                                            :checked="check"
                                                            :disabled="check"
                                                        >
                                                        <span class="toggle-switch-label mx-auto">
													        <span class="toggle-switch-indicator"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="card col-md-4">
                                                <div class="p-3 text-center">
                                                    <p class="card-text f-12">Complete</p>
                                                </div>
                                                <div>
                                                    <label class="form-group toggle-switch mb-0" for="notification_switch2">
                                                        <input
                                                            type="checkbox"
                                                            class="toggle-switch-input"
                                                            id="notification_switch2"
                                                            @change="completePackage"
                                                            v-model="complete"
                                                            :checked="complete"
                                                            :disabled="complete"
                                                        >
                                                        <span class="toggle-switch-label mx-auto">
													        <span class="toggle-switch-indicator"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="card col-md-4">
                                                <div class="p-3 text-center">
                                                    <p class="card-text f-12">Accept</p>
                                                </div>
                                                <div>
                                                    <label class="form-group toggle-switch mb-0" for="notification_switch3">
                                                        <input
                                                            type="checkbox"
                                                            class="toggle-switch-input"
                                                            id="notification_switch3"
                                                            @change="acceptPackage"
                                                            v-model="accept"
                                                            :checked="accept"
                                                            :disabled="accept"
                                                        >
                                                        <span class="toggle-switch-label mx-auto">
													        <span class="toggle-switch-indicator"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row flex-fill col-md-12">
                                            <div class="container-images row" id="container-images">
                                                <a v-for="image in sale.media" class="col-md-3" download :href="'/web/img/advertise/'+ id+'/' + image.file_name">
                                                    <figure>
                                                        <img :src="'/web/img/advertise/'+ id +'/' + image.file_name" />
                                                    </figure>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 calendar">
                                    <FullCalendar
                                        :options="options"
                                    />
                                    <div class="shodow" @click="popCreateCalender"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Create Calender-->
        <div class="modal fade custom-modal" id="createCalender">
            <div class="shodow" @click="closeCreateCalender"></div>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Projects</h4>
                        <button type="button" class="close" @click="closeCreateCalender" data-bs-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form class="row" @submit.prevent="addCalender">
                        <span v-for="itemId in sale.user">
                            <input type="hidden" name="user" :value="itemId.id" />
                            <input type="hidden" name="title" :value="itemId.complement.nameCompany" />
                        </span>
                            <input type="hidden" name="package_sale" :value="id" />
                            <input type="hidden" name="package" :value="valuePackage.id" />
                            <div class="form-group col-6">
                                <label>From Date</label>
                                <div class="cal-icon">
                                    <input
                                       type="datetime-local"
                                       class="form-control"
                                       id="start"
                                       name="start"
                                    >
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <label>To Date</label>
                                <div class="cal-icon">
                                    <input
                                       type="datetime-local"
                                       class="form-control"
                                       id="end"
                                       name="end"
                                    >
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Create Calender -->
    </div>
</template>

<script>
import {useStore} from "vuex";
import {computed, inject, onBeforeMount, toRefs, reactive,ref,onMounted} from "vue";
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import TimeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import interactionPlugin from '@fullcalendar/interaction';
import adminApi from "../../../api/adminAxios";

export default {
    name: "showSale",
    components: {
        FullCalendar // make the <FullCalendar> tag available
    },
    data(){
        return {
        }
    },
    props:['id'],
    setup(props){
        const store = useStore();
        const emitter = inject('emitter');
        const { id } = toRefs(props);

        // get create Package
        let sale = ref({});
        let valuePackage =  ref({});
        const check = ref(false);
        const complete = ref(false);
        const accept = ref(false);
        let loading = ref(false);

        let getSale = () => {

            loading.value = true;

            adminApi.get(`/v1/dashboard/packageSale/${id.value}`)
                .then((res) => {
                    let l = res.data.data;

                    valuePackage.value = l.packageSale.package;
                    check.value = l.packageSale.check;
                    complete.value = l.packageSale.complete;
                    accept.value = l.packageSale.accept;
                    sale.value = l.packageSale;

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
            getSale();
        });

        emitter.on('get_lang', () => {
            getSale();
        });

        let checkPackage = () => {

            loading.value = true;

            adminApi.post(`/v1/dashboard/packageSale/check`,{check: check.value,id: id.value})
                .then((res) => {
                    Swal.fire({
                        icon: 'success',
                        title: 'تم بنجاح التعديل .',
                        showConfirmButton: false,
                        timer: 1500
                    });
                })
                .catch((err) => {
                    console.log(err.response.data);
                })
                .finally(() => {
                    loading.value = false;
                });
        };

        let completePackage = () => {

            loading.value = true;

            adminApi.post(`/v1/dashboard/packageSale/complete`,{complete: complete.value,id: id.value})
                .then((res) => {
                    Swal.fire({
                        icon: 'success',
                        title: 'تم بنجاح التعديل .',
                        showConfirmButton: false,
                        timer: 1500
                    });
                })
                .catch((err) => {
                })
                .finally(() => {
                    loading.value = false;
                });
        };

        let acceptPackage = () => {
            loading.value = true;

            adminApi.post(`/v1/dashboard/packageSale/accept`,{accept: accept.value,id: id.value})
                .then((res) => {
                    Swal.fire({
                        icon: 'success',
                        title: 'تم بنجاح التعديل .',
                        showConfirmButton: false,
                        timer: 1500
                    });
                })
                .catch((err) => {
                    console.log(err.response.data);
                })
                .finally(() => {
                    loading.value = false;
                });
        };


        // start calender

        const ip = ref(10);

        const allEvents = ref([]);

        const options = reactive({
            plugins: [ dayGridPlugin, interactionPlugin,TimeGridPlugin,listPlugin ],
            initialView: 'dayGridMonth',
            headerToolbar: {
                center: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            editable:true,
            weekends:true,
            select(arg){
                ip.value = ip.value + 1;
                const cal = arg.view.calendar;
                cal.unselect();
                cal.addEvent({
                    id: `${ip.value}`,
                    title: `new event ${ip.value}`,
                    start: arg.start,
                    end: arg.end
                });
            },
            events: allEvents || []
        });

        let getCalender = ()=> {

            loading.value = true;

            adminApi.get(`/v1/dashboard/scheduleAdvertise/getALL`)
                .then((res) => {
                    let l = res.data.data;
                    allEvents.value =  l.schedule;
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

        let addCalender = (e) => {

            let formData =  new FormData(e.target);

            loading.value = true;

            adminApi.post(`/v1/dashboard/scheduleAdvertise`,formData)
                .then((res) => {
                    getCalender();
                })
                .catch((err) => {
                    Swal.fire({
                        icon: 'error',
                        title: 'يوجد خطا في البيانات ...',
                        text: 'هذا الوقت محجوز مسبقا !',
                    });
                })
                .finally(() => {
                    loading.value = false;
                });

            closeCreateCalender()
        };

        onMounted(() => { getCalender(); });

        let popCreateCalender = () => {
            let ele = document.getElementById('createCalender');
            ele.classList.add('show');
            ele.style.display = 'block';
        }

        let closeCreateCalender = () => {
            let ele = document.getElementById('createCalender');
            ele.classList.remove('show');
            ele.style.display = 'none';
        }

        return {addCalender,closeCreateCalender,popCreateCalender,sale,loading,valuePackage,checkPackage,completePackage,acceptPackage,options,check,complete,accept}
    }

}


</script>

<style scoped>
.card {
    border: none;
}
.p-3 {
    padding: 1rem!important;
}


.container-images {
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
}

img{
    height: 200px;
    width: 200px;
}

.calendar {
    margin-top: 50px;
    position: relative;
}

.calendar .shodow{
    position: absolute;
    top: 100px;
    left: 0;
    right: 34px;
    bottom: 30px;
    z-index: 100;
}

.modal-dialog {
    z-index: 100;
}

.custom-modal .shodow{
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #0000004a;
}

.fc-title:hover {
    cursor: pointer;
}

.cal-icon:after {
    display: none;
}

.toggle-switch-input:checked:disabled + .toggle-switch-label {
    background-color: #FF5B37;
}

</style>
