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
            <h5>SUKSES MENDAFTAR POLI</h5>
            <br>
            <h5>NO ANTRIAN : {{ $dp->no_antrian }}</h5>

            </center>
            <form method="post">
                @csrf
                <label for="">Nama</label>
                <input type="text" class="form-control" value="{{ $p->nama }}" readonly>
                <label for="">No. RM</label>
                <input type="text" class="form-control" value="{{ $p->no_rm }}" readonly>
                <label for="">Poli</label>
                <input type="text" class="form-control" value="{{ $poli->nama_poli }}" readonly>
                <label for="">Jadwal</label>
                <input type="text" class="form-control" value="{{ $jadwal->hari }} {{ $jadwal->jam_mulai }}-{{ $jadwal->jam_selesai }} ({{ $jadwal->nama }})" readonly>
                <label for="">Keluhan</label>
                <input type="text" class="form-control" value="{{ $keluhan }}" readonly>
                
            </form>

            <!-- /.social-auth-links -->
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection

<!-- /.login-box -->
