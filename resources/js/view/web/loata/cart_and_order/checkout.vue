<template>
  <div class="content">
    <loader2 v-if="loading" />
    <breadcrumb
      :title="$t('global.Checkout')"
      :routeName="'cart'"
      :prev="$t('global.Shopping Cart')"
    />
    <!--== Start Product Area Wrapper ==-->
    <section class="product-area">
      <div class="container" data-padding-top="62">
        <div class="shopping-cart-wrap">
          <div class="row">
            <div class="col-lg-8">
              <div class="shopping-checkout-content">
                <div class="checkout-accordion" id="accordionExample">
                  <div class="checkout-accordion-item">
                    <h2 class="heading" id="headingTwo">
                      <button
                        class="heading-button collapsed"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo"
                        aria-expanded="false"
                        aria-controls="collapseTwo"
                      >
                        <span class="step-number">1</span>
                        {{ $t("global.Personal Information") }}
                        <span class="step-edit"
                          ><i class="fa fa-pencil"></i
                        ></span>
                      </button>
                    </h2>
                    <div
                      id="collapseTwo"
                      class="accordion-collapse collapse show"
                      aria-labelledby="headingTwo"
                      data-bs-parent="#accordionExample"
                    >
                      <div class="checkout-accordion-body" data-margin-top="14">
                        <div class="personal-addresses">
                          <div class="delivery-address-form">
                            <form action="#" class="row">
                              <div class="col-md-6 col-sm-12">
                                <div class="col-md-12">
                                  <label for="validationCustom07">{{
                                    $t("global.Country")
                                  }}</label>
                                  <select
                                    class="form-control"
                                    @change="
                                      getStates(formData.country_id ?? 0)
                                    "
                                    :class="{ 'is-invalid': errors.country_id }"
                                    id="validationCustom07"
                                    v-model="formData.country_id"
                                  >
                                    <option value=""></option>
                                    <option
                                      :value="country.id"
                                      v-for="country in countries"
                                      :key="country.id"
                                    >
                                      {{ country.name }}
                                    </option>
                                  </select>
                                </div>
                                <div class="col-md-12">
                                  <label for="validationCustom08">{{
                                    $t("global.State")
                                  }}</label>
                                  <select
                                    class="form-control"
                                    @change="getAreas(formData.state_id ?? 0)"
                                    :class="{ 'is-invalid': errors.state_id }"
                                    id="validationCustom08"
                                    v-model="formData.state_id"
                                  >
                                    <option value=""></option>
                                    <option
                                      :value="state.id"
                                      v-for="state in states"
                                      :key="state.id"
                                    >
                                      {{ state.name }}
                                    </option>
                                  </select>
                                </div>
                                <div class="col-md-12">
                                  <label for="validationCustom09">{{
                                    $t("global.Area")
                                  }}</label>
                                  <select
                                   @change="
                                      getCartInforamtion(formData.area_id ?? 0)
                                    "
                                    class="form-control"
                                    :class="{ 'is-invalid': errors.area_id }"
                                    id="validationCustom09"
                                    v-model="formData.area_id"
                                  >
                                    <option value=""></option>
                                    <option
                                      :value="area.id"
                                      v-for="area in areas"
                                      :key="area.id"
                                    >
                                      {{ area.name }}
                                    </option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6 col-sm-12">
                                <div class="form-group row">
                                  <div class="col-md-12">
                                    <input
                                      id="f_name"
                                      class="form-control"
                                      type="text"
                                      :placeholder="$t('global.First Name')"
                                      required
                                      v-model="formData.receiver_first_name"
                                    />
                                    <InputErr
                                      v-if="errors.receiver_first_name"
                                      :message="errors.receiver_first_name"
                                    />
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-12">
                                    <input
                                      id="l_name"
                                      class="form-control"
                                      type="text"
                                      :placeholder="$t('global.Last Name')"
                                      required
                                      v-model="formData.receiver_last_name"
                                    />
                                    <InputErr
                                      v-if="errors.receiver_last_name"
                                      :message="errors.receiver_last_name"
                                    />
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-12">
                                    <input
                                      id="frm_phone"
                                      class="form-control"
                                      type="text"
                                      :placeholder="$t('global.Phone')"
                                      required
                                      v-model="formData.receiver_phone"
                                    />
                                    <InputErr
                                      v-if="errors.receiver_phone"
                                      :message="errors.receiver_phone"
                                    />
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <div class="col-md-12">
                                    <input
                                      id="frm_company"
                                      class="form-control"
                                      type="text"
                                      :placeholder="$t('global.Address')"
                                      required
                                      v-model="formData.address"
                                    />
                                    <InputErr
                                      v-if="errors.address"
                                      :message="errors.address"
                                    />
                                  </div>
                                </div>
                              </div>

                              <h2 dir="ltr">
                                {{ $t("global.Payment Method") }}
                              </h2>
                              <div class="form-group row">
                                <label class="col-md-3" for="frm_cash">{{
                                  $t("global.Cash on delivery")
                                }}</label>
                                <div class="col-md-6">
                                  <input
                                    id="frm_cash"
                                    class="mt-4"
                                    type="radio"
                                    value="cash on delivery"
                                    v-model="formData.payment_method"
                                  />
                                </div>
                              </div>
                              <!-- <div class="form-group row">
                                        <label class="col-md-3" for="paypal">{{
                                            $t("PayPal")
                                        }}</label>
                                        <div class="col-md-6">
                                            <input
                                            id="paypal"
                                            class="mt-4"
                                            type="radio"
                                            value="PayPal"
                                            v-model="formData.payment_method"
                                            />
                                        </div>
                                    </div> -->

                              <div class="form-group row">
                                <label class="col-md-3" for="paymob">{{
                                  $t("global.Paymob Accept")
                                }}</label>
                                <div class="col-md-6">
                                  <input
                                    id="paymob"
                                    class="mt-4"
                                    type="radio"
                                    value="paymob accept"
                                    v-model="formData.payment_method"
                                  />
                                </div>
                              </div>

                              <InputErr
                                v-if="errors.payment_method"
                                :message="errors.payment_method"
                              />

                              <a
                                class="btn btn-primary w-25 text-center"
                                @click.prevent="createOrder(formData)"
                                >{{ $t("global.Submit Order") }}</a
                              >
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="shopping-cart-summary mt-md-70">
                <div class="cart-detailed-totals">
                  <div class="card-block">
                    <div class="card-block-item">
                      <span class="label">{{
                        $t("global.Sub total")
                      }}</span>
                      <span class="value">{{
                        cartInfo.sub_total + " " + $t("global.LE")
                      }}</span>
                    </div>
                    <div class="card-block-item">
                      <span class="label">{{
                        $t("global.Shipping Cost")
                      }}</span>
                      <span class="value">{{
                        cartInfo.area_cost + " " + $t("global.LE")
                      }}</span>
                    </div>
                    <div class="card-block-item">
                      <span class="label">{{
                        $t("global.Weight Cost")
                      }}</span>
                      <span class="value">{{
                        cartInfo.weight_cost + " " + $t("global.LE")
                      }}</span>
                    </div>
                    <div class="card-block-item">
                      <span class="label">{{
                        $t("global.Total amount")
                      }}</span>
                      <span class="value">{{
                        cartInfo.total_amount + " " + $t("global.LE")
                      }}</span>
                    </div>
                  </div>
                  <div class="separator"></div>
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

import InputErr from "../../../admin/projectsManagement/utilize/input_error.vue";

export default {
  components: {
    InputErr,
  },

  setup() {
    const {
      formData,
      loading,
      errors,
      createOrder,
      getAreas,
      getCountries,
      getStates,
      countries,
      states,
      areas,
      getCartInforamtion,
      cartInfo
    } = cartAndOrder();
    formData.value = {
      country_id: "",
      state_id: "",
      area_id: "",
      receiver_first_name: "",
      receiver_last_name: "",
      receiver_phone: "",
      address: "",
      payment_method: "cash on delivery",
      cart: {},
    };

    onMounted(() => {
      getCountries();
      getCartInforamtion(0);
    });

    return {
      formData,
      loading,
      errors,
      createOrder,
      getAreas,
      getStates,
      countries,
      states,
      areas,
      cartInfo,
      getCartInforamtion
    };
  },
};
</script>


<style scoped>
.product-close:hover {
  cursor: pointer;
}
</style>
