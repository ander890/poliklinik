@extends('layouts.base_admin.base_dashboard_dokter')
@section('judul', 'Halaman Dashboard')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Periksa Pasien</h1>
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
                            <td>No Antrian</td>
                            <td>Nama Pasien</td>
                            <td>Keluhan</td>
                            <td>Aksi</td>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($periksa as $i => $p)
                          <tr>
                            <td>{{ $p->no_antrian }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->keluhan }}</td>
                            <td>
                                @if($p->id_periksa)
                                    <a class="btn btn-warning" href="{{ url('/dokter/periksa/edit?id='.$p->id) }}">Edit</a>
                                @else
                                    <a class="btn btn-primary" href="{{ url('/dokter/periksa/create/'.$p->id) }}">Periksa</a>
                                @endif
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
