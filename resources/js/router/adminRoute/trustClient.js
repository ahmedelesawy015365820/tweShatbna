import index from '../../view/admin/trustClient/index';
import showClient from '../../view/admin/trustClient/show';


export default [
    {
        path: 'trustClient',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexClient',
                component: index
            },
            {
                path: 'show/:id(\\d+)',
                name: 'showClient',
                component: showClient,
                props: true
            },
        ]
    },
];
