import indexEmployee from "../../view/admin/employee/index";
import createEmployee from "../../view/admin/employee/create";
import editEmployee from "../../view/admin/employee/edit";
import changePasswordEmployee from "../../view/admin/employee/changePassword";

export default [
    {
        path: 'employee',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexEmployee',
                component: indexEmployee,
            },
            {
                path: 'create',
                name: 'createEmployee',
                component: createEmployee,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editEmployee',
                component: editEmployee,
                props: true
            },
            {
                path: 'changePassword/:id(\\d+)',
                name: 'changePasswordEmployee',
                component: changePasswordEmployee,
                props: true
            },
        ]
    },
];
