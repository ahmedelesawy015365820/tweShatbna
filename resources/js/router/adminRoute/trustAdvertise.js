import index from '../../view/admin/trustAdvertise/index';


export default [
    {
        path: 'trustAdvertise',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexAdvertise',
                component: index
            },
            // {
            //     path: 'trustCompany/:id(\\d+)',
            //     name: 'editSchedule',
            //     component: editSchedule,
            // },
        ]
    },
];
