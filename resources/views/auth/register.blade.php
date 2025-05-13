<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Daftar Kasir</title>
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
</head>
<body class="bg-white">
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 mt-3">
                        <div class="login-brand">
                            <!-- <img src="stisla/img/stisla-fill.svg" alt="logo" width="100"
                                class="shadow-light rounded-circle"> -->
                        </div>

                        <div class="card card-info shadow">
                            <div class="card-header">
                                <h4 class="text-info">Daftar Baru</h4>
                            </div>
                            @error('status')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}" class="needs-validation" id="form-daftar">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-info" for="nama">Nama</label>
                                                <input id="nama" type="text" class="form-control" name="nama"
                                                    tabindex="1" autofocus placeholder="Masukkan Nama" value="{{ old('nama') }}" required oninput="validasiInput(this)">
                                                @error('nama')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-info" for="email">Email</label>
                                                <input id="email" type="email" class="form-control" name="email"
                                                    tabindex="1" placeholder="Masukkan Email" value="{{ old('email') }}" required>
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-info" for="no_hp">Nomor HP</label>
                                                <input id="no_hp" type="text" class="form-control" name="no_hp"
                                                    tabindex="1" placeholder="Masukkan Nomor HP" value="{{ old('no_hp') }}">
                                                @error('no_hp')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-info" for="alamat">Alamat</label>
                                                <input id="alamat" type="text" class="form-control" name="alamat"
                                                    tabindex="1" placeholder="Masukkan Alamat" value="{{ old('alamat') }}">
                                                @error('alamat')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="d-block">
                                                    <label for="password" class="control-label text-info">Password</label>
                                                    <input id="password" type="password" class="form-control"
                                                        name="password" tabindex="2" placeholder="Masukan Password" required>
                                                    <div id="warning-message" style="color: red; display: none;">
                                                        Password minimal 8 karakter dan 1 huruf kapital
                                                    </div>
                                                    @error('password')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="d-block">
                                                    <label for="password_confirmation" class="control-label text-info">Konfirmasi Password</label>
                                                    <input id="password_confirmation" type="password" class="form-control"
                                                        name="password_confirmation" tabindex="2" placeholder="Konfirmasi Password" required>
                                                    @error('password_confirmation')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Hidden fields for standard columns -->
                                        <input type="hidden" name="CompanyCode" value="DEFAULT">
                                        <input type="hidden" name="Status" value="1">
                                        <input type="hidden" name="IsDeleted" value="0">
                                        <input type="hidden" name="CreatedBy" value="system">
                                        <input type="hidden" name="CreatedDate" value="{{ now() }}">
                                    </div>

                                    <div class="form-group">
                                        <span>Sudah punya akun? </span>
                                        <a href="{{ route('login') }}" class="text-info">
                                            Login
                                        </a>
                                    </div>

                                    <div class="form-group col-sm-5 mx-auto">
                                        <button type="submit" class="btn btn-info btn-lg btn-block" tabindex="4">
                                            Daftar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
    <script src="{{asset('assets/modules/popper.js')}}"></script>
    <script src="{{asset('assets/modules/tooltip.js')}}"></script>
    <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('assets/modules/moment.min.js')}}"></script>
    <script src="{{asset('assets/js/stisla.js')}}"></script>

    <!-- JS Libraies -->
    <script src="{{asset('assets/modules/izitoast/js/iziToast.min.js')}}"></script>

    <!-- Template JS File -->
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>

    @if(session('status'))
    <script>
        iziToast.error({
            title: 'Gagal Daftar!',
            message: '{{session('status')}}',
            position: 'topRight'
        });
    </script>
    @endif

    <script>
    function validasiInput(inputElement) {
      // Membuang karakter angka dari nilai input
      inputElement.value = inputElement.value.replace(/[^a-zA-Z\s]/g, '');
    }

    // Password validation
    const passwordInput = document.getElementById('password');
    passwordInput.addEventListener('input', function() {
        const password = passwordInput.value;
        const isLengthValid = password.length >= 8;
        const hasCapitalLetter = /[A-Z]/.test(password);

        if (!isLengthValid || !hasCapitalLetter) {
            document.getElementById('warning-message').style.display = 'block';
        } else {
            document.getElementById('warning-message').style.display = 'none';
        }
    });

    // Form validation
    document.getElementById('form-daftar').addEventListener('submit', function(e) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password_confirmation').value;
        
        if (password !== confirmPassword) {
            e.preventDefault();
            iziToast.error({
                title: 'Error',
                message: 'Password dan Konfirmasi Password tidak sama',
                position: 'topRight'
            });
        }
    });
    </script>
</body>
</html>