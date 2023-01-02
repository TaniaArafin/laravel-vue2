<template>
<div class="headline">Login Page</div>
<div class="rong card">
   <p>{{student}}</p>

    <p class="text-danger" v-if="error"> {{error}}</p>
    <form>
    <div class="login">
        <input type="email"  placeholder="Enter Email" v-model="form.email"/>
        <input type="password"  placeholder="Password" v-model="form.password"/>   
            <button @click.prevent="login">Login</button>
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
    border-radius: 10px;
}
.login{
    margin-top:5px;
}

.login button{
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
.headline{
    margin-top: 45px;
    font-size: 35px;
}
.card {
    margin-top: 10px;
    margin-left: 15px;
     margin-bottom: 220px;
    height: 350px;
    width: 400px;
    margin-right: 16px;
    background: #FFFFFF 0% 0% no-repeat padding-box;
    box-shadow: 0px 3px 20px #BCBCCB47;
    border-radius: 5px;
    
    border: none;
    display: inline-flex;
    padding: 15px;
}

</style>
