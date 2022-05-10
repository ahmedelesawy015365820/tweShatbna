export default function guest({ next,store}){
    if (store.getters["auth/token"]) {

        let roles = JSON.parse(localStorage.getItem('user')).role_name;

        if(roles[0] == 'design') {
            return next({name: 'dashboardDesign', params: {lang: localStorage.getItem("langWeb") || 'ar'}})
        }else if(roles[0] == 'company'){
            return next({name:'dashboardCompany',params: {lang: localStorage.getItem("langWeb") || 'ar'}});
        }else if(roles[0] == 'advertiser'){
            return next({name:'dashboardAdvertise',params: {lang: localStorage.getItem("langWeb") || 'ar'}});
        }

    } else {
        return next();
    }
}

