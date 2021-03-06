import {createRouter, createWebHistory} from 'vue-router';
import Index from '../view/admin/Dashboard.vue';
import packages from './adminRoute/package';
import salePackage from './adminRoute/salePackage';
import newsLetters from './adminRoute/newLetter';
import trustCompany from './adminRoute/trustCompany';
import comService from './adminRoute/companyService';
import unity from './adminRoute/unity';
import desService from './adminRoute/designService';
import banner from './adminRoute/banner';
import desDegree from './adminRoute/dedreeDesign';
import treasury from './adminRoute/treasury';
import department from './adminRoute/department';
import job from './adminRoute/job';
import role from './adminRoute/role';
import projectsManagement from '../router/adminRoute/projectsManagement';
import loata from '../router/adminRoute/Loata';
import advisorPackage from './adminRoute/advisorPackage';
import treasuriesIncome from './adminRoute/treasuriesIncome';
import treasuriesExpense from './adminRoute/treasuriesExpense';
import transferringTreasury from './adminRoute/transferringTreasury';
import advisorOne from './adminRoute/advisorOne';
import employee from './adminRoute/employee';
import income from './adminRoute/income';
import expense from './adminRoute/expense';
import incomeAndExpense from './adminRoute/incomeAndExpense';
import notification from '../view/admin/notifications';
import architectural from './adminRoute/architectural';
import expected from './adminRoute/Expected';
import setting from './adminRoute/setting';
import country from './adminRoute/country';
import state from './adminRoute/state';
import area from './adminRoute/area';
import privacy from './adminRoute/previcy';
import support from './adminRoute/support';
import trustAdvertise from './adminRoute/trustAdvertise';
import trustClient from './adminRoute/trustClient';
import trustDesign from './adminRoute/trustDesign';
import schedule from './adminRoute/schedule';
import Page404 from '../view/admin/Page404.vue';
import lang from  '../middleware/admin/lang';
import middlewarePipeline from "./middlewarePipeline";
import store from "../store/admin";
import guest from "../middleware/admin/guest";
import auth from "../middleware/admin/auth";
import login from "../view/admin/login";
import forgetPassword from "../view/admin/forgetPassword";
import resetPassword from "../view/admin/resetPassword";
import sizingOne from "./adminRoute/sizingOne";
import Assets from "./adminRoute/Assets";
import Opponents from "./adminRoute/Opponents";
import ExpenseAccounts from "./adminRoute/ExpenseAccounts";
import IncomeAccounts from "./adminRoute/IncomeAccounts";
import DailyRestriction from "./adminRoute/dailyRestriction";
import targetPlan from "./adminRoute/targetPlan";
import trialBalance from "./adminRoute/trialBalance";
import financialCenter from "./adminRoute/financialCenter";
import Report from "./adminRoute/report";
import sponser from "./adminRoute/sponser";


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
                    {
                        path: 'notification',
                        name: 'notification',
                        component: notification,
                    },
                    ...packages,
                    ...salePackage,
                    ...schedule,
                    ...trustCompany,
                    ...trustDesign,
                    ...trustAdvertise,
                    ...trustClient,
                    ...newsLetters,
                    ...support,
                    ...country,
                    ...privacy,
                    ...state,
                    ...area,
                    ...comService,
                    ...desService,
                    ...desDegree,
                    ...treasury,
                    ...income,
                    ...expense,
                    ...incomeAndExpense,
                    ...department,
                    ...job,
                    ...unity,
                    ...architectural,
                    ...expected,
                    ...employee,
                    ...role,
                    ...advisorPackage,
                    ...sizingOne,
                    ...Assets,
                    ...Opponents,
                    ...ExpenseAccounts,
                    ...IncomeAccounts,
                    ...Report,
                    ...advisorOne,
                    ...treasuriesIncome,
                    ...treasuriesExpense,
                    ...projectsManagement,
                    ...loata,
                    ...transferringTreasury,
                    ...DailyRestriction,
                    ...trialBalance,
                    ...financialCenter,
                    ...targetPlan,
                    ...setting,
                    ...banner,
                    ...sponser
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
