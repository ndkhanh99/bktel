<template>

    <div class="import-teacher-new" >
        <div class="import-tieude-teacher-new">
            <p style=" font-size: 20px;color: #2e2b2b;margin: 0; " class="">IMPORT SUBJECT</p>
            <a stype=" font-size: 15px; color: #333; margin: 10px;">Please fill and click Upload</a> 
        </div>

        <div class="import-form-group-teacher">
            
            <label for="Reminder Name">Reminder Name</label>
                <input class="input_import" style="margin-top: 15px;" type="text" name="name" data-rules="required" v-model= "imports.name" placeholder="Name">
        </div>

        <div class="import-form-group-teacher">
            <label for="Seclected File">Seclected File (file should be in .csv format)</label>
            
                <input class="input_import-file" style="margin-top: 15px;" type="file" name="file" v-on:change= "uploadfile"  enctype="multipart/form-data" placeholder="File">
        </div>

        <div class="import-form-group-teacher">
            <label for="Note">Note</label>
           
                <input class="input_import" type="text" style="margin-top: 15px;" name="note" v-model = "imports.note" placeholder="Note">
        </div>

        <div style="font-size:20px; background-color:none;height:30px; width: fit-content; text-align:center; align-content: center;align-items: center; border:0px none  ; margin-left: 35px;">
            <p style="color:red;text-align:center;">{{ error_import_subject }}</p>
        </div>

        <div class="import-div-submit">
           
                <button class="import-btn-cancel " type="submit" @click="cancel">Cancel</button>
                <button class="import-btn-upload " type="submit" @click="saveForm_import_subject">Upload</button>
                
        </div> 
       
    </div>
    
</template>

<script>
import axios from 'axios';
             export default {
        data(){
            return{
                file:'',
                imports:{
                    name:'',
                    path:'',
                    note:'',
                },
                error_import_subject: '', // Thêm một trường để lưu thông báo lỗi
        }
        
        },
        methods: {
             uploadfile(e){
                this.file = e.target.files[0]
            },
            saveForm_import_subject: function() {
                
                let formData = new FormData()
                formData.append('file',this.file)
                formData.append('path',this.file.name)
                formData.append('name',this.imports.name)
                formData.append('note',this.imports.note)
                axios.post('/import_subject',formData,).then(res=>{       
                
                window.location.href = '/home';  
               
            })

            .catch((error) => {
                // Xử lý khi gặp lỗi tải tệp
                this.error_import_subject = 'Lỗi khi tải tệp lên. Vui lòng thử lại.';
            });
        },
            cancel(){
                window.location.href='/home';
        }
    }
}
</script>