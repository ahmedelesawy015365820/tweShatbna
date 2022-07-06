import adminApi from "../../../../api/adminAxios";
import { ref,watch } from "vue";
import { useI18n } from "vue-i18n";
import { notify } from "@kyvg/vue3-notification";
import { useRouter } from "vue-router";
export function complaintsComposable() {
    const router = useRouter();
    const loading = ref(false); //loading for button

    let complaints = ref({}); //data for index page
    let complaint = ref({}); //complaint details
    let debounce = ref({}); // for search
    const search = ref(''); //search in index page

    const {t} =useI18n();



    watch(search, (search, prevSearch) => {
        clearTimeout(debounce.value);
        debounce.value= setTimeout(() => {
            getAllComplaints();
         },500)

     });

     //get all designers fines
    const getAllComplaints = async (page = 1)=>{
        loading.value = true;

        adminApi.get(`/v1/dashboard/complaints?page=${page}&search=${search.value}`)
            .then((res) => {
                complaints.value = res.data.data.complaints;
            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                loading.value = false;
            });
    }


    //update fine  request
    const updateComplaint = async (data,id) => {
        loading.value=true
        errors.value={}
        await adminApi.put('/v1/dashboard/complaints/'+id,data).then((result)=>{
            notify({
                title: t('global.Successfully updated')+`<i class="fas fa-check-circle"></i>`,
                type: "success",
                duration: 5000,
                speed: 2000
            });
            formData.value={}
            router.push({name:'complaints'})

        }).catch((e) => {

                notify({
                    title: t('global.Unknown error')+` <i class="fas fa-check-circle"></i>`,
                    type: "error",
                    duration: 5000,
                    speed: 2000
                });

        })
        loading.value=false
    }

    //get fine by id
    const getComplaint = async(id)=> {
        adminApi.get(`/v1/dashboard/complaints/${id}`)
        .then((res) => {
            complaint.value=res.data.data.complaint;
        })
        .catch((err) => {
            console.log(err.response.data);
        })
        .finally(() => {
            loading.value = false;
        });
    }



    return {
        loading,
        search,
        complaints,
        complaint,
        getAllComplaints,
        updateComplaint,
        getComplaint
    };
}
