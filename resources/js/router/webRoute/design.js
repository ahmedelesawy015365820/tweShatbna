import dashboardDesign from "../../view/web/design/design";
import trust from "../../view/web/design/trust";
import profile from "../../view/web/design/profile";

export default [
    {
        path: 'design',
        name: 'design',
        component:  {
            template:'<router-view />',
        },
        beforeEnter: (to, from,next) => {
           let roles = JSON.parse(localStorage.getItem('user')).role_name;

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
                component: dashboardDesign
            },
            {
                path: 'trust',
                name: 'trust',
                component: trust,
            },
            {
                path: 'profile',
                name: 'profile',
                component: profile
            },
        ]
    },
];
