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
                            <span>{{$t('sidebar.Dashboard')}}</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'package'? 'active': '']">
                        <router-link :to="{name:'package',params: {lang:this.$i18n.locale}}" >
                            <i class="fas fa-cubes"></i> <span>{{$t('sidebar.Package')}}</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'sale'? 'active': '']">
                        <router-link :to="{name:'sale',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-cube"></i> <span>{{$t('sidebar.Sale_Pack')}}</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'scheduleGet'? 'active': '']">
                        <router-link :to="{name:'scheduleGet',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-ad"></i> <span>{{$t('sidebar.Schedule')}}</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'indexNewLetter'? 'active': '']">
                        <router-link :to="{name:'indexNewLetter',params: {lang:this.$i18n.locale}}">
                            <i class="fab fa-hacker-news"></i> <span>{{$t('sidebar.news')}}</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'indexSupport'? 'active': '']">
                        <router-link :to="{name:'indexSupport',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-user-nurse"></i> <span>{{$t('sidebar.support')}}</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'indexCountry'? 'active': '']">
                        <router-link :to="{name:'indexCountry',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-flag"></i> <span>{{$t('sidebar.country')}}</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'indexState'? 'active': '']">
                        <router-link :to="{name:'indexState',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-flag-usa"></i> <span>{{$t('sidebar.state')}}</span>
                        </router-link>
                    </li>

                    <li class="submenu">
                        <a href="#" >
                            <i class="fas fa-users"></i>
                            <span> {{$t('sidebar.user')}}</span>
                            <span :class="['menu-arrow',this.$i18n.locale == 'ar'?'menu-arrow-ar':'']"></span>
                        </a>
                        <ul>
                            <li :class="[$route.name == 'indexCompany'? 'active': '']">
                                <router-link :to="{name:'indexCompany',params: {lang:this.$i18n.locale}}">

                                    {{$t('sidebar.company')}}
                                </router-link>
                            </li>
                            <li :class="[$route.name == 'indexDesign'? 'active': '']">
                                <router-link :to="{name:'indexDesign',params: {lang:this.$i18n.locale}}">

                                    {{$t('sidebar.design')}}
                                </router-link>
                            </li>
                            <li :class="[$route.name == 'indexAdvertise'? 'active': '']">

                                <router-link :to="{name:'indexAdvertise',params: {lang:this.$i18n.locale}}">

                                    {{$t('sidebar.advertise')}}
                                </router-link>
                            </li>
                            <li :class="[$route.name == 'indexClient'? 'active': '']">

                                <router-link :to="{name:'indexClient',params: {lang:this.$i18n.locale}}">

                                    {{$t('sidebar.client')}}
                                </router-link>
                            </li>
                        </ul>
                    </li>

                    <li :class="[$route.name == 'indexPrivacy'? 'active': '']">
                        <router-link :to="{name:'indexPrivacy',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-book-dead"></i> <span>{{$t('sidebar.privacy')}}</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'indexComService'? 'active': '']">
                        <router-link :to="{name:'indexComService',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-building"></i> <span>{{$t('sidebar.comServ')}}</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'indexService'? 'active': '']">
                        <router-link :to="{name:'indexService',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-drafting-compass"></i> <span>{{$t('sidebar.desServ')}}</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'indexDegree'? 'active': '']">
                        <router-link :to="{name:'indexDegree',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-folder"></i> <span>{{$t('sidebar.acdDegree')}}</span>
                        </router-link>
                    </li>

                    <li :class="[$route.name == 'indexBanner'? 'active': '']">
                        <router-link :to="{name:'indexBanner',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-carrot"></i> <span>{{$t('sidebar.banner')}}</span>
                        </router-link>
                    </li>

                    <li :class="[$route.name == 'indexSizingOne'? 'active': '']">
                        <router-link :to="{name:'indexSizingOne',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-campground"></i> <span>{{$t('global.Sizing service data')}}</span>
                        </router-link>
                    </li>

                    <li class="submenu">
                        <a href="#" ><i class="fas fa-hard-hat"></i> <span> {{$t('sidebar.Advisor')}}</span>  <span :class="['menu-arrow',this.$i18n.locale == 'ar'?'menu-arrow-ar':'']"></span></a>
                        <ul>

                            <li :class="[$route.name == 'indexAdvisorOne'? 'active': '']">
                                <router-link :to="{name:'indexAdvisorOne',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('sidebar.FirstSectionData')}}
                                </router-link>
                            </li>

                            <li :class="[$route.name == 'indexAdvisorPackage'? 'active': '']">
                                <router-link :to="{name:'indexAdvisorPackage',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('sidebar.AdvisorPackage')}}
                                </router-link>
                            </li>

                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#" ><i class="fas fa-suitcase"></i> <span> {{$t('sidebar.Management')}}</span> <span :class="['menu-arrow',this.$i18n.locale == 'ar'?'menu-arrow-ar':'']"></span></a>
                        <ul>
                            <li :class="[$route.name == 'indexDepartment'? 'active': '']">
                                <router-link :to="{name:'indexDepartment',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">

                                    {{$t('sidebar.Department')}}
                                </router-link>
                            </li>

                            <li :class="[$route.name == 'indexJob'? 'active': '']">
                                <router-link :to="{name:'indexJob',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('sidebar.Jobs')}}
                                </router-link>
                            </li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#" ><i class="fas fa-suitcase"></i>
                         <span> {{$t("sidebar.Projects Management")}}</span> <span :class="['menu-arrow',this.$i18n.locale == 'ar'?'menu-arrow-ar':'']"></span></a>

                       <ul>
                            <li :class="[$route.name == 'indexDesignProjects'? 'active': '']">
                                <router-link :to="{name:'indexDesignProjects',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('global.Design Projects')}}
                                </router-link>
                            </li>
                            <li :class="[$route.name == 'indexCompanyProjects'? 'active': '']">
                                <router-link :to="{name:'indexCompanyProjects',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('global.Company Projects')}}
                                </router-link>
                            </li>

                            <li :class="[$route.name == 'ExternalProjects'? 'active': '']">
                                <router-link :to="{name:'ExternalProjects',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('global.External Projects')}}
                                </router-link>
                            </li>

                            <li :class="[$route.name == 'DesignersFines'? 'active': '']">
                                <router-link :to="{name:'DesignersFines',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('global.Fines')}}
                                </router-link>
                            </li>

                            <li :class="[$route.name == 'complaints'? 'active': '']">
                                <router-link :to="{name:'complaints',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('global.Complaints')}}
                                </router-link>
                            </li>

                            <li :class="[$route.name == 'indexDesignCriteria'? 'active': '']">
                                <router-link :to="{name:'indexDesignCriteria',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('global.Design Criteria')}}
                                </router-link>
                            </li>

                            <li :class="[$route.name == 'indexCompanyCriteria'? 'active': '']">
                                <router-link :to="{name:'indexCompanyCriteria',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('global.Company Criteria')}}
                                </router-link>
                            </li>

                            <li :class="[$route.name == 'indexDesignPhases'? 'active': '']">
                                <router-link :to="{name:'indexDesignPhases',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('global.Design Phases')}}
                                </router-link>
                            </li>
                            <li :class="[$route.name == 'indexCompanyPhases'? 'active': '']">
                                <router-link :to="{name:'indexCompanyPhases',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('global.Company Phases')}}
                                </router-link>
                            </li>
                            <li :class="[$route.name == 'indexPhaseBands'? 'active': '']">
                                <router-link :to="{name:'indexPhaseBands',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('global.Phase Bands')}}
                                </router-link>
                            </li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#" ><i class="fas fa-user-tie"></i> <span> {{$t('sidebar.Employees')}}</span>  <span :class="['menu-arrow',this.$i18n.locale == 'ar'?'menu-arrow-ar':'']"></span></a>
                        <ul>
                            <li :class="[$route.name == 'indexRole'? 'active': '']">
                                <router-link :to="{name:'indexRole',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('sidebar.Roles')}}
                                </router-link>
                            </li>

                            <li :class="[$route.name == 'indexEmployee'? 'active': '']">
                                <router-link :to="{name:'indexEmployee',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('sidebar.Employees')}}
                                </router-link>
                            </li>
                        </ul>
                    </li>

                    <li class="submenu">
                        <a href="#" ><i class="fas fa-coins"></i> <span> {{$t('sidebar.Accounts')}}</span>  <span :class="['menu-arrow',this.$i18n.locale == 'ar'?'menu-arrow-ar':'']"></span></a>
                        <ul>
                            <li :class="[$route.name == 'indexTreasury'? 'active': '']">
                                <router-link :to="{name:'indexTreasury',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                     {{$t('sidebar.TreasuryManagement')}}
                                </router-link>
                            </li>

                            <li :class="[$route.name == 'indexIncome'? 'active': '']">
                                <router-link :to="{name:'indexIncome',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                     {{$t('sidebar.IncomeManagement')}}
                                </router-link>
                            </li>

                            <li :class="[$route.name == 'indexExpense'? 'active': '']">
                                <router-link :to="{name:'indexExpense',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('sidebar.Expense')}}
                                </router-link>
                            </li>

                            <li :class="[$route.name == 'indexIncomeAndExpense'? 'active': '']">
                                <router-link :to="{name:'indexIncomeAndExpense',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('sidebar.IncomeAndExpense')}}
                                </router-link>
                            </li>
                            <li :class="[$route.name == 'treasuriesIncome'? 'active': '']">
                                <router-link :to="{name:'treasuriesIncome',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('sidebar.treasuriesIncome')}}
                                </router-link>
                            </li>
                            <li :class="[$route.name == 'treasuriesExpense'? 'active': '']">
                                <router-link :to="{name:'treasuriesExpense',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('global.treasuriesExpense')}}
                                </router-link>
                            </li>

                            <li :class="[$route.name == 'indexTransferringTreasury'? 'active': '']">
                                <router-link :to="{name:'indexTransferringTreasury',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('global.TransferringTreasury')}}
                                </router-link>
                            </li>

                        </ul>
                    </li>

<!--                     tree account-->
                    <li class="submenu">
                        <a href="#" ><i class="fas fa-boxes"></i> <span> {{$t('sidebar.FinancialAccounts')}}</span>  <span :class="['menu-arrow',this.$i18n.locale == 'ar'?'menu-arrow-ar':'']"></span></a>
                        <ul>

                            <li>
                                <a  href="#" :class="['drop-child',this.$i18n.locale == 'ar'?'menu-arrow-ar ml-4':'padding-en']" >
                                    <i  :class="['fa fa-tree',this.$i18n.locale == 'ar'?'t-right':'']"></i>
                                    <span> {{$t('global.AccountsTree')}}</span>  <span :class="['menu-arrow',this.$i18n.locale == 'ar'?'menu-arrow-ar':'']"></span></a>
                                <ul>

                                    <li :class="[$route.name == 'indexAssets'? 'active': '']">
                                        <router-link :to="{name:'indexAssets',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                            {{$t('sidebar.Assets')}}
                                        </router-link>
                                    </li>

                                    <li :class="[$route.name == 'indexOpponents'? 'active': '']">
                                        <router-link :to="{name:'indexOpponents',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                            {{$t('global.Opponents')}}
                                        </router-link>
                                    </li>

                                    <li :class="[$route.name == 'indexExpenseAccounts'? 'active': '']">
                                        <router-link :to="{name:'indexExpenseAccounts',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                            {{$t('global.Expenses')}}
                                        </router-link>
                                    </li>

                                    <li :class="[$route.name == 'indexIncomeAccounts'? 'active': '']">
                                        <router-link :to="{name:'indexIncomeAccounts',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                            {{$t('global.Incomes')}}
                                        </router-link>
                                    </li>

                                </ul>
                            </li>

                            <li :class="[$route.name == 'indexDailyRestriction'? 'active': '']">
                                <router-link :to="{name:'indexDailyRestriction',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('global.DailyRestriction')}}
                                </router-link>
                            </li>

                            <li :class="[$route.name == 'indexTrialBalance'? 'active': '']">
                                <router-link :to="{name:'indexTrialBalance',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                    {{$t('global.TrialBalance')}}
                                </router-link>
                            </li>

                        </ul>
                    </li>

                    <li :class="[$route.name == 'indexUnity'? 'active': '']">
                        <router-link :to="{name:'indexUnity',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-suitcase"></i> <span>{{$t('sidebar.unity')}}</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'indexArchitectural'? 'active': '']">
                        <router-link :to="{name:'indexArchitectural',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-archway"></i> <span>{{$t('sidebar.architectural')}}</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'indexExpected'? 'active': '']">
                        <router-link :to="{name:'indexExpected',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-dharmachakra"></i> <span>{{$t('sidebar.expected')}}</span>
                        </router-link>
                    </li>
                    <li :class="[$route.name == 'indexSetting'? 'active': '']">
                        <router-link :to="{name:'indexSetting',params: {lang:this.$i18n.locale}}">
                            <i class="fas fa-cogs"></i> <span>{{$t('sidebar.setting')}}</span>
                        </router-link>
                    </li>
                    <!--  Report -->
                    <li class="submenu">
                        <a href="#" ><i class="fas fa-book-reader"></i> <span> {{$t('global.Reports')}}</span>  <span :class="['menu-arrow',this.$i18n.locale == 'ar'?'menu-arrow-ar':'']"></span></a>
                        <ul>
                            <li>
                                <a  href="#" :class="['drop-child',this.$i18n.locale == 'ar'?'menu-arrow-ar ml-4':'padding-en']" >
                                    <i  :class="['fas fa-coins',this.$i18n.locale == 'ar'?'t-right':'']"></i>
                                    <span> {{$t('sidebar.Accounts')}}</span>  <span :class="['menu-arrow',this.$i18n.locale == 'ar'?'menu-arrow-ar':'']"></span></a>
                                <ul>

                                    <li :class="[$route.name == 'platformIncome'? 'active': '']">
                                        <router-link :to="{name:'platformIncome',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                            {{$t('global.PlatformIncome')}}
                                        </router-link>
                                    </li>

                                    <li :class="[$route.name == 'platformExpense'? 'active': '']">
                                        <router-link :to="{name:'platformExpense',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                            {{$t('global.PlatformExpense')}}
                                        </router-link>
                                    </li>

                                    <li :class="[$route.name == 'platformTransferringTreasury'? 'active': '']">
                                        <router-link :to="{name:'platformTransferringTreasury',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                            {{$t('global.TransferringTreasury')}}
                                        </router-link>
                                    </li>
                                    <li :class="[$route.name == 'platformIncomeTreasuries'? 'active': '']">
                                        <router-link :to="{name:'platformIncomeTreasuries',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                            {{$t('global.IncomeTreasuries')}}
                                        </router-link>
                                    </li>
                                    <li :class="[$route.name == 'platformExpenseTreasuries'? 'active': '']">
                                        <router-link :to="{name:'platformExpenseTreasuries',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                            {{$t('global.ExpenseTreasuries')}}
                                        </router-link>
                                    </li>

                                    <li :class="[$route.name == 'platformDailyBalance'? 'active': '']">
                                        <router-link :to="{name:'platformDailyBalance',params: {lang:this.$i18n.locale}}" :class="[this.$i18n.locale == 'ar' ? 'sidebar-menu-rtl':'']">
                                            {{$t('global.DailyBalance')}}
                                        </router-link>
                                    </li>

                                </ul>
                            </li>
                        </ul>
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


window.onload = (event) => {
    var Sidemenu = function () {
        this.$menuItem = $('#sidebar-menu a');
    };
    function init() {
    var $this = Sidemenu;
        $('#sidebar-menu a').on('click', function (e) {
            if ($(this).parent().hasClass('submenu')) {
                e.preventDefault();
            }
            if (!$(this).hasClass('subdrop')) {
                $('ul', $(this).parents('ul:first')).slideUp(350);
                $('a', $(this).parents('ul:first')).removeClass('subdrop');
                $(this).next('ul').slideDown(350);
                $(this).addClass('subdrop');
            } else if ($(this).hasClass('subdrop')) {
                $(this).removeClass('subdrop');
                $(this).next('ul').slideUp(350);
            }
        });
        $('#sidebar-menu ul li.submenu a.active').parents('li:last').children('a:first').addClass('active').trigger('click');
    }

// Sidebar Initiate
    init();

};

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

.sidebar-menu .menu-arrow.menu-arrow-ar{
    left: 15px;
    right: unset;
}
.sidebar-menu-rtl{
    padding: 7px 45px 7px 10px!important;
}
.padding-en{
    padding: 7px 10px 7px 32px !important;
}
.drop-child{
    padding: none !important;
}
.drop-child span{
    float: none !important;
}
.t-right{
    text-align: right !important;
}
</style>
