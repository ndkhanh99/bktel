<template >

    <div class='Adminback'>
  
    <div class="conditional-rendering centerr ">
        <div class="block-1 " v-if="isActive == false">
  
  
        <button type="button" class="btn btn-info">Edit</button>
        <button type="button" class="btn btn-light"> Delete Student</button>
        <button type="button" class="btn btn-dark" @click="op = 1" >Add Teacher</button>
        <button type="button" class="btn btn-warning">Delete Teacher</button>
        <button type="button" class="btn btn-warning"  @click="op = 0"  >Close X</button>
  
        </div>
  
        <div class="block-2" v-else>
          <button @click="ReturnHome" type="button" class="btn btn-success">Return Home</button>
        </div>
  
        <div>
            <button  class="btn btn-info" @click="isActive = !isActive">Click to Open Option List</button>
        </div>
    </div>
  
  
    <div class="error_ad">
      <p v-if="errors.length">
      <b class='red'>Please correct the following error(s):</b>
      <ul>
        <li class='red' v-for="error in errors">{{ error }}</li>
      </ul>
    </p>
  
  </div>
  <div>
  <p>
      <li v-for="success in success">{{ success }}</li>
    </p>
  </div>
      <div class="" v-if="op == 1" >
          <div class='center_form'>
              <label class='white' for="first_name">First name</label>
              <input name="first_name" v-model="teacher.first_name" placeholder="first name" class="form-control student_form" />
          </div>
  
          <div class='center_form'>
              <label class='white' for="last_name">Last name</label>
              <input name="last_name" v-model="teacher.last_name" placeholder="last name" class="form-control student_form" />
          </div>
  
          <div class='center_form'>
              <label class='white' for="student_code">Teacher code</label>
              <input name="teacher_code" v-model="teacher.teacher_code" placeholder="Teahcer_code" type="number" class="form-control student_form" />
          </div>
  
          <div class='center_form'> 
              <label class='white' for="department">Department</label>
              <input name="department" v-model="teacher.department" placeholder="Department" class="form-control student_form" />
          </div>
  
          <div class='center_form'>
              <label class='white' for="address">Address</label>
              <input name="address" v-model="teacher.address" placeholder="address" class="form-control student_form" />
          </div>
  
          <div class='center_form'>
              <label class='white' for="phone">Phone</label>
              <input name="phone" v-model="teacher.phone" placeholder="phone" class="form-control student_form" />
          </div>
          <div class='center_form'>
              <label class='white' for="note">Note</label>
              <input name="note" v-model="teacher.note" placeholder="note" class="form-control student_form" />
          </div>
          <div class='center_form'>
              <label class='white' for="email">Email</label>
              <input name="email" v-model="user.email" placeholder="email" class="form-control student_form" />
          </div>
          <div class='center_form'>
          <label class='white'  for="address">Faculty:</label>
          <select  class='size' v-model="teacher.faculty">
              <option disabled value="">Please select one</option>
              <option>Khoa Điện - Điện Tử</option>
              <option>Khoa Hóa</option>
              <option>Khoa Quản Lí Công Nghiệp</option>
              <option>Khoa Cơ Khí</option>
          </select>
          </div>
  
          <div class="centerr">
              <button class="btn btn-primary center_form centerr but_student" @click="createTeacher" > Submit </button>
          </div>
  </div>
        <div class="Adminback margin-topadd" v-else>
  
        </div>
  
  
  </div>
  </template>


  <script>
</script>