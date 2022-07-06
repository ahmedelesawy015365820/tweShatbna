import indexAdvisorOne from "../../view/admin/advisorOne/index";
import createAdvisorOne from "../../view/admin/advisorOne/create";
import editAdvisorOne from "../../view/admin/advisorOne/edit";

export default [
    {
        path: 'advisorSectionOne',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexAdvisorOne',
                component: indexAdvisorOne,
            },
            {
                path: 'create',
                name: 'createAdvisorOne',
                component: createAdvisorOne,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editAdvisorOne',
                component: editAdvisorOne,
                props: true
            }
        ]
    },
];
