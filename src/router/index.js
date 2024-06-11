import { compile } from "vue";
import Home from "../views/Home.vue";
import { createRouter, createWebHistory } from "vue-router";

// path → component
const routes = [
    //   { path: '/', component: () => import('@/pages/HomeView.vue') },
    //   { path: '/about', component: () => import('@/pages/AboutView.vue') }
    {
        path: "/home",
        name: "Home",
        component: Home,
        meta: {
            layout: "default",
        },
    },
    {
        path: "/checkOut",
        name: "CheckOut",
        component: () => import("../views/checkOut.vue"),
        meta: {
            layout: "default",
        },
    },
    {
        path: "/enter",
        name: "Enter",
        component: () => import("../views/enter.vue"),
        meta: {
            layout: "default",
        },
    },
    {
        path: "/food",
        name: "Food",
        component: () => import("../views/food.vue"),
        meta: {
            layout: "default",
        },
    },
    {
        path: "/login",
        name: "Login",
        component: () => import("../views/login.vue"),
        meta: {
            layout: "default",
        },
        children: [
            {
                path: "/login/forgotpw",
                component: () => import("../components/ForgotPW.vue"),
            },
            {
                path: "/login/logininfo",
                component: () => import("../components/LoginInfo.vue"),
            },
            {
                path: "/login/newpw",
                component: () => import("../components/NewPW.vue"),
            },
            {
                path: "/login/pwsuccess",
                component: () => import("../components/PWSuccess.vue"),
            },
        ],
    },
    {
        path: "/map",
        name: "Map",
        component: () => import("../views/map.vue"),
        meta: {
            layout: "default",
            isHoverEnabled: true,
        },
        children: [
            {
                path: "/map/north",
                component: () => import("../components/NorthTW.vue"),
            },
            {
                path: "/map/south",
                component: () => import("../components/SouthTW.vue"),
            },
            {
                path: "/map/east",
                component: () => import("../components/EastTW.vue"),
            },
            {
                path: "/map/middle",
                component: () => import("../components/MiddleTW.vue"),
            },
        ],
    },
    {
        path: "/member",
        name: "Member",
        component: () => import("../views/member.vue"),
        meta: {
            layout: "default",
            isHoverEnabled: false,
        },
    },
    {
        path: "/product",
        name: "Product",
        component: () => import("../views/product.vue"),
        meta: {
            layout: "default",
        },
    },
    {
        path: "/receipt",
        name: "Receipt",
        component: () => import("../views/receipt.vue"),
        meta: {
            layout: "default",
        },
    },
    {
        path: "/register",
        name: "Register",
        component: () => import("../views/register.vue"),
        meta: {
            layout: "default",
        },
        children: [
            {
                path: "/register/regisinfo",
                component: () => import("../components/RegisInfo.vue"),
            },
            {
                path: "/register/regisuccess",
                component: () => import("../components/RegiSuccess.vue"),
            },
        ],
    },
    {
        path: "/restaurant",
        name: "Restaurant",
        component: () => import("../views/restaurant.vue"),
        meta: {
            layout: "default",
        },
    },
    {
        path: "/review",
        name: "Review",
        component: () => import("../views/review.vue"),
        meta: {
            layout: "default",
        },
    },
    {
        path: "/",
        name: "Index",
        component: () => import("../views/index.vue"),
        meta: {
            layout: "default",
        },
    },
    // -----------以下後台--------------
    {
        path: "/BkHome",
        name: "BkHome",
        component: () => import("../views/BkHome.vue"),
        meta: {
            layout: "default-back",
        },
    },
    {
        path: "/BkAccess",
        name: "BkAccess",
        component: () => import("../views/BkAccess.vue"),
        meta: {
            layout: "default-back",
        },
    },
    {
        path: "/BkDiscount",
        name: "BkDiscount",
        component: () => import("../views/BkDiscount.vue"),
        meta: {
            layout: "default-back",
        },
    },
    {
        path: "/BkFaq",
        name: "BkFaq",
        component: () => import("../views/BkFaq.vue"),
        meta: {
            layout: "default-back",
        },
    },
    {
        path: "/BkMember",
        name: "BkMember",
        component: () => import("../views/BkMember.vue"),
        meta: {
            layout: "default-back",
        },
    },
    {
        path: "/BkMemberDetail",
        name: "BkMemberDetail",
        component: () => import("../views/BkMemberDetail.vue"),
        meta: {
            layout: "default-back",
        },
    },
    {
        path: "/BkOrder",
        name: "BkOrder",
        component: () => import("../views/BkOrder.vue"),
        meta: {
            layout: "default-back",
        },
    },
    {
        path: "/BkOrderDetail",
        name: "BkOrderDetail",
        component: () => import("../views/BkOrderDetail.vue"),
        meta: {
            layout: "default-back",
        },
    },
    {
        path: "/BkOrderDetail",
        name: "BkOrderDetail",
        component: () => import("../views/BkOrderDetail.vue"),
        meta: {
            layout: "default-back",
        },
    },
    {
        path: "/BkShop",
        name: "BkShop",
        component: () => import("../views/BkShop.vue"),
        meta: {
            layout: "default-back",
        },
    },
    {
        path: "/BkProduct",
        name: "BkProduct",
        component: () => import("../views/BkProduct.vue"),
        meta: {
            layout: "default-back",
        },
    },
];

// 建立 router
const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL), // vite 設定檔中的 base: /tid101/g1/
    routes: routes,
});
router.afterEach((to, from) => {
    console.log("scrolled to Top");
    let html_el = document.getElementsByTagName("html")[0];
    html_el.scrollTo({
        top: 0,
        behavior: "smooth",
    });
    // html_el.scrollTop = 0;
});

// 匯出 router
export default router;
