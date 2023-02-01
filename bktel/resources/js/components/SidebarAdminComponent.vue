<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="images/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img :src="image" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ users }}</a>
        </div>
      </div>
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item menu-open">
    <a href="#" class="nav-link active">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Features
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="add-teacher" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Add Teacher</p>
        </a>
      </li>
      <li class="nav-item" >
        <a  href="import-teacher" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Import Teacher</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="add-subject" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Add Subject</p>
        </a>
      </li>
      <li class="nav-item" >
        <a  href="import-subject" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Import Subject</p>
        </a>
      </li>
      <li class="nav-item" >
        <a  href="add-student" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Add Student</p>
        </a>
      </li>
      <li class="nav-item" >
        <a  href="import-student" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Import Student</p>
        </a>
      </li>
      <li class="nav-item" >
        <a  href="enroll-teacher" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Enroll Teacher to Subject</p>
        </a>
      </li>
      <li class="nav-item" >
        <a  href="export" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Export</p>
        </a>
      </li>
    </ul>
  </li>
  </ul>
  </nav>
  </div>
</aside>
</template>


<script>
export default{
        data () {
          return {
            users:[],
            image:[],
      }
    },
        methods:{
          read(){
            axios.get('/show_name').then(({data}) =>{
              this.users=data;
            }),
            axios.get('/show_image').then(({data}) =>{
              this.image=data;
            })
          },

        },
        mounted(){
          this.read()
        }
      }

</script>
