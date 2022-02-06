<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DAFTAR | {{ config('app.name') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('asset') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('asset') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('asset') }}/dist/css/adminlte.min.css">
</head>
<body class="register-page" data-new-gr-c-s-check-loaded="14.1047.0" data-gr-ext-installed="" style="min-height: 542px;">
<div class="register-box">
    <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="{{ asset('asset') }}/index2.html" class="h1"><b>Management Users</b></a>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Daftar akun baru</p>

        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama lengkap" name="name" value="{{ old('name') }}">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
                </div>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Retype password">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
                </div>
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                <div class="col-8">
                </div>
                <!-- /.col -->
                <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">DAFTAR</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <a href="{{ route('login') }}" class="text-center">Saya sudah punya akun</a>
    </div>
    <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('asset') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('asset') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('asset') }}/dist/js/adminlte.min.js"></script>


</body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration></html>
