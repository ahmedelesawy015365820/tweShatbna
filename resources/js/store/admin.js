import { createStore } from 'vuex';
import authAdmin from "./admin/authAdmin";
import packageAdmin from "./admin/packageAdmin";
import sale from "./admin/salePackage";
import calender from "./admin/calender";


const store = createStore({
    state () {
        return {
        }
    },
    getters:{
    },
    mutations: {
    },
    actions:{

    },
    modules: {
        authAdmin,
        packageAdmin,
        sale,
        calender
    }
});

export default store;
