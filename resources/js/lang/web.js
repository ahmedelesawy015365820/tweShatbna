import { createI18n } from 'vue-i18n';
import en from "../locales/web/en.json";
import ar from "../locales/web/ar.json";


const i18n = createI18n({
    locale: localStorage.getItem("langWeb") || 'ar', // set locale
    fallbackLocale: 'en', // set fallback locale
    messages: {
        en,
        ar
    }
});


export default i18n;
