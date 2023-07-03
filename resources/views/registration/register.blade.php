<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Estimizer | Pendaftaran</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="{{ route('process_registration') }}" class="h1"><b>Estimizer</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Pendaftaran akun Estimizer</p>

        <form action="{{ route('process_registration') }}" method="post">
          @csrf
          <div class="input-group mt-3">
            <input type="text" class="form-control" placeholder="Nama Lengkap" name="name"
              value="{{ old('name') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @error('name')
            <small class="text-danger mt-2 mb-2">{{ $message }}</small>
          @enderror
          <div class="input-group mt-3">
            <input type="email" class="form-control" placeholder="Alamat Email" name="email"
              value="{{ old('email') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @error('email')
            <small class="text-danger mt-2 mb-2">{{ $message }}</small>
          @enderror
          <div class="input-group mt-3">
            <input type="password" class="form-control" placeholder="Kata Sandi" name="password"
              value="{{ old('password') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password')
            <small class="text-danger mt-2 mb-2">{{ $message }}</small>
          @enderror
          <div class="input-group mt-3">
            <input type="password" class="form-control" placeholder="Ulangi Kata Sandi" name="password2"
              value="{{ old('password2') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          @error('password2')
            <small class="text-danger mt-2 mb-2">{{ $message }}</small>
          @enderror
          <div class="row mt-4 mb-4">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                  Saya menyetujui <a href="#">terms</a>.
                </label>
              </div>
              @error('terms')
                <small class="text-danger mt-2 mb-2">{{ $message }}</small>
              @enderror
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center mb-4">
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i>
            Sign up using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i>
            Sign up using Google+
          </a>
        </div>

        <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>

</html>
