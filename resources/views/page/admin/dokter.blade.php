@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Halaman Dashboard')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah / Edit Dokter</h1>
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
                    <div class="card-header">Tambah Dokter</div>

                    <div class="card-body">
                        <form action="" method="post">
                          @csrf
                          <div class="row">
                            <div class="col-md-6">
                              <label for="">Nama</label>
                              <input name="nama" type="text" class='form-control' value="{{ @$selected['nama'] }}">
                              <br>
                              <label for="">Alamat</label>
                              <input name="alamat" type="text" class='form-control' value="{{ @$selected['alamat'] }}">
                            </div>
                            <div class="col-md-6">
                              <label for="">Nomor HP</label>
                              <input name="no_hp" type="text" class='form-control' value="{{ @$selected['no_hp'] }}">
                              <br>
                              <label for="">Poli</label>
                              <select name="poli" id="" class='form-control'>
                                @foreach($poli as $p)
                                <option value="{{ $p->id }}" @if(@$selected['nama_poli'] == $p->nama_poli) selected @endif>{{ $p->nama_poli }}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="col-md-12">
                              <br>
                              <button class="btn btn-block btn-success">Simpan</button>
                            </div>
                            <div class="col-md-12">
                              <a href="{{ url('/admin/dokter') }}" class="btn btn-block btn-secondary" style="margin-top:5px">Reset</a>
                            </div>
                          </div>
                          
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Daftar Dokter</div>

                    <div class="card-body">
                      <table class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                          <tr>
                            <td>No</td>
                            <td>Nama</td>
                            <td>Alamat</td>
                            <td>No Hp</td>
                            <td>Poli</td>
                            <td>Aksi</td>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($dokter as $i => $d)
                          <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $d->nama }}</td>
                            <td>{{ $d->alamat }}</td>
                            <td>{{ $d->no_hp }}</td>
                            <td>{{ $d->nama_poli }}</td>
                            <td>
                              <a class="btn btn-primary" href="{{ url('/admin/dokter?id='.$d->id) }}">Edit</a>
                              <a class="btn btn-danger" href="{{ url('/admin/dokter/delete/'.$d->id) }}">Hapus</a>

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
