<template>
<!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title"><span>Main</span></li>
                    <li :class="[$route.name == 'dashboard'? 'active': '']">
                        <router-link :to="{name:'dashboard',params: {lang:this.$i18n.locale}}" ><i class="fa fa-home" aria-hidden="true"></i> <span>Dashboard</span></router-link>
                    </li>
                    <li :class="[$route.name == 'package'? 'active': '']">
                        <router-link :to="{name:'package',params: {lang:this.$i18n.locale}}" ><i class="fa fa-home" aria-hidden="true"></i> <span>Package</span></router-link>
                    </li>
                    <li :class="[$route.name == 'sale'? 'active': '']">
                        <router-link :to="{name:'sale',params: {lang:this.$i18n.locale}}"><i class="fa fa-home" aria-hidden="true"></i> <span>Sale Package</span></router-link>
                    </li>
                    <li :class="[$route.name == 'scheduleGet'? 'active': '']">
                        <router-link :to="{name:'scheduleGet',params: {lang:this.$i18n.locale}}"><i class="fa fa-home" aria-hidden="true"></i> <span>Advertise Schedule</span></router-link>
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
    }
}
</script>

<style>
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
</style>
