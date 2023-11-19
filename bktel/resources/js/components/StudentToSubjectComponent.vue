<template>
    <div class="form-teacher">
        <div class="form-tieude-teacher">
            <div class="teacher-registration">
                <h2>REGISTER FORM FOR STUDYING STUDENTS</h2>


            </div>
            <p>Please Fill & Click Submit</p>
        </div>

            <form @submit.prevent="" class="teacher-form">

        <div class="form-group-teacher">
            <label for="Student's Code">Student's Code</label>
            <input class="input_import" type="text" name="studentscode" v-model="studenttosubject.student_code" placeholder="Student's Code">
        </div>

        <div class="form-group-teacher">
            <label for="Subject's Code">Subject's Code</label>
            <input class="input_import" type="text" name="subjectscode" v-model="studenttosubject.subject_code" placeholder="Subject's Code">
        </div>

        <div class="form-group-teacher">
            <label for="Semester">Semester</label>
            <select class="input_import" v-model="studenttosubject.semester"  >
                <option disabled value="">Mời bạn học kì</option>
                <option value="HK1">HK1</option>
                <option value="HK2">HK2</option>
                <option value="HK3">HK3</option>
            </select>

        </div>

        <div class="form-group-teacher">
            <label for="Year"> Year</label>
            <select class="input_import" v-model="studenttosubject.year"  >
                <option disabled value="">Mời bạn năm học</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
            </select>

        </div>     

        <div class="form-group-teacher">
            <label for="Note">Note</label>
            <input class="input_import" type="text" name="note" v-model="studenttosubject.note" placeholder="Note">
        </div>
        <div v-if="showError_search_1" >
        <div style="font-size:15px; background-color:none;height:30px; width: fit-content; text-align:center; align-content: center;align-items: center; border:0px none  ; margin-left: 180px;">


            <ul>
            <li style="color:red;text-align:center;"> {{ error_studenttosubject }} </li>
            </ul>
        </div>
        </div>

        <div v-if="showError_search_2" >
            <div style="font-size:15px; background-color:none;height:30px; width: fit-content; text-align:center; align-content: center;align-items: center; border:0px none  ; margin-left: 70px;">


                <ul>
                <li style="color:red;text-align:center;"> {{ error_studenttosubject }} </li>
                </ul>
            </div>    
    </div>


        <div style=" align-items: center;flex-direction: column; display: flex;font-size: 15px; margin-top: 5px;">
            <button class="btn-create-teacher " type="submit" @click="saveForm_studenttosubject">SUBMIT</button>
        </div>
        <div class="form-group-teacher" style=" align-items: center;flex-direction: column; display: flex; margin-top: 5px;">
            <a class="txt2" href="/home">
                Back to home
            </a>
        </div>

    </form>

    </div>
</template>


<script>
    export default {
        data(){
            return{
                showError_search_1:false,
                showError_search_2:false,
                studenttosubject: {
                            lecture_code:null,
                            subject_code:null,
                            semester:null,
                            year:null,
                            note:null,
                        
                        },
                        error_studenttosubject: '',
                        results: '',
                    }
                },
        methods: {
            saveForm_studenttosubject(){           
                axios.post('student_to_subjects/store',{
                    student_code: this.studenttosubject.student_code,
                    subject_code: this.studenttosubject.subject_code,
                    semester: this.studenttosubject.semester,
                    year: this.studenttosubject.year,
                    note: this.studenttosubject.note,                        
                    })
                    .then(res=>{                              
                    if (res.data.message)                                {
                    // Display the message, e.g., set it to your Vue data property
                        this.showError_search_1=false;
                        this.showError_search_2=true;                
                    // window.location.href='/teacher_to_subject';
                        this.error_studenttosubject = res.data.message;
                    }
                    else
                    { 
                        this.showError_search_1=false;
                        this.showError_search_2=false;
                        window.location.href='/home';
                    }                           
                })                   
                    .catch(error => {                        
                        this.showError_search_1=true;
                        this.showError_search_2=false;
                        this.error_studenttosubject = 'Thông tin không hợp lệ, hãy nhập lại';               
                    });
                }
            }
        }
</script>