
@extends('layouts.app')
@section('content')
<body class="hold-transition sidebar-mini"> 

  <Navvv> </Navvv>
  <a href="#" class="nav-link" data-logout-route="{{ route('logout') }}" id="logout-link">Logout</a>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <Sliderbar :user-name="{{ json_encode($userName) }}"  :student-code="{{ json_encode($studentCode) }}" :student-firstname="{{ json_encode($studentFirstname) }}" :student-lastname="{{ json_encode($studentLastname) }}" > 

 </Sliderbar>
 

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




