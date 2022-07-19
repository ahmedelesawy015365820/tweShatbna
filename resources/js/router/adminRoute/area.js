import area from "../../view/admin/area/index";
import createArea from "../../view/admin/area/createArea";
import editArea from "../../view/admin/area/editArea";

export default [
    {
        path: 'areas',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexArea',
                component: area,
            },
            {
                path: 'create',
                name: 'createArea',
                component: createArea,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editArea',
                component: editArea,
                props: true
            },
        ]
    },
];
