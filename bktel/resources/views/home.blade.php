
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->


<!-- <body class="hold-transition sidebar-mini"> 


<div class="wrapper"> -->
  <!-- Navbar -->

  

      <!-- <li class="nav-item dropdown"> 
                                 <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> 
                                     
                                 </a> 
  
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"> 
               <a class="dropdown-item" href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); 
                      document.getElementById('logout-form').submit();"> {{ __('Logout') }} 
                </a> 
  
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> 
              @csrf 
            </form> 
        </div> 
      </li>  -->
@extends('layouts.app')

@section('content')

<body class="hold-transition sidebar-mini"> 

  <Navvv> </Navvv>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <Sliderbar> </Sliderbar>

  <!-- Content Wrapper. Contains page content -->
 <Container></Container>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <Attheend> </Attheend>

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->

</body>

@endsection
