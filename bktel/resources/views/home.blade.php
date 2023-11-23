
@extends('layouts.home_layout')
@section('content')
<body class="hold-transition sidebar-mini"> 



  <Navvv> </Navvv>
  <a href="#" class="nav-link" data-logout-route="{{ route('logout') }}" id="logout-link">Logout</a>
  <!-- /.navbar -->



  @if(isset($name_teacher) && isset($name_subject))
    <p>Teacher: {{ $name_teacher }}</p>
    <p>Subject: {{ $name_subject }}</p>
    <!-- Các thông tin khác nếu cần -->
@endif


  @if(session('error'))
<div id="errorContainer" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    <button id="closeError" style="background-color: #007BFF; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 10px;">CLOSE</button>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var errorContainer = document.getElementById('errorContainer');
    var closeButton = document.getElementById('closeError');
    
    closeButton.addEventListener('click', function () {
        errorContainer.style.display = 'none'; // Ẩn cả container khi nút "OK" được nhấn
    });
});
</script>
@endif




  <!-- Main Sidebar Container -->
 <Sliderbar  :user-name="{{ json_encode($userName) }}"  :home-code="{{ json_encode($homeCode) }}" :home-firstname="{{ json_encode($homeFirstname) }}" :home-lastname="{{ json_encode($homeLastname) }} " :admin-name="{{json_encode($adminName)}}"  :home-image="{{ json_encode($homeImage) }}" :user="{{ json_encode(Auth::user()) }}" > 

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






