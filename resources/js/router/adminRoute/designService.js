import Service from "../../view/admin/designService/index";
import createService from "../../view/admin/designService/createService";
import editService from "../../view/admin/designService/editService";

export default [
    {
        path: 'desService',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexService',
                component: Service,
            },
            {
                path: 'create',
                name: 'createService',
                component: createService,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editService',
                component: editService,
                props: true
            },
        ]
    },
];
