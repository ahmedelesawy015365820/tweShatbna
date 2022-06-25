import indexRole from "../../view/admin/role/index";
import createRole from "../../view/admin/role/create";
import editRole from "../../view/admin/role/edit";

export default [
    {
        path: 'role',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexRole',
                component: indexRole,
            },
            {
                path: 'create',
                name: 'createRole',
                component: createRole,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editRole',
                component: editRole,
                props: true
            },
        ]
    },
];
