<template>
  <div
    :class="[
      'page-wrapper',
      this.$i18n.locale == 'ar' ? 'page-wrapper-ar' : '',
    ]"
  >
    <div class="content container-fluid">
      <Breadcrumb :title="$t('global.Products')" routeName="dashboard" />
      <!-- Table -->
      <div class="row">
        <div class="col-lg-12">
          <loader v-if="loading" />

          <div class="row justify-content-between">
            <div class="col-md-3 col-sm-12">
              <input
                type="search"
                v-model="search"
                class="form-control"
                :placeholder="$t('global.Search')"
              />
            </div>
            <div class="col-md-3 col-sm-12">
              <input
                type="date"
                @change="getProducts"
                v-model="date"
                class="form-control"
              />
            </div>
            <div class="col-md-3 mb-3">
                <select id="validationCustom00" class="form-control"  v-model="category" @change="getProducts">
                    <option value="">{{$t('global.Select Category')}}</option>
                    <option :value="category.id" v-for="category in categories" :key="category.id">{{category.name}}</option>
                </select>
            </div>
            <div class="col-3 row justify-content-end">
              <router-link
                :to="{
                  name: 'createProduct',
                  params: { lang: locale || 'ar' },
                }"
                class="btn btn-custom btn-warning w-75" style="height:42px"
              >
                {{ $t("Add") }}
              </router-link>
            </div>
          </div>

          <div class="row mt-3">
            <div
              class="col-12 col-md-6 col-lg-4 d-flex"
              v-for="(product, index) in products.data"
              :key="product.id"
            >
              <div class="card flex-fill">
                <img
                  alt="Card Image"
                  :src="product.image"
                  class="card-img-top"
                  style="width: 100%; height: 221px"
                />
                <div class="card-header">
                  <h5 class="card-title mb-0 text-center">
                    {{ product.name }}
                  </h5>
                </div>
                <div class="card-body">
                  <div
                    class="time-container d-block"
                    v-if="countdown(product.expiry_date, product.id)"
                    :id="'time' + product.id"
                  >
                    <h4 class="text-center">{{ $t("global.Expire at") }}</h4>
                    <div class="time text-center">
                      <div class="second">
                        <span :id="'second' + product.id">00</span
                        ><small class="m-1">{{ $t("global.Second") }}</small>
                      </div>
                      <span class="point">:</span>
                      <div class="minute">
                        <span :id="'minute' + product.id">00</span
                        ><small class="m-1">{{ $t("global.Minute") }}</small>
                      </div>
                      <span class="point">:</span>
                      <div class="hour">
                        <span :id="'hour' + product.id">00</span
                        ><small class="m-1">{{ $t("global.Hour") }}</small>
                      </div>
                      <span class="point">:</span>
                      <div>
                        <span :id="'day' + product.id">00</span>
                        <small class="m-1">{{ $t("global.Day") }}</small>
                      </div>
                    </div>
                  </div>
                  <h1
                    class="text-danger text-center d-none"
                    :id="'expired' + product.id"
                  >
                    {{ $t("global.Expired") }}
                  </h1>

                  <div class="row justify-content-around my-2">
                    <p class="col-6 text-center">
                      <span class="color-org">{{ $t("global.Stock") }}</span>
                      <span>{{ product.stock }}</span>
                    </p>
                    <p class="col-6 text-center">
                      <span class="color-org">{{ $t("global.Price") }}</span>
                      <span v-if="product.sale>0"><del class="text-danger">{{ product.price }}</del> <b>{{product.sale}} </b></span>
                      <span v-else>{{ product.price }}</span>
                      {{$t('global.LE')}}
                    </p>
                  </div>

                  <p class="card-text text-center my-3">
                    {{ product.description }}
                  </p>
                  <div class="text-center">
                    <router-link
                      :to="{
                        name: 'updateProduct',
                        params: { lang: locale || 'ar', id: product.id },
                      }"
                      class="btn btn-primary mx-2"
                      href="#"
                      ><i class="far fa-edit mx-1"></i
                      >{{ $t("global.Edit") }}</router-link
                    >
                    <!-- <a class="btn btn-info" href="#"><i class="far fa-eye"></i>{{$t('global.View')}}</a> -->
                    <a
                      class="btn btn-danger mx-2"
                      href="#"
                      @click.prevent="deleteProduct(product.id, index)"
                      ><i class="far fa-trash-alt mx-1"></i
                      >{{ $t("global.Delete") }}</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /Table -->
      <!-- start Pagination -->
      <Pagination :data="products" @pagination-change-page="getProducts">
        <template #prev-nav>
          <span>&lt; Previous</span>
        </template>
        <template #next-nav>
          <span>Next &gt;</span>
        </template>
      </Pagination>
      <!-- end Pagination -->
    </div>
    <!-- /Page Wrapper -->
  </div>
</template>

<script>
import { onMounted, onUnmounted } from "vue";
import { productsComposable } from "../composables/products";

export default {
  name: "index",
  setup() {
    const {
      products,
      search,
      loading,
      intervals,
      getProducts,
      deleteProduct,
      countdown,
      getCategories,
      categories,
      date,
      category
    } = productsComposable();

    onMounted(() => {
       getCategories();
       getProducts();
    });

    onUnmounted(() => {
      intervals.value.forEach(clearInterval);
    });

    return {
      loading,
      getProducts,
      search,
      deleteProduct,
      products,
      countdown,
      date,
      categories,
      category
    };
  },
};
</script>

<style scoped>
.card {
  position: relative;
}
.btn-custom {
  width: 30%;
}
.custom {
  border: 1px solid #d7d7d7;
  padding: 2px;
  border-radius: 5px;
  width: 35%;
}
.btn {
  color: #fff;
}

.time-container {
  position: initial;
  position: relative;
}
.time-container h4 {
  color: #fcb00c;
}

.time-container h4 {
  font-weight: bold;
  font-size: 18px;
  text-transform: lowercase;
  color: #fcb00c;
  text-align: start;
  padding: 0 20px;
}
.time-container .time-container {
  position: relative;
}
.time-container .time {
  position: relative;
}
.time-container .time .point {
  top: 6px;
  position: relative;
  font-size: 19px;
  color: #000;
  font-weight: 600;
}
.time-container .time div {
  display: inline-block;
  background: #000;
  position: relative;
  color: #fff;
  border-radius: 5px;
  margin: 2px 4px;
  text-align: center;
  padding: 0px 12px 9px;
}

.time-container .time div small {
  display: block;

  font-size: 8px;
}
.time-container .time div.minute small {
  left: 7px;
}
.time-container .time div.hour small.en {
  left: 10px;
}
.time-container .time div.minute small.en,
.time-container .time div small.en {
  left: 5px;
}
.time-container .time div.hour small {
  left: 7px;
}
.color-org {
  display:block;
  color: #fcb00c;
}
</style>
