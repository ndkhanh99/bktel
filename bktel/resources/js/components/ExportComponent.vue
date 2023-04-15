<template>

    <div class="import-form" >
            <div class="import-div">
                Search
                <p>Search your result</p>
            </div>
            <div class="import-div">
                Teacher id
                <input class="input_import" type="text" name="teacher_id" data-rules="required" v-model="exports.teacher_id" placeholder="Teacher">
            </div>
    
            <div class="import-div">
                Subject id
                <input class="input_import" type="text" name="subject_id" data-rules="required" v-model="exports.subject_id" placeholder="Subject">
            </div>
            <div class="import-div">
                Semester
                <select class="input_import" v-model="exports.semester" >
                    <option value="HK1">HK1</option>
                    <option value="HK2">HK2</option>
                    <option value="HK3">HK3</option>
                </select>
            </div>
            <div class="import-div">
                Year
                <select class="input_import" v-model="exports.year" >
                    <option v-bind:value="today()-1">{{ today()-1  }}</option>
                    <option v-bind:value="today()">{{ today() }}</option>
                    <option v-bind:value="today()+1">{{ today() + 1 }}</option>
                </select>
            </div> 
            <div class="import-div">
                    <button class="input_import-submit cancel" type="submit" @click="cancel">Cancel</button>
                    <button class="input_import-submit upload" type="submit" @click="saveForm">Export</button>
            </div> 
    </div>
    
    </template>

    <script>    
        export default {
            
            data(){
                return{
                    exports:{
                        teacher_id:'',
                        subject_id:'',
                        semester:'',
                        year:'',
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
                    .post('export',{
                        teacher_id: this.exports.teacher_id,
                        subject_id: this.exports.subject_id,
                        year: this.exports.year,
                        semester: this.exports.semester,
                        })
                    .then(response=>{
                            window.location.href = '/home';
                   })
                },
            }
    }
    
       
</script>