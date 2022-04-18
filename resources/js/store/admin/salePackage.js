import adminApi from '../../api/adminAxios';

// state
const state = {
    salePackage: {},
    loading: false,
    Packages: [],
    valuePackage: {},
    showSale: {},
    packageId: {}
};

// getters
const getters = {
    salePackage: state => state.salePackage,
    loading: state => state.loading,
    Packages: state => state.Packages,
    showSale: state => state.showSale,
    valuePackage: state => state.valuePackage,
    packageId: state => state.packageId
}

// mutations
const mutations = {
    editSalePackage(state,packages){
        state.salePackage = packages;
    },
    loadingPackage(state,loading){
        state.loading = loading;
    },
    getPackage(state,Packages){
        state.Packages = Packages;
    },
    valuePackageEdit(state,valuePackage){
        state.valuePackage = valuePackage;
    },
    showSaleEdit(state,show){
        state.showSale = show;
    },
    packageIdEdit(state,packageId){
        state.packageId = packageId;
    }
};

// actions
const actions = {
    getSalePackage({commit},preload = '') {

        commit('loadingPackage',true);

        adminApi.get(`/v1/dashboard/packageSale${preload}`)
            .then((res) => {
                let l = res.data.data;
                commit('editSalePackage',l.packageSale);
            })
            .catch((err) => {
                console.log(err.response);
            })
            .finally(() => {
                commit('loadingPackage',false);
            });
    },
    getCreate({commit}) {

        commit('loadingPackage',true);

        adminApi.get(`/v1/dashboard/packageSale/create`)
            .then((res) => {
                let l = res.data.data;
                commit('getPackage',l.packages);
            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                commit('loadingPackage',false);
            });
    },
    showSaleShow({commit},preload){
        commit('loadingPackage',true);
        commit('showSaleEdit',{});

        adminApi.get(`/v1/dashboard/packageSale/${preload}`)
            .then((res) => {
                let l = res.data.data;

                commit('valuePackageEdit',l.packageSale.package);
                commit('showSaleEdit',l.packageSale);

            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                commit('loadingPackage',false);
            });
    },
    storeSale({commit},preload){

        commit('loadingPackage',true);

        adminApi.post(`/v1/dashboard/packageSale`,preload)
            .then((res) => {

            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                commit('loadingPackage',false);
            });
    },
    packageIdE({commit},id) {

        commit('loadingPackage',true);

        adminApi.get(`/v1/dashboard/packageSale/${id}/edit`)
            .then((res) => {
                let l = res.data.data;
                commit('packageIdEdit',l.package);
            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                commit('loadingPackage',false);
            });

    },
    updateSalePackage({commit},preload) {

        commit('loadingPackage',true);

        adminApi.post(`/v1/dashboard/packageSale/${preload.id}`,preload)
            .then((res) => {
                console.log('ahmed elesawy')
            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                commit('loadingPackage',false);
            });

    },
    checkSale({commit},preload){
        commit('loadingPackage',true);

        adminApi.post(`/v1/dashboard/packageSale/check`,preload)
            .then((res) => {

            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                commit('loadingPackage',false);
            });
    },
    completeSale({commit},preload){
        commit('loadingPackage',true);

        adminApi.post(`/v1/dashboard/packageSale/complete`,preload)
            .then((res) => {

            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                commit('loadingPackage',false);
            });
    },
    acceptSale({commit},preload){
        commit('loadingPackage',true);

        adminApi.post(`/v1/dashboard/packageSale/accept`,preload)
            .then((res) => {

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
