<template>
  <div class="header">
    <router-link to="/" class="logo link">CompanyLogo {{ title }}</router-link>
    <div class="header-right">
      <router-link to="/Home" class="active link">Home</router-link>
      <router-link to="/About" class="link">About</router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: "Header",
  props: {
    title: String,
  },
};
</script>

<style scoped>
.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

.logo {
  color: #f2f2f2;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  line-height: 25px;
  border-radius: 4px;
}

.header-right {
  float: right;
}

.header .link {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  line-height: 25px;
  border-radius: 4px;
}

.header .link.logo {
  font-size: 25px;
  font-weight: bold;
}

.header .link:hover {
  background-color: #ddd;
  color: black;
}

.header .link.active {
  background-color: dodgerblue;
  color: white;
}
</style>
