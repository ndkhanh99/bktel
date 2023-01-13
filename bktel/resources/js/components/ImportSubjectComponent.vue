
<template>
    <div class="import-form" >
        <div class="import-div">
            <p style="font-size: larger;text-decoration: none;font-weight: 400;" class="">IMPORT SUBJECT</p>
            <a>Please fill and click Upload</a> 
        </div>
            
        <div class="import-div">
            Reminder Name
                <input class="input_import" type="text" name="name" data-rules="required" v-model= "imports.name" placeholder="Name">
        </div>

        <div class="import-div">
            Seclected File
                <input class="input_import-file" type="file" name="file" v-on:change= "uploadfile"  enctype="multipart/form-data" placeholder="File">
        </div>

        <div class="import-div">
            Note
                <input class="input_import" type="text" name="Note" v-model = "imports.note" placeholder="Note">
        </div>
        <div class="import-div-submit">
                <button class="input_import-submit cancel" type="submit" @click="cancel">Cancel</button>
                <button class="input_import-submit upload" type="submit" @click="saveForm">Upload</button>
        </div>   
    </div>
   
</template>

<script>

    export default {
        data(){
            return{
                file:'',
                imports:{
                    name:'',
                    path:'',
                    note:'',
                }
        }
        },
        methods: {
             uploadfile(e){
                this.file = e.target.files[0]
             },
             saveForm: function() {
                let formData = new FormData()
                formData.append('file',this.file)
                formData.append('path',this.file.name)
                formData.append('name',this.imports.name)
                formData.append('note',this.imports.note)
                axios.post('import_subject_store',formData,).then(res=>{
                    window.location.href='/home' ;
               })
            
            //  console.log("hi");
        },
             cancel(){
                window.location.href='/home';
             }
    }
}
</script>