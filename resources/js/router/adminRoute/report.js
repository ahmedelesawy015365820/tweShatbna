import platformIncome from "../../view/admin/report/platformIncome";
import platformExpense from "../../view/admin/report/platformExpense";
import platformTransferringTreasury from "../../view/admin/report/platformTransferringTreasury";
import platformIncomeTreasuries from "../../view/admin/report/platformIncomeTreasuries";
import platformExpenseTreasuries from "../../view/admin/report/platformExpenseTreasuries";
import platformDailyBalance from "../../view/admin/report/platformDailyBalance";

export default [
    {
        path: 'report',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: 'platformIncome',
                name: 'platformIncome',
                component: platformIncome,
            },
            {
                path: 'platformExpense',
                name: 'platformExpense',
                component: platformExpense,
            },
            {
                path: 'platformTransferringTreasury',
                name: 'platformTransferringTreasury',
                component: platformTransferringTreasury,
            },
            {
                path: 'platformIncomeTreasuries',
                name: 'platformIncomeTreasuries',
                component: platformIncomeTreasuries,
            },
            {
                path: 'platformExpenseTreasuries',
                name: 'platformExpenseTreasuries',
                component: platformExpenseTreasuries,
            },
            {
                path: 'platformDailyBalance',
                name: 'platformDailyBalance',
                component: platformDailyBalance,
            }
        ]
    },
];
