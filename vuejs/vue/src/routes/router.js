import { createRouter, createWebHistory } from "vue-router";
import Header from "../components/Header.vue";
import listProduct from "../components/ListProduct.vue";
import About from "../components/About.vue";
import Home from "../components/Home.vue";
// Define routes
const routes = [
  {
    path: "/About",
    component: About,
  },

  {
    path: "/Home",
    component: Home,
  },
];

// Create router instance
const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
