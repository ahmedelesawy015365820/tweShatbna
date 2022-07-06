import indexSizingOne from "../../view/admin/sizingOne/index";
import createSizingOne from "../../view/admin/sizingOne/create";
import editSizingOne from "../../view/admin/sizingOne/edit";

export default [
    {
        path: 'sizingServiceSectionOne',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexSizingOne',
                component: indexSizingOne,
            },
            {
                path: 'create',
                name: 'createSizingOne',
                component: createSizingOne,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editSizingOne',
                component: editSizingOne,
                props: true
            }
        ]
    },
];
