import salePackage from "../../view/admin/salePackage/index";
import createSale from "../../view/admin/salePackage/createSale";
import showSale from "../../view/admin/salePackage/show";
import editSale from "../../view/admin/salePackage/editSale";

export default [
    {
        path: 'salePackage',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'sale',
                component: salePackage,
            },
            {
                path: 'create',
                name: 'createSale',
                component: createSale,
            },
            {
                path: 'show/:id(\\d+)',
                name: 'showSale',
                component: showSale,
                props: true
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editSale',
                component: editSale,
                props: true
            },
        ]
    },
];
