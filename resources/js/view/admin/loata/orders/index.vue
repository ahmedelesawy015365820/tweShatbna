<template>
  <div
    :class="[
      'page-wrapper',
      this.$i18n.locale == 'ar' ? 'page-wrapper-ar' : '',
    ]"
  >
    <div class="content container-fluid">
      <Breadcrumb :title="$t('global.Orders')" routeName="dashboard" />
      <!-- Table -->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <loader v-if="loading" />
            <div class="card-body">
              <div class="card-header pt-0">
                <form action="#" method="post">
                  <div class="row filter-row">
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="search">{{ $t("global.Search") }}</label>
                        <input
                          id="search"
                          type="text"
                          v-model="search"
                          class="form-control"
                          :placeholder="$t('global.Search')"
                        />
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="status">{{
                          $t("global.Order Status")
                        }}</label>
                        <select class="form-control"  v-model="filter_order_status" @change="getOrders">
                          <option value="">
                            {{ $t("global.All Orders") }}
                          </option>
                          <option value="pending">
                            {{ $t("global.Pending") }}
                          </option>
                          <option value="processing">
                            {{ $t("global.Processing") }}
                          </option>
                          <option value="shipping">
                            {{ $t("global.Shipping") }}
                          </option>
                          <option value="completed">
                            {{ $t("global.Completed") }}
                          </option>
                          <option value="canceled">
                            {{ $t("global.Canceled") }}
                          </option>
                          <option value="refund">
                            {{ $t("global.Refund") }}
                          </option>
                          <option value="hold">{{ $t("global.Hold") }}</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="status">{{
                          $t("global.Payment Status")
                        }}</label>
                        <select class="form-control"  v-model="filter_payment_status" @change="getOrders">
                          <option value="">
                            {{ $t("global.All Orders") }}
                          </option>
                          <option value="paid">
                            {{ $t("global.Paid") }}
                          </option>
                          <option value="unpaid">
                            {{ $t("global.Unpaid") }}
                          </option>
                          <option value="failed">
                            {{ $t("global.Failed") }}
                          </option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                      <div class="form-group">
                        <label for="status">{{
                          $t("global.Payment Way")
                        }}</label>
                        <select class="form-control"  v-model="filter_payment_method" @change="getOrders">
                          <option value="">
                            {{ $t("global.All Orders") }}
                          </option>
                          <option value="cash on delivery">
                            {{ $t("global.Cash on delivery") }}
                          </option>
                          <option value="online payment">
                            {{ $t("global.Online Payment") }}
                          </option>
                        </select>
                      </div>
                    </div>
                  </div>
                </form>
              </div>

              <div class="table-responsive">
                <table class="table mb-0">
                  <thead>
                    <tr>
                      <th>{{ $t("global.Orders Number") }}</th>
                      <th>{{ $t("global.Receivers Name") }}</th>
                      <th>{{ $t("global.Order status") }}</th>
                      <th>{{ $t("global.Payment Way") }}</th>
                      <th>{{ $t("global.Payment Status") }}</th>
                      <th>{{ $t("global.Total Amount") }}</th>
                      <th>{{ $t("global.Action") }}</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr
                      v-if="Object.keys(orders.data ?? {}).length"
                      v-for="(item, index) in orders.data"
                      :key="item.id"
                    >
                      <td>{{ item.id }}</td>
                      <td>
                        {{
                          item.receiver_first_name +
                          " " +
                          item.receiver_last_name
                        }}
                      </td>
                      <td>
                        <span v-if="item.hold == 0">
                            <i class="far fa-pause-circle" v-if="item.order_status =='pending'"></i>
                            <i class="text-info fas fa-truck" v-if="item.order_status =='shipping'"></i>
                            <i class="text-success fas fa-check-circle" v-if="item.order_status =='completed'"></i>
                            <i class="text-info fa fa-cogs" v-if="item.order_status =='processing'"></i>
                            <i class="fas fa-reply text-danger" v-if="item.order_status =='refund'"></i>
                            <i class="fa fa-times-circle text-danger" v-if="item.order_status =='canceled'"></i>
                        {{
                          $t("global." + item.order_status)
                        }}</span>
                        <span v-else
                          ><i class="text-danger far fa-pause-circle"></i>
                          {{ $t("global.Hold") }}</span
                        >
                      </td>
                      <td>{{ $t("global." + item.payment_method) }}</td>
                      <td>
                            <i class="text-success fas fa-check-circle" v-if="item.payment_status =='paid'"></i>
                            <i class="fa fa-times-circle text-danger" v-if="item.payment_status =='failed'"></i>
                            <i class="text-dark far fa-pause-circle" v-if="item.payment_status =='unpaid'"></i>
                        {{ $t("global." + item.payment_status) }}
                      </td>
                      <td>{{ item.total_amount }}</td>
                      <td>
                        <router-link
                          :to="{
                            name: 'orderDetails',
                            params: {
                              lang: this.$i18n.locale || 'ar',
                              id: item.id,
                            },
                          }"
                          class="btn btn-sm btn-success me-2"
                        >
                          <i class="far fa-eye"></i>
                        </router-link>
                      </td>
                    </tr>
                    <tr v-else>
                      <th class="text-center" colspan="7">
                        {{ $t("No Data Found") }}
                      </th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /Table -->
      <!-- start Pagination -->
      <Pagination :data="orders" @pagination-change-page="getOrders">
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
import { onMounted } from "vue";
import { ordersComposable } from "../composables/order";

export default {
  name: "index",
  setup() {
    const { orders, search, loading, getOrders,filter_order_status,filter_payment_method,filter_payment_status } = ordersComposable();

    onMounted(() => {
      getOrders();
    });

    return { loading, getOrders, search, orders,filter_order_status,filter_payment_method,filter_payment_status };
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
</style>
