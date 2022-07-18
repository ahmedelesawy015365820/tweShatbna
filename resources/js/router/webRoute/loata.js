
import guest from "../../middleware/admin/guest";

export default [

    //loata products
    {
       path: '/loata/products',
       component:  {
           template:'<router-view />',
       },
        meta: {
            middleware: [guest]
        },
       children:[
           {
               path: '',
               name: 'LoataProducts',
               component:() => import('../../view/web/loata/index.vue'),
           },
           {
               path: 'product-details/:id',
               name: 'productDetails',
               props:true,
               component:() => import('../../view/web/loata/product-details.vue'),
           },
       ]
   },

    //loata cart
    {
        path: '/loata/',
        component:  {
            template:'<router-view />',
        },
         meta: {
             middleware: [guest]
         },

        children:[
            {
                path: 'cart',
                name: 'cart',
                component:() => import('../../view/web/loata/cart_and_order/cart.vue'),
            },
            {
                path: 'checkout',
                name: 'checkout',
                component:() => import('../../view/web/loata/cart_and_order/checkout.vue'),
            },

        ]
    },

    //loata order
    {
        path: '/loata/',
        component:  {
            template:'<router-view />',
        },
         meta: {
             middleware: [guest]
         },

        children:[
            {
                path: 'orders',
                name: 'orders',
                component:() => import('../../view/web/loata/cart_and_order/order.vue'),
            },
            {
                path: 'order-details/:id',
                name: 'orderDetails',
                props:true,
                component:() => import('../../view/web/loata/cart_and_order/order_details.vue'),
            },

        ]
    },

]
