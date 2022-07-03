<template>
    <!-- Footer -->
    <footer class="footer">
        <div class="footer-top">
            <div class="container">

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <h2 class="footer-title">{{$t('footer.adress')}} </h2>
                        <div class="footer-address">
                            <div class="off-address">
                                <p class="mb-2">{{$t('footer.captial')}}</p>
                                <p class="mb-0">{{$t('footer.adresses')}}</p>
                                <p> {{$t('footer.phone')}} <a href="tel:+4695372410"><u>469-537-2410</u> ({{$t('footer.free')}}) </a> </p>
                            </div>
                            <div class="off-address">
                                <p class="mb-2">{{$t('footer.captial')}}</p>
                                <p class="mb-0">{{$t('footer.adresses')}}</p>
                                <p> {{$t('footer.phone')}} <a href="tel:+4695372410"><u>469-537-2410</u> ({{$t('footer.free')}}) </a> </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget footer-menu">
                            <h2 class="footer-title">{{$t('footer.know')}}</h2>
                            <ul>
                                <li><a href="about.html">{{$t('footer.about')}}</a></li>
                                <li><a href="blog-list.html">{{$t('footer.contact')}}</a></li>
                                <li><a href="login.html">{{$t('footer.blog')}}</a></li>
                                <li><router-link :to="{name:'loginPartiner',params: {lang:this.$i18n.locale}}">{{$t('footer.login')}}</router-link></li>
                                <li><router-link :to="{name:'registerPartiner',params: {lang:this.$i18n.locale}}">{{$t('footer.register')}}</router-link></li>
                                <li><router-link :to="{name:'partners',params: {lang:this.$i18n.locale}}" >{{$t('header.partner')}}</router-link></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="footer-widget footer-menu">
                            <h2 class="footer-title">{{$t('footer.help')}}</h2>
                            <ul>
                                <li><a href="chats.html">{{$t('footer.chat')}}</a></li>
                                <li><a href="faq.html">{{$t('footer.question')}}</a></li>
                                <li><a href="review.html">{{$t('footer.company')}}</a></li>
                                <li><a href="privacy-policy.html">{{$t('footer.desgin')}}</a></li>
                                <li><a href="term-condition.html">{{$t('footer.Privacy')}}</a></li>
                                <li><a href="term-condition.html">{{$t('footer.term')}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-8">
                        <div class="footer-widget footer-menu">
                            <h2 class="footer-title">{{$t('footer.Privacy')}}</h2>
                            <p>{{$t('footer.application')}}</p>
                            <div class="row no-gutters">
                                <a href="#" class="col">
                                    <img src="/web/img/icon/Google.svg">
                                </a>
                                <a href="#" class="col">
                                    <img src="/web/img/icon/Apple.svg">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Footer Top -->

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">

                <!-- Copyright -->
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="copyright-text">
                                <p class="mb-0">&copy;{{$t('footer.copy')}}</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="social-icon">
                                <ul>
                                    <li><a href="#" class="icon" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#" class="icon" target="_blank"><i class="fab fa-instagram"></i> </a></li>
                                    <li><a href="#" class="icon" target="_blank"><i class="fab fa-linkedin-in"></i> </a></li>
                                    <li><a href="#" class="icon" target="_blank"><i class="fab fa-twitter"></i> </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Copyright -->
            </div>
        </div>
        <!-- /Footer Bottom -->
    </footer>
    <!-- /Footer -->
</template>

<script>
export default {
    name: "layout-footer"
}
</script>

<style scoped>

.footer-top {
    padding: 30px 0;
}

.footer .footer-menu ul li a:hover{
    color:#fcb00c;
}
.footer-widget p{
    width: 70%;
}
.copyright-text p{
    font-size: 17px;
}
.copyright {
    border-top: 1px solid #d9d8d87d;
}
.footer-address .off-address p {
    font-size: 13px;
}
.social-icon ul {
    display: flex;
    width: 100%;
    justify-content: flex-end;
}
.fa-instagram, .fa-linkedin-in, .fa-twitter, .fa-facebook-f{
    font-size: 20px;
    color: #fcb00c;
}
.fa-instagram:hover, .fa-linkedin-in:hover, .fa-twitter:hover, .fa-facebook-f:hover{
    color: #fff;
}
@media only screen and (max-width: 1115px){
}
@media only screen and (max-width: 992px){
}
@media only screen and (max-width: 768px){
    .footer {
        background-color:#1a1919;
    }
}
@media only screen and (max-width: 600px){
}
</style>
