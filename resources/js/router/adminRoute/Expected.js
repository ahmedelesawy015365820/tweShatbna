import expected from "../../view/admin/expectedBudget/index";
import createExpected from "../../view/admin/expectedBudget/createExpected";
import editExpected from "../../view/admin/expectedBudget/editExpected";

export default [
    {
        path: 'expected',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexExpected',
                component: expected,
            },
            {
                path: 'create',
                name: 'createExpected',
                component: createExpected,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editExpected',
                component: editExpected,
                props: true
            },
        ]
    },
];
