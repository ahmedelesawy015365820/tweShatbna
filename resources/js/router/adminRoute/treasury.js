import indexTreasury from "../../view/admin/treasury/index";
import createTreasury from "../../view/admin/treasury/createTreasury";
import editTreasury from "../../view/admin/treasury/editTreasury";

export default [
    {
        path: 'treasury',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexTreasury',
                component: indexTreasury,
            },
            {
                path: 'create',
                name: 'createTreasury',
                component: createTreasury,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editTreasury',
                component: editTreasury,
                props: true
            },
        ]
    },
];
