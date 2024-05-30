@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Halaman Dashboard')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah / Edit Pasien</h1>
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
                    <div class="card-header">Tambah Pasien</div>

                    <div class="card-body">
                        <form action="" method="post">
                          @csrf
                          <div class="row">
                            <div class="col-md-6">
                              <label for="">Nama Pasien</label>
                              <input name="nama" type="text" class='form-control' value="{{ @$selected['nama'] }}">
                              <br>
                              <label for="">Alamat</label>
                              <input name="alamat" type="text" class='form-control' value="{{ @$selected['alamat'] }}">
                              <br>
                              <label for="">No Ktp</label>
                              <input name="no_ktp" type="number" class='form-control' value="{{ @$selected['no_ktp'] }}">
                            </div>
                            <div class="col-md-6">
                              <label for="">Nomor Hp</label>
                              <input name="no_hp" type="text" class='form-control' value="{{ @$selected['no_hp'] }}">
                              <br>
                              <label for="">Nomor RM</label>
                              <input name="no_rm" type="text" class='form-control' value="{{ @$selected['no_rm'] }}">
                            </div>
                            <div class="col-md-12">
                              <br>
                              <button class="btn btn-block btn-success">Simpan</button>
                            </div>
                            <div class="col-md-12">
                              <a href="{{ url('/admin/pasien') }}" class="btn btn-block btn-secondary" style="margin-top:5px">Reset</a>
                            </div>
                          </div>
                          
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Daftar Pasien</div>

                    <div class="card-body">
                      <table class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                          <tr>
                            <td>No</td>
                            <td>Nama Pasien</td>
                            <td>Alamat</td>
                            <td>No. KTP</td>
                            <td>No. HP</td>
                            <td>No. RM</td>
                            <td>Aksi</td>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($pasien as $i => $o)
                          <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $o->nama }}</td>
                            <td>{{ $o->alamat }}</td>
                            <td>{{ $o->no_ktp }}</td>
                            <td>{{ $o->no_hp }}</td>
                            <td>{{ $o->no_rm }}</td>
                            <td>
                              <a class="btn btn-primary" href="{{ url('/admin/pasien?id='.$o->id) }}">Edit</a>
                              <a class="btn btn-danger" href="{{ url('/admin/pasien/delete/'.$o->id) }}">Hapus</a>

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
