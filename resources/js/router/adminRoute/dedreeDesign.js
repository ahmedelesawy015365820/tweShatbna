import Service from "../../view/admin/dedreeDesign/index";
import createDegree from "../../view/admin/dedreeDesign/createDegree";
import editDegree from "../../view/admin/dedreeDesign/editComDegree";

export default [
    {
        path: 'designDegree',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexDegree',
                component: Service,
            },
            {
                path: 'create',
                name: 'createDegree',
                component: createDegree,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editDegree',
                component: editDegree,
                props: true
            },
        ]
    },
];
