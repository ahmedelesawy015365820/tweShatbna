<template>
       <!-- Page Content -->
        <div class="content">
            <loader v-if="loading" />

            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">

                        <!-- Login Content -->
                        <div class="account-content">
                            <div class="align-items-center justify-content-center">
                                <div class="login-right">
                                    <div class="login-header text-center">
                                       <img src="/web/img/logo.png" alt="logo" class="img-fluid">
                                        <h3>{{$t('register.welcome')}}</h3>
                                        <p>{{$t('register.miss')}}</p>
                                    </div>
                                    <div class="alert alert-danger text-center" v-if="errors.message">
                                        {{errors.message}}
                                    </div>
                                    <form @submit.prevent='Loginsubmit'>
                                        <div class="form-group form-focus">
                                            <input type="text" v-model="data.email" class="form-control floating">
                                            <label class="focus-label">{{$t('register.email')}}</label>
                                        </div>
                                        <div class="form-group form-focus">
                                            <input type="password" v-model="data.password" class="form-control floating">
                                            <label class="focus-label">{{$t('register.password')}}</label>
                                        </div>
                                        <div class="form-group">
                                            <label class="custom_check">
                                                <input type="checkbox" v-model="data.remmeber_me">
                                                <span class="checkmark"></span> {{$t('register.remember')}}
                                            </label>
                                        </div>
                                        <button class="btn btn-primary btn-block btn-lg login-btn text-center" type="submit">{{$t('register.login')}}</button>
                                        <div class="row form-row forget-login">
                                            <div :class="['col-6','text-start', this.$i18n.locale == 'ar'? 'forget-register' : '']">
                                                <router-link  to="/forgot-password">{{$t('register.forget')}}</router-link>
                                            </div>
                                            <div :class="['col-6','text-end',this.$i18n.locale == 'ar'?'login-register': '']">{{$t('register.new')}}
                                                <router-link class="text-danger" :to="{name:'registerPartiner',params: {lang:this.$i18n.locale}}">{{$t('register.click')}}</router-link>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Login Content -->

                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Content -->
</template>
<script>
import {toRefs, reactive, computed} from 'vue';
import { useStore } from 'vuex';

export default {
    setup(){
        const store = useStore();

        let errors = computed(()=> store.getters['auth/errors']);
        let loading = computed(() => store.getters['auth/loading'] );

        //start design
        let login =  reactive({
            data:{
                email:'',
                password:'',
                remmeber_me: false
            }
        });

        function Loginsubmit (){
            store.dispatch('auth/login',login.data);
        }

        return {Loginsubmit,...toRefs(login),errors,loading};

    },
     mounted() {
     $(document).on('click', '.searchbar .fa-search', function() {
        $(".togglesearch").toggle();
        $(".top-search").focus();
    });
var maxLength = 100;
    $('#review_desc').on('keyup change', function () {
        var length = $(this).val().length;
         length = maxLength-length;
        $('#chars').text(length);
    });
if($('.floating').length > 0 ){
        $('.floating').on('focus blur', function (e) {
        $(this).parents('.form-focus').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
        }).trigger('blur');
    }
// Add More Hours

    $(".hours-info").on('click','.trash', function () {
        $(this).closest('.hours-cont').remove();
        return false;
    });

    $(".add-hours").on('click', function () {

        var hourscontent = '<div class="row form-row hours-cont">' +
            '<div class="col-12 col-md-10">' +
                '<div class="row form-row">' +
                    '<div class="col-12 col-md-6">' +
                        '<div class="form-group">' +
                            '<label>Start Time</label>' +
                            '<select class="form-control">' +
                                '<option>-</option>' +
                                '<option>12.00 am</option>' +
                                '<option>12.30 am</option>' +
                                '<option>1.00 am</option>' +
                                '<option>1.30 am</option>' +
                            '</select>' +
                        '</div>' +
                    '</div>' +
                    '<div class="col-12 col-md-6">' +
                        '<div class="form-group">' +
                            '<label>End Time</label>' +
                            '<select class="form-control">' +
                                '<option>-</option>' +
                                '<option>12.00 am</option>' +
                                '<option>12.30 am</option>' +
                                '<option>1.00 am</option>' +
                                '<option>1.30 am</option>' +
                            '</select>' +
                        '</div>' +
                    '</div>' +
                '</div>' +
            '</div>' +
            '<div class="col-12 col-md-2"><label class="d-md-block d-sm-none d-none">&nbsp;</label><a href="#" class="btn btn-danger trash"><i class="far fa-trash-alt"></i></a></div>' +
        '</div>';

        $(".hours-info").append(hourscontent);
        return false;
    });
function resizeInnerDiv() {
        var height = $(window).height();
        var header_height = $(".header").height();
        var footer_height = $(".footer").height();
        var setheight = height - header_height;
        var trueheight = setheight - footer_height;
        $(".content").css("min-height", trueheight);
    }

    if($('.content').length > 0 ){
        resizeInnerDiv();
    }

    $(window).on('resize', function(){
        if($('.content').length > 0 ){
            resizeInnerDiv();
        }
    });
var chatAppTarget = $('.chat-window');
    (function() {
        if ($(window).width() > 991)
            chatAppTarget.removeClass('chat-slide');

        $(document).on("click",".chat-window .chat-users-list a.media",function () {
            if ($(window).width() <= 991) {
                chatAppTarget.addClass('chat-slide');
            }
            return false;
        });
        $(document).on("click","#back_user_list",function () {
            if ($(window).width() <= 991) {
                chatAppTarget.removeClass('chat-slide');
            }
            return false;
        });
    })();
$(document).on('click', '.select-group .select-item .service-item', function() {
        $('.selected .service-item .fa').removeClass('fa-check');
        $('.select-item .service-item').removeClass('selected');
        $(this).addClass('selected');
    });
$(document).on('click', '.readmore', function() {
        var dots = document.getElementById("dots");
        var moreText = document.getElementById("more");
        var btnText = document.getElementById("myBtn");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "Read more";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "Read less";
            moreText.style.display = "inline";
        }
    });
if($('#store').length > 0) {
        document.getElementById('store').storeID.onchange = function() {
            var newaction = this.value;
            document.getElementById('store').action = newaction;
        }
    };
// Edit Experiance

    $('#edit_experiance').on('click',function(){
        $('.pro-new').css('display','block');
        $('.pro-text').css('display','none');
    });

    $('.profile-cancel-btn').on('click',function(){
       $('.pro-new').css('display','none');
       $('.pro-text').css('display','block');
    });

    // Overview
    $('#edit_overview').on('click',function(){
       $('.pro-new1').css('display','block');
       $('.pro-text1').css('display','none');
    });

    $('.profile-cancel-btn').on('click',function(){
       $('.pro-new1').css('display','none');
       $('.pro-text1').css('display','block');
    });

    // Overview

    $('#edit_education').on('click',function(){
       $('.pro-new2').css('display','block');
       $('.pro-text2').css('display','none');
    });

    $('.profile-cancel-btn').on('click',function(){
       $('.pro-new2').css('display','none');
       $('.pro-text2').css('display','block');
    });

    $('#edit_name').on('click',function(){
        $('.pro-new3').css('display','block');
        $('.pro-text3').css('display','none');
    });

    $('.profile-cancel-btn').on('click',function(){
        $('.pro-new3').css('display','none');
        $('.pro-text3').css('display','block');
    });
      if ($('.datatable').length > 0) {
        $('.datatable').DataTable({
            "bInfo" : false,
            "bSort" : false
        });
    }
        $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        if (scroll < 100) {
            $(".header").removeClass("sticky");
        } else {
            $(".header").addClass("sticky");
        }
    });

    },
}
</script>

<style scoped>
.content {
    padding: 150px 0 30px;
}

.login-right .login-header img{
    height: 100px;
    width: 210px;
}

.login-header img{
    height: 50px;
    width: 55px;
}

</style>
