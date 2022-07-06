import dashboardCompany from "../../view/web/company/company";
import trust from "../../view/web/company/trust";
import profile from "../../view/web/company/profile";

export default [
    {
        path: 'company',
        name: 'company',
        component:  {
            template:'<router-view />',
        },
        beforeEnter: (to, from,next) => {
            let roles = JSON.parse(localStorage.getItem('user')).role_name;

            if(roles.includes('company')){
                return next();
            }else{
                return next({name:'error'});
            }
        },
        children: [
            {
                path: '',
                name: 'dashboardCompany',
                component: dashboardCompany
            },
            {
                path: 'trust',
                name: 'trustCompany',
                component: trust,
            },
            {
                path: 'profile',
                name: 'profileCompany',
                component: profile
            },
        ]
    },
];
