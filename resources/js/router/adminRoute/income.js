import indexIncome from "../../view/admin/income/index";
import createIncome from "../../view/admin/income/createIncome";
import editIncome from "../../view/admin/income/editIncome";

export default [
    {
        path: 'income',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexIncome',
                component: indexIncome,
            },
            {
                path: 'create',
                name: 'createIncome',
                component: createIncome,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editIncome',
                component: editIncome,
                props: true
            },
        ]
    },
];
