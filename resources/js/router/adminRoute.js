import {createRouter, createWebHistory} from 'vue-router';
import Index from '../view/admin/Dashboard.vue';
import packages from './adminRoute/package';
import salePackage from './adminRoute/salePackage';
import schedule from './adminRoute/schedule';
import Page404 from '../view/admin/Page404.vue';
import i18n from '../lang/admin';
import lang from  '../middleware/admin/lang';
import middlewarePipeline from "./middlewarePipeline";
import store from "../store/admin";
import guest from "../middleware/admin/guest";
import auth from "../middleware/admin/auth";
import login from "../view/admin/login";
import forgetPassword from "../view/admin/forgetPassword";
import resetPassword from "../view/admin/resetPassword";


const routes = [
    {
        path: '/',
        redirect: `${localStorage.getItem("langAdmin") || 'ar'}`,
        meta:{
            middleware: [lang,auth,guest]
        },
    },
    {
        path:'/:lang',
        name:'lang',
        component: {
            template:'<router-view />',
        },
        meta:{
            middleware: [lang,auth,guest]
        },
        children:[
            {
                path: '',
                name: 'loginLang',
                component: login,
                meta: {
                    middleware: [guest]
                }
            },
            {
                path: 'login',
                name: 'login',
                component: login,
                meta: {
                    middleware: [guest]
                }
            },
            {
                path: 'forget-password',
                name: 'forgetPassword',
                component: forgetPassword,
                meta: {
                    middleware: [guest]
                }
            },
            {
                path: 'reset-password',
                name: 'resetPassword',
                component: resetPassword,
                meta: {
                    middleware: [guest]
                }
            },

            {
                path: 'd',
                name: 'partner',
                component:  {
                    template:'<router-view />',
                },
                meta: {
                    middleware: [ auth ]
                },
                children:[
                    {
                        path: '',
                        name: 'dashboard',
                        component: Index,
                    },
                    ...packages,
                    ...salePackage,
                    ...schedule
                ]
            },
        ]
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'Page404',
        component: Page404
    },
];

const router = createRouter({
    history: createWebHistory(),
    linkActiveClass: 'active',
    routes
});

router.beforeEach((to, from, next) => {

    if (!to.meta.middleware) return next();
    const middleware = to.meta.middleware;
    const context = {
        to,
        from,
        next,
        store
    };
    return middleware[0]({
        ...context,
        next: middlewarePipeline(context, middleware, 1)
    });
});

export default router;
