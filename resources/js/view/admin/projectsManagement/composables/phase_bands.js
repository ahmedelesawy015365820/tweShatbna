import adminApi from "../../../../api/adminAxios";
import { ref,watch } from "vue";
import { useI18n } from "vue-i18n";
import { notify } from "@kyvg/vue3-notification";
import { useRouter } from "vue-router";
export function phaseBandsComposable() {
    const formData = ref({});
    const router = useRouter();
    const loading = ref(false); //loading for button
    const errors = ref({}); //errors for create or update
    const message = ref(''); // message for notify

    let phaseBands = ref({}); //data for index page
    let debounce = ref({}); // for search
    const search = ref(''); //search in index page

    const {t} =useI18n();



    watch(search, (search, prevSearch) => {
        clearTimeout(debounce.value);
        debounce.value= setTimeout(() => {
             getPhaseBands();
         },500)

     });

     //get all company band
    const getPhaseBands = async (page = 1)=>{
        loading.value = true;

        adminApi.get(`/v1/dashboard/phaseBands?page=${page}&search=${search.value}`)
            .then((res) => {
                phaseBands.value = res.data.data.bands;
            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                loading.value = false;
            });
    }


    //delete company band

    const deletePhaseBands = async (id,index)=>{
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

                adminApi.delete(`/v1/dashboard/phaseBands/${id}`)
                    .then((res) => {
                        phaseBands.value.data.splice(index,index + 1);
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



    //store band  request
    const createPhaseBands = async (data) => {
        loading.value=true
        errors.value={}
        await adminApi.post('/v1/dashboard/phaseBands',data).then((result)=>{
            notify({
                title: t('global.Successfully added')+`<i class="fas fa-check-circle"></i>`,
                type: "success",
                duration: 5000,
                speed: 2000
            });
            formData.value={
                ar:{name:''},
                en:{name:''},
                percentage:'',
            }
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

    //update band  request
    const updatePhaseBands = async (data,id) => {
        console.log(data)
        loading.value=true
        errors.value={}
        await adminApi.put('/v1/dashboard/phaseBands/'+id,data).then((result)=>{
            notify({
                title: t('global.Successfully updated')+`<i class="fas fa-check-circle"></i>`,
                type: "success",
                duration: 5000,
                speed: 2000
            });
            formData.value={}
            router.push({name:'indexPhaseBands'})

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

    //get band by id
    const getBand = async(id)=> {
        adminApi.get(`/v1/dashboard/phaseBands/${id}`)
        .then((res) => {
            formData.value={
                ar:{name:res.data.data.band.translations[0].name},
                en:{name:res.data.data.band.translations[1].name},
                id:id,
            }
        })
        .catch((err) => {
            console.log(err.response.data);
        })
        .finally(() => {
            loading.value = false;
        });
    }



    return {
        formData,
        loading,
        errors,
        message,
        search,
        phaseBands,
        getPhaseBands,
        deletePhaseBands,
        createPhaseBands,
        updatePhaseBands,
        getBand
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
