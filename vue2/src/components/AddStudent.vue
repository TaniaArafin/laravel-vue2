<template>
<div class="rong">
 <div class="headline">Add Student</div>
<div>
    <form  @submit.prevent="save">
        <div class="add">
        <input type="text"  placeholder="Enter Name" v-model="name" />
        <input type="text"  placeholder="Enter Address" v-model="address"/>
        <input type="text"  placeholder="Enter phone" v-model="phone"/>

        
        <button> Add </button>
    </div>
    </form>
</div>
  <div class="headline">Student List</div>
    <table class="table table-hover table-light mx-auto w-75">
    <thead>
        <tr>
        <!-- <th scope="col">ID</th> -->
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="i in student" v-bind:key="i.id">
        <!-- <th>{{i.id}}</th> -->

        <td>{{i.name}}</td>
        <td>{{i.address}}</td>
        <td>{{i.phone}}</td>
        <td>
            <th>
            <button type="button" class="btn btn-warning btn1" @click="edit(i)">Edit</button>
            <button type="button" class="btn btn-danger" @click="remove(i.id)">Delete</button>
            </th>
        </td>
        </tr> 
    </tbody>
    </table>

</div>   
</template>

<script setup>
import { onMounted, ref } from "vue";
import axios from "@/services/axios";
import router from "@/router";
import { createToaster } from "@meforma/vue-toaster";
const toaster = createToaster({});

const name = ref("");
const address = ref("");
const phone = ref("");
const id = ref("");

const student = ref({});

async function StudentLoad() {
  let result = await axios.get("/students");
  console.log(result);
  student.value = result.data;
  
}

onMounted(() => {
  StudentLoad();
});

async function add() {
  let result = await axios.post("/save", {
    name: name.value,
    address: address.value,
    phone: phone.value,
  });
  if (result.status == 200) {
    toaster.success("Added Successfully", {
      position: "top-left",
      duration: 2358,
    });

    
    router.push({ name: "AddStudent" });
    StudentLoad();
  }
}

function save() {
  if (id.value == "") {
    add();
    (name.value = ""), (address.value = ""), (phone.value = "");
  } else {
    updatedata();
    (name.value = ""), (address.value = ""), (phone.value = "");
    
    toaster.success("Updated", {
      position: "top-left",
      duration: 2358,
    });
  }
}

function edit(i) {
  name.value = i.name;
  address.value = i.address;
  phone.value = i.phone;
  id.value = i.id;
  
}

async function updatedata() {
  let editrecords = await axios.put("/update/" + id.value, {
    name: name.value,
    address: address.value,
    phone: phone.value,
    id: id.value,
  });
  StudentLoad();
}
async function remove(id) {
  let url = await axios.delete("/delete/" + id);
   toaster.error("Deleted", {
      position: "top-left",
      duration: 2358,
    });
  StudentLoad();
}
onMounted(() => {
  StudentLoad();
});

// async function logout(){
//     localStorage.clear();
//     router.push({ name: "Login" });

// }
</script>
<style scoped>
.add input {
  width: 350px;
  height: 40px;
  padding-left: 20px;
  display: block;
  margin-bottom: 30px;
  margin-left: auto;
  margin-right: auto;
  border: 1px solid rgba(45, 79, 116, 255);
  border-radius: 10px;
}
.add button {
  width: 350px;
  height: 40px;
  border: 1px solid rgba(45, 79, 116, 255);
  color: #fff;
  background-color: rgba(7, 122, 193, 255);
  border-radius: 10px;
}
.btn1 {
  margin-right: 5px;
}
.rong {
  background-color: rgb(218, 234, 247);
  height:1200px;
}

.headline{
    margin-top: 45px;
    font-size: 35px;
}
</style>

