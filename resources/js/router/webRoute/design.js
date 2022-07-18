import dashboardDesign from "../../view/web/design/design";
import trust from "../../view/web/design/trust";
import profile from "../../view/web/design/profile";
import designNotification from "../../view/web/notifications";
import chat from "../../view/web/chat";
import store from '../../store/web';

export default [
    {
        path: 'design',
        name: 'design',
        component:  {
            template:'<router-view />',
        },
        beforeEnter: (to, from,next) => {
            let roles = store.state.auth.user.role_name;

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
            {
                path: 'notification',
                name: 'designNotification',
                component: designNotification
            },
            {
                path: 'chats',
                name: 'chatDesign',
                component: chat,
            },
        ]
    },
];
