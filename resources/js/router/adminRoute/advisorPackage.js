import indexAdvisorPackage from "../../view/admin/advisorPackage/index";
import createAdvisorPackage from "../../view/admin/advisorPackage/create";
import editAdvisorPackage from "../../view/admin/advisorPackage/edit";

export default [
    {
        path: 'advisorPackage',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexAdvisorPackage',
                component: indexAdvisorPackage,
            },
            {
                path: 'create',
                name: 'createAdvisorPackage',
                component: createAdvisorPackage,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editAdvisorPackage',
                component: editAdvisorPackage,
                props: true
            },
        ]
    },
];
