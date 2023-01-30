<template>

    <div class="import-form" >
            <div class="import-div">
                Search
                <p>Search your result</p>
            </div>
            <div class="import-div">
                Student code
                <input class="input_import" type="text" name="student_code" data-rules="required" v-model="search.student_code" placeholder="Student Code">
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
                  <a style="display: inline-block;font-size: 18px;">Student_code: {{result.student_id}}</a>
                  <a style="display: inline-block;font-size: 18px;">Title: {{ result.title }}</a>
                  <a style="display: inline-block;font-size: 18px;">Year: {{ search.year }}</a>
                  <a style="display: inline-block;font-size: 18px;">Semester: {{ search.semester}}</a>
                  <a style="display: inline-block;font-size: 18px;">Path: {{ result.path}}
                    <button class="input_import-submit upload" type="submit" @click="download(result.path)">DownloadFile</button>
                  </a>                   
            </div>

            <div class="import-div">
                Title
                <input class="input_import" type="text" name="mark" data-rules="required" v-model="submit.title" placeholder="Title">
            </div>

            <div class="import-div">
                Path
                <input class="input_import" type="text" name="mark" data-rules="required" v-model="submit.path" placeholder="Path">
            </div>

            
            <div class="import-div">
                Note
                <input class="input_import" type="text" name="mark" data-rules="required" v-model="submit.note" placeholder="Note">
            </div>

            <div class="import-div">
                Give mark
                <p>Give your mark</p>
            </div>
            <div class="import-div">
                Mark
                <input class="input_import" type="text" name="mark" data-rules="required" v-model="submit.mark" placeholder="Title">
            </div>
            <div class="import-div" >
                    <button class="input_import-submit cancel" type="submit" @click="cancel">Cancel</button>
                    <button class="input_import-submit upload" type="submit" @click="submitted">Submit</button>
            </div>
</div>

    </template>
    
    <script>    
        export default {
            
            data(){
                return{
                    search:{
                        student_code:'',
                        subject_id:'',
                        semester:'',
                        year:'',
                    },
                    pathname:'',
                    results:[], 
                    submit:{
                        title:'',
                        path:'',
                        note:'',
                        mark:'',
                    },
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
                    .post('/search_for_teacher',{
                        student_code: this.search.student_code,
                        subject_id: this.search.subject_id,
                        year: this.search.year,
                        semester: this.search.semester,
                        })
                    .then(response=>{
                        this.results = response.data;
                   })
                },
                download(value){
      // await axios.get('download', {
      //   params : {path : value }
      // })
                window.open('/downfile?path=' + value ,'_blank');
    },
                submitted(){
                    axios.post('/submitmark',
                    {
                        title:this.submit.title,
                        path:this.submit.path,
                        note:this.submit.note,
                        mark:this.submit.mark,
                    })
                    .then(res=>{
                        window.location.href='/home' ;
                    })
                }
    }
}

       
    </script>