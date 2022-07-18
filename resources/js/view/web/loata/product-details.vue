<template>
  <!-- Page Content -->
  <div class="content">
    <loader2 v-if="loading" />
    <breadcrumb
      :title="$t('global.Product Details')"
      :routeName="'LoataProducts'"
      :prev="$t('global.Loata Products')"
    />

    <!-- Page Content -->
    <div class="content" v-if="product.id">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-12">
            <div class="blog-view">
              <div class="blog-single-post pro-post widget-box">
                <div class="blog-image">
                  <div
                    id="carouselExampleControls"
                    class="carousel slide"
                    data-ride="carousel"
                  >
                    <div
                      class="carousel-inner"
                      style="height: 442px; width: 100%"
                    >
                      <div class="carousel-item active" id="firstImage" :style="this.$i18n.locale == 'ar' ? 'float:left!important' : ''">
                        <img
                          class="d-block w-100"
                          :src="product.image"
                          alt="First slide"
                        />
                      </div>
                      <div
                        class="carousel-item" :style="this.$i18n.locale == 'ar' ? 'float:left!important' : ''"
                        v-for="image in product.images"
                        :key="image.id"
                      >
                        <img
                          class="d-block w-100"
                          :src="image.name"
                          alt="First slide"
                        />
                      </div>
                    </div>
                    <a
                      :class="this.$i18n.locale == 'ar' ? 'carousel-control-next' : 'carousel-control-prev'"
                       :style="this.$i18n.locale == 'ar' ? 'right:unset!important' : ''"
                      href="#carouselExampleControls"
                      role="button"
                      data-slide="prev"
                    >
                      <span
                        :class="this.$i18n.locale == 'ar' ? 'carousel-control-next-icon' : 'carousel-control-prev-icon'"
                        aria-hidden="true"
                      ></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a
                      class="carousel-control-next"
                      :class="this.$i18n.locale == 'ar' ? 'carousel-control-prev' : 'carousel-control-next'"
                      href="#carouselExampleControls"
                      role="button"
                      data-slide="next"
                    >
                      <span
                        :class="this.$i18n.locale == 'ar' ? 'carousel-control-prev-icon' : 'carousel-control-next-icon'"
                        aria-hidden="true"
                      ></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>

                <h3 class="blog-title">{{ product.name }}</h3>
                <div class="blog-info clearfix">
                  <div class="post-left project-content text-start w-100">
                    <div
                      class=""
                      v-if="countdown(product.expiry_date, product.id)"
                      :id="'time' + product.id"
                    >
                      <h4 class="d-inline">{{ $t("global.Expire at") }}</h4>
                      <div class="time d-inline">
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
                  </div>
                </div>
                <div class="blog-content">
                  <h3>{{ $t("global.Description") }}</h3>
                  <p>
                    {{ product.description }}
                  </p>
                  <h3 class="mt-4">{{ $t("global.Divo") }}</h3>

                  <p>
                    {{ product.divo }}
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Blog Sidebar -->
          <div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">
            <!-- product info -->
            <div class="pro-post widget-box post-widget">
              <h4 class="pro-title">{{ $t("global.Product Information") }}</h4>
              <div class="pro-content pt-0">
                <ul class="latest-posts">
                  <li class="row justify-content-between">
                    <b class="d-inline">{{ $t("global.Price") }}</b>
                    <div class="d-inline">
                      <span v-if="product.sale > 0"
                        ><del style="font-size: 16px">{{ product.price }}</del>
                        <b class="text-warning mx-1" style="font-size: 20px"
                          >{{ product.sale }}
                        </b></span
                      >
                      <span v-else class="text-warning">{{
                        product.price
                      }}</span>
                      <span class="coin">{{ $t("global.LE") }}</span>
                    </div>
                  </li>
                  <li class="row justify-content-between">
                    <b class="d-inline">{{ $t("global.Weight") }}</b>
                    <span class="d-inline">{{ product.weight }}</span>
                  </li>
                  <li class="row justify-content-between">
                    <b class="d-inline">{{ $t("global.Stock") }}</b>
                    <span class="d-inline">{{ stock }}</span>
                  </li>
                  <li
                    class="row justify-content-center"
                    v-if="!checkIfProductInCartVar"
                  >
                    <div class="pro-qty">
                      <input
                        type="text"
                        class="quantity"
                        title="Quantity"
                        value="1"
                        :max="product.stock"
                        :id="'qty' + product.id"
                      />
                    </div>
                    <button
                      class="btn btn-warning text-white"
                      style="border-radius: 2rem"
                      @click.prevent="clickToAddToCart()"
                    >
                      <span
                        >{{ $t("global.Add to Cart") }}
                        <i class="fa fa-shopping-basket"></i
                      ></span>
                    </button>
                  </li>
                  <li class="row justify-content-center" v-else>
                    <span
                      class="btn btn-light text-warning"
                      style="border-radius: 2rem"
                      >{{ $t("global.In the cart") }} ({{
                        QtyAfterAddedInCart
                      }})<i class="fa fa-shopping-basket"></i
                    ></span>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /product info -->

            <!-- Latest products -->
            <div class="pro-post widget-box post-widget">
              <h4 class="pro-title">{{ $t("global.Latest Products") }}</h4>
              <div class="pro-content pt-0">
                <ul class="latest-posts">
                  <li v-for="item in latestProducts" :key="item.id">
                    <div class="post-thumb">
                      <router-link
                        :to="{
                          name: 'productDetails',
                          params: { id: item.id, lang: this.$i18n.locale },
                        }"
                        @click="
                          getProduct(item.id);
                          activeFirstItem();
                        "
                      >
                        <img
                          class="img-fluid"
                          :src="item.image"
                          style="width: 77px; height: 51px"
                          alt=""
                        />
                      </router-link>
                    </div>
                    <div class="post-info">
                      <h4>
                        <router-link
                          :to="{
                            name: 'productDetails',
                            params: { id: item.id, lang: this.$i18n.locale },
                          }"
                          @click="
                            getProduct(item.id);
                            activeFirstItem();
                          "
                          >{{ item.name }}</router-link
                        >
                      </h4>
                      <a class="posts-date"
                        ><i class="far fa-calendar-alt"></i>
                        {{
                          $t("global.Expire at") + ": " + item.ex_date
                        }}</a
                      >
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /Latest products -->

            <!-- Share Widget -->
            <div class="pro-post widget-box post-widget">
              <h3 class="pro-title">
                <i class="fas fa-share-alt"></i> {{ $t("global.Share") }}
              </h3>
              <div class="pro-content">
                <a class="share-icon p-0 mx-2">
                  <ShareNetwork
                    class="w-100"
                    style="padding: 9px 16px"
                    network="facebook"
                    :url="location"
                    :title="product.name"
                    :description="product.description"
                    :quote="product.divo"
                    :hashtags="product.name"
                  >
                    <i class="fa fa-facebook text-white py-3"></i>
                  </ShareNetwork>
                </a>

                <a class="share-icon p-0 mx-2">
                  <ShareNetwork
                    class="w-100"
                    style="padding: 9px 16px"
                    network="Twitter"
                    :url="location"
                    :title="product.name"
                    :quote="product.divo"
                    :hashtags="product.name"
                  >
                    <i class="fa fa-twitter text-white py-3"></i>
                  </ShareNetwork>
                </a>



                <a class="share-icon p-0 mx-2">
                  <ShareNetwork
                    class="w-100"
                    style="padding: 9px 16px"
                    network="WhatsApp"
                    :url="location"
                    :title="product.name"
                    :description="product.description"
                    :quote="product.divo"
                    :hashtags="product.name"
                  >
                    <i class="fa fa-whatsapp text-white py-3"></i>
                  </ShareNetwork>
                </a>
                <a class="share-icon p-0 mx-2">
                  <ShareNetwork
                    class="w-100"
                    style="padding: 9px 16px"
                    network="telegram"
                    :url="location"
                    :title="product.name"
                    :description="product.description"
                    :quote="product.divo"
                    :hashtags="product.name"
                  >
                    <i class="fa fa-telegram text-white py-3"></i>
                  </ShareNetwork>
                </a>
                <a class="share-icon p-0 mx-2">
                  <ShareNetwork
                    class="w-100"
                    style="padding: 9px 16px"
                    network="LinkedIn"
                    :url="location"

                    :quote="product.divo"
                    :hashtags="product.name"
                  >
                    <i class="fa fa-linkedin text-white py-3"></i>
                  </ShareNetwork>
                </a>
              </div>
            </div>
            <!-- /Share Widget -->
          </div>
          <!-- /Blog Sidebar -->
        </div>
      </div>
    </div>
    <!-- /Page Content -->

    <!-- not found  -->
    <notfound404 v-else />
  </div>
</template>


<script>
import { onMounted, onUnmounted, onUpdated, ref } from "@vue/runtime-core";
import { loataComposable } from "./composable/loata";
import { cartAndOrder } from "./composable/cart";

export default {
  props: ["id"],
  setup(props) {
    const {
      getProduct,
      product,
      intervals,
      countdown,
      loading,
      location,
      stock,
      qtyButton,
      latestProducts,
      getLatestProducts,
    } = loataComposable();

    const {
      checkIfProductInCart,
      getQtyAfterAddedInCart,
      AddItemToCartInDatabase,
      QtyAfterAddedInCart,
      checkIfProductInCartVar,
    } = cartAndOrder();
    onMounted(() => {
      getLatestProducts();
      getProduct(props.id);
    });
    onUpdated(() => {
      qtyButton();
      getQtyAfterAddedInCart(props.id);
      checkIfProductInCartVar.value = checkIfProductInCart(props.id);
    });
    onUnmounted(() => {
      intervals.value.forEach(clearInterval);
    });

    const activeFirstItem = async () => {
      $("#firstImage").hasClass("active")
        ? null
        : $("#firstImage").addClass("active");
    };


    const clickToAddToCart = async () => {
         AddItemToCartInDatabase(
            product.value.id,
            product.value.sale > 0 ? product.value.sale : product.value.price,
            product.value.image,
            product.value.name,
            product.value.stock,
            $('#qty'+product.value.id).val()
        )

    }

    return {
      product,
      countdown,
      getProduct,
      loading,
      stock,
      latestProducts,
      activeFirstItem,
      checkIfProductInCart,
      QtyAfterAddedInCart,
      AddItemToCartInDatabase,
      checkIfProductInCartVar,
      location,
      clickToAddToCart
    };
  },
};
</script>


<style scoped>
.latest-posts li {
  display: flex !important;
}
li.row > * {
  width: auto !important;
}

.carousel-item{
    margin-left: unset!important;
}
</style>

