<template>
  <!-- Page Content -->
  <div
    :class="[
      'page-wrapper',
      this.$i18n.locale == 'ar' ? 'page-wrapper-ar' : '',
    ]"
  >
    <div class="content container-fluid">
      <Breadcrumb
        :title="$t('global.Manage Sizes Service')"
        routeName="dashboard"
      />

      <div class="row">
        <div class="col-xl-12">
          <div class="page-title">
            <!-- Search Filter -->
            <div class="card filter-card">
              <div class="card-body pb-0">
                <form action="#" method="post">
                  <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="search">{{ $t("global.Search") }}</label>
                        <input
                          id="search"
                          type="text"
                          class="form-control"
                          :placeholder="$t('global.Search')"
                        />
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="status">{{
                          $t("global.Project Status")
                        }}</label>
                        <select class="form-control" id="status">
                          <option value="">
                            {{ $t("global.All Projects") }}
                          </option>
                          <option value="">{{ $t("global.Pending") }}</option>
                          <option value="">
                            {{ $t("global.Processing") }}
                          </option>
                          <option value="">{{ $t("global.Delayed") }}</option>
                          <option value="">{{ $t("global.Completed") }}</option>
                          <option value="">{{ $t("global.Canceled") }}</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label>{{ $t("global.From Date") }}</label>
                        <div class="cal-icon">
                          <input
                            style="text-indent:20px"
                            class="form-control datetimepicker"
                            type="text"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label>{{ $t("global.To Date") }}</label>
                        <div class="cal-icon">
                          <input
                            style="text-indent:20px"
                            class="form-control datetimepicker"
                            type="text"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /Search Filter -->
          </div>

          <!-- project list -->
          <div class="my-projects-list">
            <div class="row">
              <div class="col-lg-10 flex-wrap">
                <div class="projects-card flex-fill">
                  <div class="card-body">
                    <div class="projects-details align-items-center">
                      <div class="project-info">
                        <span>Dreamguystech</span>
                        <h2>
                          Landing Page Redesign / Sales Page Redesign (Not
                          Entire Web)
                        </h2>
                        <div class="customer-info">
                          <ul class="list-details">
                            <li>
                              <div class="slot">
                                <p>Price type</p>
                                <h5>Fixed</h5>
                              </div>
                            </li>
                            <li>
                              <div class="slot">
                                <p>Location</p>
                                <h5>
                                  <img
                                    src="assets/img/en.png"
                                    height="13"
                                    alt="Lang"
                                  />
                                  UK
                                </h5>
                              </div>
                            </li>
                            <li>
                              <div class="slot">
                                <p>Expiry</p>
                                <h5>4 Days Left</h5>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="project-hire-info">
                        <div class="content-divider"></div>
                        <div class="projects-amount">
                          <h3>$500.00</h3>
                          <h5>in 12 Days</h5>
                        </div>
                        <div class="content-divider"></div>
                        <div class="projects-action">
                          <router-link
                            class="projects-btn"
                            :to="{
                              name: 'sizingServiceDetails',
                              params: {
                                lang: locale || 'ar',
                                id: 'project.id',
                              },
                            }"
                            >{{ $t("global.View Details") }}</router-link
                          >
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-2 d-flex flex-wrap">
                <div class="projects-card flex-fill">
                  <div class="card-body p-2">
                    <div class="prj-proposal-count text-center">
                      <div class="dropdown related_products">
                        <a
                          class="btn dropdown-toggle w-100"
                          type="button"
                          id="dropdownMenuButton"
                          data-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          <img
                            src="/admin/img/general/ab2.jpg"
                            alt=""
                            style="
                              width: 100px;
                              height: 100px;
                              border-radius: 50%;
                              display: block;
                              margin: 0 auto;
                            "
                          />
                          <p
                            style="
                              overflow: hidden;
                              height: 34px;
                              font-size: 24px;
                                color: #fcb00c;
                                width: 100px;
                            "
                            >khaled</p
                          >
                        </a>
                        <div
                          class="dropdown-menu"
                          onclick="event.stopPropagation()"
                          style="
                            height: 400px;
                            overflow-y: scroll;
                            width: 400px;
                          "
                          aria-labelledby="dropdownMenuButton"
                        >
                          <input
                            type="text"
                            :placeholder="$t('global.Search')"
                            class="form-control"
                            onchange="event.stopPropagation()"
                          />
                          <div
                            class="
                              dropdown-item
                              px-0
                              d-flex
                              justify-content-between
                              bg-secondary
                              text-white
                            "
                          >
                            <img
                              src="/admin/img/general/ab2.jpg"
                              style="width: 40px; height: 40px"
                            />
                            <span
                              style="
                                overflow: hidden;
                                height: 34px;
                                font-size: 24px;
                                word-break: break-word;
                              "
                              >khaled khaled khaled</span
                            >
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /project list -->

          <!-- start Pagination -->
          <!-- <Pagination :data="privacyPaginate" @pagination-change-page="getprivacies">
                            <template #prev-nav>
                                <span>&lt; Previous</span>
                            </template>
                            <template #next-nav>
                                <span>Next &gt;</span>
                            </template>
                        </Pagination> -->
          <!-- end Pagination -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { onMounted } from '@vue/runtime-core'

export default{
    setup(){
        onMounted(()=>{
            if($('.datetimepicker').length > 0 ){
                $('.datetimepicker').datetimepicker({
                    format: 'DD-MM-YYYY',
                    icons: {
                        up: "fas fa-angle-up",
                        down: "fas fa-angle-down",
                        next: 'fas fa-angle-right',
                        previous: 'fas fa-angle-left'
                    }
                });
            }
        })
    }
}

</script>
