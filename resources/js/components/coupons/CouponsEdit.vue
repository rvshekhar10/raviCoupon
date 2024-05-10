<template>
    <div v-if="errors">
      <div v-for="(v, k) in errors" :key="k" class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
        <p v-for="error in v" :key="error" class="text-sm">
          {{ error }}
        </p>
      </div>
    </div>
    <form class="space-y-6" v-on:submit.prevent="saveCoupon">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="code" class="block text-sm font-medium text-gray-700">Code</label>
                <div class="mt-1">
                    <input type="text" name="code" id="code"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="coupon.code">
                </div>
            </div>

            <div>
                <label for="brand_id" class="block text-sm font-medium text-gray-700">Brand id</label>
                <div class="mt-1">
                    <input type="text" name="brand_id" id="brand_id"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="coupon.brand_id">
                </div>
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <div class="mt-1">
                    <input type="text" name="status" id="status"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="coupon.status">
                </div>
            </div>
        </div>
                    
        <div>
                <label for="redeemed_at" class="block text-sm font-medium text-gray-700">Redeemed_at</label>
                <div class="mt-1">
                    <input type="text" name="redeemed_at" id="redeemed_at"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="coupon.redeemed_at" disabled>
                </div>
            </div>
            
        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Save
        </button>
    </form>
</template>

<script>
import useCoupons from "../../composables/coupons";
import {onMounted} from "vue";

export default {
    props: {
        id: {
            required: true,
            type: String
        }
    },

    setup(props) {
        const { errors, coupon, getCoupon, updateCoupon } = useCoupons()

        onMounted(getCoupon(props.id))

        const saveCoupon = async () => {
            await updateCoupon(props.id)
        }

        return {
            errors,
            coupon,
            saveCoupon
        }
    }
}
</script>