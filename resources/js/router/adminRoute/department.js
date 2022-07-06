import indexDepartment from "../../view/admin/department/index";
import createDepartment from "../../view/admin/department/create";
import editDepartment from "../../view/admin/department/edit";

export default [
    {
        path: 'department',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexDepartment',
                component: indexDepartment,
            },
            {
                path: 'create',
                name: 'createDepartment',
                component: createDepartment,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editDepartment',
                component: editDepartment,
                props: true
            },
        ]
    },
];
