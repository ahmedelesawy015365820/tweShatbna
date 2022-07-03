<template>
  <div
    :class="[
      'page-wrapper',
      this.$i18n.locale == 'ar' ? 'page-wrapper-ar' : '',
    ]"
  >
    <div class="content container-fluid">
      <notifications
        :position="this.$i18n.locale == 'ar' ? 'top left' : 'top right'"
      />

      <Breadcrumb
        :title="$t('global.Project Details')"
        routeName="indexCompanyProjects"
      />

      <div class="row">

        <div class="col-lg-8 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title px-2">{{$t('global.Project Information')}}</h5>
                </div>
                <div class="card-body">

                    <div class="row justify-content-between">
                        <h5 class="w-auto">{{$t('global.Project Name')}}</h5>
                        <span class="w-auto" style="color:#fcb00c">project</span>
                    </div>
                    <div class="row justify-content-between">
                        <h5 class="w-auto">{{$t('global.Project start date')}}</h5>
                        <span class="w-auto" style="color:#fcb00c">3/7/2022</span>
                    </div>
                    <div class="row justify-content-between">
                        <h5 class="w-auto">{{$t('global.Project end date')}}</h5>
                        <span class="w-auto" style="color:#fcb00c">3/10/2022</span>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="text-center card-box">
                    <div class="text-left">
                        <h4 class="header-title mb-4">{{$t('global.Client')}}</h4>
                    </div>
                    <div class="member-card">
                        <div class="avatar-xl member-thumb mb-2 mx-auto d-block">
                            <img src="https://ui-avatars.com/api/?name=samy&amp;color=7F9CF5&amp;background=EBF4FF" class="rounded-circle img-thumbnail" alt="profile-image">
                            <i class="fa fa-star-circle member-star text-success" title="Featured Agent"></i>
                        </div>

                        <div class="">
                            <h5 class="font-18 mb-1">khaled</h5>
                        </div>

                        <div class="mt-20">
                            <ul class="list-inline row">
                                <li class="list-inline-item col-12 mx-0">
                                    <h5 >{{$t('global.Email')}}</h5>
                                    <p>abcc@avv.com</p>
                                </li>
                                <li class="list-inline-item col-6 mx-0">
                                    <h5>{{$t('global.Number of Projects')}}</h5>
                                    <p>0</p>
                                </li>

                                <li class="list-inline-item col-6 mx-0">
                                    <h5>{{$t('global.Phone')}}</h5>
                                    <p>123123123</p>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <!-- end membar card -->
            </div>
            <div class="text-center card-box">
                    <div class="text-left">
                        <h4 class="header-title mb-4">{{$t('global.Company')}}</h4>
                    </div>
                    <div class="member-card">
                        <div class="avatar-xl member-thumb mb-2 mx-auto d-block">
                            <img src="https://ui-avatars.com/api/?name=samy&amp;color=7F9CF5&amp;background=EBF4FF" class="rounded-circle img-thumbnail" alt="profile-image">
                            <i class="fa fa-star-circle member-star text-success" title="Featured Agent"></i>
                        </div>

                        <div class="">
                            <h5 class="font-18 mb-1">khaled</h5>
                        </div>

                        <div class="mt-20">
                            <ul class="list-inline row">
                                <li class="list-inline-item col-12 mx-0">
                                    <h5>{{$t('global.Email')}}</h5>
                                    <p>abcc@avv.com</p>
                                </li>
                                <li class="list-inline-item col-6 mx-0">
                                    <h5>{{$t('global.Completed Projects')}}</h5>
                                    <p>0</p>
                                </li>

                                <li class="list-inline-item col-6 mx-0">
                                    <h5>{{$t('global.Phone')}}</h5>
                                    <p>123123123</p>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <!-- end membar card -->
            </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
</script>


<style scoped>

    .card-box{
        background-color: #feeeca;
        padding: 10px;
        border-radius:10px ;
        margin-bottom:20px ;
    }
</style>
