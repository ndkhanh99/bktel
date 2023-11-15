<template>
    <div class="form-teacher">
        <div class="form-tieude-teacher">
            <div class="teacher-registration">
                <h2>TEACHER INFORMATION</h2>
                
                
              </div>
              <p>Please Fill & Click Submit</p>
        </div>

            <form @submit.prevent="" class="teacher-form">
         
        <div class="form-group-teacher">
            <label for="Last Name">Last Name</label>
            <input class="input_import" type="text" name="lastname" data-rules="required" v-model="teacher.last_name" placeholder="Last Name">
        </div>

        <div class="form-group-teacher">
            <label for="First Name">First Name</label>
            <input class="input_import" type="text" name="firstname" v-model="teacher.first_name" placeholder="First Name">
        </div>

        <div class="form-group-teacher">
        <label for="Email">Email</label>
            <input class="input_import" type="text" name="email" v-model="teacher.teacher_email" placeholder="Email">
        </div>
        
        <div class="form-group-teacher">
                 <label for="Teacher Code"> Teacher Code</label>
            <input class="input_import" type="text" name="teachercode" v-model="teacher.teacher_code" placeholder="Teacher Code">
        </div>

        <div class="form-group-teacher">
             <label for="Faculty"> Faculty</label>
            <select class="input_import" v-model="teacher.faculty"  >
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

        <div class="form-group-teacher">
             <label for="Department">Department</label>
            <input class="input_import" type="text" name="department" v-model="teacher.department" placeholder="Department">
        </div>
        
        <div class="form-group-teacher">
             <label for="Address">Address</label>
            <input class="input_import" type="text" name="address" v-model="teacher.address" placeholder="Address">

        </div>
        
        <div class="form-group-teacher">
            <label for="Phone">Phone</label>
            <input class="input_import" type="text" name="phone" v-model="teacher.phone" placeholder="Phone">
        </div>

        <div class="form-group-teacher">
            <label for="Note">Note</label>
            <input class="input_import" type="text" name="note" v-model="teacher.note" placeholder="Note">
        </div>

        <div style="font-size:15px; background-color:none;height:30px; width: fit-content; text-align:center; align-content: center;align-items: center; border:0px none  ; margin-left: 180px;">
            <ul>
                <li style="color:red;text-align:center;">{{  error_teacher }}</li>
            </ul>
        </div>
        
        <div style=" align-items: center;flex-direction: column; display: flex;font-size: 15px; margin-top: 5px;">
            <button class="btn-create-teacher " type="submit" @click="saveForm_teacher">SUBMIT</button>
        </div>

        <div class="form-group-teacher" style=" align-items: center;flex-direction: column; display: flex; margin-top: 10px;">
            <a class="txt2" style="color: black; font-size: 15px;" href="/home">
                Back to home
            </a>
        </div>
    </form>
 
    </div>
</template>


<script>
    export default {
        data(){
            return{
                        teacher: {
                            last_name:null,
                            first_name:null,
                            teacher_email:null,
                            teacher_code:null,
                            faculty:null,
                            department:null,
                            address:null,
                            phone:null,
                            note:null,
                          
                        },
                        error_teacher: '',
                
                    }
                },
        methods: {
            saveForm_teacher(){
        // Kiểm tra email có đúng định dạng và có đuôi "hcmut.edu.vn" hay không
        // const email = this.teacher.teacher_email;
        // const emailPattern = /@hcmut\.edu\.vn$/;
        
        // if (!emailPattern.test(email)) {
            // this.errors.push('Vui lòng sử dụng địa chỉ email hcmut.edu.vn');
        //     return; // Ngừng thực hiện khi email không hợp lệ
        // }
                        
                        axios.post('teachers/store',{
                            first_name: this.teacher.first_name,
                            last_name: this.teacher.last_name,
                            teacher_email: this.teacher.teacher_email,
                            teacher_code: this.teacher.teacher_code,
                            faculty: this.teacher.faculty,
                            department: this.teacher.department,
                            address: this.teacher.address,
                            phone: this.teacher.phone,
                            note: this.teacher.note,
                           

                            })
                            .then(res=>{
                            
                            window.location.href='/home';
                    })
                    
                    .catch(error => {
                        this.error_teacher = 'Thông tin không hợp lệ, vui lòng thử lại';
                     });
                }
            }
        }

</script>