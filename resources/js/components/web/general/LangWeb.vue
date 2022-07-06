<template>
    <li>
        <a href="#" v-if="this.$i18n.locale == 'en'" @click="getLang('ar')" class="log-btn space">
            AR
            <i class="fa fa-globe"></i>
        </a>
        <a href="#" v-else @click="getLang('en')" class="log-btn space">
            EN
            <i class="fa fa-globe"></i>
        </a>
    </li>
</template>

<style scope>
.log-btn {
    margin-left: 5px;
    color: #000;
    text-decoration: none;
    font-size: 13px !important;
}

.log-btn:hover {
    color: #fcb00c !important;
    text-decoration: none;
}
@media only screen and (max-width: 992px){

    .header-navbar-rht .log-btn.space {
        margin-top: 20px;
    }
}

</style>

<script>
import { inject } from 'vue';
import { useRouter } from 'vue-router';
import i18n from "../../../lang/web";

export default {
    data() {
        return{
        }
    },
    setup(){
        const emitter = inject('emitter');
        const router = useRouter();

        let getLang = (locale) => {

            i18n.global.locale = locale;
            localStorage.setItem('langWeb',locale);
            let tagHtml = document.querySelector('html'),
                styleLink = document.getElementById('style_web');

            if(localStorage.getItem("langWeb") == 'ar'){
                tagHtml.setAttribute('dir', 'rtl');
                styleLink.setAttribute('href', 'https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css');
            }else{
                tagHtml.setAttribute('dir', 'ltr');
                styleLink.setAttribute('href','')
            }

            emitter.emit("get_lang_web");

            router.push({params: {lang:locale}});
        }

        return {getLang};
    },
}
</script>
