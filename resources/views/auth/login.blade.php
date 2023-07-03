<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Estimizer | Masuk</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="{{ url('/') }}"><b>Estimizer</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        @if ($loginFailedMessage = Session::get('failed'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $loginFailedMessage }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @elseif ($logoutSuccessMessage = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ $logoutSuccessMessage }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @else
          <p class="login-box-msg">Masuk untuk memulai sesi anda.</p>
        @endif
        <form action="{{ route('auth.authenticate') }}" method="post">
          @csrf
          <div class="input-group">
            <input type="email" class="form-control" placeholder="Email" value="{{ old('email') }}" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @error('email')
            <small class="text-danger mt-0 mb-2">{{ $message }}</small>
          @enderror
          <div class="input-group mt-3">
            <input type="password" class="form-control" placeholder="Kata sandi" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password')
            <small class="text-danger mt-0 mb-2">{{ $message }}</small>
          @enderror
          <div class="row mt-3">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">
                  Ingat saya
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"> </i>
                Masuk</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center mb-3">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Masuk menggunakan Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Masuk menggunakan Google+
          </a>
        </div>
        <!-- /.social-auth-links -->

        <p class="mb-1">
          <a href="#">Saya lupa kata sandi</a>
        </p>
        <p class="mb-0">
          Belum punya akun?
          <a href="{{ route('register') }}" class="text-center">Daftar</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
