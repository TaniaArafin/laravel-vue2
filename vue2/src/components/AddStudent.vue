<template>
<div class="rong">
 <div class="headline">Add Student</div>
<div class="card">
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
        <th scope="col">Serial</th>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="(i, index) in student.data " v-bind:key="i.id">
        <th>{{index+1}}</th>

        <td>{{i.name}}</td>
        <td>{{i.address}}</td>
        <td>{{i.phone}}</td>
        <td>
            <th>
            <button type="button" class="btn btn1 btn-sm" @click="edit(i)">
              <span class="material-symbols-rounded">edit</span>
            </button>
            <button type="button" class="btn btn-danger btn-sm" @click="remove(i.id)">
              <span class="material-symbols-rounded">delete</span>
            </button>
            </th>
        </td>
        </tr> 

    </tbody>

    </table>
     <Bootstrap5Pagination align="center" :data="student" @pagination-change-page="StudentLoad"></Bootstrap5Pagination>


</div> 


</template>

<script setup>
import { onMounted, ref } from "vue";
import axios from "@/services/axios";
import router from "@/router";
import { createToaster } from "@meforma/vue-toaster";
import SweetAlert from 'sweetalert';

import { Bootstrap5Pagination } from 'laravel-vue-pagination';





const toaster = createToaster({});

const name = ref("");
const address = ref("");
const phone = ref("");
const id = ref("");

const student = ref({});


async function StudentLoad(page=1) {
  let result = await axios.get("/students?page="+page);
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
  SweetAlert('Success', 'Added successfuly', 'success');
  StudentLoad();
}
async function remove(id) {
  var delay = alertify.get('notifier','delay');
  alertify.set('notifier','delay', 1);
  alertify.set('notifier','position', 'top-right');
  alertify.confirm('', 'It will be deleted permanently.', async function(){ 
     let url = await axios.delete("/delete/" + id);
  //  toaster.error("Deleted", {
  //     position: "top-left",
  //     duration: 2358,
  //   });
  StudentLoad();
    alertify.success('Ok') }
                , function(){ 
                  StudentLoad();
                  
                  alertify.error('Cancel')});



  // let url = await axios.delete("/delete/" + id);
  //  toaster.error("Deleted", {
  //     position: "top-left",
  //     duration: 2358,
  //   });
  // StudentLoad();
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
  background-color: rgba(7, 122, 193, 255);;
}
.rong {
  background-color: rgb(218, 234, 247);
  height:1200px;
}

.headline{
    margin-top: 45px;
    font-size: 35px;
    margin-bottom: 20px;
}

.card {
    margin-top: 10px;
    margin-left: 15px;
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

