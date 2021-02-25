<template>
    <div>
        <form @submit.prevent="submitperson" >   
                <div class="form-group row m-1">
                       <label for="inputEmail3" class="col-sm-2 col-form-label">Name :</label>
                        <div class="col-sm-10">
                            <input type="text" v-model="nameent" class="form-control" placeholder="Enter the name">
                        </div>
                </div>
                <div class="form-group row m-1">
                       <label for="inputEmail3" class="col-sm-2 col-form-label">Age :</label>
                        <div class="col-sm-10">
                            <input type="number" v-model="ageent" class="form-control" placeholder="Enter the age">
                        </div>
                </div>
                 <div class="form-group row m-1">
                      <label for="inputEmail3" class="col-sm-2 col-form-label">City :</label>
                      <div class="col-sm-10">
                            <input type="text" v-model="cityent" class="form-control" placeholder="Enter the city">
                      </div>
                </div>
                 <div class="m-1 text-center">
                    <input type="submit" value="submit" class="btn btn-outline-primary col-1" style="align-self:center">
                 </div>
            
        </form>
    </div>
</template>
<script>
export default {
    name:"Addperson",
    data(){
        return{
            nameent:"",
            ageent:0,
            cityent:"",
            newperson:{}
        }

    },
    methods:{
        submitperson(){
            this.newperson={
              name:this.nameent,
              age:this.ageent,
              city:this.cityent
            };
            this.$emit('submitperson',this.newperson);
            this.nameent="";
            this.ageent=0;
            this.cityent="";
        }
    }
}
</script>