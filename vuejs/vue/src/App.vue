<script setup>
//import HelloWorld from "./components/HelloWorld.vue";
//mport TheWelcome from "./components/TheWelcome.vue";
//import listProduct from "./components/ListProduct.vue";
import Header from "./components/Header.vue";
</script>
<template>
  <Header title="day la prop title" />
  <router-view />
</template>

<style scoped>
.listProduct {
  text-align: left;
}
</style>
