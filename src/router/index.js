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
    component: () => import('../views/CheckOut.vue'),
    meta: {
      layout: 'default'
    }
  },
//   {
//     path: '/enter',
//     name: 'Enter',
//     component: Enter,
//     meta: {
//       layout: 'default'
//     }
//   },
//   {
//     path: '/food',
//     name: 'Food',
//     component: Food,
//     meta: {
//       layout: 'default'
//     }
//   },
//   {
//     path: '/login',
//     name: 'Login',
//     component: Login,
//     meta: {
//       layout: 'default'
//     }
//   },
//   {
//     path: '/map',
//     name: 'Map',
//     component: Map,
//     meta: {
//       layout: 'default'
//     }
//   },
//   {
//     path: '/member',
//     name: 'Member',
//     component: Member,
//     meta: {
//       layout: 'default'
//     }
//   },
//   {
//     path: '/product',
//     name: 'Product',
//     component: Product,
//     meta: {
//       layout: 'default'
//     }
//   },
//   {
//     path: '/receipt',
//     name: 'Receipt',
//     component: Receipt,
//     meta: {
//       layout: 'default'
//     }
//   },
//   {
//     path: '/register',
//     name: 'Register',
//     component: Register,
//     meta: {
//       layout: 'default'
//     }
//   },
//   {
//     path: '/restaurant',
//     name: 'Restaurant',
//     component: Restaurant,
//     meta: {
//       layout: 'default'
//     }
//   },
//   {
//     path: '/review',
//     name: 'Review',
//     component: Review,
//     meta: {
//       layout: 'default'
//     }
//   },
//   {
//     path: '/index',
//     name: 'Index',
//     component: Index,
//     meta: {
//       layout: 'default'
//     }
//   },
//   // -----------以下後台--------------
//   {
//     path: '/BkHome',
//     name: 'BkHome',
//     component: BkHome,
//     meta: {
//       layout: 'defaultBack'
//     }
//   },
];

// 建立 router
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL), // vite 設定檔中的 base: /tid101/g1/
  routes: routes
});

// 匯出 router
export default router;