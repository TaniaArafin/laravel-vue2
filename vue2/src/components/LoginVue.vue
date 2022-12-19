<template>
<h1>Login page</h1>
<div>
   <p>{{student}}</p>

    <p class="text-danger" v-if="error"> {{error}}</p>
    <form  @submit.prevent="login">
    <div class="login">
        <input type="email"  placeholder="Enter Email" v-model="form.email"/>
        <input type="password"  placeholder="Password" v-model="form.password"/>
        <input type="submit" value="Log In" />
    </div>
    </form>
</div>
    
</template>
<script setup>

// http://127.0.0.1/api/login
import {reactive} from 'vue'
import axios from '@/services/axios'
import router from '@/router';


let form = reactive({
    email:'',
    password:''
});
const login = async()=>{
    await axios.post('/login', form).then(res=>{
        if(res.data.success){
            localStorage.setItem('token',res.data.data.token)
            router.push({name:'home'})
        }
        else{
            alert(res.data.message)
        }

    })
}

</script>
<style scoped>
.login input{
    
    width:300px;
    height: 40px;
    padding-left: 20px;
    display: block;
    margin-bottom: 30px;
    margin-left: auto;
    margin-right:auto;
    border:1px solid rgba(45,79,116,255);
}
.login{
    margin-top:100px;
}

</style>
