import architectural from "../../view/admin/architectural/index";
import createArchitectural from "../../view/admin/architectural/createArchitectural";
import editArchitectural from "../../view/admin/architectural/editArchitectural";

export default [
    {
        path: 'architectural',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexArchitectural',
                component: architectural,
            },
            {
                path: 'create',
                name: 'createArchitectural',
                component: createArchitectural,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editArchitectural',
                component: editArchitectural,
                props: true
            },
        ]
    },
];
