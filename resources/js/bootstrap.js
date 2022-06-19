import Cookies from "js-cookie";

window._ = require('lodash');

try {
    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');
//
// let host = '';
//
// if(window.location.host == 'shatbna.com'){
//     host = 'http://shatbna.com';
// }else{
//     host = 'http://admin.shatbna.com';
// }
//
//
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: false,
//     wsHost: window.location.hostname,
//     wsPort: 6001,
//     disableStats: true,
//     authEndpoint: "/api/broadcasting/auth",
//     authorizer: (channel, options) => {
//         return {
//             authorize: (socketId, callback) => {
//                 axios
//                     .post(
//                         host+'/api/broadcasting/auth',
//                         {
//                             socket_id: socketId,
//                             channel_name: channel.name,
//                         },
//                         {
//                             headers:{
//                                 'Content-Type': 'application/json',
//                                 Authorization: Cookies.get("tokenAdmin") || Cookies.get("token")
//                                         ? `Bearer ${Cookies.get("tokenAdmin") || Cookies.get("token")}`
//                                         : '',
//                                 'Access-Control-Allow-Credentials': true,
//                             }
//                             , withCredentials: true
//                         }
//                     )
//                     .then((response) => {
//                         callback(false, response.data);
//                     })
//                     .catch((error) => {
//                         callback(true, error);
//                     });
//             },
//         };
//     },
// });


