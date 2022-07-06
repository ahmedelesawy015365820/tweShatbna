import adminApi from "../../../../api/adminAxios";
import { ref,watch } from "vue";
import { useI18n } from "vue-i18n";
import { notify } from "@kyvg/vue3-notification";
import { useRouter } from "vue-router";
export function companyPhasesComposable() {
    const formData = ref({});
    const router = useRouter();
    const loading = ref(false); //loading for button
    const errors = ref({}); //errors for create or update
    const message = ref(''); // message for notify

    let companyPhases = ref({}); //data for index page
    let debounce = ref({}); // for search
    const search = ref(''); //search in index page

    const {t} =useI18n();



    watch(search, (search, prevSearch) => {
        clearTimeout(debounce.value);
        debounce.value= setTimeout(() => {
             getCompanyPhases();
         },500)

     });

     //get all company criteria
    const getCompanyPhases = async (page = 1)=>{
        loading.value = true;

        adminApi.get(`/v1/dashboard/companyPhases?page=${page}&search=${search.value}`)
            .then((res) => {
                companyPhases.value = res.data.data.phases;
            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                loading.value = false;
            });
    }


    //delete company criteria

    const deleteCompanyPhases = async (id,index)=>{
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

                adminApi.delete(`/v1/dashboard/companyPhases/${id}`)
                    .then((res) => {
                        companyPhases.value.data.splice(index,index + 1);
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



    //store criteria  request
    const createCompanyPhase = async (e) => {
        loading.value=true
        errors.value={}
        let form= new FormData(e.target);
        await adminApi.post('/v1/dashboard/companyPhases',form).then((result)=>{
            notify({
                title: t('global.Successfully added')+`<i class="fas fa-check-circle"></i>`,
                type: "success",
                duration: 5000,
                speed: 2000
            });
            e.target.reset();
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

    //update criteria  request
    const updateCompanyPhase = async (e,id) => {
        loading.value=true
        errors.value={}
        let form= new FormData(e.target);
        form.append('id',id)
        await adminApi.post('/v1/dashboard/companyPhases/'+id,form).then((result)=>{
            console.log(result)
            notify({
                title: t('global.Successfully updated')+`<i class="fas fa-check-circle"></i>`,
                type: "success",
                duration: 5000,
                speed: 2000
            });
            formData.value={}
            router.push({name:'indexCompanyPhases'})

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

    //get criteria by id
    const getPhase = async(id)=> {
        adminApi.get(`/v1/dashboard/companyPhases/${id}`)
        .then((res) => {
            formData.value={
                ar:{name:res.data.data.phase.translations[0].name},
                en:{name:res.data.data.phase.translations[1].name},
                client_percentage:res.data.data.phase.client_percentage,
                company_percentage:res.data.data.phase.company_percentage,
                id:res.data.data.phase.id,
            }
        })
        .catch((err) => {
            console.log(err);
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
        companyPhases,
        getCompanyPhases,
        deleteCompanyPhases,
        createCompanyPhase,
        updateCompanyPhase,
        getPhase
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
