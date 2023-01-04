<template> 

<div class="for_form" style="width: 40%; float:right">

<div style="width: 40%; float:left">
  <div class='center_form'>
    <h2>Search<span class="badge bg-secondary">Form</span></h2>
    <label class='black' for="first_name">Teacher ID</label>
    <input name="first_name" v-model="assign.teacher_id" placeholder="ID" class="form-control " />
  </div>
  <div class='center_form'>
    <label class='black' for="first_name">Subject ID Code</label>
    <input name="first_name" v-model="assign.subject_id" placeholder="ID" class="form-control " />
  </div>
  <div class='center_form'>
    <label class='black' for="first_name">Year</label>
    <input name="first_name" v-model="assign.year" placeholder="Year" class="form-control " />
  </div>
  <div class='center_form'>
    <label class='black' for="first_name">Semester</label>
    <input name="first_name" v-model="assign.semester" placeholder="Semester" class="form-control " />
  </div>

  <div class="centerr">
    <button class="btn btn-primary center_form centerr but_student custom-button margintop-40px" @click="search"> Search now !
    </button>
  </div>
</div>


<div style="width: 40%; float:right">
  <h2>Result</h2>

<div class = "result"> <div v-if = " details.teacher_code == '' || subject.name ===''"> NULL </div>
  <div class="info marginleft15px" v-else>
    <p class="block black font"><i class="uil uil-qrcode-scan"></i>Teacher Code: {{ details.teacher_code }} </p>
    
    <p class="block black font"> <i class="uil uil-user"></i>Teacher Name: {{ details.first_name + " " + details.last_name }} </p>
    <p class="block black font"><i class="uil uil-home"></i>Department: {{ details.department }} </p>
    <p class="block black font"> <i class="uil uil-books"></i>Subject Name: {{ subject.name }} </p>
    <p class="block black font"><i class="uil uil-favorite"></i>Subject Code: {{ subject.code }} </p>
    <button class="btn btn-primary custom-button margintop-40px" @click="select"> Select
    </button>
  </div>  

</div>


</div>
</div>


</template>




<script> 
export default {
  data() {
    return {
      details: {
        first_name: "",
        teacher_code: "",
        last_name: "", 
        department: ""
      },
      subject: {
        name: "",
        code: ""
      },
      assign: {
        teacher_id: "",
        subject_id: "",
        semester: "",
        year: "",
      }
    }
  },
  methods: {
    async search() {
      await axios.post('search_sub', {
        teacher_id: this.assign.teacher_id,
        subject_id: this.assign.subject_id,
        semester: this.assign.semester,
        year: this.assign.year,
      }).then(response => [
          this.details = response.data[0],
          this.subject = response.data[1] ]
        );
    }

  }
}
</script>