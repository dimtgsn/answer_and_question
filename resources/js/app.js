import { createApp } from "vue";
import Router from "./src/router/router.js";
import App from './src/App.vue'


createApp(App)
    .use(Router)
    .mount("#app")