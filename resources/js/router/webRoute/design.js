import dashboardDesign from "../../view/web/design/design";
import trust from "../../view/web/design/trust";

export default [
    {
        path: 'design',
        name: 'design',
        component:  {
            template:'<router-view />',
        },
        beforeEnter: (to, from,next) => {
            let roles = localStorage.getItem('roles').split(',');

            if(roles.includes('design')){
                return next();
            }else{
                return next({name:'error'});
            }
        },
        children: [
            {
                path: '',
                name: 'dashboardDesign',
                component: dashboardDesign,
            },
            {
                path: 'trust',
                name: 'trust',
                component: trust,
            },
        ]
    },
];
