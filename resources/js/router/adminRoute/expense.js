import indexExpense from "../../view/admin/expense/index";
import createExpense from "../../view/admin/expense/createExpense";
import editExpense from "../../view/admin/expense/editExpense";

export default [
    {
        path: 'expense',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexExpense',
                component: indexExpense,
            },
            {
                path: 'create',
                name: 'createExpense',
                component: createExpense,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editExpense',
                component: editExpense,
                props: true
            },
        ]
    },
];
