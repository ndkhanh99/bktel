<template> 

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/985px-Laravel.svg.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex backslide">
        <div class="image">
          <img src="https://chungcuthongnhatcomplex.com/wp-content/uploads/2022/10/avatar-cute-meo-5.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info marginleft15px">
            <p class = "block black font"> <i class="uil uil-user"></i>{{  student.last_name +' '+student.first_name }} </p>
            <p class = "block black font"><i class="uil uil-at"></i> {{ "  MSSV:  " + student.student_code}}</p>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fa fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link white active">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white' >Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link white active">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link white">
              <i class="nav-icon fa fa-th"></i>
              <p class = 'white'>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link white">
              <i class="nav-icon fa fa-copy"></i>
              <p class = 'white'>
                Layout Options
                <i class="fa fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Top Navigation + Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/boxed.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Boxed</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Fixed Sidebar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-sidebar-custom.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Fixed Sidebar <small>+ Custom Area</small></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-topnav.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Fixed Navbar</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/fixed-footer.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Fixed Footer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/collapsed-sidebar.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Collapsed Sidebar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link white">
              <i class="fa-solid fa-chart-simple"></i>
              <p class = 'white'>
                Charts
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Inline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/uplot.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>uPlot</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link white">
              <i class="nav-icon fa fa-tree"></i>
              <p class = 'white'>
                UI Elements
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/UI/general.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/icons.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Icons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/buttons.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Buttons</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/sliders.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Sliders</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/modals.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Modals & Alerts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/navbar.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Navbar & Tabs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/timeline.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Timeline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/ribbons.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Ribbons</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link white">
              <i class="nav-icon fa fa-edit"></i>
              <p class = 'white'>
                Forms
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>General Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Advanced Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Editors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/validation.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Validation</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link white">
              <i class="nav-icon fa fa-table"></i>
              <p class = 'white'>
                Tables
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>jsGrid</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link white">
              <i class="nav-icon fa fa-calendar-alt"></i>
              <p class = 'white'>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link white">
              <i class="nav-icon fa fa-image"></i>
              <p class = 'white'>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/kanban.html" class="nav-link white">
              <i class="nav-icon fa fa-columns"></i>
              <p class = 'white'>
                Kanban Board
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link white">
              <i class="nav-icon fa fa-envelope"></i>
              <p class = 'white'>
                Mailbox
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link white">
              <i class="nav-icon fa fa-book"></i>
              <p class = 'white'>
                Pages
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/invoice.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/profile.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/e-commerce.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>E-commerce</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/projects.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-add.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Project Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-edit.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Project Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-detail.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Project Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/contacts.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Contacts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/faq.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>FAQ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/contact-us.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>FAQ</p>
                  <p  class = 'white' >Contact us</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link white">
              <i class="nav-icon fa fa-plus-square"></i>
              <p class = 'white'>
                Extras
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>
                    Login & Register v1
                    <i class="fa fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/examples/login.html" class="nav-link white">
                      <i class="fa fa-circle nav-icon"></i>
                      <p>Login v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/register.html" class="nav-link white">
                      <i class="fa fa-circle nav-icon"></i>
                      <p>Register v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/forgot-password.html" class="nav-link white">
                      <i class="fa fa-circle nav-icon"></i>
                      <p>Forgot Password v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/recover-password.html" class="nav-link white">
                      <i class="fa fa-circle nav-icon"></i>
                      <p>Recover Password v1</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p>
                    Login & Register v2
                    <i class="fa fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/examples/login-v2.html" class="nav-link white">
                      <i class="fa fa-circle nav-icon"></i>
                      <p class = 'white'>Login v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/register-v2.html" class="nav-link white">
                      <i class="fa fa-circle nav-icon"></i>
                      <p class = 'white'>Register v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/forgot-password-v2.html" class="nav-link white">
                      <i class="fa fa-circle nav-icon"></i>
                      <p class = 'white'>Forgot Password v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/recover-password-v2.html" class="nav-link white">
                      <i class="fa fa-circle nav-icon"></i>
                      <p class = 'white'>Recover Password v2</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/legacy-user-menu.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Legacy User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/language-menu.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Language Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/404.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/500.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/pace.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Pace</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/blank.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link white">
              <i class="nav-icon fa fa-search"></i>
              <p class = 'white'>
                Search
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/search/simple.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Simple Search</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/search/enhanced.html" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Enhanced</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="iframe.html" class="nav-link white">
              <i class="nav-icon fa fa-ellipsis-h"></i>
              <p>Tabbed IFrame Plugin</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.1/" class="nav-link white">
              <i class="nav-icon fa fa-file"></i>
              <p class = 'white'>Documentation</p>
            </a>
          </li>
          <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          <li class="nav-item">
            <a href="#" class="nav-link white">
              <i class="fa fa-circle nav-icon"></i>
              <p class = 'white'>Level 1</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link white">
              <i class="nav-icon fa fa-circle"></i>
              <p class = 'white'>
                Level 1
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Level 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>
                    Level 2
                    <i class="right fa fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link white">
                      <i class="fa fa-dot-circle nav-icon"></i>
                      <p class = 'white'>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link white">
                      <i class="fa fa-dot-circle nav-icon"></i>
                      <p class = 'white'>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link white">
                      <i class="fa fa-dot-circle nav-icon"></i>
                      <p class = 'white'>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link white">
                  <i class="fa fa-circle nav-icon"></i>
                  <p class = 'white'>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link white">
              <i class="fa fa-circle nav-icon"></i>
              <p class = 'white'>Level 1</p>
            </a>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link white">
              <i class="nav-icon fa fa-circle text-danger"></i>
              <p class="text white">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link white">
              <i class="nav-icon fa fa-circle text-warning"></i>
              <p class = 'white'>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link white">
              <i class="nav-icon fa fa-circle text-info"></i>
              <p class = 'white'>Informational</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <div class="centerr">
            <button class="btn btn-primary center_form centerr but_student" @click="getdata" > Submit </button>
        </div>
  </aside>

</template>
<script>

export default {

            data() {
                return {
                  student:{
                  
                    first_name:"",
                    last_name: "",
                    student_code: "",
                    department: "",
                    faculty: "",
                    address: "",
                    phone: "",
                    note: ""
                            }  
                    }
            },
            mounted(){
    axios.post('student_show')
        .then(response => {
            this.student = response.data;
            console.log(response.data);
        })
      }


        }

     
</script> 