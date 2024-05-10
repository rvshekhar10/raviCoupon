<template>
    <div v-if="errors">
   <div v-for="(v, k) in errors" :key="k" class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
     <p v-for="error in v" :key="error" class="text-sm">
       {{ error }}
     </p>
   </div>
 </div>
 
     <form class="space-y-6" @submit.prevent="saveCoupon">
         <div class="space-y-4 rounded-md shadow-sm">
             <div>
                 <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
                 <div class="mt-1">
                     <input type="text" name="code" id="code"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="form.code">
                 </div>
             </div>
 
             <div>
                 <label for="brand_id" class="block text-sm font-medium text-gray-700">Brand Id</label>
                 <div class="mt-1">
                     <input type="text" name="brand_id" id="brand_id"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="form.brand_id">
                 </div>
             </div>
 
             <div>
                 <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                 <div class="mt-1">
                     <input type="text" name="status" id="status"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="form.status">
                 </div>
             </div>
 
             <div>
                 <label for="redeemed_at" class="block text-sm font-medium text-gray-700">Redeemed_at</label>
                 <div class="mt-1">
                     <input type="text" name="redeemed_at" id="redeemed_at"
                            class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            v-model="form.redeemed_at" disabled>
                 </div>
             </div>
         </div>
 
         <button type="submit"
                 class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
             Create
         </button>
     </form>
 </template>
 
 <script>
 import { reactive } from "vue";
 import useCoupons from "../../composables/coupons";
 
 export default {
     setup() {
         const form = reactive({
             'code': '',
             'brand_id': '',
             'status': '',
             'redeemed_at': '',
         })
 
         const { errors, storeCoupon } = useCoupons()
 
         const saveCoupon = async () => {
             await storeCoupon({...form});
         }
 
         return {
             form,
             errors,
             saveCoupon
         }
     }
 }
 </script>