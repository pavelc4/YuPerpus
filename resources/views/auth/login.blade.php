<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login</title>
    <link rel="icon" href="{{asset('assets/img/unsplash/logo.png')}}" type="image/x-icon">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('assets/modules/bootstrap-social/bootstrap-social.css')}}">
    <link rel="stylesheet" href="{{asset('assets/modules/izitoast/css/iziToast.min.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
    <style>
        body, html { height: 100%; }
        .login-center {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 380px;
            border-radius: 12px;
        }
        .social-btn {
        height: 45px; /* Sesuaikan dengan tinggi tombol login */
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.5rem 1rem;
    }
    </style>
</head>
<body class="bg-white">
    <div class="login-center">
        <div class="card card-info shadow login-card">
            <div class="card-header">
                <h4 class="text-info">YuPerpus</h4>
            </div>
            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            {{ session('error') }}
                        </div>
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}" class="needs-validation">
                    @csrf
                    <div class="form-group">
                        <label class="text-info" for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" tabindex="1" autofocus placeholder="Masukkan Email" value="{{ old('email') }}">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label text-info">Password</label>
                            <div class="float-right d-none">
                                <a href="/forgot-password" class="text-small text-info">
                                    Lupa Password?
                                </a>
                            </div>
                            <input id="password" type="password" class="form-control" name="password" tabindex="2" placeholder="Masukan Password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>
                    <div class="form-group">
                        <span>Belum punya akun? </span>
                        <a href="{{ route('register') }}" class="text-info">
                            Daftar
                        </a>
                    </div>
                    <div class="form-group mb-2">
                        <button type="submit" class="btn btn-info btn-lg btn-block" tabindex="4">
                            Login
                        </button>
                    </div>
                    <div class="form-group mb-2 text-center text-muted" style="font-size:13px;">
                        Lanjut dengan
                    </div>
                    <div class="form-group d-flex gap-2 align-items-stretch">
    <a href="{{ route('auth.google') }}" class="btn btn-outline-danger btn-block d-flex align-items-center justify-content-center">
        <i class="fab fa-google mr-2"></i> Google
    </a>
    <a href="{{ route('auth.github') }}" class="btn btn-outline-dark btn-block d-flex align-items-center justify-content-center">
        <i class="fab fa-github mr-2"></i> GitHub
    </a>
</div>
                </form>
            </div>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
    <script src="{{asset('assets/modules/popper.js')}}"></script>
    <script src="{{asset('assets/modules/tooltip.js')}}"></script>
    <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('assets/modules/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/stisla.js')}}"></script>
    <script src="{{asset('assets/modules/izitoast/js/iziToast.min.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    @if(session('status'))
    <script>
        iziToast.success({
            title: 'Password Reset!',
            message: '{{session('status')}}',
            position: 'topRight'
        });
    </script>
    @elseif(session('gagal'))
    <script>
        iziToast.error({
            title: 'Gagal Login!',
            message: '{{session('gagal')}}',
            position: 'topRight'
        });
    </script>
    @elseif(session('sukses'))
    <script>
        iziToast.success({
            title: 'Sukses!',
            message: '{{session('sukses')}}',
            position: 'topRight'
        });
    </script>
    @endif
</body>
</html>