<template>
  <!-- Page Content -->
  <div class="content">
    <breadcrumb
      :title="$t('global.Shopping Cart')"
      :routeName="'home'"
      :prev="$t('header.home')"
    />
        <loader2 v-if="loading" />
    <!--== Start Product Area Wrapper ==-->
    <section class="product-area">
      <div class="container" data-padding-top="62">
        <div class="shopping-cart-wrap">
          <div class="row">
            <div class="col-lg-8">
              <div class="shopping-cart-content">
                <h4 class="title">{{ $t("global.Shopping Cart") }}</h4>

                <div
                  class="shopping-cart-item"
                  v-for="item in cartRef"
                  :key="item.id"
                >
                  <div class="row">
                    <div class="col-4 col-md-3">
                      <div class="product-thumb">
                        <img
                          :src="item.image"
                          alt="Has-Image"
                          style="height: 125px; width: 125px"
                        />
                      </div>
                    </div>
                    <div class="col-8 col-md-3">
                      <div class="product-content">
                        <h5 class="title " style="display:contents">
                          <router-link
                            :to="{
                              name: 'productDetails',
                              params: { lang: this.$i18n.locale, id: item.id },
                            }"
                            >{{ item.name }}</router-link
                          >
                        </h5>
                        <h6 class="product-price">
                          {{ item.price + $t("global.LE") }}
                        </h6>
                      </div>
                    </div>
                    <div class="col-6 offset-4 offset-md-0 col-md-6">
                      <div class="product-info">
                        <div class="row">
                          <div class="col-md-10 col-xs-6">
                            <div class="row">
                              <div class="col-md-8 col-xs-6 qty">
                                <div class="product-quick-qty">
                                     <span class="product-price mx-1 font-weight-bold">
                                        {{ $t("global.Stock") +" : "+ (item.stock -item.qty)}}
                                        </span>
                                  <div class="pro-qty">
                                    <input
                                      type="text"
                                      class="quantity"
                                      title="Quantity"
                                      :value="item.qty"
                                      :data-stock="item.stock"
                                      :data-id="item.id"
                                      :max="item.stock"
                                    />
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4 col-xs-2 price">
                                <h6 class="product-price">
                                  {{ item.price * item.qty + $t("global.LE")}}
                                </h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-2 text-end">
                            <div class="product-close">
                              <a @click.prevent="deleteItem(item.id)"
                                ><i class="fa fa-trash"></i
                              ></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <router-link
                  :to="{
                    name: 'LoataProducts',
                    params: { lang: this.$i18n.locale },
                  }"
                  class="btn-primary"
                  >{{ $t("global.Continue shopping") }}</router-link
                >
              </div>
            </div>
            <div class="col-lg-4">
              <div class="shopping-cart-summary mt-md-70">
                <div class="cart-detailed-totals">
                  <div class="card-block">
                    <div class="card-block-item">
                      <span class="label">{{
                        $t("global.Total (Without shipping cost)")
                      }}</span>
                      <span class="value">{{ total + " " + $t("global.LE") }}</span>
                    </div>
                  </div>
                  <div class="separator"></div>
                </div>
                <div class="checkout-shopping">
                  <router-link :to="{name:'checkout',lang:this.$i18n.locale}" class="btn-checkout">{{
                  $t("global.Proceed to checkout")
                  }}</router-link>
                </div>
              </div>
              <div class="block-reassurance">
                <ul>
                  <li>
                    <img
                      src="/web/img/cart/verified-user.png"
                      alt="Has-Image"
                      style="width: 25px; height: 25px"
                    />
                    <span>{{
                      $t(
                        "global.Security Policy (Edit With Customer Reassurance Module)"
                      )
                    }}</span>
                  </li>
                  <li>
                    <img
                      src="/web/img/cart/local-shipping.png"
                      alt="Has-Image"
                      style="width: 25px; height: 25px"
                    />
                    <span>{{
                      $t(
                        "global.Delivery Policy (Edit With Customer Reassurance Module)"
                      )
                    }}</span>
                  </li>
                  <li>
                    <img
                      src="/web/img/cart/swap-horiz.png"
                      alt="Has-Image"
                      style="width: 25px; height: 25px"
                    />
                    <span>{{
                      $t(
                        "global.Return Policy (Edit With Customer Reassurance Module)"
                      )
                    }}</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Product Area Wrapper ==-->
  </div>
</template>


<script>
import { cartAndOrder } from "../composable/cart";
import { onMounted, watch, ref, onUpdated } from "@vue/runtime-core";

export default {
  setup() {
    let debounce = ref({})
    const {
      loading,
      changeQty,
      cartRef,
      total,
      getTotalForCart,
      deleteItem,
      createOrder,
    } = cartAndOrder();
    total.value = 0;

    onMounted(() => {
      cartRef.value = localStorage.getItem('cart')?JSON.parse(localStorage.getItem('cart')) : [];
    });

    onUpdated(() => {
      qtyButton();
      getTotalForCart();

    })

  //inc and dec button
    const qtyButton = async () => {
         // Product Quantity JS
         $('.qty-btn').remove()
        $(".pro-qty").append('<div class= "dec qty-btn">-</div>');
        $(".pro-qty").append('<div class="inc qty-btn">+</div>');
        $('.qty-btn').on('click', function (e) {
            e.preventDefault();
                var $button = $(this);
                var oldValue = $button.parent().find('input').val();
                var productStock = $button.parent().find('input').data('stock')
                var id = $button.parent().find('input').data('id')
                if(productStock < oldValue || ($button.hasClass('inc') && productStock <= oldValue)){
                    var newVal = productStock;
                }else{
                    if ($button.hasClass('inc')) {
                        var newVal = parseFloat(oldValue) + 1;
                    } else {
                        // Don't allow decrementing below zero
                        if (oldValue > 1) {
                        var newVal = parseFloat(oldValue) - 1;
                        } else {
                        newVal = 1;
                        }
                    }
                }

                $button.parent().find('input').val(newVal);
            clearTimeout(debounce.value)
            debounce.value = setTimeout(() => {
                changeQty({ id: id, qty: newVal });
            },500)

      });
    };


    return {
      loading,
      cartRef,
      changeQty,
      total,
      deleteItem,
      createOrder,
    };
  },
};
</script>


<style scoped>
.product-close:hover {
  cursor: pointer;
}
</style>
