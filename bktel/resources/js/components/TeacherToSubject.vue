
<template>
    <div class="import-form" style="margin-top:30px;margin-bottom:90px">
        <div class="import-div">
            Form Enroll
            <p>Please add teacher to subjects</p>
        </div>
        <div class="import-div">
            Lecturer's Code
            <input class="input_import" type="text" name="lecturercode" data-rules="required" v-model="enroll.teacher_id" placeholder="Code">
        </div>

        <div class="import-div">
            Subject's Code
            <input class="input_import" type="text" name="subjectcode" v-model="enroll.subject_id" placeholder="Code">
        </div>
        
        <div class="import-div">
           Year
            <select class="input_import" v-model="enroll.year"  >
                <option disabled value="">Mời bạn chọn năm học</option>
                <option value="2022">2022</option>
                <option value="Khoa học và kỹ thuật máy tính">Khoa Khoa học và Kỹ thuật Máy tính</option>
            </select>
        </div>

        <div class="import-div">
          Semester
            <select class="input_import" v-model="enroll.semester"  >
                <option disabled value="">Mời bạn chọn học kỳ</option>
                <option value="Điện-Điện tử">HK1</option>
                <option value="Khoa học và kỹ thuật máy tính">HK2</option>
                <option value="Khoa học và kỹ thuật máy tính">HK3</option>
            </select>
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
                enroll:{
                    teacher_id:'',
                    subject_id:'',
                    semester:'',
                    year:'',
                }
            }
        },
        methods: {
            cancel(){
                window.location.href = '/home';
            },
             saveForm(){
                axios.post('TeachertoSubjects/store',{
                    teacher_id: this.enroll.teacher_id,
                    subject_id: this.enroll.subject_id,
                    year: this.enroll.year,
                    semester: this.enroll.semester,
                    }).then(res=>{
                    
                    window.location.href='/home';
               })
            
            //  console.log("hi");
        }
    }
}

</script>
