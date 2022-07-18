import indexTrialBalance from "../../view/admin/trialBalance/index";

export default [
    {
        path: 'trialBalance',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexTrialBalance',
                component: indexTrialBalance,
            }
        ]
    },
];
