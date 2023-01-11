<template >

  <div class = "Adminback"  >
    <div class="container-fluid">  
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class= 'textnew '><i class="uil uil-list-ul"></i> Menu For Admin</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-house"></i>   <button @click="ReturnHome" type="button" class="btn but-admin-or custom-button">Return Home</button>
                        </a>
                    </li>
                    <li>
                        <button href="#submenu1" type="button" data-bs-toggle="collapse" class="btn btn-info custom-button but-admin-or  margintop-20px">
                            <i class="uil uil-angle-down"></i>  Teacher Option </button>
                        <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <button type="button" class="btn btn-light custom-button margintop-20px" @click="op = 2"> Upload Teacher File</button>
                            </li>
                            <li>
                                <button type="button" class="btn btn-light custom-button margintop-20px" @click="op = 1" >Add One Teacher</button>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <button type="button" class="btn btn-warning custom-button margintop-20px but-admin-or"  @click="op = 3"  ><i class="uil uil-mouse"></i>Show All File</button>
                    </li>
                    <li>
                        <button href="#submenu2" type="button" data-bs-toggle="collapse" class=" but-admin-or btn btn-info custom-button margintop-20px">
                            <i class="uil uil-angle-down"></i>  Student Option </button>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <button type="button" class="btn btn-light custom-button margintop-20px" @click="op = 4"> Upload Student File</button>
                            </li>
                            <li>
                                <button type="button" class="btn btn-light custom-button margintop-20px" @click="op = 10"> I dont know..</button>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <button href="#submenu3" type="button" data-bs-toggle="collapse" class=" but-admin-or btn btn-info custom-button margintop-20px">
                            <i class="uil uil-angle-down"></i>  Subject Option </button>
                        <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                            <li class="w-100">
                                <button type="button" class="btn btn-light custom-button margintop-20px" @click="op = 5"> Upload Subject File</button>
                            </li>
                            <li>
                                <button type="button" class="btn btn-light custom-button margintop-20px" @click="op = 6"> Upload One Subject</button>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <button type="button" class="btn btn-warning custom-button margintop-20px but-admin-or"  @click="op = 7"  ><i class="uil uil-mouse"></i>Assign Teacher</button>
                    </li>
                </ul>
                <hr>

            </div>
        </div>
        
        <div class="col py-3">




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
<div class="mb-3" v-if="op == 1" >
  <div class = 'center_form white'>
    <h2>Teacher <span class="badge bg-secondary">Form</span></h2>
      <label class ='white' for="first_name">First name</label>
      <input name="first_name" v-model="teacher.first_name" placeholder="first name" class="form-control " />
  </div>

  <div class = 'center_form'>
      <label class ='white' for="last_name">Last name</label>
      <input name="last_name" v-model="teacher.last_name" placeholder="last name" class="form-control " />
  </div>
  
  <div class = 'center_form'>
      <label class ='white' for="student_code">Teacher code</label>
      <input name="teacher_code" v-model="teacher.teacher_code" placeholder="Teacher_code" type="number" class="form-control " />
  </div>

  <div class = 'center_form'> 
      <label class ='white' for="department">Department</label>
      <input name="department" v-model="teacher.department" placeholder="Department" class="form-control " />
  </div>

  <div class = 'center_form'>
      <label class ='white' for="address">Address</label>
      <input name="address" v-model="teacher.address" placeholder="address" class="form-control " />
  </div>

  <div class = 'center_form'>
      <label class ='white' for="phone">Phone</label>
      <input name="phone" v-model="teacher.phone" placeholder="phone" class="form-control " />
  </div>
  <div class = 'center_form'>
      <label class ='white' for="note">Note</label>
      <input name="note" v-model="teacher.note" placeholder="note" class="form-control " />
  </div>
  <div class = 'center_form'>
      <label class ='white' for="email">Email</label>
      <input name="email" v-model="user.email" placeholder="email" class="form-control " />
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
      <button class="btn btn-primary center_form centerr  custom-button margintop-20px but-admin-or " @click="createTeacher" > Submit </button>
  </div>
</div>



<!-- Upload -->
<div v-if="op == 2" class = ""> 

  <div class = 'center_form  white'>
    <h2>Teacher <span class="badge bg-secondary">File</span></h2>
      <label class ='white' for="name">Teacher File Name</label>
      <input name="name" v-model="upload.name" placeholder="Name" class="form-control " />
  </div>
  <div class = 'center_form'>
      <label class ='white' for="note">Note</label>
      <input name="note" v-model="upload.note" placeholder="Note" class="form-control  " />
  </div>

  <div class = 'center_form '>
      <label class ='white' for="note">Select File</label>
      <input type="file" class="form-control  " v-on:change="uploadFile" enctype ="multipart/form-data">
</div>
<div class = 'center_form'> 
  <button   type="button" class="btn btn-primary form-control  custom-button upload-size margintop-20px but-admin-or" @click="submitFile"> Upload </button>
</div>
  </div>

  <div v-if="op == 4" class = ""> 

  <div class = 'center_form  white'>
    <h2>Student <span class="badge bg-secondary">File</span></h2>
      <label class ='white' for="name">Student File Name</label>
      <input name="name" v-model="upload.name" placeholder="Name" class="form-control " />
  </div>
  <div class = 'center_form'>
      <label class ='white' for="note">Note</label>
      <input name="note" v-model="upload.note" placeholder="Note" class="form-control  " />
  </div>

  <div class = 'center_form '>
      <label class ='white' for="note">Select File</label>
      <input type="file" class="form-control l " v-on:change="uploadFile" enctype ="multipart/form-data">
</div>
<div class = 'center_form'> 
  <button   type="button" class="btn btn-primary form-control  custom-button upload-size margintop-20px but-admin-or" @click="submitFile_Stu"> Upload </button>
</div>
  </div>


  <div class="white" v-if="op == 3" >
    <h2>File <span class="badge bg-secondary">Information</span></h2>

<table class="table">
<thead>
<tr>
<th scope="col">All</th>
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
  
  
  <div class=" white center_form" v-if="op == 5" >
    <h2>Subject <span class="badge bg-secondary">File</span></h2>
      <label class ='white' for="name">Subject File Name</label>
      <input name="name" v-model="upload.name" placeholder="Name" class="form-control " />
 
  <div class = 'center_form'>
      <label class ='white' for="note">Note</label>
      <input name="note" v-model="upload.note" placeholder="Note" class="form-control  " />
  </div>

  <div class = 'center_form '>
      <label class ='white' for="note">Select File</label>
      <input type="file" class="form-control l " v-on:change="uploadFile" enctype ="multipart/form-data">
</div>
<div class = 'center_form'> 
  <button   type="button" class="btn btn-primary form-control  custom-button upload-size margintop-20px but-admin-or" @click="submitFile_subject"> Upload </button>
</div>
</div>



<div class="" v-if="op == 6" >
  <div class = 'center_form  white'>
    <h2>Subject <span class="badge bg-secondary">Form</span></h2>
      <label class ='white' for="first_name">Name</label>
      <input name="first_name" v-model="subject.name" placeholder="Name" class="form-control " />
  </div>
  <div class = 'center_form'>
      <label class ='white' for="first_name">Code</label>
      <input name="first_name" v-model="subject.code" placeholder="Code" class="form-control " />
  </div>
  <div class = 'center_form'>
      <label class ='white' for="first_name">Note</label>
      <input name="first_name" v-model="subject.note" placeholder="Note" class="form-control " />
  </div>

  <div class="centerr">
      <button class="btn btn-primary center_form centerr  custom-button margintop-20px but-admin-or" @click="createSubject" > Submit </button>
  </div>
</div>


<div class="" v-if="op == 7" >


  <div class = 'center_form  white'>
    <h2>Assign<span class="badge bg-secondary">Form</span></h2>
      <label class ='white' for="first_name">Lecturer Code</label>
      <input name="first_name" v-model="assign.lecture_code" placeholder="Lecturer code" class="form-control " />
  </div>
  <div class = 'center_form'>
      <label class ='white' for="first_name">Subject Code</label>
      <input name="first_name" v-model="assign.subject_code" placeholder="Subject Code" class="form-control " />
  </div>
  <div class = 'center_form'>
      <label class ='white' for="first_name">Year</label>
      <input name="first_name" v-model="assign.year" placeholder="Year" class="form-control " />
  </div>
  <div class = 'center_form'>
      <label class ='white' for="first_name">Semester</label>
      <input name="first_name" v-model="assign.semester" placeholder="Semester" class="form-control " />
  </div>
  <div class = 'center_form'>
      <label class ='white' for="first_name">Note</label>
      <input name="first_name" v-model="assign.note" placeholder="Note" class="form-control " />
  </div>

  <div class="centerr">
      <button class="btn btn-primary center_form centerr  custom-button margintop-20px but-admin-or" @click="createAsign" > Submit </button>
  </div>
</div>
        </div>
    </div>
    
</div>
    

</div>
</template>

<script>
  export default {
    mounted(){
    axios.post('file_index')
        .then(response => {
            this.file = response.data
        })
      }
,
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
                },
                subject:{
                    name: "", 
                    code:"", 
                    note:""
                },
                assign:{
                    lecture_code: "",
                    subject_code: "",
                    semester: "",
                    year: "",
                    note: ""
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


      async createSubject(){
        await axios.post('subject_store', {
                    name: this.subject.name,
                    code: this.subject.code,
                    note: this.subject.note,
                    });
                    this.success.push("Create Successfully!");
                    window.location.reload();
      }
      ,
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
    },
    async submitFile_Stu(){
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
        
        await axios.post('/upload_file_stu',
                    data,{ headers: {
                        'content-type': 'multipart/form-data'
                    } }
                    );
                    window.location.reload();
        }
    }, 
    async submitFile_subject(){
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
        
        await axios.post('/upload_file_sub',
                    data,{ headers: {
                        'content-type': 'multipart/form-data'
                    } }
                    );
        window.location.reload();

        }
}, async createAsign(){

    await axios.post('teach_to_sub', {
                    lecture_code: this.assign.lecture_code,
                    subject_code: this.assign.subject_code,
                    semester: this.assign.semester,
                    year: this.assign.year, 
                    note: this.assign.note
                    });
                    window.location.reload();
                    

}    
  
 
  }

  }
</script>

