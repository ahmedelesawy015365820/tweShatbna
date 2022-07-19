<template>
  <div class="content">
    <breadcrumb
      :title="$t('global.Order Details')"
      :routeName="'orders'"
      :prev="$t('global.Orders')"
    />
    <loader2 v-if="loading" />

    <!--== Start Product Area Wrapper ==-->
    <section class="product-area my-5">
      <div class="container" data-padding-top="62">
        <div class="shopping-cart-wrap">
          <div class="row">
            <div class="col-lg-12">
              <div class="shopping-cart-content">
                <h4 class="title">{{ $t("global.Order Details") }}</h4>



        <div class="card">
            <div class="card-header">
              <h5 class="card-title px-2">
                {{ $t("global.Receiver Information") }}
              </h5>
            </div>
            <div class="card-body">
              <div class="row justify-content-between">
                <h5 class="w-auto">{{ $t("global.Receiver Name") }}</h5>
                <span class="w-auto" style="color: #fcb00c">{{
                  order.receiver_first_name + " " + order.receiver_last_name
                }}</span>
              </div>
              <div class="row justify-content-between">
                <h5 class="w-auto">{{ $t("global.Receiver Phone") }}</h5>
                <span class="w-auto" style="color: #fcb00c">{{
                  order.receiver_phone
                }}</span>
              </div>
              <div class="row justify-content-between">
                <h5 class="w-auto">
                  {{ $t("global.Country / State / Area") }}
                </h5>
                <span class="w-auto" style="color: #fcb00c">{{
                  country + " / " + state + " / " + area
                }}</span>
              </div>
              <div class="row justify-content-between">
                <h5 class="w-auto">{{ $t("global.Receiver Adress") }}</h5>
                <span class="w-auto" style="color: #fcb00c">{{
                  order.address
                }}</span>
              </div>
              <div class="row justify-content-between">
                <h5 class="w-auto">{{ $t("global.Date") }}</h5>
                <span class="w-auto" style="color: #fcb00c">{{
                  order.created_at
                }}</span>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header">
              <h5 class="card-title px-2">
                {{ $t("global.Order Information") }}
              </h5>
            </div>
            <div class="card-body">
              <div class="row justify-content-between">
                <h5 class="w-auto">{{ $t("global.Order Number") }}</h5>
                <span class="w-auto" style="color: #fcb00c">{{
                  order.id
                }}</span>
              </div>
              <div class="row justify-content-between">
                <h5 class="w-auto">{{ $t("global.Order Status") }}</h5>
                <span class="w-auto" style="color: #fcb00c">
                <i class="far fa-pause-circle" v-if="order.order_status =='pending'"></i>
                <i class="text-info fas fa-truck" v-if="order.order_status =='shipping'"></i>
                <i class="text-success fas fa-check-circle" v-if="order.order_status =='completed'"></i>
                <i class="text-info fa fa-cogs" v-if="order.order_status =='processing'"></i>
                <i class="fas fa-reply text-danger" v-if="order.order_status =='refund'"></i>
                <i class="fa fa-times-circle text-danger" v-if="order.order_status =='canceled'"></i>
                {{
                  order.order_status
                }}</span>
              </div>
              <div class="row justify-content-between">
                <h5 class="w-auto">{{ $t("global.Payment Status") }}</h5>
                <span class="w-auto" style="color: #fcb00c">
                <i class="text-success fas fa-check-circle" v-if="order.payment_status =='paid'"></i>
                <i class="fa fa-times-circle text-danger" v-if="order.payment_status =='failed'"></i>
                <i class="text-dark far fa-pause-circle" v-if="order.payment_status =='unpaid'"></i>
                {{
                  $t("global." + order.payment_status)
                }}</span>
              </div>
              <div class="row justify-content-between">
                <h5 class="w-auto">{{ $t("global.Payment Way") }}</h5>
                <span class="w-auto" style="color: #fcb00c">{{
                  $t("global." + order.payment_method)
                }}</span>
              </div>
               <div class="row justify-content-between">
                <h5 class="w-auto">{{ $t("global.Shipping cost") }}</h5>
                <span class="w-auto" style="color: #fcb00c">{{
                 order.shipping_cost+order.weight +" " + $t("global.LE")
                }}</span>
              </div>
               <div class="row justify-content-between">
                <h5 class="w-auto">{{ $t("global.Total Amount") }}</h5>
                <span class="w-auto" style="color: #fcb00c">{{
                 order.total_amount+" "+ $t("global.LE")
                }}</span>
              </div>

            </div>
          </div>


          <h5>{{$t('global.Order Details')}}</h5>

                <div
                  class="shopping-cart-item"
                  v-for="item in products"
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
                        <h5 class="title" style="display: contents">
                          <router-link
                            :to="{
                              name: 'productDetails',
                              params: { lang: this.$i18n.locale, id: item.id },
                            }"
                            >{{ item.name }}</router-link
                          >
                        </h5>
                        <h6 class="product-price">
                          {{
                            $t("global.Weight") +
                            " : (" +
                            item.pivot.weight +
                            " )"
                          }}
                        </h6>
                      </div>
                    </div>
                    <div class="col-6 offset-4 offset-md-0 col-md-6">
                      <div class="product-info">
                        <div class="row">
                          <div class="col-md-10 col-xs-6">
                            <div class="row">
                              <div class="col-md-4 col-xs-2 price">
                                <h6 class="product-price">
                                  {{ item.pivot.price + $t("L.E") }}
                                </h6>
                              </div>

                              <div class="col-md-8 col-xs-6 qty">
                                <div class="product-quick-qty">
                                  <h6 class="">
                                    {{
                                      $t("global.Quantity") +
                                      " : (" +
                                      item.pivot.quantity +
                                      " )"
                                    }}
                                  </h6>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-2 col-xs-2 text-end">
                            <div class="product-close">
                              <h6 class="product-price">
                                {{ item.pivot.sub_total + $t("L.E") }}
                              </h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>



                <router-link
                    :to="{
                      name: 'orders',
                      params: { lang: this.$i18n.locale },
                    }"
                    class="btn-primary"
                    >{{ $t("Return to Orders") }}</router-link
                  >
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
import { onMounted, ref } from "@vue/runtime-core";

export default {
  props: ["id"],

  setup(props) {
    const { order, getOrder,products,country,state,area } = cartAndOrder();

    onMounted(async () => {
      getOrder(props.id);
    });

    return {
      order,
      products,country,state,area
    };
  },
};
</script>
