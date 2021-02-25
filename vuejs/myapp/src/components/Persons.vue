<template>
    <div>
        <Title titleText="Contacts"></Title>
        <Person :persons=persons @submitperson="submitperson" @deletePerson="deletePerson"></Person>
    </div>
</template>
<script>
import Person from './person.vue';
import Title from './title.vue';
export default {
    name:"Persons",
    data(){
        return{
            persons:[
                {
                id:1,
                name:"Hussain",
                age:25,
                city:"garges"
            },
            {
                id:2,
                name:"kevin",
                age:25,
                city:"garges"
            },
            {
                id:3,
                name:"john",
                age:25,
                city:"garges"
            },
            {
                id:4,
                name:"jack",
                age:25,
                city:"garges"
            },
            {
                id:5,
                name:"thom",
                age:25,
                city:"garges"
            }
            ]
        }
    }, 
    components: {
    Person,
    Title
  },
  methods:{
        submitperson(person){
            person.id=this.persons[this.persons.length-1].id+1;
            this.persons.push(person);
            alert("Added successfully");
        },
        deletePerson(id){
            const conf=confirm("Are you sure to delete ?");
            if(conf){
                this.persons=this.persons.filter(x=> x.id !== id);
                alert("Deleted");
            }
        }
  }
}
</script>Person