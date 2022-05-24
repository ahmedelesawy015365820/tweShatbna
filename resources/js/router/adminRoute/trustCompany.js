import index from '../../view/admin/trustCompany/index';
import showCompany from '../../view/admin/trustCompany/show';


export default [
    {
        path: 'trustCompany',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexCompany',
                component: index
            },
            {
                path: 'show/:id(\\d+)',
                name: 'showCompany',
                component: showCompany,
                props: true
            },
        ]
    },
];
