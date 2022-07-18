import adminApi from "../../../../api/adminAxios";
import { ref, watch } from "vue";
import { useI18n } from "vue-i18n";
import { notify } from "@kyvg/vue3-notification";
import { useRouter } from "vue-router";
export function productsComposable() {
    const formData = ref({});
    const categories = ref({});
    const router = useRouter();
    const loading = ref(false); //loading for button
    const errors = ref({}); //errors for create or update
    const message = ref(""); // message for notify

    let products = ref({}); //data for index page
    const intervals = ref([]); //data for index page
    let debounce = ref({}); // for search
    const search = ref(""); //search in index page
    const date = ref(""); //search in index page
    const category = ref(""); //search in index page

    const { t } = useI18n();

    watch(search, (search, prevSearch) => {
        clearTimeout(debounce.value);
        debounce.value = setTimeout(() => {
            getProducts();
        }, 400);
    });

    //get products
    const getProducts = async (page = 1) => {
        loading.value = true;

        adminApi
            .get(`/v1/dashboard/products?page=${page}&search=${search.value}&date=${date.value}&category=${category.value}`)
            .then((res) => {
                intervals.value.forEach(clearInterval);
                products.value = res.data.data.products;
            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                loading.value = false;
            });
    };

    //delete products

    const deleteProduct = async (id, index) => {
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
                    .delete(`/v1/dashboard/products/${id}`)
                    .then((res) => {
                        products.value.data.splice(index, index + 1);
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

    //store product  request
    const createProduct = async (e) => {
        loading.value = true;
        errors.value = {};
        let form = new FormData(e.target);
        await adminApi
            .post("/v1/dashboard/products", form)
            .then((result) => {
                notify({
                    title:
                        t("global.Successfully added") +
                        `<i class="fas fa-check-circle"></i>`,
                    type: "success",
                    duration: 5000,
                    speed: 2000,
                });
                e.target.reset();
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

    //update product  request
    const updateProduct = async (e, id) => {
        loading.value = true;
        errors.value = {};
        let form = new FormData(e.target);
        form.append("id", id);
        await adminApi
            .post("/v1/dashboard/products/" + id, form)
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

                router.push({ name: "Products" });
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

    //get products by id
    const getProduct = async (id) => {
        adminApi
            .get(`/v1/dashboard/products/${id}`)
            .then((res) => {

                formData.value = {
                    ar: { name: res.data.data.product.translations[0].name ,description:res.data.data.product.translations[0].description ,divo:res.data.data.product.translations[0].divo},
                    en: { name: res.data.data.product.translations[1].name ,description: res.data.data.product.translations[1].description,divo: res.data.data.product.translations[1].divo },
                    stock: res.data.data.product.stock,
                    weight: res.data.data.product.weight,
                    price:res.data.data.product.price,
                    sale:res.data.data.product.sale,
                    expiry_date:res.data.data.product.expiry_date,
                    category_id:res.data.data.product.category_id,
                    id: res.data.data.product.id,
                };
            })
            .catch((err) => {
                console.log(err);
            })
            .finally(() => {
                loading.value = false;
            });
    };


    const getCategories = async () => {
        await adminApi
        .get(`/v1/web/getAllCategories`)
        .then((res) => {
            console.log(res)
            categories.value = res.data.data.categories
        })
    }


    const countdown = async (time,id) => {
        // Set the date we're counting down to
        var countDownDate = new Date(time).getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;


        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("second"+id)?document.getElementById("second"+id).innerHTML = seconds : null;
        document.getElementById("day"+id)?document.getElementById("day"+id).innerHTML = days : null;
        document.getElementById("minute"+id)?document.getElementById("minute"+id).innerHTML =minutes : null;
        document.getElementById("hour"+id)?document.getElementById("hour"+id).innerHTML =  hours : null;

        // If the count down is over, write some text
        if (distance < 0) {
            clearInterval(x);
            $('#time'+id).removeClass('d-block')
            $('#time'+id).addClass('d-none')
            $('#expired'+id).removeClass('d-none')
            $('#expired'+id).addClass('d-block')

        }

        }, 1000);

        intervals.value.push(x)

    }

    return {
        formData,
        loading,
        date,
        category,
        intervals,
        errors,
        message,
        search,
        products,
        getProducts,
        countdown,
        deleteProduct,
        createProduct,
        updateProduct,
        getProduct,
        getCategories,
        categories,
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
