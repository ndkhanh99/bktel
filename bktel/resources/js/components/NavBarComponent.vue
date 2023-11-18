<template>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a :href="logoutRoute" class="nav-link" @click="logout">Logout</a>
           
          </li>
          <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="/form_teacher" class="nav-link" >Add Teacher</a>           
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="/form_subject" class="nav-link" >Add Subject</a>           
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="/import_teacher" class="nav-link" >Import Teacher</a>           
          </li>.
          <li class="nav-item d-none d-sm-inline-block">
            <a href="/import_student" class="nav-link" >Import Student</a>           
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="/import_subject" class="nav-link" >Import Subject</a>           
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="/teacher_to_subject" class="nav-link" >Register Teacher Subject</a>           
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="/student_to_subject" class="nav-link" >Register Student Subject</a>           
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="/upload_report" class="nav-link" >Upload Student Report</a>           
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="/submit_mark" class="nav-link" >Submit Teacher Grade</a>           
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="/export" class="nav-link" >Export</a>           
          </li> -->
          <!-- Add this to your existing navigation structure -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Education System
              </a>
              <div class="dropdown-menu" style="background-color: rgb(255, 255, 255);" aria-labelledby="navbarDropdown">
                <a class="dropdown-item"  href="/form_teacher">Add Teacher</a>
                <a class="dropdown-item" href="/form_subject">Add Subject</a>
                <a class="dropdown-item" href="/import_teacher">Import Teacher</a>
                <a class="dropdown-item" href="/import_student">Import Student</a>
                <a class="dropdown-item" href="/import_subject">Import Subject</a>
                <a class="dropdown-item" href="/teacher_to_subject">Register Teacher Subject</a>
                <a class="dropdown-item" href="/student_to_subject">Register Student Subject</a>
                <a class="dropdown-item" href="/upload_report">Upload Student Report</a>
                <a class="dropdown-item" href="/submit_mark">Submit Teacher Grade</a>
                <a class="dropdown-item" href="/export">Export File CSV </a>
              </div>
            </li>

          
        </ul>
        

        <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fa fa-search"></i>
          </a>
          <div class="navbar-search-block">
          </div>
        </li>

              <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="images/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="fa fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->


        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="images/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                John Pierce
                <span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
              </h3>
              <p class="text-sm">I got your message bro</p>
              <p class="text-sm text-muted"><i class="fa fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          <!-- Message End -->
        </a>

        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
      </div>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa fa-bell"></i>
        <span class="badge badge-warning navbar-badge">15</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fa fa-envelope mr-2"></i> 4 new messages
          <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fa fa-users mr-2"></i> 8 friend requests
          <span class="float-right text-muted text-sm">12 hours</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
          <i class="fa fa-file mr-2"></i> 3 new reports
          <span class="float-right text-muted text-sm">2 days</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fa fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fa fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
  




</template>


<script>

import axios from 'axios';

export default {
  data() {
    return {
      logoutRoute: '',
 
    };
  },
  mounted() {
    // Trích xuất giá trị route từ data attribute
    this.logoutRoute = document.getElementById('logout-link').getAttribute('data-logout-route');
    
  },
  methods: {
    logout() {
      axios.post(this.logoutRoute) // Gửi POST request đến route đăng xuất
        .then(() => {
          // Đăng xuất thành công, thực hiện chuyển hướng hoặc cập nhật giao diện
          window.location.href = '/login'; // Chuyển hướng đến trang đăng nhập
        })
        .catch(error => {
          console.error(error);
        });
    },
  },
};

</script>