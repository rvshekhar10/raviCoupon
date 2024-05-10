import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import { createApp } from "vue/dist/vue.esm-bundler";
import router from './router'
import CouponsIndex from './components/coupons/CouponsIndex.vue'

createApp({
    components: {
        CouponsIndex
    }
}).use(router).mount('#app')

