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
                <h5>Booking Jadwal Periksa</h5>
            </center>

            <form method="post">
                @csrf
                <label for="">Nama</label>
                    <input
                        type="text"
                        placeholder="Nama Lengkap"
                        class="form-control @error('email') is-invalid @enderror"
                        name="nama"
                        value="{{ $pasien->nama }}"
                        readonly>
                <label for="">No. RM</label>
                    <input
                        type="text"
                        placeholder="No. RM"
                        class="form-control @error('email') is-invalid @enderror"
                        name="no_rm"
                        value="{{ $pasien->no_rm }}"
                        readonly>
                <label for="">Pilih Poli</label>
                <select name="" class="form-control">
                    @foreach($poli as $pol)
                    <option value="{{ $pol->id }}">{{ $pol->nama_poli }}</option>
                    @endforeach
                </select>
                <label for="">Pilih Jadwal</label>
                <select name="" class="form-control">
                    
                </select>
                <label for="">Keluhan</label>
                <textarea name="keluhan" id="" class="form-control"></textarea>
                <br>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Konfirmasi</button>
                        <a href="{{ url('/') }}" class="btn btn-secondary btn-block">Batal</a>

                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection

<!-- /.login-box -->
