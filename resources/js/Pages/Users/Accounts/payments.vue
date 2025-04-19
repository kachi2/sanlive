<script setup lang="ts">
import AppTemplate from '@/AppTemplate.vue';
import AccountSidebar from '@/Components/accountSidebar.vue';
import HeadTags from '@/Components/headTags.vue';


const props = defineProps({
    payments: Object,
    pageMeta: Object
})
</script>

<template>
    <HeadTags :pageMeta="pageMeta" />
    <AppTemplate>

        <template #content>
<div class="ps-shopping" style="background: #eee; ">
    <div class="container">
        <div class="ps-shopping__content">
            <div class="row">
              <AccountSidebar />
                <div class="col-12 col-md-7 col-lg-8 mt-5" style="background: #fff; border-radius: 5px">

                    <div class="row">
                        <span class="pt-5 pl-5"> <a href="#" onclick="history.back()"> << back  </a> <hr style="width:100%"></span>
                       <div class="table-responsive-sm">
                        <table class="table ps-table ps-table--product">
                            <thead>
                                <tr>
                                   
                                    <th>Order No</th>
                                    <th>Payment Ref</th>
                                    <th >External Ref</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="payments.length > 0" v-for="pay in payments">
                                    <td > {{pay.order_id}}</td>
                                    <td > {{pay.payment_ref}}</td>
                                    <td >{{pay.external_ref}} </td>
                                    <td >{{pay.payable}}</td>
                                    <td > 
                                        <span class="badge badge-success" v-if="pay.status == 1"> Success</span> 
                                         <span class="badge badge-warning" v-else> Pending</span>
                                        
                                </td>
                                </tr >
                                <tr v-else>
                                    <p style="margin: 80px auto"> No Data Found</p>
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
<div style="height: 2em; background:#eee"></div>



        </template>
    </AppTemplate>

</template>

<style scoped>
.navIL {
    padding: 15px;
    padding-left: 10px
}

.dropdown-item:hover {
    background: rgb(219, 218, 218);
}
</style>
