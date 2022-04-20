import adminApi from '../../api/adminAxios';

// state
const state = {
    getCal: {},
    loading: false,
    calenderAll: []
};

// getters
const getters = {
    loading: state => state.loading,
    getCal: state => state.getCal,
    calenderAll: state => state.calenderAll
}

// mutations
const mutations = {
    getCalEdit(state,getCal){
        state.getCal = getCal;
    },
    loadingPackage(state,loading){
        state.loading = loading;
    },
    calenderAllEdit(state,calenderAll){
        state.calenderAll = calenderAll;
    }
};

// actions
const actions = {
    getCalender({commit},preload) {

        commit('loadingPackage',true);

        adminApi.get(`/v1/dashboard/scheduleAdvertise${preload}`)
            .then((res) => {
                let l = res.data.data;
                commit('getCalEdit',l.schedule);
            })
            .catch((err) => {
                console.log(err.response);
            })
            .finally(() => {
                commit('loadingPackage',false);
            });
    },
    getCalenderAll({commit}) {

        commit('loadingPackage',true);

        adminApi.get(`/v1/dashboard/scheduleAdvertise/getALL`)
            .then((res) => {
                let l = res.data.data;
                commit('calenderAllEdit',l.schedule);
            })
            .catch((err) => {
                console.log(err.response);
            })
            .finally(() => {
                commit('loadingPackage',false);
            });
    },
    StoreCalender({commit,dispatch},preload){

        commit('loadingPackage',true);

        adminApi.post(`/v1/dashboard/scheduleAdvertise`,preload)
            .then((res) => {
                dispatch('getCalenderAll');
            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                commit('loadingPackage',false);
            });

    }
}

export default  {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}
