import adminApi from "../../../../api/adminAxios";
import { ref,watch } from "vue";
import { useI18n } from "vue-i18n";
import { notify } from "@kyvg/vue3-notification";
import { useRouter } from "vue-router";
export function areaCostComosable() {
    const formData = ref({});
    const countries = ref({});
    const states = ref({});
    const areas = ref({});
    const router = useRouter();
    const loading = ref(false); //loading for button
    const errors = ref({}); //errors for create or update
    const message = ref(''); // message for notify

    let areaCost = ref({}); //data for index page
    let debounce = ref({}); // for search
    const search = ref(''); //search in index page

    const {t} =useI18n();



    watch(search, (search, prevSearch) => {
        clearTimeout(debounce.value);
        debounce.value= setTimeout(() => {
             getAreaCosts();
         },500)

     });

     //get all designers fines
    const getAreaCosts = async (page = 1)=>{
        loading.value = true;

        adminApi.get(`/v1/dashboard/areaCost?page=${page}&search=${search.value}`)
            .then((res) => {
                areaCost.value = res.data.data.costs;
            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                loading.value = false;
            });
    }


    //delete designer fine

    const deleteAreaCost = async (id,index)=>{
        Swal.fire({
            title: t(`treasury.AreYouSureDelete`),
            text: t("treasury.YouWontBeAbleToRevertThis"),
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                adminApi.delete(`/v1/dashboard/areaCost/${id}`)
                    .then((res) => {
                        areaCost.value.data.splice(index,index + 1);
                        Swal.fire({
                            icon: 'success',
                            title: t('global.Your package has been deleted.'),
                            showConfirmButton: false,
                            timer: 1500
                        });
                    })
                    .catch((err) => {
                        console.log(err.response)
                        // if(err.response.data.errors){
                        //     Swal.fire({
                        //         icon: 'error',
                        //         title: 'يوجد خطا في النظام...',
                        //         text: 'لا ينفع حذف هذه الدوله بسبب وجود اشخاص مشتركين فيها !',
                        //     });
                        // }else {
                        //     Swal.fire({
                        //         icon: 'error',
                        //         title: 'يوجد خطا في النظام...',
                        //         text: 'يوجد خطا في النظام !',
                        //     });
                        // }
                    });
            }
        });
    }



    //store fine  request
    const createAreaCost = async (data) => {
        loading.value=true
        errors.value={}
        await adminApi.post('/v1/dashboard/areaCost',data).then((result)=>{
            notify({
                title: t('global.Successfully added')+`<i class="fas fa-check-circle"></i>`,
                type: "success",
                duration: 5000,
                speed: 2000
            });
            formData.value={}
        }).catch((e) => {
            if (e.response.data.errors) {
                for(const el in e.response.data.errors){
                    errors.value[el]=e.response.data.errors[el][0];
                }
            }else {
                notify({
                    title: t('global.Unknown error')+` <i class="fas fa-check-circle"></i>`,
                    type: "error",
                    duration: 5000,
                    speed: 2000
                });
            }
        })
        loading.value=false
    }

    //update fine  request
    const updateAreaCost = async (data,id) => {
        loading.value=true
        errors.value={}
        await adminApi.put('/v1/dashboard/areaCost/'+id,data).then((result)=>{
            notify({
                title: t('global.Successfully updated')+`<i class="fas fa-check-circle"></i>`,
                type: "success",
                duration: 5000,
                speed: 2000
            });
            formData.value={}
            router.push({name:'indexAreaCost'})

        }).catch((e) => {
            if (e.response.data.errors) {
                for(const el in e.response.data.errors){
                    errors.value[el]=e.response.data.errors[el][0];
                }
            }else {
                notify({
                    title: t('global.Unknown error')+` <i class="fas fa-check-circle"></i>`,
                    type: "error",
                    duration: 5000,
                    speed: 2000
                });
            }
        })
        loading.value=false
    }

    //get cost by id
    const getAreaCost = async(id)=> {
        loading.value=true
        await adminApi.get(`/v1/dashboard/areaCost/${id}`)
        .then((res) => {
            formData.value={
                country_id:res.data.data.cost.area.state.country_id,
                state_id:res.data.data.cost.area.state_id,
                area_id:res.data.data.cost.area_id,
                cost:res.data.data.cost.cost,
            }
            getStates(formData.value.country_id);
            getAreas(formData.value.state_id);
        })
        .catch((err) => {
            console.log(err.response.data);
        })
        loading.value=false

    }

    //get countries
    const getCountries = async ()=> {
        loading.value=true
        await adminApi.get(`/v1/dashboard/get_countries`)
        .then((res) => {
            countries.value = res.data.data.countries;
        })
        loading.value=false

    }
    //get states
    const getStates = async (id)=> {
        loading.value=true
        await adminApi.get(`/v1/dashboard/country_states/${id}`)
        .then((res) => {
            states.value = res.data.data.states;
        })
        loading.value=false

    }
    //get areas
    const getAreas = async (id)=> {
        loading.value=true
        await adminApi.get(`/v1/dashboard/state_areas/${id}`)
        .then((res) => {
            areas.value = res.data.data.areas;
        })
        loading.value=false
    }



    return {
        formData,
        loading,
        errors,
        message,
        search,
        areaCost,
        getAreaCosts,
        deleteAreaCost,
        createAreaCost,
        updateAreaCost,
        getAreaCost,
        getAreas,
        areas,
        getCountries,
        countries,
        getStates,
        states
    };
}

//set errors dynamic in object
// function setErrors(errors, errors_array) {
//     if (errors_array) {
//         for (const el in errors_array) {
//             errors.value[el] = errors_array[el][0];
//         }
//     } else {
//         notify(
//             i18n.t("Unknown error,please try again later."),
//             "topright",
//             "error"
//         );
//     }
// }
