import axios from "axios";
import Cookies from "js-cookie";
import adminApi from '../../api/adminAxios';
import router from "../../router/adminRoute";

// state
const state = {
    token: Cookies.get("tokenAdmin") || null,
    permission: JSON.parse(localStorage.getItem("permission")) || [],
    loading: false,
    user: JSON.parse(localStorage.getItem("user")) || {}
}

// getters
const getters = {
    token: state => state.token,
    permission: state => state.permission,
    loading: state => state.loading,
    user: state => state.user
}

// mutations
const mutations = {
    editToken(state,token){
        state.token = token;
        Cookies.set('tokenAdmin',token,{ expires: 7 });
    },
    editPermission(state,permission){
        state.permission = permission;
        localStorage.setItem('permission',JSON.stringify(permission));
    },
    editUser(state,user){
        state.user = user;
        localStorage.setItem('user',JSON.stringify(user));
    },
    editLoading(state,load){
        state.loading = load;
    },
    logoutToken(state){
        state.roles = null;
        state.token = null;
        state.user = null;
        localStorage.removeItem('permission');
        localStorage.removeItem('user');
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
                commit('editUser',l.user);

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
