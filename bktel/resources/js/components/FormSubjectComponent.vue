<template>
    <div class="css-subject" >
        <div class="import-tieude-teacher-new">
            <div class="teacher-registration">
                <h2 >SUBJECT INFORMATION</h2>
                
                
              </div>
              <p>Please Fill & Click Submit</p>

        </div>
       
            <form @submit.prevent="saveForm" class="teacher-form">
         
        <div class="import-form-group-teacher">
            <label for="Name" style="font-size: medium;">Name</label>
            <input class="input_import"  style="margin-top: 15px;" type="text" name="name" data-rules="required" v-model="subject.name" placeholder="Name">
        </div>

       
        
        <div class="import-form-group-teacher">
                 <label for="Subject Code" style="font-size: medium;"> Subject Code</label>
            <input class="input_import"  style="margin-top: 15px;" type="text" name="subjectcode" v-model="subject.subject_code" placeholder="Subject Code">
        </div>

        

        
        <div class="import-form-group-teacher">
            <label for="Note" style="font-size: medium;">Note</label>
            <input class="input_import"  style="margin-top: 15px;" type="text" name="note" v-model="subject.note" placeholder="Note">
        </div>
      
        
        <div style="font-size:15px; background-color:none;height:30px; width: fit-content; text-align:center; align-content: center;align-items: center; border:0px none  ; margin-left: 140px;">
         
     
            <ul>
              <li style="color:rgb(229, 231, 114);text-align:center;"  > {{ error_subject }}</li>
            </ul>
          </div>
        
        <div   style=" align-items: center;flex-direction: column; display: flex;font-size: 15px; ">
            <button class="btn-create-teacher " type="submit" @click="saveForm_subject">SUBMIT</button>
        </div>
        
        <div class="form-group-teacher" style=" align-items: center;flex-direction: column; display: flex; margin-top: 10px;">
            <a class="txt2" style="color: black; font-size: 15px;" href="/home">
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
                        subject: {
                            name:null,
                            subject_code:null,
                            note:null,           
                        },
                        error_subject: '',
                    
                    }
                },
        methods: {
            saveForm_subject(){
                      
                        // Đầu tiên, xóa thông báo lỗi cũ (nếu có)
    // this.errors = [];

// Kiểm tra dữ liệu trước khi gửi yêu cầu POST
// if (!this.subject.name || !this.subject.subject_code ) {
  // Nếu có bất kỳ trường nào bị thiếu dữ liệu, hiển thị thông báo lỗi
//   this.errors.push("Vui lòng điền đầy đủ thông tin");
//   return;
// }

// Nếu dữ liệu hợp lệ, gửi yêu cầu POST
                        axios.post('subjects/store',{
                            name: this.subject.name,                        
                            subject_code: this.subject.subject_code,                          
                            note: this.subject.note,           
                            })
                            .then(res=>{
                            
                            window.location.href='/home';
                    })
                    
                    .catch(error => {
                        this.error_subject = 'Thông tin không hợp lệ, vui lòng thử lại';
                    });
                }
            }
        }

</script>