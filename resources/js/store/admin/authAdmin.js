import axios from "axios";
import Cookies from "js-cookie";
import adminApi from '../../api/adminAxios';
import router from "../../router/adminRoute";

// state
const state = {
    token: Cookies.get("tokenAdmin") || null,
    permission: localStorage.getItem("permission") || '',
    loading: false
}

// getters
const getters = {
    token: state => state.token,
    permission: state => state.permission,
    loading: state => state.loading,
}

// mutations
const mutations = {
    editToken(state,token){
        state.token = token;
        Cookies.set('tokenAdmin',token,{ expires: 7 });
    },
    editPermission(state,permission){
        state.permission = permission;
        localStorage.setItem('permission',permission);
    },
    editLoading(state,load){
        state.loading = load;
    },
    logoutToken(state){
        state.roles = null;
        state.token = null;
        localStorage.removeItem('permission');
        Cookies.remove('tokenAdmin')
    }
};

// actions
const actions = {
    login({commit},preload) {

        commit('editLoading',true);

        adminApi.post(`/v1/auth/login`,preload)
            .then((res) => {
                let l =res.data.data;

                commit('editToken',l.access_token);
                commit('editPermission',l.permission);

                let locale = localStorage.getItem("langAdmin");

                return router.push({name: 'dashboard', params: {lang: locale || 'ar'}});

            })
            .catch((err) => {
                console.log(err.response.data);
            }).finally(() => {
                commit('editLoading',false);
            });
    },
    logout({commit}){

        commit('editLoading',true);

        adminApi.post(`/v1/auth/logout`)
            .then((res) => {
                commit('logoutToken');
                let locale = localStorage.getItem("langAdmin");

                return router.push({name: 'login', params: {lang: locale || 'ar'}});

            })
            .catch((err) => {
                console.log(err.response.data);
            }).finally(() => {
                commit('editLoading',false);
             })
    }
}

export default  {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}
