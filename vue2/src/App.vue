<template>
<div class="rong">
  
<div class="nav nav-pills">
  <router-link to="/" class="nav-item nav-link">
       <span class="material-symbols-rounded" data-toggle="tooltip" data-placement="bottom" title="Home">home</span>
  </router-link>
  <router-link to="/about" class="nav-item nav-link" >About</router-link>
  <router-link to="/login" class="nav-item nav-link" >
       <span class="material-symbols-rounded" data-toggle="tooltip" data-placement="bottom" title="login">login</span>
  </router-link>
  <router-link to="/register" class="nav-item nav-link" >Register</router-link>
  <router-link to="/addstudent" class="nav-item nav-link" >
      <span class="material-symbols-rounded" data-toggle="tooltip" data-placement="bottom" title="Add Student">person_add</span>
  </router-link>
   <div class="dropdown">
  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Profile
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item" href="#"><button type="button" class="btn btn-red" @click.prevent="logout">Log Out</button></a></li>
  </ul>
</div>
</div>

<router-view/>
</div>

</template>

<script setup>

import axios from "@/services/axios";
import router from '@/router';
import storage from '@/services/storage'



async function logout(){
  const{data: response} =await axios.post("/logout").catch(error =>alert(error.mesage));
  if(response.success){
  storage.clearItem('token');
  storage.clearItem('user');
  return router.push({path: '/login'});
  }
  else{
    alert("hhhhh");
  }
}
</script>


<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  /* -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale; */
  text-align: center;
  color: #052847;
}

nav a {
  font-weight: bold;
  color: #54606d;
}
.rong{
  background-color: rgb(218, 234, 247);
}
.nav{
  padding:20px;
  background-color: #1d5aaa;
}
.nav-item{
  color:aliceblue;
  margin-left:10px;
}
.nav-item:hover {
  color:rgb(198, 207, 214)
}
#dropdownMenuButton1{
  color:aliceblue;
}


</style>
