
<template>
    <div class="container">
        <!-- <input type="text" name="mytest" id="mytest" v-model="dValue">
         <div>
        Props:value {{mypropsvalue}}
    </div>
    <div>
        {{counter}}
        {{dValue}}
    </div> -->
   
   <div class="formgroup">
       <div class="row mt-1">
            <input type="text" id="name" v-model="fname" class="form-control" placeholder="Name" />
       </div>
        <div class="row mt-1">
            <input type="number" id="age" v-model="age" class="form-control"  placeholder="Age" />
        </div>
        <div class="row mt-1">
            <input type="button" style="width:150px;" id="user" value="Add user" v-on:click="AddUser();" class="btn btn-success" />
        </div>
   </div>
    <!-- <input type="button" id="mybutton" value="clickMe" v-on:click="changeCounter();" /> -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>
                    name
                </th>
                <th>
                    Age
                </th>
            </tr>
        </thead>
        <tbody>
           <tr  v-for="(person,index) in persons" :key="index">             
               <td>
                   {{person.name}}
               </td>
               <td>
                   {{person.age}}
               </td>
           </tr>
        </tbody>
    </table>

    </div>
   

</template>
<style scoped>

</style>
<script>
export default  {
    name:'mycomp',
    props:{
       mypropsvalue:String 
    },
     data:()=> {
        return{
            counter:0,
            dValue:'this is test',
            fname:'',
            age:'',
            persons:[
                {
                name:"Hussain",
                age:30
                },
                {
                name:"anees",
                age:27
                }
            ]
        }
    },
    methods:{
       changeCounter:function(){
            this.counter+=1;
       },
       AddUser:function(){
           if(this.persons.some(val=>val.name===this.fname)){
            alert("duplicate not allowed");
           }else{ 
            const newvam={name:this.fname,age:this.age};
            this.persons.push(newvam);
           }
       }
    }
}
</script>