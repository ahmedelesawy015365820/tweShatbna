<template>
  <!-- Page Content -->
  <div class="content">
    <loader2 v-if="loading" />
    <breadcrumb
      :title="$t('global.Loata Products')"
      :routeName="'home'"
      :prev="$t('header.home')"
    />

    <div class="container row my-5">
      <!-- filters  -->
      <div class="col-md-12 col-lg-4 col-xl-3">
        <!-- Search Filter -->
        <div class="card search-filter">
          <div class="card-header d-flex justify-content-between">
            <h4 class="card-title mb-0">{{ $t("global.FILTERS") }}</h4>
          </div>
          <div class="card-body">
            <div class="filter-widget">
              <h4>{{ $t("global.Search") }}</h4>
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  v-model="search"
                  :placeholder="$t('global.Search') + '...'"
                />
              </div>
            </div>
            <div class="filter-widget">
              <h4>{{ $t("global.Category") }}</h4>
              <div class="form-group">
                <select
                  id="validationCustom00"
                  class="form-control"
                  v-model="category"
                  @change="getProducts"
                >
                  <option value="">{{ $t("global.All Categories") }}</option>
                  <option
                    :value="category.id"
                    v-for="category in categories"
                    :key="category.id"
                  >
                    {{ category.name }}
                  </option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <!-- /Search Filter -->
      </div>

      <div class="col-md-12 col-lg-8 col-xl-9">
        <div class="row">
          <!--- Project Item  -->
          <div
            class="col-lg-6 col-md-6 col-sm-12"
            v-if="Object.keys(products.data ?? {}).length"
            v-for="product in products.data"
            :key="product.id"
          >
            <div class="project-item">
              <span :class="[this.$i18n.locale == 'ar' ? 'price-ar' : 'price']">
                <div>
                  <span v-if="product.sale > 0"
                    ><del class="text-danger" style="font-size: 16px">{{
                      product.price
                    }}</del>
                    <b>{{ product.sale }} </b></span
                  >
                  <span v-else>{{ product.price }}</span>
                  <span class="coin">{{ $t("global.LE") }}</span>
                </div>
              </span>
              <div class="row">
                <div class="project-img col-6">
                  <router-link
                    :to="{
                      name: 'productDetails',
                      params: { id: product.id, lang: this.$i18n.locale },
                    }"
                    ><img
                      :src="product.image"
                      style="width: 260px; height: 180px"
                  /></router-link>
                </div>
                <div class="col-6 row align-items-center">
                  <h4>
                    {{ product.name }}
                  </h4>
                </div>
              </div>
              <div class="d-flex align-items-center">
                <div class="project-content button">

                  <button :id="'addToCart'+product.id"
                    :class="['btn btn-warning text-white', !checkIfProductInCart(product.id) ? 'd-inline' : 'd-none']"
                    style="border-radius: 2rem"
                    @click.prevent="
                      clickToAddToCart(
                        product.id,
                        product.sale > 0
                          ? product.sale
                          : product.price,
                        product.image,
                        product.name,
                        product.stock,
                        1
                      )
                    "
                  >
                    <span
                      >{{ $t("global.Add to Cart") }}
                      <i class="fa fa-shopping-basket"></i
                    ></span>
                  </button>

                  <span :id="'inCart'+product.id"
                      :class="['btn btn-light text-warning',checkIfProductInCart(product.id) ? 'd-inline' : 'd-none']"
                      style="border-radius: 2rem"
                      >{{ $t("global.In the cart") }}<i class="fa fa-shopping-basket"></i
                    ></span>

                  <router-link
                    :to="{
                      name: 'productDetails',
                      params: { id: product.id, lang: this.$i18n.locale },
                    }"
                    class="eye"
                  >
                    <i class="fa fa-eye"></i>
                  </router-link>
                </div>
                <div class="project-content">
                  <div
                    class=""
                    v-if="countdown(product.expiry_date, product.id)"
                    :id="'time' + product.id"
                  >
                    <h4 class="text-center">{{ $t("global.Expire at") }}</h4>
                    <div class="time text-center">
                      <div class="second">
                        <span :id="'second' + product.id">00</span
                        ><small>{{ $t("global.Second") }}</small>
                      </div>
                      <span class="point">:</span>
                      <div class="minute">
                        <span :id="'minute' + product.id">00</span
                        ><small>{{ $t("global.Minute") }}</small>
                      </div>
                      <span class="point">:</span>
                      <div class="hour">
                        <span :id="'hour' + product.id">00</span
                        ><small>{{ $t("global.Hour") }}</small>
                      </div>
                      <span class="point">:</span>
                      <div>
                        <span :id="'day' + product.id">00</span>
                        <small>{{ $t("global.Day") }}</small>
                      </div>
                    </div>
                  </div>
                  <h1
                    class="text-danger text-center d-none"
                    :id="'expired' + product.id"
                  >
                    {{ $t("global.Expired") }}
                  </h1>
                </div>
              </div>
            </div>
          </div>
          <!--- /Project Item  -->
          <div v-else>
            <h1 class="my-5 text-center">{{ $t("global.No Data Found") }}</h1>
          </div>
        </div>

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
    </div>
  </div>
</template>


<script>
import { onMounted, onUnmounted } from "@vue/runtime-core";
import { loataComposable } from "./composable/loata";
import { cartAndOrder } from "./composable/cart";

export default {
  setup() {
    const {
      getProducts,
      products,
      intervals,
      countdown,
      loading,
      categories,
      category,
      getCategories,
      search,
    } = loataComposable();
    const {
      checkIfProductInCart,
      AddItemToCartInDatabase,
    } = cartAndOrder();
    onMounted(() => {
      getCategories();
      getProducts();
    });
    onUnmounted(() => {
      intervals.value.forEach(clearInterval);
    });

    const clickToAddToCart = async (id,price,image,name,stock,qty) => {
        AddItemToCartInDatabase(id,price,image,name,stock,qty)
        $('#addToCart'+id).hasClass('d-inline') ? $('#addToCart'+id).removeClass('d-inline').addClass('d-none') : null
        $('#inCart'+id).hasClass('d-none') ? $('#inCart'+id).removeClass('d-none').addClass('d-inline') : null
    }

    return {
      products,
      countdown,
      getProducts,
      loading,
      categories,
      category,
      search,
      AddItemToCartInDatabase,
      checkIfProductInCart,
      clickToAddToCart
    };
  },
};
</script>


