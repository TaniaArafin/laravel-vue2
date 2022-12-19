<template>
<div>
  <h1>Student List</h1>
    
    <table class="table table-hover table-light mx-auto w-75">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="student in result" v-bind:key="student.id">
        <th>{{student.id}}</th>
        <td>{{student.name}}</td>
        <td>{{student.address}}</td>
        <td>{{student.phone}}</td>
        <td>
            <th>
            <button type="button" class="btn btn-warning" @click="edit(student)">Edit</button>
            <button type="button" class="btn btn-danger" @click="remove(student)">Delete</button>
            </th>
        </td>
        </tr> 
    </tbody>
    </table>
   
  </div>
  
</template>
<script setup>
import axios from '@/services/axios';
import {ref} from 'vue';


const student = ref({})

async function StudentLoad(){
  let result = await axios.get("/students")
  student.value=result.data
}
async function remove(id){
  let url = await axios.delete("/delete/"+id)
  alert('deleted')
  this.StudentLoad()
}


</script>
