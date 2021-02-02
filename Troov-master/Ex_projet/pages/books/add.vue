<template>
  <div>
    <h1>Add New Book</h1>
    <hr>

    <div class="row">
      <div class="col-md-6">
        <form action=""
          method="post"
          @submit.prevent="submitForm()">

          <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control"
              :class="{ 'is-invalid': errors && errors.title }"
              v-model="title">
            <div class="invalid-feedback" v-if="errors && errors.title">
              {{ errors.title.msg }}
            </div>
          </div>

           <div class="form-group">
            <label for="">Category</label>
            <input type="text" class="form-control"
              :class="{ 'is-invalid': errors && errors.title }"
              v-model="category">
            <div class="invalid-feedback" v-if="errors && errors.category">
              {{ errors.category.msg }}
            </div>
          </div>

          <div class="form-group">
            <label for="">Author</label>
            <input type="text" class="form-control"
              :class="{ 'is-invalid': errors && errors.author }"
              v-model="author">
            <div class="invalid-feedback" v-if="errors && errors.author">
              {{ errors.author.msg }}
            </div>
          </div>

          <div class="form-group">
            <label for="">Body</label>
            <textarea cols="30" rows="4" class="form-control"
              :class="{ 'is-invalid': errors && errors.body }"
              v-model="body"></textarea>
            <div class="invalid-feedback" v-if="errors && errors.body">
              {{ errors.body.msg }}
            </div>
          </div>

          <input type="submit" value="Submit" class="btn btn-primary mr-3">
          <nuxt-link to="/books" class="btn btn-secondary mr-3">Cancel</nuxt-link>

        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  middleware: 'auth',

  data(){
    return{
      errors:null,
      title:null,
      author:null,
      body:null
    }
  },

  methods:{
    submitForm(){
      this.$axios.post( '/api/books', {
          title: this.title,
          author: this.author,
          body: this.body,
          category:this.category
        })
        .then((response) => {
          console.log(response)

          if(response.data._id){
            this.$router.push({ name:'books', params:{ created:'yes' } })
          }
        })
        .catch( (error) => {
          console.log(error)
          if(error.response.data.errors){
            this.errors = error.response.data.errors
          }
        });
    }
  }
}
</script>
