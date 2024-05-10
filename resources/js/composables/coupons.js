import { ref } from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useCoupons() {
    const coupons = ref([])
    const coupon = ref([])
    const router = useRouter()
    const errors = ref('')

    const getCoupons = async () => {
        let response = await axios.get('/api/coupons')
        coupons.value = response.data.data;
    }

    const getCoupon = async (id) => {
        let response = await axios.get('/api/coupons/' + id)
        coupon.value = response.data.data;
    }

    const storeCoupon = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/coupons', data)
            await router.push({name: 'coupons.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const updateCoupon = async (id) => {
        errors.value = ''
        try {
            await axios.put('/api/coupons/' + id, coupon.value)
            await router.push({name: 'coupons.index'})
        } catch (e) {
            if (e.response.status === 422) {
               errors.value = e.response.data.errors
            }
        }
    }

    const redeemCoupon = async (id) => {
        await axios.put('/api/coupons/redeem/' + id)
    }

    const destroyCoupon = async (id) => {
        await axios.delete('/api/coupons/' + id)
    }


    return {
        coupons,
        coupon,
        errors,
        getCoupons,
        getCoupon,
        storeCoupon,
        updateCoupon,
        destroyCoupon,
        redeemCoupon
    }
}