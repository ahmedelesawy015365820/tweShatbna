import adminApi from '../../api/adminAxios';

// state
const state = {
    package: {},
    pageWeb: null,
    pageMobile: null,
    loading: false,
    packageEdit: {},
    showpack: {},
    idPageView: [],
    idPageViewMobile: [],
    errors: {}
}

// getters
const getters = {
    package: state => state.package,
    pageWeb: state => state.pageWeb,
    pageMobile: state => state.pageMobile,
    loading: state => state.loading,
    packageEdit: state => state.packageEdit,
    showpack: state => state.showpack,
    idPageView: state => state.idPageView,
    idPageViewMobile: state => state.idPageViewMobile,
    errors: state => state.errors
}

// mutations
const mutations = {
    editPackage(state,packages){
        state.package = packages;
    },
    editpageWeb(state,pageWeb){
        state.pageWeb = pageWeb;
    },
    editpageMobile(state,pageMobile){
        state.pageMobile = pageMobile;
    },
    packageUpdate(state,packageEdit){
        state.packageEdit = packageEdit;
    },
    showPackage(state,showPackage){
        state.showpack = showPackage
    },
    errorsEdit(state,errors){
        state.errors = errors;
    },
    idPageViewEdit(state,idviewPage){
        state.idPageView.push(idviewPage);
    },
    idPageViewMobileEdit(state,idPageViewMobile){
        state.idPageViewMobile.push(idPageViewMobile);
    },
    loadingPackage(state,loading){
        state.loading = loading;
    },
};

// actions
const actions = {
    showPackage({commit},preload) {

        commit('loadingPackage',true);
        commit('showPackage', {});
        adminApi.get(`/v1/dashboard/advertiserPackage/${preload}`)
            .then((res) => {
                let l = res.data.data;
                commit('showPackage',l.package);
                commit('editpageWeb',l.package.page_view);
                commit('editpageMobile',l.package.page_view_mobile);
            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                commit('loadingPackage',false);
            })
    },
    // storePackage({commit},preload) {
    //
    //     commit('loadingPackage',true);
    //     commit('errorsEdit',{});
    //
    //
    //     adminApi.post(`/v1/dashboard/advertiserPackage`,preload)
    //         .then((res) => {
    //
    //         })
    //         .catch((err) => {
    //             commit('errorsEdit',err.response.data.errors);
    //         })
    //         .finally(() => {
    //             commit('loadingPackage',false);
    //         })
    // },
    getEditPages({commit},id) {

        commit('loadingPackage',true);
        commit('idPageViewEdit',[]);
        commit('idPageViewMobileEdit',[]);

        adminApi.get(`/v1/dashboard/advertiserPackage/${id}/edit`)
            .then((res) => {
                let l = res.data.data;
                commit('editpageWeb',l.pageView);
                commit('editpageMobile',l.pageViewMobile);
                commit('packageUpdate',l.Package);
                l.Package.page_view.forEach((view) => {
                    commit('idPageViewEdit',view.pivot.page_view_id)
                });
                l.Package.page_view_mobile.forEach((view) => {
                    commit('idPageViewMobileEdit',view.pivot.page_view_mobile_id)
                });
                console.log(l.Package)
            })
            .catch((err) => {
                console.log(err.response.data);
            })
            .finally(() => {
                commit('loadingPackage',false);
            })
    },
    updatePackage({commit},preload) {
        commit('loadingPackage',true);
        commit('errorsEdit',{});


        adminApi.post(`/v1/dashboard/advertiserPackage/${preload.get('id')}`,preload)
            .then((res) => {

            })
            .catch((err) => {
                commit('errorsEdit',err.response.data.errors);
            })
            .finally(() => {
                commit('loadingPackage',false);
            });
    },
    changeStatus({commit},preload) {

        commit('loadingPackage',true);

        adminApi.post(`/v1/dashboard/advertiserPackage/statusPackage`,preload)
            .then((res) => {
            })
            .catch((err) => {
                console.log(err.response.data.errors)
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
