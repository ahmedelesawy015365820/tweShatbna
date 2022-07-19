<template>
  <div class="content">

    <breadcrumb
      :title="$t('global.Orders')"
      :routeName="'home'"
      :prev="$t('header.home')"
    />
    <loader2 v-if="loading" />

    <!--Order Box-->
    <div class="order-box container my-5">

        <div class="sec-title">
            <h3>{{$t("Your Orders")}}</h3>
        </div>

        <table class=" table">
            <thead>
                <tr>
                    <th>{{$t('Order Number')}}</th>
                    <th>{{$t('Order Status')}}</th>
                    <th>{{$t('Total Amount')}}</th>
                    <th>{{$t('Date')}}</th>
                    <th>{{$t('Action')}}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="order in orders" :key="order.id">
                    <td>{{order.id}}</td>
                    <td>{{order.order_status}}</td>
                    <td>{{order.total_amount + $t('L.E')}} </td>
                    <td>{{order.created_at}}</td>
                    <td><router-link :to="{name:'orderDetails',params:{id:order.id,lang: this.$i18n.locale}}"><i class="fa fa-eye"></i></router-link></td>
                </tr>
            </tbody>
        </table>


    </div>
    <!--End Order Box-->

    </div>

</template>


<script>
import { cartAndOrder } from "../composable/cart";
import { onMounted } from '@vue/runtime-core';

export default{
    setup(){
        const {getOrders,orders}  = cartAndOrder()

        onMounted(()=>{
            getOrders()
        })


        return {
           getOrders,
           orders
        }
    }
}
</script>
