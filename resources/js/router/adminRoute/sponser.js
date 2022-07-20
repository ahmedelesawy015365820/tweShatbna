import indexSponser from "../../view/admin/sponser/index";
import createSponser from "../../view/admin/sponser/createSponser";
import editSponser from "../../view/admin/sponser/editSponser";

export default [
    {
        path: 'sponser',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexSponser',
                component: indexSponser,
            },
            {
                path: 'create',
                name: 'createSponser',
                component: createSponser,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editSponser',
                component: editSponser,
                props: true
            }
        ]
    },
];
