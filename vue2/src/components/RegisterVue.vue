<template>
    <div class="rong">
        <form  @submit.prevent="save">
        <div class="register">
        <input type="text"  placeholder="Enter Name" v-model="form.name" />
        <input type="text"  placeholder="Enter Email" v-model="form.email"/>
        <input type="password"  placeholder="Enter Password" v-model="form.password"/>
        <input type="password"  placeholder="Confirm Password" v-model="form.c_password"/>
        
        <button> Register</button>
    </div>
    </form>
    </div>
</template>
<script setup>

//http://127.0.0.1/api/register

import {reactive} from 'vue'
import axios from '@/services/axios.js'



let form = reactive({
    name:"",
    email:"",
    password:"",
    c_password:""
});
const save = async()=>{
    await axios.post('/register',form).then(res=>{
       
        if(res.data.success){
            localStorage.setItem('token',res.data.data.token)
            router.push({name:'home'})
        }
        else{
            alert(res.data.message)
        }
        
      
       
    })
}


// onMounted(()=>{
//     let user = localStorage.getItem('token');
//     if(user){
//         router.push({'name':'home'})
//     }
// })

</script>


<style scoped>
.register{
    margin-top:50px;
}
.register input{
    width:300px;
    height: 40px;
    padding-left: 20px;
    display: block;
    margin-bottom: 30px;
    margin-left: auto;
    margin-right:auto;
    border:1px solid rgba(45,79,116,255);
    border-radius: 10px;
}
.register button{
    width:300px;
    height:40px;
    border:1px solid rgba(45,79,116,255);
    color:#fff;
    background-color: rgba(7,122,193,255) ;
    border-radius: 10px;
}
.rong{
    background-color: rgb(218, 234, 247);
    height:1000px;
}
</style>