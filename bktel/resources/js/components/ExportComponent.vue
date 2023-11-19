<template>

  <div class="form-teacher">
    <div class="form-tieude-teacher">
      <div class="teacher-registration">
        <h2  style="font-size:23px; margin-top:10px">FORM TEACHER EXPORT </h2>


          </div>
        <p style="font-size:17px ; margin-top:7px">Please fill & Click search to find the students teach </p>
      </div>

      <form @submit.prevent="" class="teacher-form">

      <div class="form-group-teacher">
        <label for="Subject Code">Subject Code</label>
        <input  class="input_import" type="text" name="subjectCode" v-model="search_export.subject_code" placeholder="Subject Code">
      </div>

      <div class="form-group-teacher">
        <label for="Teacher Code">Teacher Code</label>
        <input  class="input_import" type="text" name="teacherCode" v-model="search_export.teacher_code" placeholder="Teacher Code">
      </div>

      <div class="form-group-teacher">
        <label for="Semester">Semester</label>
          <select class="input_import" v-model="search_export.semester"  >
            <option disabled value="">Mời bạn học kì</option>
            <option value="HK1">HK1</option>
            <option value="HK2">HK2</option>
            <option value="HK3">HK3</option>
          </select>
      </div>

      <div class="form-group-teacher">
        <label for="Year">Year</label>
        <input  class="input_import" type="text" name="year" v-model="search_export.year" placeholder="Year">
      </div>

      <div v-if="showError_search_2" >
        <div style="font-size:15px; background-color:none;height:30px; width: fit-content; text-align:center; align-content: center;align-items: center; border:0px none  ; margin-left: 218px;">
          <ul>
            <li style="color:red;text-align:center;" >{{  error_search }}</li>
          </ul>
        </div>
    </div>

       <div v-if="showError_search_1" >
        <div style="font-size: 15px; background-color: none; height: 30px; width: fit-content; text-align: center; margin-left: 270px; display: flex; justify-content: center; align-items: center;">
          <ul>
              <li style="color:red;text-align:center;" >{{ error_search }}</li>
          </ul>
      </div>
    </div>

    <div v-if="show_search_old">
      <div class="form-group-student">
        <div style="display: flex; flex-direction: column; align-items: center; margin-top: 5px;">
          <button class="btn-create-student" @click="searchExport">SEARCH</button>
      </div>
    </div>

    <div class="form-group-teacher" style=" align-items: center;flex-direction: column; display: flex; margin-top: 10px;">
      <a class="txt2"  style="color: black; font-size: 15px;" href="/home">
          Back to home
      </a>
    </div>
  </div>

</form>


    <div v-if="results.length > 0"  style="margin-top:20px">
      <div class="form-tieude-teacher">
        <h2 style="font-size:23px; margin-top:10px" >LIST OF STUDENTS YOU TEACH </h2>
          <p style="font-size:17px ; margin-top:7px"> If you want to export file.csv , please click " EXPORT "</p>
  
            <table>
              <thead>
                <tr>
                  <th>Student ID</th>
                  <th>Họ và Tên</th>
                  <th>Teacher ID</th>
                  <th>Họ và Tên</th>
                  <th>Subject ID</th>
                  <th>Môn học</th>
                  <th>Học kỳ</th>
                  <th>Năm</th>
                  <th>SubmitOrNot</th>
                  <th>Mark</th>
                </tr>
              </thead>
            <tbody>

            <tr v-for="result in results" :key="result.id" >
                  <td>{{ result.student_id }}</td>
                  <td>{{ result.student_name }}</td>
                  <td>{{ result.teacher_id }}</td>
                  <td>{{ result.teacher_name }}</td>
                  <td>{{ result.subject_id }}</td>
                  <td>{{ result.subject_name }}</td>
                  <td>{{ result.semester }}</td>
                  <td>{{ result.year }}</td>
                  <td>{{ result.submitornot }}</td>
                  <td>{{ result.mark }}</td>                                  
            </tr>
            <tr v-for="result in results_no_submit" :key="result.id">
              <td>{{ result.student_id }}</td>
              <td>{{ result.student_name }}</td>
              <td>{{ result.teacher_id }}</td>
              <td>{{ result.teacher_name }}</td>
              <td>{{ result.subject_id }}</td>
              <td>{{ result.subject_name }}</td>
              <td>{{ result.semester }}</td>
              <td>{{ result.year }}</td>
              <td>{{ result.submitornot }}</td>
              <td>{{ result.mark }}</td>                                  
        </tr>
          </tbody>
        </table>
      </div>

      <div v-if="message_success" >
        <div style="font-size:15px; background-color:none;height:30px; width: fit-content; text-align:center; align-content: center;align-items: center; border:0px none  ; margin-left: 160px;">
          <ul>
            <li style="color:green; margin-top: 20px; font-size: medium;  ">{{  message_success }}</li>
          </ul>
        </div>
      </div>
    

      <div v-if="showError_search_4" >
        <div style="font-size:15px; background-color:none;height:30px; width: fit-content; text-align:center; align-content: center;align-items: center; border:0px none  ; margin-left: 190px;">
          <ul>
            <li style="color:red;text-align:center;" >{{  error_search }}</li>
          </ul>
        </div>
      </div>

      <div v-if="showError_search_3" >
        <div style="font-size:15px; background-color:none;height:30px; width: fit-content; text-align:center; align-content: center;align-items: center; border:0px none  ; margin-left: 215px;">
          <ul>
            <li style="color:red;text-align:center;" >{{  error_search }}</li>
          </ul>
        </div>
      </div>
      
  <div v-if="show_button_export">
      <div class="form-group-student">
        <div style=" align-items: center;flex-direction: column; display: flex; margin-top: 5px;">
          <button class="btn-create-student" @click="export_data_to_csv">EXPORT</button>
        </div>
      </div>
  </div>


  <div v-if="show_button_dowload">
    <div class="form-group-student">
      <div style=" align-items: center;flex-direction: column; display: flex; margin-top: 5px;">
        <button class="btn-create-student" style="width:max-content ;" @click="dowload_file_csv(filePath)"> DOWNLOAD </button>

        <p style="margin-top: 10px; color: black;">{{ fileName }}.CSV</P>
      </div>
    </div>
</div>


      <div class="form-group-teacher" style=" align-items: center;flex-direction: column; display: flex; margin-top: 10px; color: black; ">
        <a class="txt2" style="color: black; font-size: 15px;" href="/export_mark">
              Back to search
        </a>
      </div>

      <div class="form-group-teacher" style=" align-items: center;flex-direction: column; display: flex; margin-top: 10px;color: black; font-size: 20px;">
        <a class="txt2"  style="color: black; font-size: 15px;" href="/home">
            Back to home
        </a>
      </div>

    </div>
</div>

</template>

<script>

export default {
  data() {
    return {
      show_search_old: true,
        showError_search_1:false,
        showError_search_2:false,
        showError_search_3:false,
        showError_search_4:false,
        show_button_export:false,
        show_button_dowload:false,
        show_message_sucess:false,
        search_export: {             
            subject_code:null,
            teacher_code:null,
            semester:null,
            year:null,                                          
          },
          results: [],
        results_no_submit: [],
          selectedResult: null,
          selectedRow: null,
          error_search:'',
          filePath:'',
          fileName:'',
          message_success:'',
        };
      },
      methods: {
        searchExport() {
          axios.post('/search_export_csv', {            
            subject_code: this.search_export.subject_code,
            teacher_code: this.search_export.teacher_code,
            semester: this.search_export.semester,
            year: this.search_export.year,
          })
          .then(response => {
            if (response.data.results.length > 0) {
              this.results = response.data.results;
              this.results_no_submit = response.data.results_no_submit;
              this.show_search_old = false;
              this.showError_search_1 = false;
              this.showError_search_2 = false;
              this.showError_search_3 = false;
              this.showError_search_4 = false;
              this.show_button_export=true;
              this.show_button_dowload=false;
          }   
          else {
            this.results = [];
            this.show_search_old = true;
            this.showError_search_1 = true;
            this.showError_search_2 = false;
            this.showError_search_3=false;
            this.showError_search_4=false;
            this.show_button_export=true;
            this.show_button_dowload=false;
            this.error_search = 'Kết quả không tìm thấy';
          }                     
        })
          .catch(error => {
            this.show_search_old = true;
            this.showError_search_1 = false;
            this.showError_search_2 = true;
            this.showError_search_3=false;
            this.showError_search_4=false;
            this.show_button_export=true;
            this.show_button_dowload=false;
            
            this.error_search = 'Thông tin không hợp lệ, vui lòng thử lại';     
            });      
          },
    
          export_data_to_csv: function() {
            axios.post('/export_data_to_csv', {
            subject_code: this.search_export.subject_code,
            teacher_code: this.search_export.teacher_code,
            semester: this.search_export.semester,
            year: this.search_export.year,
          })
          .then(response => {
            if(response.data.filePath.length>0)
            {
            this.filePath=response.data.filePath;
            this.fileName=response.data.fileName;
            this.message_success='Export thành công. Bây giờ bạn có thể tải file.csv về máy'
            this.show_message_sucess=true;
            this.showError_search_1 = false;
            this.showError_search_2 = false;
            this.showError_search_3=false;
            this.showError_search_4=false;
            this.show_button_export=false;
            this.show_button_dowload=true;
          }     
        })             
        .catch((error) => {
          // Xử lý khi gặp lỗi tải tệp
          this.showError_search_1=false;
          this.showError_search_2=false;
          this.showError_search_4=false;
          this.showError_search_3= true;  
          this.show_button_export=true;
          this.show_button_dowload=false;           
          this.error_search = 'Thông tin không hợp lệ, vui lòng thử lại';
        });
      },      
      
        dowload_file_csv(value){
 
      window.open('/downfilecsv?path=' + value ,'_blank');
    },      
  },
};

</script>