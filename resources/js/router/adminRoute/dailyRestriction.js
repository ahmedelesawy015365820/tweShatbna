import indexDailyRestriction from "../../view/admin/dailyRestriction/index";
import createDailyRestriction from "../../view/admin/dailyRestriction/create";
import editDailyRestriction from "../../view/admin/dailyRestriction/edit";

export default [
    {
        path: 'DailyRestriction',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexDailyRestriction',
                component: indexDailyRestriction,
            },
            {
                path: 'create',
                name: 'createDailyRestriction',
                component: createDailyRestriction,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editDailyRestriction',
                component: editDailyRestriction,
                props: true
            },
        ]
    },
];
