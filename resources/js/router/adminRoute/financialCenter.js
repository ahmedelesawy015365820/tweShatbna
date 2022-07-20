import indexFinancialCenter from "../../view/admin/financialCenter/index";

export default [
    {
        path: 'financialCenter',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexFinancialCenter',
                component: indexFinancialCenter,
            }
        ]
    },
];
