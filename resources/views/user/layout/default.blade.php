<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">  
  <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert2/sweetalert2.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css')}}">
  <style>
     .parsley-errors-list{
      color:red;
      list-style:none;
      padding:8px;
      opacity: 0.8;
     }
  </style>
  @yield("sc_header")
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>     
    </ul>

    <ul class="navbar-nav ml-auto">   
      <li class="nav-item">
        <a href="{{route('action.logout')}}" class="nav-link">
          <i class="fa fa-power-off"></i> Keluar
        </a>
      </li>      
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('user')}}" class="brand-link">
      <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <div class="sidebar">

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">                  
          <li class="nav-item">
            <a href="{{route('identity-card.index')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data Penduduk
              </p>
            </a>
          </li>                 
        </ul>
      </nav>
    </div>
  </aside>

  <div class="content-wrapper">   
    @yield("content")
  </div>
</div>

<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/dist/js/toastr.min.js')}}"></script>
<script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>

<!-- JIKA ADA SESSION SUCCESS DARI SERVER -->
@if(Session::has("fallback")) 
  @if(Session::get('fallback')['status'] == "success")
    <script>
        toastr.success(
          "{{Session::get('fallback')['message']}}",
          "Berhasil"
        );
    </script>
  @endif

  @if(Session::get('fallback')['status'] == "failed")
    <script>
      toastr.error(
          "{{Session::get('fallback')['message']}}",
          "Terjadi Kesalahan"
      )
    </script>
  @endif
@endif


@yield("sc_footer")
</body>
</html>
