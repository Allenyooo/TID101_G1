import Home from '../views/Home.vue';
import { createRouter, createWebHistory } from "vue-router";

// path → component
const routes = [
  //   { path: '/', component: () => import('@/pages/HomeView.vue') },
  //   { path: '/about', component: () => import('@/pages/AboutView.vue') }
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/checkOut',
    name: 'CheckOut',
    component: () => import('../views/checkOut.vue'),
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/enter',
    name: 'Enter',
    component: () => import('../views/enter.vue'),
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/food',
    name: 'Food',
    component: () => import('../views/food.vue'),
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/login',
    name: 'Login',
    component: () => import('../views/login.vue'),
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/map',
    name: 'Map',
    component: () => import('../views/map.vue'),
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/member',
    name: 'Member',
    component: () => import('../views/member.vue'),
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/product',
    name: 'Product',
    component: () => import('../views/product.vue'),
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/receipt',
    name: 'Receipt',
    component: () => import('../views/receipt.vue'),
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/register',
    name: 'Register',
    component: () => import('../views/register.vue'),
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/restaurant',
    name: 'Restaurant',
    component: () => import('../views/restaurant.vue'),
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/review',
    name: 'Review',
    component: () => import('../views/review.vue'),
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/index',
    name: 'Index',
    component: () => import('../views/index.vue'),
    meta: {
      layout: 'default'
    }
  },
  // -----------以下後台--------------
  {
    path: '/BkHome',
    name: 'BkHome',
    component: () => import('../views/BkHome.vue'),
    meta: {
      layout: 'default-back'
    }
  },
];

// 建立 router
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL), // vite 設定檔中的 base: /tid101/g1/
  routes: routes
});

// 匯出 router
export default router;