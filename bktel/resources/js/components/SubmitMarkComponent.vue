<template>

  <div class="form-submit_mark ">
    <div class="form-tieude-teacher">
      <div class="teacher-registration">
        <h2  style="font-size:23px; margin-top:10px">FORM SUBMIT TEACHER GRADE </h2>


          </div>
        <p style="font-size:17px ; margin-top:7px">Please fill & Click search to select the student you want to grade </p>
      </div>


      <form @submit.prevent="" class="teacher-form">


      <div class="form-group-teacher">
        <label for="Subject Code">Subject Code</label>
        <input  class="input_import" type="text" name="subjectCode" v-model="search_studenttosubject.subject_code" placeholder="Subject Code">
      </div>

      <div class="form-group-teacher">
        <label for="Student Code">Student Code</label>
        <input  class="input_import" type="text" name="studentCode" v-model="search_studenttosubject.student_code" placeholder="Student Code">
      </div>

      <div class="form-group-teacher">
        <label for="Semester">Semester</label>
          <select class="input_import" v-model="search_studenttosubject.semester"  >
            <option disabled value="">Mời bạn học kì</option>
            <option value="HK1">HK1</option>
            <option value="HK2">HK2</option>
            <option value="HK3">HK3</option>
          </select>
      </div>

      <div class="form-group-teacher">
        <label for="Year">Year</label>
        <input  class="input_import" type="text" name="year" v-model="search_studenttosubject.year" placeholder="Year">
      </div>

      <div v-if="showError_search_2" >
        <div style="font-size:15px; background-color:none;height:30px; width: fit-content; text-align:center; align-content: center;align-items: center; border:0px none  ; margin-left: 218px;">
          <ul>
            <li style="color:red;text-align:center;">{{  error_search }}</li>
          </ul>
        </div>
    </div>

       <div v-if="showError_search_1" >
        <div style="font-size: 15px; background-color: none; height: 30px; width: fit-content; text-align: center; margin-left: 270px; display: flex; justify-content: center; align-items: center;">
          <ul>
              <li style="color: red; text-align: center;">{{ error_search }}</li>
          </ul>
      </div>
    </div>

    <div v-if="showError_search_5" >
      <div style="font-size: 15px; background-color: none; height: 30px; width: fit-content; text-align: center; margin-left: 230px; display: flex; justify-content: center; align-items: center;">
        <ul>
            <li style="color: red; text-align: center;">{{ error_search }}</li>
        </ul>
      </div>
    </div>

    <div v-if="show_search_old">
      <div class="form-group-student">
        <div style="display: flex; flex-direction: column; align-items: center; margin-top: 5px;">
          <button class="btn-create-student" @click="searchTeacherToSubject">SEARCH</button>
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
        <h2 style="font-size:23px; margin-top:10px" >LIST OF STUDENT REPORTS </h2>
          <p style="font-size:17px ; margin-top:7px"> If you want to read the student's report, please click " Download File "</p>
          <p style="font-size:17px; margin-top:7px"> If you want to grade a student's report, please click " Select "</p>
            <table>
              <thead>
                <tr>
                  <th>Report ID</th>
                  <th>Họ và Tên</th>
                  <th>Môn học</th>
                  <th>Title</th>
                  <th>Học kỳ</th>
                  <th>Năm</th>
                  <th> Student Report</th>
                  <th> Set Mark</th>
                </tr>
              </thead>
            <tbody>

            <tr v-for="result in results" :key="result.id" :class="{ 'selected-row': result === selectedRow }">
                  <td>{{ result.id }}</td>
                  <td>{{ result.student_name }}</td>
                  <td>{{ result.subject_name }}</td>
                  <td>{{ result.title }}</td>
                  <td>{{ result.semester }}</td>
                  <td>{{ result.year }}</td>
                  <td>
              <a>
                <button class="select-button" type="submit" @click="downloadFile_Report(result.path)">Download File</button>
              </a> 
            </td>

              <td>
                <button class="select-button" @click="selectRow(result)">Select</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>


      <div v-if="selectedResult">
        <div style="text-align: center; margin-top: 10px;  ">
          <p style="color: black;">Student ID: {{ selectedResult.student_id}}    - - - - - Họ và Tên: {{ selectedResult.student_name }}</p>
          <p style="color: black;">Subject ID: {{ selectedResult.subject_id }}    - - - - - Môn học: {{ selectedResult.subject_name }}</p>
          <p style="color: black;">Report ID: {{ selectedResult.id }}           - - - - - Tiêu đề báo cáo: {{ selectedResult.title }} </p>
        </div>
      </div>


        <div class="import-form-group-teacher">
          <label for="Grading for students" style="font-size: medium;">Grading for student</label>
          <input class="input_import" type="text" name="Grading for students" data-rules="required" v-model="submit.mark" placeholder="Grading for student">
        </div>

      <div v-if="showError_search_4" >
        <div style="font-size:15px; background-color:none;height:30px; width: fit-content; text-align:center; align-content: center;align-items: center; border:0px none  ; margin-left: 190px;">
          <ul>
            <li style="color:red;text-align:center;">{{  error_search }}</li>
          </ul>
        </div>
      </div>

      <div v-if="showError_search_3" >
        <div style="font-size:15px; background-color:none;height:30px; width: fit-content; text-align:center; align-content: center;align-items: center; border:0px none  ; margin-left: 215px;">
          <ul>
            <li style="color:red;text-align:center;">{{  error_search }}</li>
          </ul>
        </div>
      </div>

      <div class="form-group-student">
        <div style=" align-items: center;flex-direction: column; display: flex; margin-top: 5px;">
          <button class="btn-create-student" @click="saveForm_upload_report">UPLOAD</button>
        </div>
      </div>

      <div class="form-group-teacher" style=" align-items: center;flex-direction: column; display: flex; margin-top: 10px; color: black; ">
        <a class="txt2" style="color: black; font-size: 15px;" href="/submit_mark">
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
        showError_search_5:false,
        search_studenttosubject: {
            student_code:null,
            subject_code:null,
            semester:null,
            year:null,                                          
          },
          file:'',
          submit:{               
            mark:'',                 
          },  
          results: [], // Biến để lưu trữ kết quả tìm kiếm
          selectedResult: null,
          selectedRow: null,
          error_search:'',
        };
      },
      methods: {
        uploadfile(e){
          this.file = e.target.files[0]
        },
        searchTeacherToSubject() {
          axios.post('/search_student', {
            student_code: this.search_studenttosubject.student_code,
            subject_code: this.search_studenttosubject.subject_code,
            semester: this.search_studenttosubject.semester,
            year: this.search_studenttosubject.year,
          })
          .then(response => {
            this.results = response.data;
          
            if(response.data.message) {
              this.show_search_old = true;
              this.showError_search_5=true;
              this.showError_search_1 = false;
              this.showError_search_2 = false;
              this.showError_search_3=false;
              this.showError_search_4=false;
              this.error_search= response.data.message;
            }
            else if (response.data.length > 0) {
              this.results = response.data;
              this.show_search_old = false;
              this.showError_search_5=false;
              this.showError_search_1 = false;
              this.showError_search_2 = false;
              this.showError_search_3=false;
              this.showError_search_4=false;
            }        
            else {
              this.results = [];
              this.show_search_old = true;
              this.showError_search_1 = true;
              this.showError_search_2 = false;
              this.showError_search_3=false;
              this.showError_search_4=false;
              this.showError_search_5=false;
              this.error_search = 'Kết quả không tìm thấy';
            }                     
          })
          .catch(error => {
          this.show_search_old = true;
          this.showError_search_1 = false;
          this.showError_search_2 = true;
          this.showError_search_3=false;
          this.showError_search_4=false;
          this.showError_search_5=false;
          this.error_search = 'Thông tin không hợp lệ, vui lòng thử lại';        
          });          
        },
        selectRow(result) {
          this.selectedResult = result;
          this.selectedRow = result;
          this.showError_search_4=false;
          this.showError_search_5=false;         
        }, 
        downloadFile_Report(value){ 
          window.open('/downfile?path=' + value ,'_blank');
        },
  
        saveForm_upload_report: function() {
          if (!this.selectedResult) {
          // console.warn('Please select a row before uploading.');
            this.showError_search_1=false;
            this.showError_search_2=false;
            this.showError_search_3=false;
            this.showError_search_4=true;
            this.showError_search_5=false;
            this.error_search = 'Hãy lựa chọn học sinh mà bạn muốn nộp báo cáo';
            return;
          }
        else
        {         
          this.showError_search_4=false;        
        }
              
          let formData = new FormData()      
            formData.append('mark',this.submit.mark)
            formData.append('report_id',this.selectedResult.id)
            axios.post('/submit_mark_store',formData).then(res=>{
            window.location.href='/home' ;
          })             
          .catch((error) => {
          // Xử lý khi gặp lỗi tải tệp
            this.showError_search_1=false;
            this.showError_search_2=false;
            this.showError_search_4=false;
            this.showError_search_3= true;
            this.showError_search_4=false;
            this.showError_search_5=false;
            this.error_search = 'Thông tin không hợp lệ, vui lòng thử lại';
          });
        },     
      },
};
</script>