import state from "../../view/admin/state/index";
import createState from "../../view/admin/state/createState";
import editState from "../../view/admin/state/editState";

export default [
    {
        path: 'state',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexState',
                component: state,
            },
            {
                path: 'create',
                name: 'createState',
                component: createState,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editState',
                component: editState,
                props: true
            },
        ]
    },
];
