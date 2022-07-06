import indexOpponents from "../../view/admin/Opponents/index";
import createOpponents from "../../view/admin/Opponents/create";
import editOpponents from "../../view/admin/Opponents/edit";
import indexSubOpponents from "../../view/admin/subOpponents/index";
import createSubOpponents from "../../view/admin/subOpponents/create";
import editSubOpponents from "../../view/admin/subOpponents/edit";

export default [
    {
        path: 'Opponents',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexOpponents',
                component: indexOpponents,
            },
            {
                path: 'create',
                name: 'createOpponents',
                component: createOpponents,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editOpponents',
                component: editOpponents,
                props: true
            },{
                path: 'subOpponents/:id(\\d+)/main/:mainId(\\d+)',
                name: 'indexSubOpponents',
                component: indexSubOpponents,
                props: true
            },
            {
                path: 'subOpponents/create/:id(\\d+)/main/:mainId(\\d+)',
                name: 'createSubOpponents',
                component: createSubOpponents,
                props: true
            },
            {
                path: 'subOpponents/edit/:id(\\d+)/main/:mainId(\\d+)',
                name: 'editSubOpponents',
                component: editSubOpponents,
                props: true
            },
        ]
    },
];
