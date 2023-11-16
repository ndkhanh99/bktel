<template>

    <div class="form-teacher">
        <div class="form-tieude-teacher">
            <div class="teacher-registration">
                <h2>FORM UPLOAD STUDENT REPORT </h2>
                
                
              </div>
              <p>Please fill & Click search to select a teacher who teaches your subject </p>
            </div>
       
        
         <form @submit.prevent="" class="teacher-form">

        <!-- <div class="form-group-teacher">
        <label for="Teacher Code">Teacher Code</label>
        <input  class="input_import" type="text" name="teacherCode" v-model="search_teachertosubject.teacher_code" placeholder="Teacher Code">
      
        </div> -->

        <div class="form-group-teacher">
        <label for="Subject Code">Subject Code</label>
        <input  class="input_import" type="text" name="subjectCode" v-model="search_teachertosubject.subject_code" placeholder="Subject Code">
        
          </div>

          <div class="form-group-teacher">
            <label for="Semester">Semester</label>
            <select class="input_import" v-model="search_teachertosubject.semester"  >
                <option disabled value="">Mời bạn học kì</option>
                <option value="HK1">HK1</option>
                <option value="HK2">HK2</option>
                <option value="HK3">HK3</option>
            </select>

        </div>
        <div class="form-group-teacher">
        <label for="Year">Year</label>
        <input  class="input_import" type="text" name="year" v-model="search_teachertosubject.year" placeholder="Year">
         </div>
         

         <div v-if="showError_search_2" >
          <div style="font-size:15px; background-color:none;height:30px; width: fit-content; text-align:center; align-content: center;align-items: center; border:0px none  ; margin-left: 180px;">
         
     
            <ul>
              <li style="color:rgb(229, 231, 114);text-align:center;">{{  error_search }}</li>
            </ul>
          </div>
      </div>

         <div v-if="showError_search_1" >
          <div style="font-size: 15px; background-color: none; height: 30px; width: fit-content; text-align: center; margin-left: 215px; display: flex; justify-content: center; align-items: center;">
            <ul>
                <li style="color: rgb(229, 231, 114); text-align: center;">{{ error_search }}</li>
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
           <label style="font-size:20px" for="Lựa chọn giảng viên giảng dạy">SELECT TEACHER</label>
              <table>
                  <thead>
                      <tr>
                          <th>ID Teacher</th>
                          <th>TÊN</th>
                          <th>ID Subject</th>
                          <th>Môn học</th>
                          <th>Học kỳ</th>
                          <th>Năm</th>
                    
                      </tr>
                  </thead>
                  <tbody>
                 
                    <tr v-for="result in results" :key="result.id" :class="{ 'selected-row': result === selectedRow }">
                          <td>{{ result.teacher_id }}</td>
                          <td>{{ result.teacher_name }}</td>
                          <td>{{ result.subject_id }}</td>
                          <td>{{ result.subject_name }}</td>
                          <td>{{ result.semester }}</td>
                          <td>{{ result.year }}</td>
                          <td>
                            <button class="select-button" @click="selectRow(result)">Select</button>
                          </td>
                      </tr>
                  
                  </tbody>
              </table>
      
          </div>


    

         
          <div v-if="selectedResult">
  
            <div style="text-align: center; margin-top: 10px;  ">
              <p style="color: black;">ID Teacher: {{ selectedResult.teacher_id }}     - Họ và Tên: {{ selectedResult.teacher_name }}</p>
              <p style="color: black;">ID Subject: {{ selectedResult.subject_id }}     - Môn học: {{ selectedResult.subject_name }}</p>
              <p style="color: black;">Học kỳ: {{ selectedResult.semester }}           - Năm: {{ selectedResult.year }}</p>
          </div>
          
             </div>


          <!-- /////////////////////////////// -->
             <!-- <div class="form-tieude-teacher" style="margin-top: 30px;">
              <div class="teacher-registration">
                  <h2> UPLOAD</h2>
              </div>
              <p>Upload Your Report</p>
            </div> -->

            <div class="import-form-group-teacher">
              <label for="Title Report" style="font-size: medium;">Title Report</label>
              <input class="input_import" type="text" name="title" data-rules="required" v-model="upload.title" placeholder="Title">
            </div>
         
            <div class="import-form-group-teacher">
            <label for="Selected File" style="font-size: medium;">Selected File</label>
            <input class="input_import-file" type="file" name="file" v-on:change="uploadfile" enctype="multipart/form-data" placeholder="File">
          </div>

            <div class="import-form-group-teacher">
              <label for="Note" style="font-size: medium;">Note</label>
              <input class="input_import" type="text" name="note" v-model="upload.note" placeholder="Note">
            </div>

           

          <div v-if="showError_search_4" >
            <div style="font-size:15px; background-color:none;height:30px; width: fit-content; text-align:center; align-content: center;align-items: center; border:0px none  ; margin-left: 130px;">
           
       
              <ul>
                <li style="color:rgb(229, 231, 114);text-align:center;">{{  error_search }}</li>
              </ul>
            </div>
        </div>
        <div v-if="showError_search_3" >
          <div style="font-size:15px; background-color:none;height:30px; width: fit-content; text-align:center; align-content: center;align-items: center; border:0px none  ; margin-left: 180px;">
         
     
            <ul>
              <li style="color:rgb(229, 231, 114);text-align:center;">{{  error_search }}</li>
            </ul>
          </div>
      </div>
          
            <div class="form-group-student">
              <div style=" align-items: center;flex-direction: column; display: flex; margin-top: 5px;">
            <button class="btn-create-student" @click="saveForm_upload_report">UPLOAD</button>
          </div>
          </div>

          <div class="form-group-teacher" style=" align-items: center;flex-direction: column; display: flex; margin-top: 10px; color: black; ">
            <a class="txt2" style="color: black; font-size: 15px;" href="/upload_report">
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
          search_teachertosubject: {
                            teacher_code:null,
                            subject_code:null,
                            semester:null,
                            year:null,
                     
                          
                        },
                        file:'',
                upload:{  
                    title:'', 
                    note:'',
                   
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
        axios.post('/search', {
          // teacher_code: this.search_teachertosubject.teacher_code,
          subject_code: this.search_teachertosubject.subject_code,
          semester: this.search_teachertosubject.semester,
          year: this.search_teachertosubject.year,
        })
        .then(response => {
          this.results = response.data;

          if (response.data.length > 0) {
            this.results = response.data;
            this.show_search_old = false;
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
            this.error_search = 'Kết quả không tìm thấy';
        }
          
        
        })
        .catch(error => {

        this.show_search_old = true;
        this.showError_search_1 = false;
        this.showError_search_2 = true;
        this.showError_search_3=false;
        this.showError_search_4=false;
        this.error_search = 'Thông tin không hợp lệ, vui lòng thử lại';
      
        });
        
      },
      
      selectRow(result) {
            this.selectedResult = result;
            this.selectedRow = result;
            this.showError_search_4=false;
         
        },

        selectupload(){
          this.showUploadForm = true;

        },

        saveForm_upload_report: function() {
        if (!this.selectedResult) {
        // console.warn('Please select a row before uploading.');
        this.showError_search_1=false;
        this.showError_search_2=false;
        this.showError_search_3=false;
        this.showError_search_4=true;
        this.error_search = 'Hãy lựa chọn giáo viên mà bạn muốn nộp báo cáo';

        return;
      
           }
        else
        {
           
           this.showError_search_4=false;
           
        }
                
          let formData = new FormData()
                    formData.append('file',this.file)
                    formData.append('title',this.upload.title)
                    formData.append('note',this.upload.note)
                    formData.append('teacher_id',this.selectedResult.teacher_id)
                    formData.append('subject_id',this.selectedResult.subject_id)
                    formData.append('semester',this.selectedResult.semester)
                    formData.append('year',this.selectedResult.year)
                    axios.post('/upload_report_store',formData).then(res=>{
                        window.location.href='/home' ;
                   })

               
               .catch((error) => {
                    // Xử lý khi gặp lỗi tải tệp
                    this.showError_search_1=false;
                    this.showError_search_2=false;
                    this.showError_search_4=false;
                    this.showError_search_3= true;
              
                    this.error_search = 'Thông tin không hợp lệ, vui lòng thử lại';
                });
        },
    },
  };
  </script>
  