@extends('layouts.base_admin.base_dashboard_dokter')
@section('judul', 'Halaman Dashboard')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah / Edit Jadwal Periksa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <a href="{{ url('dokter/jadwal_periksa/create') }}" class="btn btn-success float-end">Tambah Jadwal</a>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a>Daftar Jadwal</a>
                    </div>

                    <div class="card-body">
                      <table class="table table-striped table-bordered display" style="width:100%">
                        <thead>
                          <tr>
                            <td>No</td>
                            <td>Nama Dokter</td>
                            <td>Hari</td>
                            <td>Jam Mulai</td>
                            <td>Jam Selesai</td>
                            <td>Status</td>
                            <td>Aksi</td>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($jadwal as $i => $p)
                          <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ Request::session()->get("nama") }}</td>
                            <td>{{ $p->hari }}</td>
                            <td>{{ $p->jam_mulai }}</td>
                            <td>{{ $p->jam_selesai }}</td>
                            <td>
                              @if($p->aktif == "Y")
                              Aktif
                              @else
                              Tidak Aktif
                              @endif
                            </td>
                            <td>
                              <a class="btn btn-primary" href="{{ url('/dokter/jadwal_periksa/edit?id='.$p->id) }}">Edit</a>
                              <!-- <a class="btn btn-danger" href="{{ url('/dokter/jadwal_periksa/delete/'.$p->id) }}">Hapus</a> -->
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
