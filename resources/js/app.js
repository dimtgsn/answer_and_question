import { createApp } from "vue";
import Router from "./src/router/router.js";
import App from './src/App.vue'
import {createPinia} from "pinia";

createApp(App)
    .use(Router)
    .use(createPinia())
    .mount("#app")