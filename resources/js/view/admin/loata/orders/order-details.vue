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

      <Breadcrumb :title="$t('global.Order Details')" routeName="Orders" />
      <loader v-if="loading" />

      <div class="row">
        <div class="col-lg-8 col-sm-12">
          <div
            id="carouselExampleControls"
            class="carousel slide"
            data-ride="carousel"
          >
            <div class="carousel-inner" style="height: 442px; width: 100%">
              <div
                class="carousel-item active"
                :style="[
                  this.$i18n.locale == 'ar' ? 'float:left!important' : '',
                  'margin-left: unset!important;',
                ]"
                v-for="product in products"
                :key="product.id"
              >
                <img
                  class="d-block w-100"
                  :src="product.image"
                  alt="First slide"
                />
              </div>
            </div>
            <a
              :class="
                this.$i18n.locale == 'ar'
                  ? 'carousel-control-next'
                  : 'carousel-control-prev'
              "
              :style="this.$i18n.locale == 'ar' ? 'right:unset!important' : ''"
              href="#carouselExampleControls"
              role="button"
              data-slide="prev"
            >
              <span
                :class="
                  this.$i18n.locale == 'ar'
                    ? 'carousel-control-next-icon'
                    : 'carousel-control-prev-icon'
                "
                aria-hidden="true"
              ></span>
              <span class="sr-only">Previous</span>
            </a>
            <a
              class="carousel-control-next"
              :class="
                this.$i18n.locale == 'ar'
                  ? 'carousel-control-prev'
                  : 'carousel-control-next'
              "
              href="#carouselExampleControls"
              role="button"
              data-slide="next"
            >
              <span
                :class="
                  this.$i18n.locale == 'ar'
                    ? 'carousel-control-prev-icon'
                    : 'carousel-control-next-icon'
                "
                aria-hidden="true"
              ></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <div id="printDiv">
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
                    <i
                      class="far fa-pause-circle"
                      v-if="order.order_status == 'pending'"
                    ></i>
                    <i
                      class="text-info fas fa-truck"
                      v-if="order.order_status == 'shipping'"
                    ></i>
                    <i
                      class="text-success fas fa-check-circle"
                      v-if="order.order_status == 'completed'"
                    ></i>
                    <i
                      class="text-info fa fa-cogs"
                      v-if="order.order_status == 'processing'"
                    ></i>
                    <i
                      class="fas fa-reply text-danger"
                      v-if="order.order_status == 'refund'"
                    ></i>
                    <i
                      class="fa fa-times-circle text-danger"
                      v-if="order.order_status == 'canceled'"
                    ></i>
                    {{ order.order_status }}</span
                  >
                </div>
                <div class="row justify-content-between">
                  <h5 class="w-auto">{{ $t("global.Payment Status") }}</h5>
                  <span class="w-auto" style="color: #fcb00c">
                    <i
                      class="text-success fas fa-check-circle"
                      v-if="order.payment_status == 'paid'"
                    ></i>
                    <i
                      class="fa fa-times-circle text-danger"
                      v-if="order.payment_status == 'failed'"
                    ></i>
                    <i
                      class="text-dark far fa-pause-circle"
                      v-if="order.payment_status == 'unpaid'"
                    ></i>
                    {{ $t("global." + order.payment_status) }}</span
                  >
                </div>
                <div class="row justify-content-between">
                  <h5 class="w-auto">{{ $t("global.Payment Way") }}</h5>
                  <span class="w-auto" style="color: #fcb00c">{{
                    $t("global." + order.payment_method)
                  }}</span>
                </div>
                <div
                  class="row justify-content-between"
                  v-if="order.payment_method == 'online payment'"
                >
                  <h5 class="w-auto">Transaction id</h5>
                  <span class="w-auto" style="color: #fcb00c">{{
                    order.transaction_id
                  }}</span>
                </div>
              </div>
            </div>

            <div class="d-flex">
              <div class="card w-100">
                <div class="card-body pt-0">
                  <div class="card-header mb-4">
                    <h5 class="card-title">{{ $t("global.Order details") }}</h5>
                  </div>

                  <!-- {{-- items details --}}                     style="max-height: 1000px; overflow-y: scroll" -->
                  <div
                    class="card-box"

                  >
                    <div class="table-responsive">
                      <table class="table table-bordered table-secondary mb-4">
                        <tbody>
                          <tr>
                            <th>{{ $t("global.Product Name") }}</th>
                            <th>{{ $t("global.Price") }}</th>
                            <th>{{ $t("global.Quantity") }}</th>
                            <th>{{ $t("global.Subtotal") }}</th>
                            <th>{{ $t("global.Weight") }}</th>
                          </tr>
                          <tr v-for="product in products" :key="product.id">
                            <td>{{ product.name }}</td>
                            <td>{{ product.pivot.price }}</td>
                            <td>{{ product.pivot.quantity }}</td>
                            <td>{{ product.pivot.sub_total }}</td>
                            <td>{{ product.pivot.weight }}</td>
                          </tr>
                        </tbody>
                      </table>

                      <hr style="" />
                      <br />
                      <table class="table table-bordered mb-4">
                        <tbody class="table-secondary">
                          <tr>
                            <th>{{ $t("global.Weight cost") }}</th>
                            <th>{{ $t("global.Shipping cost") }}</th>
                            <th>{{ $t("global.Sub total") }}</th>
                            <th>{{ $t("global.Total Amount") }}</th>
                          </tr>
                          <tr>
                            <td>{{ order.weight }} {{ $t("global.LE") }}</td>
                            <td>
                              {{ order.shipping_cost }} {{ $t("global.LE") }}
                            </td>
                            <td>{{ order.subtotal }} {{ $t("global.LE") }}</td>
                            <td>
                              {{ order.total_amount }} {{ $t("global.LE") }}
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-12">
          <div class="text-center card-box">
            <div class="text-left">
              <h4 class="header-title mb-4">{{ $t("global.Client") }}</h4>
            </div>
            <div class="member-card">
              <div class="avatar-xl member-thumb mb-2 mx-auto d-block star-div">
                <img
                  :src="client.imagePath"
                  :onerror="
                    'https://ui-avatars.com/api/?name=' +
                    client.name +
                    '&amp;color=7F9CF5&amp;background=EBF4FF'
                  "
                  class="rounded-circle img-thumbnail"
                  alt="profile-image"
                />
                <i
                  class="fas fa-certificate text-primary small star-icon"
                  title="Featured Agent"
                ></i>
              </div>

              <div class="">
                <h5 class="font-18 mb-1">{{ client.name }}</h5>
              </div>

              <div class="mt-20">
                <ul class="list-inline row">
                  <li class="list-inline-item col-12 mx-0">
                    <h5>{{ $t("global.Email") }}</h5>
                    <p>{{ client.email }}</p>
                  </li>
                  <li class="list-inline-item col-6 mx-0">
                    <h5>{{ $t("global.Number of Orders") }}</h5>
                    <p>{{ order_numbers }}</p>
                  </li>

                  <li class="list-inline-item col-6 mx-0">
                    <h5>{{ $t("global.Phone") }}</h5>
                    <p>{{ client.phone }}</p>
                  </li>
                </ul>
              </div>
            </div>
            <!-- end membar card -->
          </div>
          <div class="text-center card-box">
            <div class="text-left">
              <h4 class="header-title mb-4 d-flex justify-content-between">
                <span>{{ $t("global.Action") }}</span>
                <span
                  ><a
                    class="btn btn-sm btn-secondary"
                    @click.prevent="printPolica"
                    ><i class="fa fa-print"></i> </a
                ></span>
              </h4>
            </div>
            <div class="member-card">
              <div
                v-if="
                  (order.payment_status != 'failed' &&
                    order.payment_method == 'cash on delivery') ||
                  (order.payment_method == 'online payment' &&
                    order.payment_status == 'paid')
                "
                class="col-sm-12 py-4 d-flex flex-row justify-content-center"
              >
                <button
                  v-if="
                    order.hold == 0 &&
                    order.order_status != 'completed' &&
                    order.order_status != 'canceled' &&
                    order.order_status != 'modified' &&
                    order.order_status != 'pending' &&
                    (order.order_status == 'processing' ||
                      order.order_status == 'shipping')
                  "
                  class="btn btn-warning btn-sm mx-1 text-dark"
                  @click="holdOrder(order.id)"
                  style="height: 60px"
                >
                  {{ $t("global.Hold") }}
                  <i class="text-dark far fa-pause-circle"></i>
                </button>

                <button
                  v-if="order.hold != 0"
                  class="btn btn-primary btn-sm mx-1"
                  @click="holdOrder(order.id)"
                  style="height: 60px"
                >
                  {{ $t("global.Continue") }}<i class="far fa-play-circle"></i>
                </button>

                <button
                  v-if="order.hold == 0 && order.order_status == 'pending'"
                  class="btn btn-primary btn-sm mx-1"
                  @click="updateOrderStatus(order.id)"
                  style="height: 60px"
                >
                  {{ $t("global.Processing") }} <i class="fas fa-cogs"></i>
                </button>

                <button
                  v-if="order.hold == 0 && order.order_status == 'processing'"
                  class="btn btn-info btn-sm mx-1"
                  @click="updateOrderStatus(order.id)"
                  style="height: 60px"
                >
                  {{ $t("global.Shipping") }} <i class="fas fa-truck"></i>
                </button>

                <button
                  v-if="order.hold == 0 && order.order_status == 'shipping'"
                  class="btn btn-success btn-sm mx-1"
                  @click="updateOrderStatus(order.id)"
                  style="height: 60px"
                >
                  {{ $t("global.Completed") }}
                  <i class="fas fa-check-circle"></i>
                </button>

                <button
                  v-if="
                    order.payment_method == 'cash on delivery' &&
                    (order.order_status == 'pending' ||
                      order.order_status == 'processing')
                  "
                  class="btn btn-danger btn-sm mx-1"
                  @click="cancelOrder(order.id)"
                  style="height: 60px"
                >
                  {{ $t("global.Cancel Order") }}
                  <i class="fas fa-power-off"></i>
                </button>

                <div
                  v-if="
                    order.order_status == 'shipping' ||
                    (order.order_status == 'completed' && refund_allowed)
                  "
                >
                  <p
                    class="text-danger"
                    v-if="order.order_status == 'completed' && refund_allowed"
                  >
                    <i class="text-danger mdi mdi-close-circle"></i
                    >{{
                      $t("global.You can not return order after") +
                      " ( " +
                      refund_date +
                      " )"
                    }}
                  </p>

                  <button
                    class="btn btn-danger btn-sm mx-1"
                    @click="cancelOrder(order.id)"
                    style="height: 60px"
                  >
                    <i class="fas fa-reply"></i> {{ $t("global.Refund order") }}
                  </button>
                </div>
              </div>
              <div v-else>
                {{ $t("global.The actions finished") }}
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
import { onMounted, onUpdated } from "vue";
import { ordersComposable } from "../composables/order";
export default {
  props: ["id"],
  setup(props) {
    const {
      getOrder,
      loading,
      refund_allowed,
      products,
      order_numbers,
      refund_date,
      order,
      client,
      area,
      country,
      state,
      updateOrderStatus,
      holdOrder,
      cancelOrder,
    } = ordersComposable();

    onMounted(() => {
      getOrder(props.id);
    });

    const printPolica =async () => {
        $("#printDiv").printThis({
            header: "<img src='/web/img/logo.png' onerror='logo' style='width:100%;height:400px' > "
        });
    }


    return {
      products,
      order,
      loading,
      client,
      area,
      country,
      state,
      printPolica,
      holdOrder,
      updateOrderStatus,
      cancelOrder,
      order_numbers,
      refund_date,
      refund_allowed,
    };
  },
};
</script>


<style scoped>
.card-box {
  background-color: #feeeca;
  padding: 10px;
  border-radius: 10px;
  margin-bottom: 20px;
}

.star-div {
  position: relative;
}
.star-icon {
  position: absolute;
  top: 4px;
  right: 2px;
  font-size: 16px;
  background-color: #f3f3f3;
  height: 20px;
  width: 20px;
  border-radius: 50%;
  line-height: 20px;
  text-align: center;
}
.phase {
  display: inline-block;
  padding: 5px;
}
</style>
