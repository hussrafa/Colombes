<template>
  <div>
    <h1>Book Details</h1>

    <hr>

    <div class="alert alert-success"
      v-if="$route.params.updated=='yes'">Record updated successfully</div>

    <h2>{{ book.title }}</h2>

    <h6>By {{ book.author }}</h6>

    <h6>By {{ book.category }}</h6>

    <p>{{ book.body }}</p>

    <hr>
    <div class="d-flex justify-content-between">
     
      <nuxt-link to="/books" class="btn btn-secondary mr-3">Back to Articles</nuxt-link>
    </div>
  </div>
</template>

<script>
export default {
  middleware: 'auth',

  async asyncData(context){
    const {data} = await context.$axios.get('/api/books/' + context.route.params.id)
    return {
      book : data
    }
  },

  methods:{
    deleteRecord(){
      if(confirm("Are you sure?") === true){
        this.$axios.delete('/api/book/' + this.$route.params.id)
          .then((response) => {
            if(response.data._id){
              this.$router.push({ name:'book', params:{ deleted:'yes' } })
            }
          })
          .catch( (error) => {
            console.log(error);
          });
      }
    }
  }
}
</script>
