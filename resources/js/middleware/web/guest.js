export default function guest({  next,store}){
    if (store.getters["auth/token"]) {

        let roles = localStorage.getItem('roles').split(',');
        if(roles[0] == 'design') {
            return next({name: 'design', params: {lang: localStorage.getItem("langWeb") || 'ar'}})
        }else if(roles[0] == 'company'){
            return next({name:'company',params: {lang: localStorage.getItem("langWeb") || 'ar'}});
        }else if(roles[0] == 'advertiser'){
            return next({name:'advertiser',params: {lang: localStorage.getItem("langWeb") || 'ar'}});
        }

    } else {
        return next();
    }
}

