import indexTargetPlan from "../../view/admin/targetPlan/index";
import createTargetPlan from "../../view/admin/targetPlan/create";
import editTargetPlan from "../../view/admin/targetPlan/edit";

export default [
    {
        path: 'targetPlan',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexTargetPlan',
                component: indexTargetPlan,
            },
            {
                path: 'create',
                name: 'createTargetPlan',
                component: createTargetPlan,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editTargetPlan',
                component: editTargetPlan,
                props: true
            },
        ]
    },
];
