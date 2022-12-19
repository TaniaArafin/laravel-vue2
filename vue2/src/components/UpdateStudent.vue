<template>
    <form @submit.prevent="updatedata"> 
  
        <div class="update">
        <input type="text"  placeholder="Enter Name" v-model="name" />
        <input type="text"  placeholder="Enter Address" v-model="address"/>
        <input type="password"  placeholder="Enter phone" v-model="phone"/>
        
        <button> Save Changes</button>
        </div>

    </form>
</template>
<script>
import axios from 'axios';
export default{
    name:'UpdateStudent',
    data (){
    return {
      
      student:{
        
        name:'',
        address:'',
        phone:''
      }
    }
   },
   methods:{
    async updatedata(){
    let editrecords = await axios.put('http://127.0.0.1/api/update/'+this.student.id, {
    name: this.student.name,
    address:this.address.name,
    phone:this.phone.name,
        
    });
    if(editrecords.status ==200){
        this.router.push({name:'home'})

    }


   }

}
}

</script>
<style scoped>
.update input{
    width:300px;
    height: 40px;
    padding-left: 20px;
    display: block;
    margin-bottom: 30px;
    margin-left: auto;
    margin-right:auto;
    border:1px solid rgba(45,79,116,255);
}
.update button{
    width:300px;
    height:40px;
    border:1px solid rgba(45,79,116,255);
    color:#fff;
    background-color: rgba(7,122,193,255) ;
}
</style>

