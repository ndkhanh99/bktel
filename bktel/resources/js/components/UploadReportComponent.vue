<template>

<div class="import-form" >
        <div class="import-div">
            Search
            <p>Search your result</p>
        </div>
        <div class="import-div">
            Teacher id
            <input class="input_import" type="text" name="teacher_id" data-rules="required" v-model="search.teacher_id" placeholder="Teacher">
        </div>

        <div class="import-div">
            Subject id
            <input class="input_import" type="text" name="subject_id" data-rules="required" v-model="search.subject_id" placeholder="Subject">
        </div>
        <div class="import-div">
            Semester
            <select class="input_import" v-model="search.semester" >
                <option value="HK1">HK1</option>
                <option value="HK2">HK2</option>
                <option value="HK3">HK3</option>
            </select>
        </div>
        <div class="import-div">
            Year
            <select class="input_import" v-model="search.year" >
                <option v-bind:value="today()-1">{{ today()-1  }}</option>
                <option v-bind:value="today()">{{ today() }}</option>
                <option v-bind:value="today()+1">{{ today() + 1 }}</option>
            </select>
        </div> 
        <div class="import-div">
                <button class="input_import-submit cancel" type="submit" @click="cancel">Cancel</button>
                <button class="input_import-submit upload" type="submit" @click="saveForm">Search</button>
        </div> 
        <div class="import-div" v-for="result in results">
              <a style="display: inline-block;font-size: 18px;">Teacher_id: {{ result.teacher_id }}</a>
              <a style="display: inline-block;font-size: 18px;">Subject_id: {{ result.subject_id }}</a>
              <a style="display: inline-block;font-size: 18px;">Year: {{ result.year }}</a>
              <a style="display: inline-block;font-size: 18px;">Semester: {{ result.semester}}</a>
              <input type="checkbox">
        </div>
        <div class="import-div">
            Upload
            <p>Upload your report</p>
        </div>
        <div class="import-div">
            Title 
            <input class="input_import" type="text" name="title" data-rules="required" v-model="upload.title" placeholder="Title">
        </div>
        <div class="import-div">
            Select your report
                <input class="input_import-file" type="file" name="file" v-on:change="uploadreport"  enctype="multipart/form-data" placeholder="Report">
        </div>
        <div class="import-div" >
                <button class="input_import-submit cancel" type="submit" @click="cancel">Cancel</button>
                <button class="input_import-submit upload" type="submit" @click="Upload">Upload</button>
        </div>
</div>

</template>

<script>    
    export default {
        
        data(){
            return{
                search:{
                    teacher_id:'',
                    subject_id:'',
                    semester:'',
                    year:'',
                },  
                pre_results:[],
                results:[], 
                upload:{
                    title:'',
                },
                file:'',
            }
        },
        methods: {
    
            today(){
                const today =new Date();
                const year = today.getFullYear();
                return year;
            },
            cancel(){
                window.location.href = '/home';
            },
            saveForm(){
                axios
                .post('TeachertoSubjects/search',{
                    teacher_id: this.search.teacher_id,
                    subject_id: this.search.subject_id,
                    year: this.search.year,
                    semester: this.search.semester,
                    })
                .then(response=>{
                    this.results = response.data;
               })
            },
            uploadreport(e)
            {
                this.file = e.target.files[0];
            },
            Upload: function() {
                let formData = new FormData()
                formData.append('file',this.file)
                formData.append('title',this.upload.title)
                formData.append('teacher_id',this.search.teacher_id)
                formData.append('subject_id',this.search.subject_id)
                formData.append('semester',this.search.semester)
                formData.append('year',this.search.year)
                axios.post('/upload_store',formData).then(res=>{
                    window.location.href='/home' ;
               })
            },
        }
}

   
</script>