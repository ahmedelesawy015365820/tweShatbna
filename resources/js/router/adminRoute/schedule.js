import schedule from "../../view/admin/schedule/scheduleGet";
import editSchedule from "../../view/admin/schedule/editSchedule";


export default [
    {
        path: 'schedule',
        component:  {
            template:'<router-view />',
        },
        children:[
            {
                path: '',
                name: 'scheduleGet',
                component: schedule,
            },
            {
                path: 'editSchedule/:id(\\d+)',
                name: 'editSchedule',
                component: editSchedule,
            },
        ]
    },
];
