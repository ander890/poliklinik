@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Halaman Dashboard')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah / Edit Obat</h1>
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
                    <div class="card-header">Tambah Obat</div>

                    <div class="card-body">
                        <form action="" method="post">
                          @csrf
                          <div class="row">
                            <div class="col-md-12">
                              <label for="">Nama Obat</label>
                              <input name="nama_obat" type="text" class='form-control' value="{{ @$selected['nama_obat'] }}">
                              <br>
                              <label for="">Kemasan</label>
                              <input name="kemasan" type="text" class='form-control' value="{{ @$selected['kemasan'] }}">
                              <br>
                              <label for="">Harga</label>
                              <input name="harga" type="number" class='form-control' value="{{ @$selected['harga'] }}">
                            </div>
                            <div class="col-md-12">
                              <br>
                              <button class="btn btn-block btn-success">Simpan</button>
                            </div>
                            <div class="col-md-12">
                              <a href="{{ url('/admin/obat') }}" class="btn btn-block btn-secondary" style="margin-top:5px">Reset</a>
                            </div>
                          </div>
                          
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Daftar Obat</div>

                    <div class="card-body">
                      <table class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                          <tr>
                            <td>No</td>
                            <td>Nama Obat</td>
                            <td>Kemasan</td>
                            <td>Harga</td>
                            <td>Aksi</td>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($obat as $i => $o)
                          <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $o->nama_obat }}</td>
                            <td>{{ $o->kemasan }}</td>
                            <td>@currency($o->harga)</td>
                            <td>
                              <a class="btn btn-primary" href="{{ url('/admin/obat?id='.$o->id) }}">Edit</a>
                              <a class="btn btn-danger" href="{{ url('/admin/obat/delete/'.$o->id) }}">Hapus</a>

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
