import indexExpenseAccounts from "../../view/admin/ExpenseAccounts/index";
import createExpenseAccounts from "../../view/admin/ExpenseAccounts/create";
import editExpenseAccounts from "../../view/admin/ExpenseAccounts/edit";
import indexSubExpenseAccounts from "../../view/admin/subExpenseAccounts/index";
import createSubExpenseAccounts from "../../view/admin/subExpenseAccounts/create";
import editSubExpenseAccounts from "../../view/admin/subExpenseAccounts/edit";

export default [
    {
        path: 'ExpenseAccounts',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexExpenseAccounts',
                component: indexExpenseAccounts,
            },
            {
                path: 'create',
                name: 'createExpenseAccounts',
                component: createExpenseAccounts,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editExpenseAccounts',
                component: editExpenseAccounts,
                props: true
            },{
                path: 'subExpenseAccounts/:id(\\d+)/main/:mainId(\\d+)',
                name: 'indexSubExpenseAccounts',
                component: indexSubExpenseAccounts,
                props: true
            },
            {
                path: 'subExpenseAccounts/create/:id(\\d+)/main/:mainId(\\d+)',
                name: 'createSubExpenseAccounts',
                component: createSubExpenseAccounts,
                props: true
            },
            {
                path: 'subExpenseAccounts/edit/:id(\\d+)/main/:mainId(\\d+)',
                name: 'editSubExpenseAccounts',
                component: editSubExpenseAccounts,
                props: true
            },
        ]
    },
];
