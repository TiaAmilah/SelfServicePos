import { createRouter, createWebHistory } from "vue-router";

import ProductIndex from '../components/product/index.vue'
import ProductCreate from '../components/product/create.vue'
import ProductEdit from '../components/product/edit.vue'

const routes = [
    {
        path:'/product_vue/',
        component: ProductIndex,
    },
    {
        path:'/product_vue/create',
        component: ProductCreate,
    },
    {
        path:'/product_vue/edit/:id',
        component: ProductEdit,
        props: true,
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router