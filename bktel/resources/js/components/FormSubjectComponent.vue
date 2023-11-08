<template>
    <div class="form-teacher">
        <div class="form-tieude-teacher">
            <div class="teacher-registration">
                <h2>SUBJECT INFORMATION</h2>
                
                
              </div>
              <p>Please Fill & Click Submit</p>

        </div>
       
            <form @submit.prevent="saveForm" class="teacher-form">
         
        <div class="form-group-teacher">
            <label for="Name">Name</label>
            <input class="input_import" type="text" name="name" data-rules="required" v-model="subject.name" placeholder="Name">
        </div>

       
        
        <div class="form-group-teacher">
                 <label for="Subject Code"> Subject Code</label>
            <input class="input_import" type="text" name="subjectcode" v-model="subject.subject_code" placeholder="Subject Code">
        </div>

        

        
        <div class="form-group-teacher">
            <label for="Note">Note</label>
            <input class="input_import" type="text" name="note" v-model="subject.note" placeholder="Note">
        </div>
      
        
        <div style="font-size:15px; background-color:none;height:30px; width: fit-content; text-align:center; align-content: center;align-items: center; border:0px none  ; margin-left: 180px;">
         
     
            <ul>
              <li style="color:rgb(229, 231, 114);text-align:center;" v-for="error in errors" :key="error"  > {{ error }}</li>
            </ul>
          </div>
        
        <div style=" align-items: center;flex-direction: column; display: flex;font-size: 15px; margin-top: 5px;">
            <button class="btn-create-teacher " type="submit" @click="saveForm">SUBMIT</button>
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
                        subject: {
                            name:null,
                            subject_code:null,
                            note:null,           
                        },
                        errors: [],
                    
                    }
                },
        methods: {
                    saveForm(){
                      
                        // Đầu tiên, xóa thông báo lỗi cũ (nếu có)
    this.errors = [];

// Kiểm tra dữ liệu trước khi gửi yêu cầu POST
if (!this.subject.name || !this.subject.subject_code || !this.subject.note) {
  // Nếu có bất kỳ trường nào bị thiếu dữ liệu, hiển thị thông báo lỗi
  this.errors.push("Vui lòng điền đầy đủ thông tin");
  return;
}

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
                     console.error(error);
                    });
                }
            }
        }

</script>