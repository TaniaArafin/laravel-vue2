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


<footer class="foot">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #3b5998;"
        href="#!"
        role="button"
        ><i class="bi bi-facebook"></i></a>

      <!-- Twitter -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #55acee;"
        href="#!"
        role="button"
        ><i class="bi bi-twitter"></i
      ></a>

      <!-- Google -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #dd4b39;"
        href="#!"
        role="button"
        ><i class="bi bi-google"></i
      ></a>

      <!-- Instagram -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #ac2bac;"
        href="#!"
        role="button"
        ><i class="bi bi-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #0082ca;"
        href="#!"
        role="button"
        ><i class="bi bi-linkedin"></i
      ></a>
      <!-- Github -->
      <a
        class="btn text-white btn-floating m-1"
        style="background-color: #333333;"
        href="#!"
        role="button"
        ><i class="bi bi-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 Copyright TaniaArafin:
    <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>

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
.foot{
  text-align: center;
  background-color: #316fc0;
}


</style>
