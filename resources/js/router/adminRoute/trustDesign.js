import index from '../../view/admin/trustDesign/index';
import showDesign from "../../view/admin/trustDesign/show";


export default [
    {
        path: 'trustDesign',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexDesign',
                component: index
            },
            {
                path: 'show/:id(\\d+)',
                name: 'showDesign',
                component: showDesign,
                props: true
            },
        ]
    },
];
