import { createApp } from 'vue';
import { createPinia } from "pinia"
import router from "./router/index";
import './assets/css/style.css';
import App from './App.vue';
import Default from './layouts/default/Default.vue';
import DefaultBack from './layouts/default/DefaulBack.vue';

const pinia = createPinia();
const app = createApp(App);

app.component('LayoutDefault', Default);
app.component('LayoutDefaultBack', DefaultBack);
app.use(router);
app.use(pinia);

app.mount('#app');
