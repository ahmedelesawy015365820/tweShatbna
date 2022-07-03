import i18n from '../../lang/admin';

export default function lang({to,next}) {
    const locale = to.params.lang;
    const lang = ['en','ar'];

    if(!lang.includes(locale)){
        localStorage.setItem('langAdmin','ar');
        return next('ar');
    }

    if(i18n.locale != locale){
        localStorage.setItem('langAdmin',locale);
        i18n.locale = locale;
    }

    let tagHtml = document.querySelector('html'),
        styleLink = document.getElementById('style_web');

    if(i18n.locale == 'ar'){
        tagHtml.setAttribute('dir', 'rtl');
        tagHtml.setAttribute('lang', locale);
        styleLink.setAttribute('href', 'https://cdn.rtlcss.com/bootstrap/v4.5.3/css/bootstrap.min.css');
    }else{
        tagHtml.setAttribute('dir', 'ltr');
        tagHtml.setAttribute('lang', locale);
        styleLink.setAttribute('href','')
    }

    return next();
}
