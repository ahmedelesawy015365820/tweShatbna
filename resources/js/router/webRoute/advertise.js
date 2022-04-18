import advertiser from "../../view/web/advertise/dashboardAdver.vue";
import packages from "../../view/web/advertise/packages.vue";

export default [
    {
        path: 'advertise',
        name: 'advertiser',
        component: advertiser
    },
    {
        path: 'package',
        name: 'packages',
        component: packages
    },
];
