import webApi from "../../../../api/webAxios";
import { ref,watch } from "vue";
import { useI18n } from "vue-i18n";
import { notify } from "@kyvg/vue3-notification";
import { useRouter } from "vue-router";
import { useStore } from 'vuex';

export function cartAndOrder(){
    const countries = ref({});
    const products = ref({});
    const cartInfo = ref({});
    const states = ref({});
    const areas = ref({});
    const formData = ref({})
    const cartRef = ref({})
    const errors = ref({})
    const total = ref(0)
    const router = useRouter()
    const order = ref({})
    const orders = ref({})
    const {t,locale} = useI18n()
    const loading = ref(false)
    const checkIfProductInCartVar = ref(false)
    // const cartRef = ref(store.state.cart.cart)
    const QtyAfterAddedInCart = ref(0);

    const country = ref('')
    const state = ref('')
    const area = ref('')


    const getTotalForCart = async () => {
        total.value=0
        let cart= cartRef.value
        for(const item in cart)
            total.value += cart[item].price * cart[item].qty
    }

    const getCartInforamtion = async (id) => {
        loading.value=true
        await webApi.post("/v1/web/getTotalWithShoppingCost/"+id).then((res) => {
            cartInfo.value = res.data
        })
        loading.value=false
    }



    const createOrder= async (data) => {
        loading.value = true;
        errors.value = {};
        await webApi.post("/v1/web/create-order",data).then((result)=> {
            localStorage.setItem('cart',[])
            formData.value={}
            cartRef.value={}
            notify({
                title:
                t('global.'+result.data.message) +
                    `<i class="fas fa-check-circle"></i>`,
                type: "success",
                duration: 5000,
                speed: 2000,
            });

            router.push({name:'home',params:{lang:locale.value}})
        }).catch((e)=>{
            console.log(e)
            if (e.response.data.errors != undefined) {
                for(const el in e.response.data.errors){
                    errors.value[el]=e.response.data.errors[el][0];
                }
            }
            if(e.response.status == 400){
                localStorage.setItem('cart',JSON.stringify(e.response.data.cart))
                router.push({name:'cart',params:{lang:locale.value}})
            }
            if(e.response.data.message != undefined ){
                notify({
                    title:
                    t('global.'+e.response.data.message) +
                        `<i class="fas fa-check-circle"></i>`,
                    type: "error",
                    duration: 5000,
                    speed: 2000,
                });
            }
        })
        loading.value = false;

    }


    const getOrders= async() => {
        loading.value=true
        await webApi.post('/v1/web/orders').then((result) => {
            console.log(result)
            orders.value = result.data.orders
        })
        loading.value=false
    }


    const getOrder = async (id) => {
        loading.value=true
        await webApi.post('/v1/web/order-details/'+id).then((result)=>{
            console.log(result)
            order.value=result.data.order
            country.value=result.data.order.country.name
            state.value=result.data.order.state.name
            area.value=result.data.order.area.name
            products.value=result.data.products
        })
        loading.value=false
    }




    //delete item from table cart in database
    const deleteItem = async (id) => {
        loading.value=true
        await webApi
            .post("/v1/web/delete_item", { product_id: id })
            .then((result) => {
                if (result.status == 201) {
                    //delete item from localstorage after removed successfully from database
                    notify({
                        title:
                        t('global.'+result.data.message) +
                            `<i class="fas fa-check-circle"></i>`,
                        type: "success",
                        duration: 5000,
                        speed: 2000,
                    });

                    cartRef.value = result.data.cart
                    localStorage.setItem('cart',JSON.stringify(result.data.cart))
                }
            })
            .catch((e) => {
                if (e.response.status == 401) {
                    router.push({name:'loginPartiner',params:{lang:locale.value}});
                }
            });
            loading.value=false
    }




    //update cart
    const changeQty = async (item) => {
        loading.value=true
        await webApi
        .post("/v1/web/update_item", { product_id: item.id, qty: item.qty })
        .then((result) => {
            if (result.status == 200) {
                cartRef.value = result.data.cart
                localStorage.setItem('cart',JSON.stringify(result.data.cart))
            }
        })
        .catch((e) => {
            if (e.response.status == 401) {
                router.push({name:'loginPartiner',params:{lang:locale.value}});
            }
        });
        loading.value=false
    }


    //add new item to table cart in database
    const AddItemToCartInDatabase = async (id, price, image, name,stock,qty) => {
        loading.value = true;
        await webApi.post("/v1/web/add_item", { product_id: id, qty: qty })
            .then((result) => {
                // add item in localstorage after added successfully in database
                if (result.status == 200) {
                    QtyAfterAddedInCart.value = qty;
                    addToCart(id, price, image, name,stock,qty)
                    checkIfProductInCartVar.value=true
                }

                notify({
                    title:
                    t('global.'+result.data.message) +
                        `<i class="fas fa-check-circle"></i>`,
                    type: "success",
                    duration: 5000,
                    speed: 2000,
                });

            })
            .catch((e) => {
                if (e.response&&e.response.status == 401) {
                    router.push({name:'loginPartiner',params:{lang:locale.value}});
                }
            });
        loading.value = false;
    };
    //add to cart in local storage
    const addToCart = async (id, price, image, name,stock,qty) => {

        if(!checkIfProductInCart(id)){
            var arr=[]
            arr = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : []
            arr.push({
                id: id,
                price: price,
                image: image,
                name: name,
                stock: stock,
                qty: qty,
            })
            localStorage.setItem('cart',JSON.stringify(arr))
        }
    };

    //check If Product In the Cart
    const checkIfProductInCart = (id) => {
        let cart =localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : []
        for (const item in cart) {
            if ( cart[item]["id"] == id) {
                return true
            }
        }
            return false;
    };


    const getQtyAfterAddedInCart = async (id) => {
        let cart =localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : []
        for (const item in cart) {
            if (cart[item]["id"] == id) {
            QtyAfterAddedInCart.value = cart[item]["qty"];
            }
        }
    };



    //get countries
    const getCountries = async ()=> {
        loading.value=true
        await webApi.get(`/v1/web/get_countries`)
        .then((res) => {
            countries.value = res.data.data.countries;
        })
        loading.value=false

    }
    //get states
    const getStates = async (id)=> {
        loading.value=true
        await webApi.get(`/v1/web/country_states/${id}`)
        .then((res) => {
            states.value = res.data.data.states;
        })
        loading.value=false

    }
    //get areas
    const getAreas = async (id)=> {
        loading.value=true
        await webApi.get(`/v1/web/state_areas/${id}`)
        .then((res) => {
            areas.value = res.data.data.areas;
        })
        loading.value=false
    }



    return {
        products,
        country,
        state,
        area,
        formData,
        errors,
        cartRef,
        changeQty,
        getTotalForCart,
        total,
        deleteItem,
        createOrder,
        loading,
        getOrder,
        getOrders,
        order,
        orders,
        checkIfProductInCart,
        getQtyAfterAddedInCart,
        QtyAfterAddedInCart,
        AddItemToCartInDatabase,
        checkIfProductInCartVar,
        getAreas,
        areas,
        getCountries,
        countries,
        getStates,
        states,
        cartInfo,
        getCartInforamtion
    }

}


