<template>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v3</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"> <button type="button" class="btn  custom-button margintop-10px btn-info" @click="op = 0"> Home</button></li>
              <li class="breadcrumb-item active"><button type="button" class="btn  custom-button margintop-10px btn-info" @click="op =1"> Search Teacher and Subject</button></li>
              <li class="breadcrumb-item"> <button type="button" class="btn  custom-button margintop-10px btn-info" @click="op = 2"> Mark</button></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content" v-if="op ==0">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Online Store Visitors</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">820</span>
                    <span>Visitors Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fa fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fa fa-square text-primary"></i> This Week
                  </span>

                  <span>
                    <i class="fa fa-square text-gray"></i> Last Week
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Products</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fa fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fa fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Sales</th>
                      <th>More</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                        Some Product
                      </td>
                      <td>$13 USD</td>
                      <td>
                        <small class="text-success mr-1">
                          <i class="fa fa-arrow-up"></i>
                          12%
                        </small>
                        12,000 Sold
                      </td>
                      <td>
                        <a href="#" class="text-muted">
                          <i class="fa fa-search"></i>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                        Another Product
                      </td>
                      <td>$29 USD</td>
                      <td>
                        <small class="text-warning mr-1">
                          <i class="fa fa-arrow-down"></i>
                          0.5%
                        </small>
                        123,234 Sold
                      </td>
                      <td>
                        <a href="#" class="text-muted">
                          <i class="fa fa-search"></i>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                        Amazing Product
                      </td>
                      <td>$1,230 USD</td>
                      <td>
                        <small class="text-danger mr-1">
                          <i class="fa fa-arrow-down"></i>
                          3%
                        </small>
                        198 Sold
                      </td>
                      <td>
                        <a href="#" class="text-muted">
                          <i class="fa fa-search"></i>
                        </a>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                        Perfect Item
                        <span class="badge bg-danger">NEW</span>
                      </td>
                      <td>$199 USD</td>
                      <td>
                        <small class="text-success mr-1">
                          <i class="fa fa-arrow-up"></i>
                          63%
                        </small>
                        87 Sold
                      </td>
                      <td>
                        <a href="#" class="text-muted">
                          <i class="fa fa-search"></i>
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Sales</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">$18,230.00</span>
                    <span>Sales Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fa fa-arrow-up"></i> 33.1%
                    </span>
                    <span class="text-muted">Since last month</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fa fa-square text-primary"></i> This year
                  </span>

                  <span>
                    <i class="fa fa-square text-gray"></i> Last year
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Online Store Overview</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fa fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-sm btn-tool">
                    <i class="fa fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-success text-xl">
                    <i class="ion ion-ios-refresh-empty"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-success"></i> 12%
                    </span>
                    <span class="text-muted">CONVERSION RATE</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                  <p class="text-warning text-xl">
                    <i class="ion ion-ios-cart-outline"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-up text-warning"></i> 0.8%
                    </span>
                    <span class="text-muted">SALES RATE</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex justify-content-between align-items-center mb-0">
                  <p class="text-danger text-xl">
                    <i class="ion ion-ios-people-outline"></i>
                  </p>
                  <p class="d-flex flex-column text-right">
                    <span class="font-weight-bold">
                      <i class="ion ion-android-arrow-down text-danger"></i> 1%
                    </span>
                    <span class="text-muted">REGISTRATION RATE</span>
                  </p>
                </div>
                <!-- /.d-flex -->
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
   
    <div class="for_form " v-if="op ==1">
      <div> 
      <div style="width: 60%; float:left">
        <div class='center_form'>
          <h2>Search<span class="badge bg-secondary">Form</span></h2>
          <label class='black' for="first_name">Teacher ID</label>
          <input name="first_name" v-model="assign.teacher_id" placeholder="ID" class="form-control " />
        </div>
        <div class='center_form'>
          <label class='black' for="first_name">Subject ID Code</label>
          <input name="first_name" v-model="assign.subject_id" placeholder="ID" class="form-control " />
        </div>
        <div class='center_form'>
          <label class='black' for="first_name">Year</label>
          <input name="first_name" v-model="assign.year" placeholder="Year" class="form-control " />
        </div>
        <div class='center_form'>
          <label class='black' for="first_name">Semester</label>
          <input name="first_name" v-model="assign.semester" placeholder="Semester" class="form-control " />
        </div>

        <div class="centerr">
          <button class="btn btn-primary center_form centerr but_student custom-button margintop-40px" @click="search"> Search now !
          </button>
        </div>
      </div>


      <div style="width: 40%; float:right">
        <h2>Result</h2>
        <div v-if = " details.teacher_code == '' || subject.name ===''"> NULL </div>
        <div class="info  result" v-else>
          <p class="block black font"><i class="uil uil-qrcode-scan"></i>Teacher Code: {{ details.teacher_code }} </p>
          
          <p class="block black font"> <i class="uil uil-user"></i>Teacher Name: {{ details.first_name + " " + details.last_name }} </p>
          <p class="block black font"><i class="uil uil-home"></i>Department: {{ details.department }} </p>
          <p class="block black font"> <i class="uil uil-books"></i>Subject name: {{ subject.name }} </p>
          <p class="block black font"><i class="uil uil-favorite"></i> Subject Code: {{ subject.code }} </p>
          <button v-if ='check==true' type="button" class="btn btn-primary custom-button " @click = "op1 = 1"> Select </button>
          <div v-if="op1==1 && op==1 &&(details.teacher_code != '' || details.teacher_code != undefined) && check==true " class="upload_report"> 


        <label class='black' for="first_name">Title</label>
        <input name="first_name" v-model="report.title" placeholder="title" class="form-control " />
        <label class='black' for="first_name">Note</label>
        <input name="first_name" v-model="report.note" placeholder="Note" class="form-control " />
        <label class='black' for="first_name">File Upload</label>
        <label class ='white' for="note">Select File</label>
      <input type="file" class="form-control l " v-on:change="uploadFile" enctype ="multipart/form-data">
      <button type="button" class="btn btn-primary custom-button " @click = "uploadReport"> Upload </button>
      
      </div>
        </div>     
        </div>                                                                      
      </div>

      </div> 


  <div class="black center_form" v-if= "op==2" >
    <h2  style="text-align: center;" >Mark Information</h2>
<table class="table center_form ">
<thead>
<tr>
<th scope="col">All</th>
</tr>
</thead>
<tbody>
  <li v-for="reportz in report">
  <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Mark</th>
    <th>Submit Time</th>
  </tr>
<tr>
<td>{{ reportz.id }}</td>
<td>{{ reportz.title}}</td>
<td>{{ reportz.mark }}</td>
<td>{{reportz.created_at}}</td>
</tr>
</li>
</tbody>
</table>
  </div>   
  


    </div>


  
</template>
<script>
export default {
  mounted(){
    axios.post('file_index_report')
        .then(response => { 
            this.report = response.data
        })
      },
  data() {
    return {
      op: 0,
      op1: 0,
      check: false,
      details: {
        first_name: "",
        teacher_code: "",
        last_name: "", 
        department: ""
      },
      subject: {
        name: "",
        code: ""
      },
      assign: {
        teacher_id: "",
        subject_id: "",
        semester: "",
        year: ""
      },
      report: {
        note: "", 
        title: "",
        path: "",
        teacher_to_subject_id: ""
      }
    }
  },
  methods: {
    async search() {
      await axios.post('search_sub', {
        teacher_id: this.assign.teacher_id,
        subject_id: this.assign.subject_id,
        semester: this.assign.semester,
        year: this.assign.year,
      }).then(response => [
          this.details = response.data[0],
          this.subject = response.data[1],
        this.check = response.data[2] 
        ]
        );
    },
    async uploadFile(event){
        this.report.path = event.target.files[0];
        console.log(this.report.path);
      } 
      , 
    async uploadReport(){
      this.errors = [];
        if (!this.report.title) {
            this.errors.push("Name is required.");
                }
        if (!this.report.note) {
        this.errors.push("Note is required.");
        }
        if (!this.report.path) {
        this.errors.push("Path is required.");
        }

        if (!this.errors.length) {
        let data = new FormData();
        data.append('_method', 'POST');
        data.append('path', this.report.path);
        data.append('title', this.report.title);
        data.append('note', this.report.note);
        data.append('teacher_id', this.assign.teacher_id);
        data.append('subject_id', this.assign.subject_id);
        data.append('semester', this.assign.semester);
        data.append('year', this.assign.year);
          console.log(data)
        await axios.post('/upload_report',
                    data,{ headers: {
                        'content-type': 'multipart/form-data'
                    } }, 
                    ).then(response => [
                      this.report = response.data ]
        );;
                    window.location.reload();
        }
    },
 


  }
}
</script> 