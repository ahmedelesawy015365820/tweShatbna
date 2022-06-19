import indexIncomeAndExpense from "../../view/admin/incomeAndExpense/index";
import createIncomeData from "../../view/admin/incomeAndExpense/createIncome";
import editIncomeData from "../../view/admin/incomeAndExpense/editIncome";
import createExpenseData from "../../view/admin/incomeAndExpense/createExpense";
import editExpenseData from "../../view/admin/incomeAndExpense/editExpense";

export default [
    {
        path: 'incomeAndExpense',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexIncomeAndExpense',
                component: indexIncomeAndExpense,
            },
            {
                path: 'income/accounts/create',
                name: 'createIncomeData',
                component: createIncomeData,
            },
            {
                path: 'income/accounts/edit/:id(\\d+)',
                name: 'editIncomeData',
                component: editIncomeData,
                props: true
            },

            {
                path: 'expense/accounts/create',
                name: 'createExpenseData',
                component: createExpenseData,
            },
            {
                path: 'expense/accounts/edit/:id(\\d+)',
                name: 'editExpenseData',
                component: editExpenseData,
                props: true
            },
        ]
    },
];
