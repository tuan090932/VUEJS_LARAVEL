import { createApp } from "vue";
import App from "./App.vue";
import router from "./routes/router"; // Make sure this is the correct path to your router file

createApp(App).use(router).mount("#app");
