<template>
  <div>
    <div>
      <form @submit.prevent="searchArticle">
        <label for="search">Search by ID:</label>
        <input type="text" id="search" v-model="searchId" />
        <input type="submit" value="Search" />
      </form>
      <!-- Existing table code here -->
    </div>

    <ArticleTableBy_idVue v-if="article" :article="article" />

    <ArticleTableComponent v-else :data="data" @delete="deleteArticle" />
  </div>
</template>
<script>
import axios from "axios";
import ArticleTableComponent from "./ArticleTableComponent.vue";
import ArticleTableBy_idVue from "./ArticleTableBy_id.vue";
export default {
  components: {
    ArticleTableComponent,
    ArticleTableBy_idVue,
  },

  // cú pháp
  //
  //  <ArticleTableBy_idVue
  //    v-if="article"
  //    :article="article"
  //   @searchArticle="searchArticle"
  // />
  //
  //nếu  v-if="article" biến state ->giá trị khác null thì sẽ hiển thị component ArticleTableBy_idVue
  //  :article="article"
  //  :article nghĩa là bạn đang truyền một prop có tên là article vào trong ArticleTableBy_idVue
  //  "article" là giá trị của biến article
  // nếu @delete="deleteArticle"
  // khai báo ở thằng cha -> khi thằng con thực hiện delete -> thì hàm  deleteArticle trong thằng cha hành dộng
  //

  //kiến thức
  //created sẽ chạy đầu tiên và chạy duy nhất 1 lần -> gọi fetchdata -> làm cho biến data trong sate thay đổi -> làm renendderr html
  //khi bấm delete -> thành công -> logic tự xóa 1 row trong data -> row này =row_id -> làm data thay đổi render lại html
  //khi gỏ số trong input search -> v-model="searchId"-> làm cho state search id thay đổi
  //-> báo cho hàm watch biết -> và thực hiện 1 method-> là search -> state->watch->method-> gọi state article-> khác null-> làm render html

  data() {
    return {
      data: [], // Add this line
      searchId: "", // Add this line for the search form
      article: null, // Add this line for the searched article

      // vì created chạy đầu tiên nên data -> luôn có giá trị = fetched data
    };
  },
  created() {
    this.fetchData();
    //vô script hàm này sẽ được gọi đầu tiên
  },

  watch: {
    searchId() {
      if (this.searchId === "") {
        // nếu searchid =="" thì gán giá trị article =null
        this.article = null;
      } else {
        this.searchArticle();
      }
    },
  },

  methods: {
    async fetchData() {
      let url = "http://127.0.0.1:8000/api/api/articles";
      setTimeout(async () => {
        await axios
          .get(url)
          .then((response) => {
            this.data = response.data;
          })
          .catch((error) => {
            console.error("There was an error!", error);
          });
      }, 1000); // Delay 1 second
    },

    async deleteArticle(id) {
      let url = `http://127.0.0.1:8000/api/api/articles/${id}`;
      setTimeout(async () => {
        await axios
          .delete(url)
          .then((response) => {
            // lúc này state đả thay đổi
            //this.fetchData(); // Fetch data after successful delete
            //cách 2 tránh gọi data
            const index = this.data.findIndex((article) => article.id === id);
            // If found, remove it from the array
            if (index !== -1) {
              this.data.splice(index, 1);
            }
          })
          .catch((error) => {
            console.error("There was an error!", error);
          });
      }, 1000); // Delay 1 second
    },

    async searchArticle() {
      let url = `http://127.0.0.1:8000/api/api/articles/${this.searchId}`;
      setTimeout(async () => {
        await axios
          .get(url)
          .then((response) => {
            console.log("tjhanh cong");
            this.article = response.data;
          })
          .catch((error) => {
            console.error("There was an error!", error);
          });
      }, 1000); // Delay 1 second
    },
  },
};
</script>
