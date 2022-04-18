import advertiserPackage from "../../view/admin/package/index";
import createPackage from "../../view/admin/package/createPackage";
import editPackage from "../../view/admin/package/editPackage";
import showPackage from "../../view/admin/package/showPackage";

export default [
    {
        path: 'package',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'package',
                component: advertiserPackage,
            },
            {
                path: 'create',
                name: 'createPackage',
                component: createPackage,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editPackage',
                component: editPackage,
                props: true
            },
            {
                path: 'show/:id(\\d+)',
                name: 'showPackage',
                component: showPackage,
                props: true
            },
        ]
    },
];
