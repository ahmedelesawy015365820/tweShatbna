import privacy from "../../view/admin/privacy/index";
import createPrivacy from "../../view/admin/privacy/createPrivacy";
import editPrivacy from "../../view/admin/privacy/editPrivacy";

export default [
    {
        path: 'privacy',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexPrivacy',
                component: privacy,
            },
            {
                path: 'create',
                name: 'createPrivacy',
                component: createPrivacy,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editPrivacy',
                component: editPrivacy,
                props: true
            },
        ]
    },
];
