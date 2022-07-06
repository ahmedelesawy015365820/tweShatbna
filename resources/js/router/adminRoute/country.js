import Country from "../../view/admin/country/index";
import createCountry from "../../view/admin/country/createCountry";
import editCountry from "../../view/admin/country/editCountry";

export default [
    {
        path: 'country',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'indexCountry',
                component: Country,
            },
            {
                path: 'create',
                name: 'createCountry',
                component: createCountry,
            },
            {
                path: 'edit/:id(\\d+)',
                name: 'editCountry',
                component: editCountry,
                props: true
            },
        ]
    },
];
