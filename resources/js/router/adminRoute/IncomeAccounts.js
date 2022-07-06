import indexIncomeAccounts from "../../view/admin/IncomeAccounts/index";
import createIncomeAccounts from "../../view/admin/IncomeAccounts/create";
import editIncomeAccounts from "../../view/admin/IncomeAccounts/edit";
import indexSubIncomeAccounts from "../../view/admin/subIncomeAccounts/index";
import createSubIncomeAccounts from "../../view/admin/subIncomeAccounts/create";
import editSubIncomeAccounts from "../../view/admin/subIncomeAccounts/edit";

export default [
    {
        path: 'IncomeAccounts',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexIncomeAccounts',
                component: indexIncomeAccounts,
            },
            {
                path: 'create',
                name: 'createIncomeAccounts',
                component: createIncomeAccounts,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editIncomeAccounts',
                component: editIncomeAccounts,
                props: true
            },{
                path: 'subIncomeAccounts/:id(\\d+)/main/:mainId(\\d+)',
                name: 'indexSubIncomeAccounts',
                component: indexSubIncomeAccounts,
                props: true
            },
            {
                path: 'subIncomeAccounts/create/:id(\\d+)/main/:mainId(\\d+)',
                name: 'createSubIncomeAccounts',
                component: createSubIncomeAccounts,
                props: true
            },
            {
                path: 'subIncomeAccounts/edit/:id(\\d+)/main/:mainId(\\d+)',
                name: 'editSubIncomeAccounts',
                component: editSubIncomeAccounts,
                props: true
            },
        ]
    },
];
