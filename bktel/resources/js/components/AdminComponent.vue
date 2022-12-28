<template >

  <div class = "Adminback"  >

  <div class="conditional-rendering centerr ">

      <div class="block-1 " v-if="isActive == false">

      <button type="button" class="btn btn-info custom-button">Edit</button>
      <button type="button" class="btn btn-light custom-button" @click="op = 2"> Upload File Teacher</button>
      <button type="button" class="btn btn-dark custom-button" @click="op = 1" >Add Teacher</button>
      <button type="button" class="btn btn-warning custom-button"  @click="op = 3"  >Show All File</button>
      <button type="button" class="btn btn-warning custom-button"  @click="op = 0"  >Close X</button>
      </div>
      
      <div class="block-2" v-else>
        <button @click="ReturnHome" type="button" class="btn btn-success custom-button">Return Home</button>
      </div>

      <div>
          <button  class="btn btn-info custom-button" @click="isActive = !isActive">Click to Open Option List</button>
      </div>
  </div>

  <div v-if="success.length >0 && op ==1">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">

    <small>11 mins ago</small>
  </div>
  <div class="toast-body">
    Hello, world! This is a toast message.
  </div>
</div>
</div>

<div class="success_ad">
    <p v-if="success.length && op==1">
    <b class ='white'>Information:</b>
    <ul>
        <li class='white' v-for="success in success">{{ success }}</li>
    </ul>
  </p>

</div>
  <div class="error_ad">
    <p v-if="errors.length && op==1 ">
    <b class ='red'>Please correct the following error(s):</b>
    <ul>
        <li class='red' v-for="error in errors">{{ error }}</li>
    </ul>
  </p>

</div>

    <!-- Create Teacher -->
    <div class="" v-if="op == 1" >
        <div class = 'center_form'>
            <label class ='white' for="first_name">First name</label>
            <input name="first_name" v-model="teacher.first_name" placeholder="first name" class="form-control student_form" />
        </div>

        <div class = 'center_form'>
            <label class ='white' for="last_name">Last name</label>
            <input name="last_name" v-model="teacher.last_name" placeholder="last name" class="form-control student_form" />
        </div>
        
        <div class = 'center_form'>
            <label class ='white' for="student_code">Teacher code</label>
            <input name="teacher_code" v-model="teacher.teacher_code" placeholder="Teacher_code" type="number" class="form-control student_form" />
        </div>

        <div class = 'center_form'> 
            <label class ='white' for="department">Department</label>
            <input name="department" v-model="teacher.department" placeholder="Department" class="form-control student_form" />
        </div>
  
        <div class = 'center_form'>
            <label class ='white' for="address">Address</label>
            <input name="address" v-model="teacher.address" placeholder="address" class="form-control student_form" />
        </div>

        <div class = 'center_form'>
            <label class ='white' for="phone">Phone</label>
            <input name="phone" v-model="teacher.phone" placeholder="phone" class="form-control student_form" />
        </div>
        <div class = 'center_form'>
            <label class ='white' for="note">Note</label>
            <input name="note" v-model="teacher.note" placeholder="note" class="form-control student_form" />
        </div>
        <div class = 'center_form'>
            <label class ='white' for="email">Email</label>
            <input name="email" v-model="user.email" placeholder="email" class="form-control student_form" />
        </div>
        <div class ='center_form'>
        <label class ='white'  for="address">Faculty:</label>
        <select  class = 'size' v-model="teacher.faculty">
            <option disabled value="">Please select one</option>
            <option>Khoa Điện - Điện Tử</option>
            <option>Khoa Hóa</option>
            <option>Khoa Quản Lí Công Nghiệp</option>
            <option>Khoa Cơ Khí</option>
        </select>
        </div>

        <div class="centerr">
            <button class="btn btn-primary center_form centerr but_student custom-button" @click="createTeacher" > Submit </button>
        </div>
</div>


<div v-if="op == 0" class = "margin-topadd"> 
   lô 
</div>

    <!-- Upload -->
    <div v-if="op == 2" class = ""> 
        <div class = 'center_form'>
            <label class ='white' for="name">Reminder name</label>
            <input name="name" v-model="upload.name" placeholder="Name" class="form-control student_form" />
        </div>
        <div class = 'center_form'>
            <label class ='white' for="note">Note</label>
            <input name="note" v-model="upload.note" placeholder="Note" class="form-control student_form " />
        </div>
      
        <div class = 'center_form '>
            <label class ='white' for="note">Select File</label>
            <input type="file" class="form-control l student_form" v-on:change="uploadFile" enctype ="multipart/form-data">
      </div>
      <div class = 'center_form'> 
        <button   type="button" class="btn btn-primary form-control but_student custom-button upload-size" @click="submitFile"> Upload </button>
      </div>

        </div>
        <div class="" v-if="op == 3" >


                <table class="table">
  <thead>
    <tr>
      <th scope="col">File Infor</th>
    </tr>
  </thead>
  <tbody>
    <li v-for="(value, key) in file">
    <tr>
      <td>{{ key }}</td>
      <td>{{ value}}</td>

    </tr>
   

</li>
  </tbody>
</table>
 

        </div>      
    </div>  

</div>
</template>

<script>
  export default {
      data() {
          return {
              isActive: true, 
              op: 0,
              close: 0,
              errors: [],
              success: [],
              teacher:{
                    first_name:"",
                    last_name: "",
                    teacher_code: "",
                    department: "",
                    faculty: "",
                    address: "",
                    phone: "",
                    note: "", 
                    email: ""
                            }   ,
                user: { 
                    email: ""
                    
                },
                upload: {
                    name: "", 
                    note: "",
                    path: ""
                },
                file: {
                id: "",
                 name: "", 
                 path: "",
                 status: "",
                 note: "",
                 update_at: ""
                }
          }
      }, 
      methods: {
        async ReturnHome(){
         window.location.href = 'home_admin'
        }, 
        async createTeacher(){ 
                    // Catch Error
            this.errors = [];
            this.success = [];

            if (!this.teacher.first_name) {
            this.errors.push("Name required.");
                }
            if (!this.teacher.teacher_code) {
            this.errors.push("Teacher Code required.");
                }
            else if (!code(this.teacher.teacher_code)){
                this.errors.push("Teacher Code length is 6");
            }
            if (!this.user.email) {
                this.errors.push('Email required.');
            } else if (!validEmail(this.user.email)) {
                this.errors.push('Email must follow form hcmut');
                }
                if (!this.teacher.department) {
            this.errors.push("Department is required.");
                }
                if (!this.teacher.faculty) {
            this.errors.push("Faculty is required.");
                }


            //for post data
            if (!this.errors.length) {
                    await axios.post('teacher_store', {
                    first_name: this.teacher.first_name,
                    last_name: this.teacher.last_name,
                    teacher_code: this.teacher.student_code,
                    department: this.teacher.department,
                    faculty: this.teacher.faculty,
                    address: this.teacher.address,
                    phone: this.teacher.phone,
                    note: this.teacher.note,
                    email: this.user.email
                    });
                    this.success.push("Create Successfully!");


            }
            console.log(this.errors.length);
            //check Email
            function validEmail(email) {
                if(/^\w+([\.-]?\w+)*@hcmut*(\.\w{2,3})+$/.test(email)){
                return true;
                }
                return false;
            }
            //check code
            function code(teacher_code) {
                var re = teacher_code; 
                if(re.length ==6 ){
                    return true;
                }
            }

         
      },

      async uploadFile(event){
        this.upload.path = event.target.files[0];
        console.log(this.upload.path);
      },
      async submitFile(){
        this.errors = [];
        if (!this.upload.name) {
            this.errors.push("Name is required.");
                }
        if (!this.upload.note) {
        this.errors.push("Note is required.");
        }
        if (!this.upload.path) {
        this.errors.push("Path is required.");
        }

        if (!this.errors.length) {
        let data = new FormData();
        data.append('_method', 'POST');
        data.append('path', this.upload.path);
        data.append('name', this.upload.name);
        data.append('note', this.upload.note);
        
        await axios.post('/upload_file',
                    data,{ headers: {
                        'content-type': 'multipart/form-data'
                    } }
                    );
                    window.location.reload();
        }
    }
      
  },
  mounted(){
    axios.post('file_index')
        .then(response => {
            this.file = response.data;
            console.log(response.data);
        })
      }

  }

</script>

