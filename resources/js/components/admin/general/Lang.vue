<template>
<li class="nav-item dropdown">
    <a href="#" class="dropdown-toggle nav-link lang" data-bs-toggle="dropdown">
        {{this.$i18n.locale}}
    </a>
    <div class="dropdown-menu">
        <div v-for="locale in locales" :key="locale">
            <a
                class="dropdown-item item"
                href="#"
                v-if="locale != this.$i18n.locale"
                @click.stop.prevent="getLang(locale)"
            >
                <img :src="`/admin/img/flags/${locale}.jpg`" :alt="locale" class="small">
                {{locale}}
            </a>
        </div>
    </div>
</li>
</template>

<script>
import { inject } from 'vue';
import { useRouter } from 'vue-router';
import i18n from "../../../lang/admin";

export default {
    setup(){

        const emitter = inject('emitter');
        const router = useRouter();

       let getLang = (locale) => {

            i18n.global.locale = locale;
            localStorage.setItem('langAdmin',locale);

            let tagHtml = document.querySelector('html'),
                styleLink = document.getElementById('style_link');

            if(localStorage.getItem("langAdmin") == 'ar'){
                tagHtml.setAttribute('dir', 'rtl');
                tagHtml.setAttribute('lang', locale);
                styleLink.setAttribute('href', 'https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css');
            }else{
                tagHtml.setAttribute('dir', 'ltr');
                tagHtml.setAttribute('lang', locale);
                styleLink.setAttribute('href','')
            }

           emitter.emit("get_lang");

            router.push({params: {lang:locale}});

        }


        return {getLang};
    },
    data() {
        return {
            locales: ['ar','en']
        }
    }
}
</script>

<style scoped>
.lang{
    position: relative;
}

.user-menu .dropdown-menu {
    min-width: 90px;
}

.lang::before {
    position: absolute;
    content: '';
    width: 26px;
    height: 26px;
    top: 29%;
    left: 20%;
    border: 1px solid #999eb6;
    border-radius: 50%;
}

.small {
    height: 22px;
    width: 33px;
    margin-left: 10px;
}
</style>


