<template>
  <div>
    <h1>Create Article</h1>
    <form @submit.prevent="createArticle">
      <label for="title">Title:</label><br />
      <input type="text" id="title" v-model="article.title" /><br />
      <label for="body">Body:</label><br />
      <textarea id="body" v-model="article.body"></textarea><br />
      <input type="submit" value="Submit" />
    </form>

    <div v-if="article.errors.length">
      <h2>Errors:</h2>
      <ul>
        <li v-for="(error, index) in article.errors" :key="index">
          {{ error }}
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      article: {
        title: "",
        body: "",
        errors: [],
      },
    };
  },

  methods: {
    async createArticle() {
      if (this.article.title === "" || this.article.body === "") {
        if (this.article.title === "") {
          this.article.errors.push("Title is required");
        }
        if (this.article.body === "") {
          this.article.errors.push("Body is required");
        }
      } else {
        console.log("da run ");
        const url = "http://127.0.0.1:8000/api/api/articles";
        try {
          const response = await axios.post(url, this.article);
          console.log("Article created:", response.data);
          // Show an alert
          window.alert("Article created successfully");
          // Optionally, you can reset the form after successful submission
          this.resetForm();
        } catch (error) {
          console.error("Error creating article:", error);
        }
      }
    },

    resetForm() {
      this.article.title = "";
      this.article.body = "";
    },
  },
};
</script>
