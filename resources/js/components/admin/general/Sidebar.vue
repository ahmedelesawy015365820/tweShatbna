<template>
<!-- Sidebar -->
    <div :class="['sidebar',this.$i18n.locale == 'ar'?'sidebar-ar':'']" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title"><span>Main</span></li>
                    <li :class="[$route.name == 'dashboard'? 'active': '']">
                        <router-link :to="{name:'dashboard',params: {lang:this.$i18n.locale}}" >
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'package'? 'active': '']">
                        <router-link :to="{name:'package',params: {lang:this.$i18n.locale}}" >
                            <i class="fas fa-cubes"></i> <span>Package</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'sale'? 'active': '']">
                        <router-link :to="{name:'sale',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-cube"></i> <span>Sale Package</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'scheduleGet'? 'active': '']">
                        <router-link :to="{name:'scheduleGet',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-ad"></i> <span>Advertise Schedule</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'indexCompany'? 'active': '']">
                        <router-link :to="{name:'indexCompany',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-user-check"></i> <span>Trust Company</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'indexDesign'? 'active': '']">
                        <router-link :to="{name:'indexDesign',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-user-check"></i><span>Trust Designer</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'indexAdvertise'? 'active': '']">
                        <router-link :to="{name:'indexAdvertise',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-user-check"></i> <span>Trust Advertise</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'indexClient'? 'active': '']">
                        <router-link :to="{name:'indexClient',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-users"></i> <span>Trust Client</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'indexNewLetter'? 'active': '']">
                        <router-link :to="{name:'indexNewLetter',params: {lang:this.$i18n.locale}}">
                            <i class="fab fa-hacker-news"></i> <span>News Letter</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'indexSupport'? 'active': '']">
                        <router-link :to="{name:'indexSupport',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-user-nurse"></i> <span>Support</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'indexCountry'? 'active': '']">
                        <router-link :to="{name:'indexCountry',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-flag"></i> <span>Country</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'indexState'? 'active': '']">
                        <router-link :to="{name:'indexState',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-flag-usa"></i> <span>State</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'indexPrivacy'? 'active': '']">
                        <router-link :to="{name:'indexPrivacy',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-book-dead"></i> <span>Privacy</span>
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Sidebar -->
</template>

<script>
export default {
    data(){
    },
    methods:{
        // clickSubmenu(e){
        //     document.querySelectorAll('.submenu ul').forEach(w => {
        //         w.classList.remove('show');
        //     });
        //
        //     e.target.lastElementChild.classList.add('show');
        // }
    },
    mounted() {

        var $slimScrolls = $('.slimscroll');

        // Sidebar Slimscroll
        if ($slimScrolls.length > 0) {
            $slimScrolls.slimScroll({
                height: 'auto',
                width: '100%',
                position: 'right',
                size: '7px',
                color: '#ccc',
                allowPageScroll: false,
                wheelStep: 10,
                touchScrollStep: 100
            });
            var wHeight = $(window).height() - 60;
            $slimScrolls.height(wHeight);
            $('.sidebar .slimScrollDiv').height(wHeight);
            $(window).resize(function () {
                var rHeight = $(window).height() - 60;
                $slimScrolls.height(rHeight);
                $('.sidebar .slimScrollDiv').height(rHeight);
            });
        }
    }
}
</script>

<style>
.sidebar-ar {
    left: unset;
    right: 0;
}
.sidebar .sidebar-menu > ul > li > a span {
    margin-right: 10px;
}

.sidebar-menu li a{
    color: #000;
}

.sidebar-menu li a:hover{
    color: #fcb00c !important;
}

.sidebar-menu li.active > a{
    color: #fcb00c !important;
}

.menu-title {
    color: #fcb00c !important;
}

.show{
    display: block;
}
.sidebar{
    background-color: #fcb00c38;
}
</style>
