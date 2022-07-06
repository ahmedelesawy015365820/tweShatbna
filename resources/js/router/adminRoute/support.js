import support from "../../view/admin/support/index";
import showSupport from "../../view/admin/support/show";

export default [
    {
        path: 'support',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexSupport',
                component: support,
            },
            {
                path: 'show/:id(\\d+)',
                name: 'showSupport',
                component: showSupport,
                props: true
            },
        ]
    },
];
