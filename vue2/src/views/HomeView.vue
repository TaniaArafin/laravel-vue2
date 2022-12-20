<template>
<button class="button" @click.prevent="logout">Log Out</button>
<h1> Welcome to our Home Page</h1>
  
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

<style scoped>
.button{
  width:300px;
  height:40px;
  border:1px solid rgba(45,79,116,255);
  color:#fff;
  background-color: rgb(236, 104, 104) ;
}
</style>
