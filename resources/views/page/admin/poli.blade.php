@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Halaman Dashboard')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah / Edit Poli</h1>
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
                    <div class="card-header">Tambah Poli</div>

                    <div class="card-body">
                        <form action="" method="post">
                          @csrf
                          <div class="row">
                            <div class="col-md-12">
                              <label for="">Nama Poli</label>
                              <input name="nama_poli" type="text" class='form-control' value="{{ @$selected['nama_poli'] }}">
                              <br>
                              <label for="">Keterangan</label>
                              <input name="keterangan" type="text" class='form-control' value="{{ @$selected['keterangan'] }}">
                            </div>
                            <div class="col-md-12">
                              <br>
                              <button class="btn btn-block btn-success">Simpan</button>
                            </div>
                            <div class="col-md-12">
                              <a href="{{ url('/admin/poli') }}" class="btn btn-block btn-secondary" style="margin-top:5px">Reset</a>
                            </div>
                          </div>
                          
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Daftar Poli</div>

                    <div class="card-body">
                      <table class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                          <tr>
                            <td>No</td>
                            <td>Nama Poli</td>
                            <td>Keterangan</td>
                            <td>Aksi</td>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($poli as $i => $p)
                          <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $p->nama_poli }}</td>
                            <td>{{ $p->keterangan }}</td>
                            <td>
                              <a class="btn btn-primary" href="{{ url('/admin/poli?id='.$p->id) }}">Edit</a>
                              <a class="btn btn-danger" href="{{ url('/admin/poli/delete/'.$p->id) }}">Hapus</a>

                            </td>

                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
