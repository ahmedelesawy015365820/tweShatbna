import webApi from "../../api/webAxios";

// state
const state = {
    packages: [],
    loading: false,
    salePackages: {},
    nuMalePackages: 0,
    errors: {}
}

// getters
const getters = {
    packages: state => state.packages,
    loading: state => state.loading,
    salePackages: state => state.salePackages,
    nuMalePackages: state => state.nuMalePackages,
    errors: state => state.errors,
}

// mutations
const mutations = {
    editPackage(state,Packages){
        state.packages = Packages;
    },
    errorsEdit(state,errors){
        state.errors = errors;
    },
    salePackageEdit(state,salePackages){
        state.salePackages = salePackages;
    },
    editNuMalePackages(state,nuMalePackages){
        state.nuMalePackages = nuMalePackages;
    },
    loadingPackage(state,loading){
        state.loading = loading;
    },
};

// actions
const actions = {
    getPackages({commit}) {

        commit('loadingPackage',true);

        webApi.get(`/v1/web/package`)
            .then((res) => {
                let l =res.data.data;
                commit('editPackage',l.packages);
            })
            .catch((err) => {
                console.log(err.response.data);
            }).finally(() => {
                commit('loadingPackage',false);
            });
    },
    buy_package({commit},preload) {

        commit('loadingPackage',true);

        const config = {
            headers: {
                'content-type': 'multipart/form-data'
            }
        }

        webApi.post(`/v1/web/buy_package`,preload,config)
            .then((res) => {

            })
            .catch((err) => {
                console.log(err.response.data.errors);
            }).finally(() => {
            commit('loadingPackage',false);
        });
    },
    getSalePackage({commit}){

        commit('loadingPackage',true);

        webApi.get(`/v1/web/numPackage`)
            .then((res) => {
                let l =res.data.data;
                commit('editNuMalePackages',l.numPackage);

            })
            .catch((err) => {
                console.log(err.response.data);
            }).finally(() => {
            commit('loadingPackage',false);
        });
    },
    getSalePackages({commit},preload = ''){

        commit('loadingPackage',true);

        webApi.get(`/v1/web/salePackage${preload}`)
            .then((res) => {
                let l =res.data.data;
                commit('salePackageEdit',l.advertises);
            })
            .catch((err) => {
                console.log(err.response.data);
            }).finally(() => {
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
