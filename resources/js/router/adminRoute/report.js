import platformIncome from "../../view/admin/report/platformIncome";

export default [
    {
        path: 'report',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: 'platformIncome',
                name: 'platformIncome',
                component: platformIncome,
            }
        ]
    },
];
