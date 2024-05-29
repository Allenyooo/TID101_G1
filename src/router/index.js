import Home from '../views/Home.vue'
import { createRouter, createWebHashHistory } from 'vue-router'

const history = createWebHashHistory()
const routes = [
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
    name: 'checkOut',
    component: checkOut,
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/enter',
    name: 'enter',
    component: enter,
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/food',
    name: 'food',
    component: food,
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/login',
    name: 'login',
    component: login,
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/map',
    name: 'map',
    component: map,
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/member',
    name: 'member',
    component: member,
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/product',
    name: 'product',
    component: product,
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/receipt',
    name: 'receipt',
    component: receipt,
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/register',
    name: 'register',
    component: register,
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/restaurant',
    name: 'restaurant',
    component: restaurant,
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/review',
    name: 'review',
    component: review,
    meta: {
      layout: 'default'
    }
  },
  {
    path: '/index',
    name: 'index',
    component: index,
    meta: {
      layout: 'default'
    }
  },
  // -----------以下後台--------------
  {
    path: '/BkHome',
    name: 'BkHome',
    component: BkHome,
    meta: {
      layout: 'defaultBack'
    }
  },




  // 方法2
  // {
  //   path: '/about',
  //   name: 'About',
  //   // route level code-splitting
  //   // this generates a separate chunk (about.[hash].js) for this route
  //   // which is lazy-loaded when the route is visited.
  //   component: () => import(/* webpackChunkName: "about" */ '../views/About.vue'),
  //   meta: {
  //     layout: 'default'
  //   }
  // }
]
const router = createRouter({
  linkActiveClass: 'active',
  history,
  routes
})

export { router }
