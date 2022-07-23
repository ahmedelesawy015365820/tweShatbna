import axios from "axios";
import store from "../store/web"

const webApi = axios.create({
    baseURL: 'http://admin.shatbna.com/api/'
});

webApi.interceptors.request.use(
    function (config) {
        config.headers['lang'] = localStorage.getItem("langWeb") || 'ar';
        config.headers['Authorization'] = "Bearer "+ (store.state.auth.token || '');
        return config;
    },
    function (error) {
        return Promise.reject(error);
    }
);

webApi.defaults.headers.common['secretApi'] = 'Snr92EUKCmrE06PiJ';
// end axios

export default webApi;
