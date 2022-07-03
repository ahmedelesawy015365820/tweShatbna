<template>
    <!-- Page Header -->
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">{{title}}</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><router-link :to="{name: routeName, params: {lang: locale || 'ar'}}">{{$t('dashboard.Dashboard')}}</router-link></li>
                    <li class="breadcrumb-item active">{{title}}</li>
                </ul>
            </div>

        </div>
    </div>
    <!-- /Page Header -->
</template>

<script>
    export default{
        props:['title','routeName']
    }
</script>
