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

      <Breadcrumb :title="$t('global.Update Cost')" routeName="indexAreaCost" />

      <!-- Table -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <loader v-if="loading" />
            <div class="card-body">
              <div class="card-header pt-0 mb-4">
                <router-link
                  :to="{
                    name: 'indexAreaCost',
                    params: { lang: locale || 'ar' },
                  }"
                  class="btn btn-custom btn-dark"
                >
                  {{ $t("global.back") }}
                </router-link>
              </div>
              <div class="row">
                <div class="col-sm">
                  <form
                    @submit.prevent="updateAreaCost(formData, id)"
                    class="needs-validation"
                  >
                    <div class="form-row row">
                      <div class="col-md-3 mb-3">
                        <label for="validationCustom01">{{
                          $t("global.Country")
                        }}</label>
                           <select class='form-control' @change="getStates(formData.country_id ?? 0)" :class="{ 'is-invalid': errors.country_id }" id="validationCustom01" v-model="formData.country_id" >
                                <option value="" ></option>
                                <option :value="country.id" v-for="country in countries" :key="country.id">{{country.name}}</option>
                            </select>

                        <InputError v-if="errors.country_id" :message="errors.country_id" />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="validationCustom02">{{
                          $t("global.State")
                        }}</label>
                           <select class='form-control' @change="getAreas(formData.state_id ?? 0)" :class="{ 'is-invalid': errors.state_id }" id="validationCustom02" v-model="formData.state_id" >
                                <option value="" ></option>
                                <option :value="state.id"  v-for="state in states" :key="state.id">{{state.name}}</option>
                            </select>

                        <InputError v-if="errors.state_id" :message="errors.state_id" />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="validationCustom04">{{
                          $t("global.Area")
                        }}</label>
                           <select class='form-control' :class="{ 'is-invalid': errors.area_id }" id="validationCustom04" v-model="formData.area_id" >
                                <option value="" ></option>
                                <option :value="area.id" @click.prevent="getStates(area.id)" v-for="area in areas" :key="area.id">{{area.name}}</option>
                            </select>

                        <InputError v-if="errors.area_id" :message="errors.area_id" />
                      </div>
                      <div class="col-md-3 mb-3">
                        <label for="validationCustom03">{{
                          $t("global.Cost")
                        }}</label>
                        <input
                          type="text"
                          class="form-control"
                          v-model.trim="formData.cost"
                          id="validationCustom03"
                          :class="{ 'is-invalid': errors.cost }"
                          placeholder="10"
                        />
                        <InputError v-if="errors.cost" :message="errors.cost" />
                      </div>
                    </div>

                    <button class="btn btn-primary" type="submit">
                      {{ $t("global.Submit") }}
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /Table -->
    </div>
  </div>
</template>

<script>
import InputError from "../../projectsManagement/utilize/input_error.vue";
import { areaCostComosable } from "../composables/area_cost";
import { onBeforeMount, onMounted, toRefs } from "vue";

export default {
  name: "createDesignerFine",
  components: {
    InputError,
  },
  props: ["id"],
  setup(props) {
    // get create Package
    const {
      errors,
      loading,
      formData,
      updateAreaCost,
      getAreaCost,
      getAreas,
      areas,
      getCountries,
      countries,
      getStates,
      states,
    } = areaCostComosable();
    formData.value = {
      country_id: "",
      state_id: "",
      area_id: "",
      cost: "",
    };
    const { id } = toRefs(props);

    onMounted(() => {
        getCountries()
      getAreaCost(id.value);
    });

    return {
      errors,
      loading,
      formData,
      updateAreaCost,
      getAreas,
      getStates,
      areas,
      countries,
      states,
    };
  },
};
</script>

<style scoped>
.coustom-select {
  height: 100px;
}
.card {
  position: relative;
}

.package-feature ul li:first-child {
  margin-top: 10px;
}

.package-feature ul li::before {
  content: "\f00c";
  font-family: "Font Awesome 5 Free";
  font-area: 600;
  color: #4b9f18;
  left: 0;
  position: absolute;
  top: 0;
}

.package-feature ul li:last-child {
  margin-bottom: 10px;
}

.ml-3 {
  margin-left: 1.5rem;
}

.waves-effect {
  position: relative;
  overflow: hidden;
  cursor: pointer;
  user-select: none;
  -webkit-tap-highlight-color: transparent;
  width: 200px;
  height: 50px;
  text-align: center;
  line-height: 34px;
  margin: auto;
}
</style>
