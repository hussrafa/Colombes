<template>
  <div>
    
    <hr>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Login</h3>
		
			</div>
<div class="card-body">
  <form  action=""
          method="post"
          @submit.prevent="submitForm()">

          <div class="input-group form-group">
            <div class="input-group-prepend">
              	<span class="glyphicon glyphicon-use"></span>
					   	
               </div>
            <input type="text" class="form-control"
              :class="{ 'is-invalid': errors && errors.email }"
              v-model="email" placeholder="eMail">
            <div class="invalid-feedback" v-if="errors && errors.email">
              {{ errors.email.msg }}
            </div>
						
					</div>

          	<div class="input-group form-group">
 <div class="input-group-prepend">
<span class="input-group-text"><i class="fas fa-key"></i></span>
 </div>
            <input type="password" class="form-control"
              :class="{ 'is-invalid': errors && errors.password }"
              v-model="password" placeholder="Password">
            <div class="invalid-feedback" v-if="errors && errors.password">
              {{ errors.password.msg }}
            </div>
              </div>

    <div class="alert alert-success"
      v-if="$route.params.registered=='yes'">You have registered successfully</div>

 
          <div class="alert alert-danger"
            v-if="login_error">{{ login_error }}</div>

          <input type="submit" value="Login" class="btn btn-primary mr-3">
          <nuxt-link to="/" class="btn btn-secondary mr-3">Cancel</nuxt-link>

        </form>
      </div>
    </div>
  </div>
  </div>
  </div>
</template>

<script>
export default {
  middleware: 'auth',
  auth: 'guest',
  data(){
    return{
      errors:null,
      login_error:null,
      email:null,
      password:null,
      status:false,
    }
  },

  methods:{
    submitForm(){
      this.$auth.loginWith('local', {
          data: {
            email: this.email,
            password: this.password
          }
        })
        .catch( (error) => {
          console.log(error)
          if(error.response.data.message){
            this.login_error = error.response.data.message
          }
        })
    }
  }
}
</script>
<style scope>
@import url('https://fonts.googleapis.com/css?family=Numans');

/* html,body{
background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
} */

.container{
height: 100%;
align-content: center;
}

.card{
height: 250px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}
.card_Register{
height: 460px;
margin-top: auto;
margin-bottom: auto;
width: 400px;
background-color: rgba(0,0,0,0.5) !important;
}
.social_icon span{
font-size: 60px;
margin-left: 10px;
color: #FFC312;
}



.card-header h3{
color: white;
}


.input-group-prepend span{
width: 50px;
background-color: #FFC312;
color: black;
border:0 !important;
}

input:focus{
outline: 0 0 0 0  !important;
box-shadow: 0 0 0 0 !important;

}


.login_btn{
color: black;
background-color: #FFC312;
width: 100px;
}

.login_btn:hover{
color: black;
background-color: white;
}

.links{
color: white;
}

.links a{
margin-left: 4px;
}
</style>