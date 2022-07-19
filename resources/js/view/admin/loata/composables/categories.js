import adminApi from "../../../../api/adminAxios";
import { ref, watch } from "vue";
import { useI18n } from "vue-i18n";
import { notify } from "@kyvg/vue3-notification";
import { useRouter } from "vue-router";
export function categoriesComposable() {
    const formData = ref({});
    const router = useRouter();
    const loading = ref(false); //loading for button
    const errors = ref({}); //errors for create or update
    const message = ref(""); // message for notify

    let categories = ref({}); //data for index page
    let debounce = ref({}); // for search
    const search = ref(""); //search in index page

    const { t } = useI18n();

    watch(search, (search, prevSearch) => {
        clearTimeout(debounce.value);
        debounce.value = setTimeout(() => {
            getCategories();
        }, 500);
    });

    //get all categories
    const getCategories = async (page = 1) => {
        loading.value = true;

        adminApi
            .get(`/v1/dashboard/categories?page=${page}&search=${search.value}`)
            .then((res) => {
                categories.value = res.data.data.categories;
            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                loading.value = false;
            });
    };

    //delete category

    const deleteCategory = async (id, index) => {
        Swal.fire({
            title: t(`treasury.AreYouSureDelete`),
            text: t("treasury.YouWontBeAbleToRevertThis"),
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes",
        }).then((result) => {
            if (result.isConfirmed) {
                adminApi
                    .delete(`/v1/dashboard/categories/${id}`)
                    .then((res) => {
                        categories.value.data.splice(index, index + 1);
                        Swal.fire({
                            icon: "success",
                            title: t("global.Your package has been deleted."),
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    })
                    .catch((err) => {
                        console.log(err.response);
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
    };

    //store category
    const createCategory = async (form) => {
        loading.value = true;
        errors.value = {};
        await adminApi
            .post("/v1/dashboard/categories", form)
            .then((result) => {
                notify({
                    title:
                        t("global.Successfully added") +
                        `<i class="fas fa-check-circle"></i>`,
                    type: "success",
                    duration: 5000,
                    speed: 2000,
                });

                formData.value={
                    ar:{name:''},
                    en:{name:''},
                }
            })
            .catch((e) => {
                if (e.response.data.errors) {
                    for (const el in e.response.data.errors) {
                        errors.value[el] = e.response.data.errors[el][0];
                    }
                } else {
                    notify({
                        title:
                            t("global.Unknown error") +
                            ` <i class="fas fa-check-circle"></i>`,
                        type: "error",
                        duration: 5000,
                        speed: 2000,
                    });
                }
            });
        loading.value = false;
    };

    //update ccategory
    const updateCategory = async (form, id) => {
        loading.value = true;
        errors.value = {};
        await adminApi
            .put("/v1/dashboard/categories/" + id, form)
            .then((result) => {
                notify({
                    title:
                        t("global.Successfully updated") +
                        `<i class="fas fa-check-circle"></i>`,
                    type: "success",
                    duration: 5000,
                    speed: 2000,
                });
                formData.value = {};
                router.push({ name: "Categories" });
            })
            .catch((e) => {
                if (e.response.data.errors) {
                    for (const el in e.response.data.errors) {
                        errors.value[el] = e.response.data.errors[el][0];
                    }
                } else {
                    notify({
                        title:
                            t("global.Unknown error") +
                            ` <i class="fas fa-check-circle"></i>`,
                        type: "error",
                        duration: 5000,
                        speed: 2000,
                    });
                }
            });
        loading.value = false;
    };

    //get category by id
    const getCategory = async (id) => {
        adminApi
            .get(`/v1/dashboard/categories/${id}`)
            .then((res) => {
                formData.value = {
                    ar: { name: res.data.data.category.translations[0].name },
                    en: { name: res.data.data.category.translations[1].name },
                    id: res.data.data.category.id,
                };
            })
            .catch((err) => {
                console.log(err);
            })
            .finally(() => {
                loading.value = false;
            });
    };


    return {
        formData,
        loading,
        errors,
        message,
        search,
        categories,
        getCategories,
        deleteCategory,
        createCategory,
        updateCategory,
        getCategory,
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
