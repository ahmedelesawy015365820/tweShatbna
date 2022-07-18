

export default [

     //categories
     {
        path: 'categories',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'Categories',
                component:() => import('../../view/admin/loata/categories/index.vue'),
            },
            {
                path: 'create',
                name: 'createCategory',
                component:() => import('../../view/admin/loata/categories/create.vue'),
            },
            {
                path: 'update/:id(\\d+)',
                name: 'updateCategory',
                component: () => import('../../view/admin/loata/categories/update.vue'),
                props: true
            },
        ]
    },


     //products
     {
        path: 'products',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'Products',
                component:() => import('../../view/admin/loata/products/index.vue'),
            },
            {
                path: 'create',
                name: 'createProduct',
                component:() => import('../../view/admin/loata/products/create.vue'),
            },
            {
                path: 'update/:id(\\d+)',
                name: 'updateProduct',
                component: () => import('../../view/admin/loata/products/update.vue'),
                props: true
            },
        ]
    },

     //orders
     {
        path: 'Orders',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'Orders',
                component:() => import('../../view/admin/loata/orders/index.vue'),
            },
            {
                path: 'details/:id(\\d+)',
                name: 'orderDetails',
                props:true,
                component:() => import('../../view/admin/loata/orders/order-details.vue'),
            }
        ]
    },


    //area cost
    {
        path: 'area_cost',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexAreaCost',
                component:() => import('../../view/admin/loata/area_cost/index.vue'),
            },
            {
                path: 'create',
                name: 'createAreaCost',
                component:() => import('../../view/admin/loata/area_cost/create.vue'),
            },
            {
                path: 'update/:id(\\d+)',
                name: 'updateAreaCost',
                component: () => import('../../view/admin/loata/area_cost/update.vue'),
                props: true
            },
        ]
    },
    //weight
    {
        path: 'weight_cost',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexWeightCost',
                component:() => import('../../view/admin/loata/weight_cost/index.vue'),
            },
            {
                path: 'create',
                name: 'createWeightCost',
                component:() => import('../../view/admin/loata/weight_cost/create.vue'),
            },
            {
                path: 'update/:id(\\d+)',
                name: 'updateWeightCost',
                component: () => import('../../view/admin/loata/weight_cost/update.vue'),
                props: true
            },
        ]
    },

]
