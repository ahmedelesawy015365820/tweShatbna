import indexJob from "../../view/admin/job/index";
import createJob from "../../view/admin/job/create";
import editJob from "../../view/admin/job/edit";

export default [
    {
        path: 'job',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexJob',
                component: indexJob,
            },
            {
                path: 'create',
                name: 'createJob',
                component: createJob,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editJob',
                component: editJob,
                props: true
            },
        ]
    },
];
