<template>
    <!-- Page Content -->
    <div class="content">
        <div class="container" style="height: 100%" >
            <div class="row justify-content-center align-items-center browse">
                <div class="col-xl-4 col-md-4 text-center" >
                    <router-link :to="{name:'browse-desgin',params: {lang:this.$i18n.locale}}">
                        <div class="browse-details">
                            <i class="fas fa-drafting-compass"></i>
                            <h3>
                               {{$t("browse.design")}}
                            </h3>
                        </div>
                    </router-link>
                </div>
                <div class="col-xl-4 col-md-4 text-center">
                   <router-link :to="{name:'browse-company',params: {lang:this.$i18n.locale}}">
                       <div class="browse-details">
                           <i class="fas fa-building"></i>
                           <h3>
                               {{$t("browse.company")}}
                           </h3>
                       </div>
                   </router-link>
                </div>
            </div>
        </div>
    </div>

    <!-- /Page Content -->
</template>

<script>
export default {
    name: "browse-project"
}
</script>

<style scoped>
.browse {
    padding: 50px 0;
    height: 100%;
}
.content {
    min-height: 80vh !important;
     padding: 60px 0;
    background-color: #fff;
}

.browse .browse-details{
    cursor: pointer;
    padding: 50px 0;
    position: relative;
    border-radius: 10px;
    border: 2px solid #fcbd33;
    overflow: hidden;
    margin-top: 30px;
}

.browse .browse-details::after{
    content: '';
    position: absolute;
    width: 0%;
    top: 50%;
    left: 50%;
    height: 0%;
    transition: all .4s ease-in-out;
    z-index: 0;
}

.browse .browse-details:hover::after{
    content: '';
    position: absolute;
    width: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    height: 100%;
    background-color: #fcbd33;
    transition: all .4s ease-in-out;
    z-index: 0;
}

.browse .browse-details i{
    font-size: 80px;
    color: #fcbd33;
    margin-bottom: 25px;
    position: relative;
    z-index: 1;
    transition: all .4s ease-in-out;
}

.browse .browse-details:hover i{
    color: #fff;
    position: relative;
    z-index: 1;
}

.browse .browse-details h3{
    font-size: 24px;
    color: #fcbd33;
    transition: all .4s ease-in-out;
}

.browse .browse-details:hover h3{
    color: #fff;
    position: relative;
    z-index: 1;
}
</style>
