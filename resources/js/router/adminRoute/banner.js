import indexBanner from "../../view/admin/banner/index";
import editBanner from "../../view/admin/banner/editBanner";

export default [
    {
        path: 'banner',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexBanner',
                component: indexBanner,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editBanner',
                component: editBanner,
                props: true
            },
        ]
    },
];
