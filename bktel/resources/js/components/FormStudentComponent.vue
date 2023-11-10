
<template>
    
    
    <div class="form-student" >
        <div class="form-tieude-student">
            <div class="teacher-registration">
            <h2>STUDENT INFORMATION</h2>
            </div>
            <p >Please Fill & Click Submit</p>
        </div>
       
        <form @submit.prevent="saveForm_student"  class="student-form" >
        
     
            
        
        <div class="form-group-student">
            <label for="Last Name">Last Name</label>
            <input class="input_stu" type="text" name="lastname" data-rules="required" v-model="student.last_name" placeholder="Last Name">
        </div>

        <div class="form-group-student">
            <label for="First Name">First Name</label>
            <input class="input_stu" type="text" name="firstname" v-model="student.first_name" placeholder="First Name">
        </div>
        
        <div class="form-group-student">
            <label for="Student Code">Student Code</label>
            <input class="input_stu" type="text" name="studentcode" v-model="student.student_code" placeholder="Student Code">
        </div>

        <div class="form-group-student" >
             <label for="Faculty">Faculty</label>
            <select class="input_stu" v-model="student.faculty"   placeholder="Faculty">
                <option disabled value="">Mời bạn chọn Khoa</option>
                <option value="Điện-Điện tử">Khoa Điện-Điện tử</option>
                <option value="Khoa học và kỹ thuật máy tính">Khoa Khoa học và Kỹ thuật Máy tính</option>
                <option value="Ứng dụng">Khoa học ứng dụng</option>
                <option value="Địa chất và dầu khí">Khoa Kỹ thuật Địa chất và Dầu khí</option>
                <option value="Quản lí Công nghiệp"> Khoa Quản lý công nghiệp</option>
                <option value="Môi trường và tài nguyên">Khoa Môi trường và tài nguyên</option>
                <option value="Giao thông" >Khoa Kỹ thuật Giao thông</option>
                <option value="Xây dựng">Khoa Kỹ thuật Xây dựng</option>
                <option value="Bảo dưỡng Công nghiệp">Trung tâm Đào Tạo Bảo dưỡng Công nghiệp</option>
                <option value="Ngoại ngữ">Trung Tâm Ngoại Ngữ</option>
                <option value="Toán học và tính toán">Viện Toán học và khoa học tính toán</option>
                <option value="Vật liệu">Khoa Công nghệ Vật liệu</option>
            </select>
           
        </div>

        <div class="form-group-student">
            <label for="Department">Department</label>
            <input class="input_stu" type="text" name="department" v-model="student.department" placeholder="Department">
        </div>
        
        <div class="form-group-student">
            <label for="Address">Address</label>
            <input class="input_stu" type="text" name="address" v-model="student.address" placeholder="Address">

        </div>
        
        <div class="form-group-student">
            <label for="Phone">Phone</label>
            <input class="input_stu" type="text" name="phone" v-model="student.phone" placeholder="Phone">
        </div>

        <div class="form-group-student">
            <label for="Note">Note</label>
            <input class="input_stu" type="text" name="note" v-model="student.note" placeholder="Note">
        </div>
        <div style="font-size:15px; background-color:none;height:30px; width: fit-content; text-align:center; align-content: center;align-items: center; border:0px none  ; margin-left: 180px;">
         
     
            <ul>
              <li style="color:rgb(229, 231, 114);text-align:center;">{{  error_student }}</li>
            </ul>
          </div>
        
        
        <div class="form-group-student">
            <div style=" align-items: center;flex-direction: column; display: flex; margin-top: 5px;">
            <button class="btn-create-student" type="submit" @click="saveForm_student">SUBMIT</button>
            </div>
        </div>
    
</form>
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
                    faculty:null,
                    department:null,
                    address:null,
                    phone:null,
                    note:null,
                },
                error_student:'',
            }
        },
        methods: {
            
            saveForm_student(){
                
                axios.post('students/store',{
                    first_name: this.student.first_name,
                    last_name: this.student.last_name,
                    student_code: this.student.student_code,
                    faculty: this.student.faculty,
                    department: this.student.department,
                    address: this.student.address,
                    phone: this.student.phone,
                    note: this.student.note,
                 
                    }).then(res=>{
                    
                    window.location.href='/home';
               })
               .catch(error => {
                        this.error_student = 'Thông tin không hợp lệ, vui lòng thử lại';
                    });
            
            
        }
    }
}

</script>