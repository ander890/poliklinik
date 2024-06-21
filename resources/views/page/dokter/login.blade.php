@extends('layouts.base_admin.base_auth') @section('judul', 'Halaman Login') @section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="#">
            <b>Poli</b>klinik</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in sebagai Dokter</p>

            <form method="post">
                @csrf
                <div class="input-group mb-3">
                    <input
                        id="username"
                        type="text"
                        placeholder="Nama | Case Sensitive"
                        class="form-control @error('email') is-invalid @enderror"
                        name="nama"
                        required="required"
                        autocomplete="username"
                        autofocus="autofocus"
                        value="dr. Daniel A">
                    {{-- <input type="email" class="form-control" placeholder="Email" autocomplete="off"> --}}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input
                        id="password"
                        type="number"
                        placeholder="No HP"
                        class="form-control @error('password') is-invalid @enderror"
                        name="no_hp"
                        required="required"
                        autocomplete="current-password"
                        value="08990727766">
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
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            {{-- <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i>
                    Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i>
                    Sign in using Google+
                </a>
            </div> --}}
            <!-- /.social-auth-links -->
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection

<!-- /.login-box -->
