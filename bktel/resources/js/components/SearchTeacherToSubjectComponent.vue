<template>

    <div class="form-teacher">
        <div class="form-tieude-teacher">
            <div class="teacher-registration">
                <h2> TEACHER INFORMATION TEACHING THE SUBJECT</h2>
                
                
              </div>
              <p>Please Fill & Click Search</p>
            </div>
              
         <form @submit.prevent="" class="teacher-form">

        <div class="form-group-teacher">
        <label for="Teacher Code">Teacher Code</label>
        <input  class="input_import" type="text" name="teacherCode" v-model="search_teachertosubject.teacher_code" placeholder="Teacher Code">
        <div class="form-group-teacher">
        </div>
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
         <div class="form-group-student">
          <div style=" align-items: center;flex-direction: column; display: flex; margin-top: 5px;">
        <button class="btn-create-student" @click="searchTeacherToSubject">SEARCH</button>
      </div>
      </div>
        <div class="form-group-teacher" style=" align-items: center;flex-direction: column; display: flex; margin-top: 5px;">
            <a class="txt2" href="/home">
                Back to home
            </a>
        </div>
    </form>
       
<div v-if="results.length > 0">
    <div class="form-tieude-teacher">
        <h2>Kết quả tìm kiếm:</h2>
        <table>
            <thead>
            <tr>
                <th>ID Teacher  </th>
                <th>TÊN</th>
                <th>ID Subject</th>
                <th>Môn học</th>
                <th>Học kỳ</th>
                <th>Năm</th>
            </tr>
            </thead>
        <tbody>
            <tr v-for="result in results" :key="result.id">
                <td>{{ result.teacher_id }}</td>
                <td>{{ result.teacher_name }}</td>
                <td>{{ result.subject_id }}</td>
                <td>{{ result.subject_name }}</td>
                <td>{{ result.semester }}</td>
                <td>{{ result.year }}</td>
            </tr>
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
            search_teachertosubject: {
                teacher_code:null,
                subject_code:null,
                semester:null,
                year:null,    
                },
            results: [], // Biến để lưu trữ kết quả tìm kiếm
        };
    },
        methods: {
            searchTeacherToSubject() {
                axios.post('/search', {
                teacher_code: this.search_teachertosubject.teacher_code,
                subject_code: this.search_teachertosubject.subject_code,
                semester: this.search_teachertosubject.semester,
                year: this.search_teachertosubject.year,
                })
            .then(response => {
                // Lấy dữ liệu từ API và gán vào biến v
                this.results = response.data;
            })
            .catch(error => {
                console.error('Lỗi khi tìm kiếm: ' + error);
            });
            },
        },
    };
</script>