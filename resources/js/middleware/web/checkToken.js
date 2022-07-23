import webApi from "../../api/webAxios";


export default function checkToken({ next, store }){
     webApi.get('/v1/web/checkToken')
         .then((res) => {
             return next();
         })
         .catch((err) => {
             store.commit('auth/logoutToken');
             return next({name: 'home', params: {lang: localStorage.getItem("langWeb") || 'ar'}});
         })

}

