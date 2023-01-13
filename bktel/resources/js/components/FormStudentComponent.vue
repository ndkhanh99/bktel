
<template>
    <div class="import-form" style="margin-top:30px;margin-bottom:90px">
        <div class="import-div">
            Form Information
            <p>Please confirm your information</p>
        </div>
        <div class="import-div">
            LastName
            <input class="input_import" type="text" name="lastname" data-rules="required" v-model="student.last_name" placeholder="Last Name">
        </div>

        <div class="import-div">
            FirstName
            <input class="input_import" type="text" name="firstname" v-model="student.first_name" placeholder="First Name">
        </div>
        
        <div class="import-div">
            Student Code
            <input class="input_import" type="text" name="studentcode" v-model="student.student_code" placeholder="Student Code">
        </div>

        <div class="import-div">
            Faculty
            <select class="input_import" v-model="student.faculty"  >
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
            <!-- <input class="input_import" type="text" name="department" v-model="student.faculty" placeholder="Department"> -->
        </div>

        <div class="import-div">
            Department
            <input class="input_import" type="text" name="department" v-model="student.department" placeholder="Department">
        </div>
        
        <div class="import-div">
            Address
            <input class="input_import" type="text" name="address" v-model="student.address" placeholder="Address">

        </div>
        
        <div class="import-div">
            Phone
            <input class="input_import" type="text" name="phone" v-model="student.phone" placeholder="Phone">
        </div>

        <div class="import-div">
            Note
            <input class="input_import" type="text" name="note" v-model="student.note" placeholder="Note">
        </div>
        
        <div class="import-div-submit">
                <button class="input_import-submit cancel" type="submit" @click="cancel">Cancel</button>
                <button class="input_import-submit upload" type="submit" @click="saveForm">Submit</button>
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
                    faculty:null,
                    department:null,
                    address:null,
                    phone:null,
                    note:null,
                }
            }
        },
        methods: {
            cancel(){
                window.location.href = '/home';
            },
             saveForm(){
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
            
            //  console.log("hi");
        }
    }
}

</script>
