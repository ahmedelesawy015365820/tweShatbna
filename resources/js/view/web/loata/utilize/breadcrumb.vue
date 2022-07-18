<template>

        <div class="breadcrumb-bar" style="background-color:#fffaf7">
            <div class="container">
                <div class="row align-items-center inner-banner">
                    <div class="col-md-12 col-12 text-center">
                        <h2 class="breadcrumb-title mt-3">{{ title }}</h2>
                        <nav aria-label="breadcrumb" class="page-breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <router-link :to="{name:routeName,params: {lang:this.$i18n.locale}}">
                                        {{ prev }}
                                    </router-link>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>



</template>


<script>
    export default{
        props:['title','routeName','prev']
    }
</script>
