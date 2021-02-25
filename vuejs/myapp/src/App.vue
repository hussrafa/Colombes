<template>
  <div id="app">
    <!-- <HelloWorld msg="This is my first app with vue"/>
   <Mycomp mypropsvalue="test value passed from parent"/> -->
   <Persons></Persons>
  </div>
</template>

<script>
// import HelloWorld from './components/HelloWorld.vue';
// import Mycomp from './components/mycomp.vue';
import Persons from './components/Persons.vue';
export default {
  name: 'App',
  components: {
    // HelloWorld,
    // Mycomp
    Persons
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
