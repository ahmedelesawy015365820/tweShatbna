import dashboardClient from "../../view/web/client/client.vue";
import trust from "../../view/web/client/trust";
import profile from "../../view/web/client/profile";
import AddProject from "../../view/web/client/addProject";


export default [
    {
        path: 'client',
        name: 'client',
        component:  {
            template:'<router-view />',
        },
        beforeEnter: (to, from,next) => {
            let roles = JSON.parse(localStorage.getItem('user')).role_name;

            if(roles.includes('client')){
                return next();
            }else{
                return next({name:'error'});
            }
        },
        children: [
            {
                path: '',
                name: 'dashboardClient',
                component: dashboardClient
            },
            {
                path: 'trust',
                name: 'trustClient',
                component: trust,
            },
            {
                path: 'profile',
                name: 'profileClient',
                component: profile
            },
            {
                path: 'add-project',
                name: 'addProject',
                component: AddProject
            }
        ]
    },
];
