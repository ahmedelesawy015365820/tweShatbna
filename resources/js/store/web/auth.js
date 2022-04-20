import webApi from "../../api/webAxios";
import Cookies from "js-cookie";
import router from "../../router/webRoute";

// state
const state = {
    token: Cookies.get("token") || null,
    roles: localStorage.getItem("roles") || '',
    user: localStorage.getItem("user") || {},
    complement: localStorage.getItem("complement") || {},
    partner: localStorage.getItem("partner") || {},
    loading: false,
    country: [],
    newState: [],
    success: false,
    errors: {}
}

// getters
const getters = {
    token: state => state.token,
    roles: state => state.roles,
    user: state => state.user,
    complement: state => state.complement,
    partner: state => state.partner,
    loading: state => state.loading,
    country: state => state.country,
    newState: state => state.newState,
    success: state => state.success,
    errors: state => state.errors
}

// mutations
const mutations = {
    editToken(state,token){
        state.token = token;
        Cookies.set('token',token,{ expires: 7 });
    },
    editRoles(state,roles){
        state.roles = roles;
        localStorage.setItem('roles',roles);
    },
    editUser(state,user){
        state.user = user;
        localStorage.setItem('user',user);
    },
    editComplement(state,complement){
        state.complement = complement;
        localStorage.setItem('complement',complement);
    },
    editPartner(state,partner){
        state.partner = partner;
        localStorage.setItem('partner',partner);
    },
    logoutToken(state){
        state.roles = null;
        state.token = null;
        state.user = {};
        state.complement = {};
        state.errors = {};
        state.partner = {};
        localStorage.removeItem('roles');
        localStorage.removeItem('partner');
        localStorage.removeItem('complement');
        localStorage.removeItem('user');
        Cookies.remove('token');
    },
    editLoading(state,load){
        state.loading = load;
    },
    editCountry(state,country){
        state.country = country;
    },
    editState(state,newState){
        state.newState = newState;
    },
    editSuccess(state,success){
        state.success = success;
    },
    editErrors(state,errors){
        state.errors = errors;
    }
};

// actions
const actions = {
    login({commit},preload) {
        commit('editLoading',true);

        webApi.post(`/v1/web/login`,preload)
            .then((res) => {
                let l =res.data.data;
                commit('editToken',l.access_token);
                commit('editRoles',l.role_name);
                commit('editUser',l.user);
                commit('editComplement',l.complement);
                commit('editPartner',l.partner);

                let roles = localStorage.getItem("roles").split(',');
                let locale = localStorage.getItem("langWeb");

                return router.push({name: roles[0], params: {lang: locale || 'ar'}});

            })
            .catch((err) => {
                commit('editErrors',err.response.data);
                console.log(err.response.data)
            })
            .finally(() => {
                commit('editLoading',false);
            });
    },
    countryRegister({commit}){

        commit('editLoading',true);
        commit('editCountry',[]);
        commit('editState',[]);

        webApi.get(`/v1/web/country`)
            .then((res) => {
                let l =res.data.data;

                commit('editCountry',l.country);

            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                 commit('editLoading',false);
            });

    },
    stateRegister({commit},preload){

        commit('editLoading',true);
        commit('editState',[]);

        webApi.get(`/v1/web/state/${preload}`)
            .then((res) => {
                let l =res.data.data;

                commit('editState',l.state);

            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                commit('editLoading',false);
            });

    },
    DesignRegister({commit},preload) {

        commit('editLoading',true);

        webApi.post(`/v1/web/design`,preload)
            .then((res) => {
                commit('editSuccess',true);
            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
            commit('editLoading',false);
            });
    },
    CompanyRegister({commit},preload) {

        commit('editLoading',true);

        webApi.post(`/v1/web/company`,preload)
            .then((res) => {
                commit('editSuccess',true);
            })
            .catch((err) => {
                commit('editErrors',err.response.data.errors)
            })
            .finally(() => {
                commit('editLoading',false);
            });

    },
    advertiserRegister({commit},preload) {

        commit('editLoading',true);

        webApi.post(`/v1/web/advertiser`,preload)
            .then((res) => {
                commit('editSuccess',true);
            })
            .catch((err) => {
                commit('editErrors',err.response.data.errors)
            })
            .finally(() => {
                commit('editLoading',false);
            });
    },
    logout({commit}){

        commit('editLoading',true);

        webApi.post(`/v1/auth/logout`)
            .then((res) => {
                commit('logoutToken');
                let locale = localStorage.getItem("langWeb");

                return router.push({name: 'loginPartiner', params: {lang: locale || 'ar'}});

            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                commit('editLoading',false);
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
