@extends('layouts.base_admin.base_dashboard_dokter')
@section('judul', 'Halaman Dashboard')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profile Dokter</h1>
        </div>
        <!-- <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div> -->
      </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                          @csrf
                          <div class="row">
                            <div class="col-md-12">
                                <label for="">Nama Dokter</label>
                                <input type="text" class="form-control" value="{{ $dokter->nama }}" name="nama" required>
                                <br>
                                <label for="">Alamat</label>
                                <input type="text" class="form-control" value="{{ $dokter->alamat }}" name="alamat" required>
                                <br>
                                <label for="">No Telepon</label>
                                <input type="text" class="form-control" value="{{ $dokter->no_hp }}" name="no_hp" required>
                                <br>
                            </div>
                            <div class="col-md-12">
                              <br>
                              <button class="btn btn-block btn-success">Simpan</button>
                            </div>
                          </div>
                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
