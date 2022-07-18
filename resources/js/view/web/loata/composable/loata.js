import webApi from "../../../../api/webAxios";
import { ref,watch } from "vue";
import { useI18n } from "vue-i18n";
import { notify } from "@kyvg/vue3-notification";
import { useRouter } from "vue-router";
import { useStore } from 'vuex';

export function loataComposable(){

    const latestProducts= ref({})
    const loading= ref(false)
    const stock= ref(0)
    const location =ref('')
    let products = ref({}); //data for index page
    let product = ref({}); //product for prduct details page
    const intervals = ref([]); //intervals for store count down
    let debounce = ref({}); // for search
    let categories = ref({}); // for search
    const search = ref(""); //search in index page
    const date = ref(""); //search in index page
    const category = ref(""); //search in index page



    watch(search, (search, prevSearch) => {
        clearTimeout(debounce.value);
        debounce.value = setTimeout(() => {
            getProducts();
        }, 500);
    });

    // get latest producs for section products in index page
    const getLatestProducts = async () => {
        await webApi.post('/v1/web/latestProducts').then((response)=>{
            console.log(response)
            intervals.value.forEach(clearInterval);
            latestProducts.value=response.data.products
        })

    }


    //show product (product details page)
     //get products by id
     const getProduct = async (id) => {
        loading.value=true
        webApi
            .post(`/v1/web/product/details/${id}`)
            .then((res) => {
                location.value = window.location.href
                intervals.value.forEach(clearInterval);
                product.value = res.data.data.product
                if(getQtyAfterFromCart(id) == 0){
                    stock.value = product.value.stock-1
                }else{
                    console.log(getQtyAfterFromCart(id))
                    stock.value = product.value.stock - getQtyAfterFromCart(id)
                }
                setTimeout(()=>{
                    $('#qty'+id).val(1)
                    loading.value = false;
                },1000)
            })
            .catch((err) => {
                console.log(err);
            })
            loading.value = false;
    };

    function getQtyAfterFromCart (id) {
        let cart =localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : []
        for (const item in cart) {
            if (cart[item]["id"] == id) {
              return cart[item]["qty"];
            }
        }
        return 0;
    };


    //get all products for loata page
    const getProducts = async (page = 1) => {
        loading.value=true

        await webApi.post(`/v1/web/products?page=${page}&search=${search.value}&date=${date.value}&category=${category.value}`).then((response)=>{
            intervals.value.forEach(clearInterval);
            products.value=response.data.data.products
        })

        loading.value=false

    }



    //for count down  time
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



    //get all categories
    const getCategories = async () => {
        await webApi
        .get(`/v1/web/getAllCategories`)
        .then((res) => {
            categories.value = res.data.data.categories
        })
    }



    //inc and dec button
    const qtyButton = async () => {
         // Product Quantity JS
        $(".pro-qty").append('<div class= "dec qty-btn">-</div>');
        $(".pro-qty").append('<div class="inc qty-btn">+</div>');
        $('.qty-btn').on('click', function (e) {
        e.preventDefault();
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if(product.value.stock < oldValue || ($button.hasClass('inc') && product.value.stock <= oldValue)){
            var newVal = product.value.stock;
            stock.value =0
        }else{
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + 1;
                stock.value--
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
                stock.value++
                } else {
                newVal = 1;
                stock.value = product.value.stock-1
                }
            }
        }

        $button.parent().find('input').val(newVal);
        });
    }







    return {
        latestProducts,
        countdown,
        intervals,
        getProducts,
        products,
        search,
        date,
        loading,
        getLatestProducts,
        getCategories,
        categories,
        category,
        product,
        getProduct,
        qtyButton,
        stock,
        location


    };

}
