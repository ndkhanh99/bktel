

<template>

<div class = 'stu_back'>
    <div class="alert alert-success" role="alert">
Succesfully sign up ! Let's fill in this form if you are student.
</div>
    <div class="error_stu">
    <p v-if="errors.length" >
    <b class ='red'>Please correct the following error(s):</b>
    <ul>
      <li class='red' v-for="error in errors">{{ error }}</li>
    </ul>
    </p>
    </div>

        <div class = 'center_form'>
            <label class ='white' for="first_name">First name</label>
            <input name="first_name" v-model="student.first_name" placeholder="first name" class="form-control" />
        </div>

        <div class = 'center_form'>
            <label class ='white' for="last_name">Last name</label>
            <input name="last_name" v-model="student.last_name" placeholder="last name" class="form-control" />
        </div>
        
        <div class = 'center_form'>
            <label class ='white' for="student_code">Student code</label>
            <input name="student_code" v-model="student.student_code" placeholder="student_code" type="number" class="form-control" />
        </div>

        <div class = 'center_form'> 
            <label class ='white' for="department">Department</label>
            <input name="department" v-model="student.department" placeholder="address" class="form-control" />
        </div>
  
        <div class = 'center_form'>
            <label class ='white' for="address">Address</label>
            <input name="address" v-model="student.address" placeholder="address" class="form-control" />
        </div>

        <div class = 'center_form'>
            <label class ='white' for="phone">Phone</label>
            <input name="phone" v-model="student.phone" placeholder="phone" class="form-control" />
        </div>
        <div class = 'center_form'>
            <label class ='white' for="note">Note</label>
            <input name="note" v-model="student.note" placeholder="note" class="form-control" />
        </div>
        <div class ='center_form'>
        <label class ='white'  for="address">Faculty:</label>
        <select  class = 'size' v-model="student.faculty">
            <option disabled value="">Please select one</option>
            <option>Khoa Điện - Điện Tử</option>
            <option>Khoa Hóa</option>
            <option>Khoa Quản Lí Công Nghiệp</option>
            <option>Khoa Cơ Khí</option>
        </select>
        </div>

        <div class="centerr">
            <button class="btn btn-primary center_form centerr but_student custom-button" @click="createStudent" > Submit </button>
        </div>
</div>

</template>

<script>
    export default {
            data() {
                return {
                    errors: [],
                    student:{
                    first_name:"",
                    last_name: "",
                    student_code: "",
                    department: "",
                    faculty: "",
                    address: "",
                    phone: "",
                    note: ""
                            }   
                        }
            },
            methods: {
                async createStudent() {
                    this.errors = [];   
                if (!this.student.first_name) {
                this.errors.push(" First Name required.");
                }  
                if (!this.student.last_name) {
                this.errors.push("Last Name required.");
                }  
                
                if (!this.student.student_code) {
            this.errors.push("Student Code required.");
                }
            else if (!code(this.student.student_code)){
                this.errors.push("Student Code length is 6");
            } 
                
                if (!this.student.department) {
                this.errors.push("Department required.");
                }  
                
                    if (!this.errors.length) {
                    const response = await axios.post('student_store', {
                    first_name: this.student.first_name,
                    last_name: this.student.last_name,
                    student_code: this.student.student_code,
                    department: this.student.department,
                    faculty: this.student.faculty,
                    address: this.student.address,
                    phone: this.student.phone,
                    note: this.student.note,
                 
                    });
                    window.location.reload();
                }

                function code(student_code) {
                var re = student_code; 
                if(re.length ==6 ){
                    return true;
                }
            }
            

            }


        }
}
  
</script> 