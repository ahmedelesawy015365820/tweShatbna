import indexAssets from "../../view/admin/Assets/index";
import createAssets from "../../view/admin/Assets/create";
import editAssets from "../../view/admin/Assets/edit";
import indexSubAssets from "../../view/admin/subAssets/index";
import createSubAssets from "../../view/admin/subAssets/create";
import editSubAssets from "../../view/admin/subAssets/edit";

export default [
    {
        path: 'Assets',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexAssets',
                component: indexAssets,
            },
            {
                path: 'create',
                name: 'createAssets',
                component: createAssets,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editAssets',
                component: editAssets,
                props: true
            },{
                path: 'subAssets/:id(\\d+)/main/:mainId(\\d+)',
                name: 'indexSubAssets',
                component: indexSubAssets,
                props: true
            },
            {
                path: 'subAssets/create/:id(\\d+)/main/:mainId(\\d+)',
                name: 'createSubAssets',
                component: createSubAssets,
                props: true
            },
            {
                path: 'subAssets/edit/:id(\\d+)/main/:mainId(\\d+)',
                name: 'editSubAssets',
                component: editSubAssets,
                props: true
            },
        ]
    },
];
