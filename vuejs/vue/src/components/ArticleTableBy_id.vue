<template>
  <table v-if="article">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created At</th>
        <th>Updated At</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{ article.id }}</td>
        <td>{{ article.title }}</td>
        <td>{{ article.body }}</td>
        <td>{{ article.created_at }}</td>
        <td>{{ article.updated_at }}</td>
      </tr>
    </tbody>
  </table>
  <p v-else>No article found</p>
</template>

<script>
export default {
  props: {
    article: Object,
  },
};
</script>
