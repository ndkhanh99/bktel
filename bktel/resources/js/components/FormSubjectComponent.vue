
<template>
    <div class="import-form" >
        <div class="import-div">
            <p style="font-size: larger;text-decoration: none;font-weight: 400;" class="">ADD SUBJECT</p>
            <a>Please fill and click Upload</a> 
        </div>
            
        <div class="import-div">
            Name
                <input class="input_import" type="text" name="name" data-rules="required" v-model= "subjects.name" placeholder="Name">
        </div>

        <div class="import-div">
            Code
                <input class="input_import" type="text" name="code" data-rules="required" v-model= "subjects.code" placeholder="Code">
        </div>

        <div class="import-div">
            Note
                <input class="input_import" type="text" name="Note" v-model = "subjects.note" placeholder="Note">
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
                subjects: {
                    name:'',
                    code:'',
                    note:'',
                }
            }
        },
        methods: {
                saveForm(){
                    axios.post('subjects/store',{
                        name: this.subjects.name,
                        code: this.subjects.code,
                        note: this.subjects.note,
                        }).then(res=>{
                        window.location.href='/home';
                })
                        //  console.log("hi");
             },
                cancel(){  
                    window.location.href='/home';
               }

    }
}
</script>