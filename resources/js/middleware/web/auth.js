
export default function auth({ next, store }){
    if (!store.getters["auth/token"]) {
        return next({name: 'loginPartiner', params: {lang: localStorage.getItem("langWeb") || 'ar'}});
    } else {
        return next();
    }
}

