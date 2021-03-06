import dashboardAdver from "../../view/web/advertise/dashboardAdver.vue";
import packages from "../../view/web/advertise/packages.vue";
import advertiseNotification from "../../view/web/notifications";
import store from '../../store/web';


export default [
    {
        path: 'advertise',
        name: 'advertise',
        component:  {
            template:'<router-view />',
        },
        beforeEnter: (to, from,next) => {
            let roles = store.state.auth.user.role_name;

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
            },
            {
                path: 'notification',
                name: 'advertiseNotification',
                component: advertiseNotification
            },
        ]
    },
];
