import indexAdvisorPackage from "../../view/admin/advisorPackage/index";
import createAdvisorPackage from "../../view/admin/advisorPackage/create";
import editAdvisorPackage from "../../view/admin/advisorPackage/edit";

import indexAdvisorDetail from "../../view/admin/advisorPackageDetail/index";
import createAdvisorDetail from "../../view/admin/advisorPackageDetail/create";
import editAdvisorDetail from "../../view/admin/advisorPackageDetail/edit";

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
            {
                path: 'detail/:id(\\d+)',
                name: 'indexAdvisorDetail',
                component: indexAdvisorDetail,
                props: true
            },
            {
                path: 'create/detail/:id(\\d+)',
                name: 'createAdvisorDetail',
                component: createAdvisorDetail,
                props: true
            },
            {
                path: 'edit/:idAdvisor(\\d+)/detail/:idDetail(\\d+)',
                name: 'editAdvisorDetail',
                component: editAdvisorDetail,
                props: true
            },
        ]
    },
];
