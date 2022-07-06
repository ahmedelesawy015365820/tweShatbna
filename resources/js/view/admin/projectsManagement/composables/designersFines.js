import adminApi from "../../../../api/adminAxios";
import { ref,watch } from "vue";
import { useI18n } from "vue-i18n";
import { notify } from "@kyvg/vue3-notification";
import { useRouter } from "vue-router";
export function designersFinesComposable() {
    const formData = ref({});
    const router = useRouter();
    const loading = ref(false); //loading for button
    const errors = ref({}); //errors for create or update
    const message = ref(''); // message for notify

    let designersFines = ref({}); //data for index page
    let debounce = ref({}); // for search
    const search = ref(''); //search in index page
    const type = ref(''); //filter by type

    const {t} =useI18n();



    watch(search, (search, prevSearch) => {
        clearTimeout(debounce.value);
        debounce.value= setTimeout(() => {
             getDesignersFines();
         },500)

     });

     //get all designers fines
    const getDesignersFines = async (page = 1)=>{
        loading.value = true;

        adminApi.get(`/v1/dashboard/designersFines?page=${page}&search=${search.value}&type=${type.value}`)
            .then((res) => {
                designersFines.value = res.data.data.designer_fines;
            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                loading.value = false;
            });
    }


    //delete designer fine

    const deleteDesignersFine = async (id,index)=>{
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

                adminApi.delete(`/v1/dashboard/designersFines/${id}`)
                    .then((res) => {
                        designersFines.value.data.splice(index,index + 1);
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
    const createDesignerFine = async (data) => {
        loading.value=true
        errors.value={}
        await adminApi.post('/v1/dashboard/designersFines',data).then((result)=>{
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
    const updateDesignerFine = async (data,id) => {
        loading.value=true
        errors.value={}
        await adminApi.put('/v1/dashboard/designersFines/'+id,data).then((result)=>{
            notify({
                title: t('global.Successfully updated')+`<i class="fas fa-check-circle"></i>`,
                type: "success",
                duration: 5000,
                speed: 2000
            });
            formData.value={}
            router.push({name:'DesignersFines'})

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

    //get fine by id
    const getFine = async(id)=> {
        adminApi.get(`/v1/dashboard/designersFines/${id}`)
        .then((res) => {
            formData.value={
                to:res.data.data.fine.to,
                from:res.data.data.fine.from,
                percentage:res.data.data.fine.percentage,
                type:res.data.data.fine.type,
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
        designersFines,
        getDesignersFines,
        deleteDesignersFine,
        createDesignerFine,
        updateDesignerFine,
        getFine,
        type
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
