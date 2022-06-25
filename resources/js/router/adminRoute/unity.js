import unity from "../../view/admin/unity/index";
import createUnity from "../../view/admin/unity/createUnity";
import editUnity from "../../view/admin/unity/editUnity";

export default [
    {
        path: 'unity',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexUnity',
                component: unity,
            },
            {
                path: 'create',
                name: 'createUnity',
                component: createUnity,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editUnity',
                component: editUnity,
                props: true
            },
        ]
    },
];
