import { createRouter, createWebHistory } from "vue-router";

import CouponsIndex from '../components/coupons/CouponsIndex.vue';
import CouponsCreate from '../components/coupons/CouponsCreate.vue';
import CouponsEdit from '../components/coupons/CouponsEdit.vue';


const routes = [
    {
        path: '/',
        name: 'coupons.index',
        component: CouponsIndex
    },
    {
        path: '/dashboard',
        name: 'coupons.index',
        component: CouponsIndex
    },
    {
        path: '/coupons/create',
        name: 'coupons.create',
        component: CouponsCreate
    },
    {
        path: '/coupons/edit',
        name: 'coupons.edit',
        component: CouponsEdit,
        props: true
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})