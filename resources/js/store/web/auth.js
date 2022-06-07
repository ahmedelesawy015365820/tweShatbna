import webApi from "../../api/webAxios";
import Cookies from "js-cookie";
import router from "../../router/webRoute";

// state
const state = {
    token: Cookies.get("token") || null,
    user: JSON.parse(localStorage.getItem('user')) || {},
    complement:  JSON.parse(localStorage.getItem('complement')) || {},
    partner:  JSON.parse(localStorage.getItem('partner')) || {},
    loading: false,
    country: [],
    newState: [],
    errors: {}
}

// getters
const getters = {
    token: state => state.token,
    user: state => state.user,
    complement: state => state.complement,
    partner: state => state.partner,
    loading: state => state.loading,
    country: state => state.country,
    newState: state => state.newState,
    errors: state => state.errors
}

// mutations
const mutations = {
    editToken(state,token){
        state.token = token;
        Cookies.set('token',token,{ expires: 7 });
    },
    editUser(state,user){
        state.user = user;
        localStorage.setItem('user',JSON.stringify(user));
    },
    editComplement(state,complement){
        state.complement = complement;
        localStorage.setItem('complement',JSON.stringify(complement));
    },
    editPartner(state,partner){
        state.partner = partner;
        localStorage.setItem('partner',JSON.stringify(partner));
    },
    logoutToken(state){
        state.token = null;
        state.user = {};
        state.complement = {};
        state.errors = {};
        state.partner = {};
        localStorage.removeItem('user');
        localStorage.removeItem('complement');
        localStorage.removeItem('partner');
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
    editErrors(state,errors){
        state.errors = errors;
    }
};

// actions
const actions = {
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
    login({commit},preload) {
        commit('editLoading',true);
        commit('editErrors', {});

        webApi.post(`/v1/web/login`,preload)
            .then((res) => {
                let l = res.data.data;
                commit('editToken', l.access_token);
                commit('editUser', l.user);
                commit('editComplement', l.complement);
                commit('editPartner', l.partner);

                let locale = localStorage.getItem("langWeb");

                if (l.user.role_name[0] == 'company'){
                    return router.push({name: 'dashboardCompany', params: {lang: locale || 'ar'}});
                }else if(l.user.role_name[0] == 'design'){
                    return router.push({name: 'dashboardDesign', params: {lang: locale || 'ar'}});
                }else if(l.user.role_name[0] == 'advertiser'){
                    return router.push({name: 'dashboardAdvertise', params: {lang: locale || 'ar'}});
                }else if(l.user.role_name[0] == 'client'){
                    return router.push({name: 'dashboardClient', params: {lang: locale || 'ar'}});
                }

            })
            .catch((err) => {
                commit('editErrors',err.response.data);
            })
            .finally(() => {
                commit('editLoading',false);
            });
    },
    userUpdate({commit}){

        commit('editLoading',true);

        webApi.get(`/v1/web/user`)
            .then((res) => {
                let l =res.data.data;

                commit('editUser',l.user);

            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                commit('editLoading',false);
            });

    },
    complementUpdate({commit}){

        commit('editLoading',true);

        webApi.get(`/v1/web/complement`)
            .then((res) => {
                let l =res.data.data;

                commit('complement',l.complement);

            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                commit('editLoading',false);
            });

    },
    partnerUpdate({commit}){

        commit('editLoading',true);

        webApi.get(`/v1/web/partner`)
            .then((res) => {
                let l =res.data.data;

                commit('editPartner',l.partner);

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

                let l = res.data.data;
                commit('editToken', l.access_token);
                commit('editUser', l.user);
                commit('editComplement', l.complement);
                commit('editPartner', l.partner);

                let locale = localStorage.getItem("langWeb");

                if(l.user.role_name[0] == 'design'){
                    return router.push({name: 'dashboardDesign', params: {lang: locale || 'ar'}});
                }

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
                let l = res.data.data;
                commit('editToken', l.access_token);
                commit('editUser', l.user);
                commit('editComplement', l.complement);
                commit('editPartner', l.partner);

                let locale = localStorage.getItem("langWeb");

                if (l.user.role_name[0] == 'company'){
                    return router.push({name: 'dashboardCompany', params: {lang: locale || 'ar'}});
                }
            })
            .catch((err) => {
                commit('editErrors',err.response.data.errors);
            })
            .finally(() => {
                commit('editLoading',false);
            });

    },
    advertiserRegister({commit},preload) {

        commit('editLoading',true);

        webApi.post(`/v1/web/advertiser`,preload)
            .then((res) => {

                let l = res.data.data;
                commit('editToken', l.access_token);
                commit('editUser', l.user);
                commit('editComplement', l.complement);
                commit('editPartner', l.partner);

                let locale = localStorage.getItem("langWeb");

                if (l.user.role_name[0] == 'advertiser'){
                    return router.push({name: 'dashboardAdvertise', params: {lang: locale || 'ar'}});
                }
            })
            .catch((err) => {
                commit('editErrors',err.response.data.errors)
            })
            .finally(() => {
                commit('editLoading',false);
            });
    },
    clientRegister({commit},preload){

        commit('editLoading',true);

        webApi.post(`/v1/web/client`,preload)
            .then((res) => {

                let l = res.data.data;
                commit('editToken', l.access_token);
                commit('editUser', l.user);
                commit('editComplement', l.complement);
                commit('editPartner', l.partner);

                let locale = localStorage.getItem("langWeb");

                if (l.user.role_name[0] == 'client'){
                    return router.push({name: 'dashboardClient', params: {lang: locale || 'ar'}});
                }
            })
            .catch((err) => {
                commit('editErrors',err.response.data.errors);
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
