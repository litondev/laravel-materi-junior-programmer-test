<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Signin</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.min.css')}}">
</head>
<body class="hold-transition login-page">
  
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>Sign</b>In</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Masuk Ke Akun Anda</p>
      <form action="{{route('action.signin')}}" method="post">
      	@csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email"
            value="{{ old('email','') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password"
            value="{{ old('password','') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Ingat Saya
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Masuk</button>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <a href="{{route('signup')}}">Daftar</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>


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

</body>
</html>