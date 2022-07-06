import indexTransferringTreasury from "../../view/admin/transferringTreasury/index";
import createTransferringTreasury from "../../view/admin/transferringTreasury/createTreasury";
import editTransferringTreasury from "../../view/admin/transferringTreasury/editTreasury";

export default [
    {
        path: 'transferringTreasury',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexTransferringTreasury',
                component: indexTransferringTreasury,
            },
            {
                path: 'create',
                name: 'createTransferringTreasury',
                component: createTransferringTreasury,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editTransferringTreasury',
                component: editTransferringTreasury,
                props: true
            },
        ]
    },
];
