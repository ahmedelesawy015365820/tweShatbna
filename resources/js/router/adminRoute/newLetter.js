import newLetter from "../../view/admin/newLetter/index";
import createNewLetter from "../../view/admin/newLetter/createNewLetter";
import editNewLetter from "../../view/admin/newLetter/editNewLetter";

export default [
    {
        path: 'newLetter',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexNewLetter',
                component: newLetter,
            },
            {
                path: 'create',
                name: 'createNewLetter',
                component: createNewLetter,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editNewLetter',
                component: editNewLetter,
                props: true
            },
        ]
    },
];
