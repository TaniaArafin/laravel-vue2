<template>
<h1>Add Students</h1>
<div>
    <form  @submit.prevent="add">
        <div class="add">
        <input type="text"  placeholder="Enter Name" v-model="name" />
        <input type="text"  placeholder="Enter Address" v-model="address"/>
        <input type="text"  placeholder="Enter phone" v-model="phone"/>

        
        <button> Save Student Details</button>
    </div>
    </form>
</div>
    
</template>

<script setup>
import {ref} from 'vue'
import axios from 'axios'

const name = ref('')
const address = ref('')
const phone = ref('')

async function add(){
    let result = await axios.post('/save', {
        name:name.value,
        address:address.value,
        phone:phone.value,

    });
    if(result.status==200){
        
         router.push({name:'home'})
    }

}


</script>
<style scoped>
.add input{
    width:300px;
    height: 40px;
    padding-left: 20px;
    display: block;
    margin-bottom: 30px;
    margin-left: auto;
    margin-right:auto;
    border:1px solid rgba(45,79,116,255);
}
.add button{
     width:300px;
    height:40px;
    border:1px solid rgba(45,79,116,255);
    color:#fff;
    background-color: rgba(7,122,193,255) ;
}
</style>

