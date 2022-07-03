import ComService from "../../view/admin/companyService/index";
import createComService from "../../view/admin/companyService/createComService";
import editComService from "../../view/admin/companyService/editComService";

export default [
    {
        path: 'comService',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexComService',
                component: ComService,
            },
            {
                path: 'create',
                name: 'createComService',
                component: createComService,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editComService',
                component: editComService,
                props: true
            },
        ]
    },
];
