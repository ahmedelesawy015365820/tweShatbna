import dashboardAdver from "../../view/web/advertise/dashboardAdver.vue";
import packages from "../../view/web/advertise/packages.vue";


export default [
    {
        path: 'advertise',
        name: 'advertise',
        component:  {
            template:'<router-view />',
        },
        beforeEnter: (to, from,next) => {
            let roles = JSON.parse(localStorage.getItem('user')).role_name;

            if(roles.includes('advertiser')){
                return next();
            }else{
                return next({name:'error'});
            }
        },
        children: [
            {
                path: '',
                name: 'dashboardAdvertise',
                component: dashboardAdver
            },
            {
                path: 'package',
                name: 'packages',
                component: packages
            }
        ]
    },
];
