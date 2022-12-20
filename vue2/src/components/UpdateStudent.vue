<template>
<h1>Edit Infromation</h1>
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
import axios from '@/services/axios'
import {onMounted, ref} from 'vue'


// const name = ref('')
// const address = ref('')
// const phone = ref('')

// const student = ref({})
// async function UpdateStudent(){
//   let result = await axios.put("/students"+ this.student.id)
//   student.name=result.name,



//   student.value =result.value

  
  
// }


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

    edit(student){
        this.student= student;
    },
    updatedata(){
        var editrecords = '/update/'+this.student.id;
        axios.put(editrecords, this.student)
        .then(
            ({data})=>{
               
                this.student.name='';
                this.student.address='';
                this.student.phone='';
                // this.student.id=''
                alert("Updated");
                this.StudentLoad();
            }
        )
    }
//    methods:{
//     async updatedata(){
//     let editrecords = await axios.put('/update/'+this.student.id, {
//     name: this.student.name,
//     address:this.address.name,
//     phone:this.phone.name,   
//     });
//     if(editrecords.status ==200){
//         this.router.push({name:'home'})
//     }
//    }
// },

// async mounted(){
//     const editrecords = await axios.get('/update/'+this.student.id)
//     this.student = editrecords.data
// }
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

