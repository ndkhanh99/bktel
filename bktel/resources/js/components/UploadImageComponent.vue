<template>
      
    <div class="form-teacher">
        <div class="form-tieude-teacher">
            <div class="teacher-registration">
                <h2>UPLOAD IMAGE</h2>
                                
            
          </div>
          <p>Please fill and click Upload</p>
    </div>

    <form @submit.prevent="" class="teacher-form">

    <div class="form-group-teacher">
        <label for="Seclected File">Seclected File</label>           
        <input class="input_import-file" style="margin-top: 15px;" type="file" name="file" v-on:change= "uploadfile"  enctype="multipart/form-data" placeholder="File">
    </div>

    <div class="form-group-teacher">
        <label for="Note">Note</label>          
        <input class="input_import" type="text" name="note" v-model = "images.note" placeholder="Note">
    </div>

    <div style="font-size:15px; background-color:none;height:30px; width: fit-content; text-align:center; align-content: center;align-items: center; border:0px none  ; margin-left: 180px;">
        <ul>
            <li style="color:red;text-align:center;">{{  error_upload_image }}</li>
        </ul>
    </div>
    
    <div style=" align-items: center;flex-direction: column; display: flex;font-size: 15px; margin-top: 5px;">
        <button class="btn-create-teacher " type="submit" @click="saveForm_upload_image">UPLOAD</button>
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
import axios from 'axios';
export default {
    data(){
        return{
            file:'',
            images:{
                path:'',
                note:'',
            },
            error_upload_image: '', // Thêm một trường để lưu thông báo lỗi
        }       
    },
    methods: {
         uploadfile(e){
            this.file = e.target.files[0]
        },
        saveForm_upload_image: function() {               
            let formData = new FormData()
            formData.append('file',this.file)
            formData.append('path',this.file.name)
            formData.append('note',this.images.note)
            axios.post('/upload_image',formData,).then(res=>{
            window.location.href = '/home';

           })

        .catch((error) => {
        // Xử lý khi gặp lỗi tải tệp
            this.error_upload_image = 'Lỗi khi tải tệp lên. Vui lòng thử lại.';
        });
    },
        cancel(){
            window.location.href='/home';
        }

    }
}
</script>