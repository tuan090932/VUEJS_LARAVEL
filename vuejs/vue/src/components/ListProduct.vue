<template>
  <div>
    <ul>
      <li v-for="(product, index) in products" :key="index">
        {{ product.name }}: {{ product.price }} VND
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  data() {
    return {
      products: [
        { name: "Mì xào", price: 50000 },
        { name: "Phở bò", price: 40000 },
        { name: "Bánh mì", price: 15000 },
        // Thêm các sản phẩm khác tại đây
      ],
    };
  },
};
</script>
