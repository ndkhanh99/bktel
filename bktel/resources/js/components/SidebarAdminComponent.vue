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
          <img src="images/IMG_0514.JPG" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Tri Thuc</a>
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
      <button @click="$emit('import_teacher')" class="nav-link" >
        <i class="far fa-circle nav-icon"></i>
          Import teacher
      </button>
      <!-- <li class="nav-item" >
        <a  href="import-teacher" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Import Teacher</p>
        </a>
      </li> -->
    </ul>
  </li>
  </ul>
  </nav>
  </div>
</aside>
</template>


<script>
 export default {
  $emit:['import_teacher'],
  data(){
      return {
      
      }
  },
  
}
</script>
