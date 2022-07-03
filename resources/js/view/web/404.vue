<template>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <!-- Page Not Found -->
                    <div class="empty-content text-center custom-content">
                        <img src="../../assets/img/404.png" alt="logo" class="img-fluid">
                        <h2>Page not <span class="orange-text">found</span></h2>
                        <p>Oops! Looks like you followed a bad link.</p>
                        <p>If you think this is a problem with us, please tell us.</p>
                        <div class="btn-item">
                            <a class="btn get-btn" href="index.html">GO TO HOME</a>
                            <a class="btn courses-btn" href="#">BACK</a>
                        </div>
                    </div>
                    <!-- / Page Not Found -->

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "404.vue"
}
</script>

<style scoped>
.custom-content {
    margin-top: 12%;
}
</style>
