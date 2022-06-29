import indexSetting from "../../view/admin/setting/index";
import editSetting from "../../view/admin/setting/editSetting";

export default [
    {
        path: 'setting',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexSetting',
                component: indexSetting,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editSetting',
                component: editSetting,
                props: true
            },
        ]
    },
];
