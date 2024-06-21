@extends('layouts.base_admin.base_auth') @section('judul', 'Halaman Login') @section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="#">
            <b>Poli</b>klinik</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <center>
            <h5>PENDAFTARAN PASIEN</h5>
            </center>
            <p class="login-box-msg">Mohon lengkapi data pasien</p>

            <form method="post">
                @csrf
                <div class="input-group mb-3">
                    <input
                        type="text"
                        placeholder="Nama Lengkap"
                        class="form-control @error('email') is-invalid @enderror"
                        name="nama"
                        required="required"
                        value="Daniel">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input
                        type="text"
                        placeholder="Alamat"
                        class="form-control @error('email') is-invalid @enderror"
                        name="alamat"
                        required="required"
                        value="SMG">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-map"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input
                        type="text"
                        placeholder="No KTP"
                        class="form-control @error('email') is-invalid @enderror"
                        name="no_ktp"
                        required="required"
                        value="3374">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input
                        type="text"
                        placeholder="No. HP"
                        class="form-control @error('email') is-invalid @enderror"
                        name="no_hp"
                        required="required"
                        value="081">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Lanjut</button>
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
