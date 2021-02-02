<template>
  <div>
    <div class="d-flex justify-content-between align-items-center">
      <h1>List of books</h1>
      <nuxt-link to="/books/add" class="btn btn-success">Add New</nuxt-link>
    </div>
    <hr>

    <div class="alert alert-success"
      v-if="$route.params.created=='yes'">Record added successfully</div>
    <div class="alert alert-success"
      v-if="$route.params.deleted=='yes'">Record deleted successfully</div>
  
    <div class="list-group"
      v-if="books.length">
      <nuxt-link
        class="list-group-item list-group-item-action"
        :to="'/books/' + book._id"
        v-for="book in books"
        :key="book._id">
        {{ book.title }}
      </nuxt-link>
    </div>

    <div class="alert alert-info"
      v-else>
      No records found.
    </div>
  </div>
</template>

<script>
export default {
  async asyncData(context){
    const {data} = await context.$axios.get('/api/books')
    return {
      books : data
      
    }
  },
}
</script>
