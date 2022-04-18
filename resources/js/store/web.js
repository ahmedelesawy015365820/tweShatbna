import { createStore } from 'vuex';
import auth from './web/auth';
import advertise from './web/advertise';

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
    modules:{
        auth,
        advertise
    }
});

export default store;
