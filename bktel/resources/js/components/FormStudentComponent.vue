
<template>
    
    <div >
        <div class="stu-div">
            LastName
            <input type="text" name="lastname" v-model="student.last_name">
        </div>

        <div class="stu-div">
            FirstName
            <input type="text" name="firstname" v-model="student.first_name">
        </div>
        
        <div class="stu-div">
            Student Code
            <input type="text" name="studentcode" v-model="student.student_code">
        </div>

        <div class="stu-div">
            Department
            <input type="text" name="department" v-model="student.department">
        </div>

        <div class="stu-div">
            Faculty
            <select v-model="student.faculty" name="faculty">
                <option disabled value="">Please select one</option>
                <option>Điện-Điện tử</option>
                <option>Hóa</option>
                <option>Quản lí công nghiệp</option>
            </select>
        </div>
        
        <div class="stu-div">
            Address
            <input type="text" name="address" v-model="student.address">
        </div>
        
        <div class="stu-div">
            Phone
            <input type="text" name="phone" v-model="student.phone">
        </div>

        <div class="stu-div">
            Note
            <input type="text" name="note" v-model="student.note">
        </div>
        
        <div class="stu-div">
            <button type="submit" @click="saveForm">Submit</button>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return{
                student: {
                    last_name:null,
                    first_name:null,
                    student_code:null,
                    department:null,
                    faculty:null,
                    address:null,
                    phone:null,
                    note:null,
                }
            }
        },
        methods: {
          
             saveForm(){
               const res = axios.post('students/store',{
                    first_name: this.student.first_name,
                    last_name: this.student.last_name,
                    student_code: this.student.student_code,
                    department: this.student.department,
                    faculty: this.student.faculty,
                    address: this.student.address,
                    phone: this.student.phone,
                    note: this.student.note,
                 
                    }).then(res=>{
                window.location.href='/home';
               })
            }
            // console.log("hi");
        }
    }


</script>
