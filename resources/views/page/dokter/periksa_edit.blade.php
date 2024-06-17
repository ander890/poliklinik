@extends('layouts.base_admin.base_dashboard_dokter')
@section('judul', 'Halaman Dashboard')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Periksa Pasien</h1>
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
                    <div class="card-header">Detail Periksa</div>

                    <div class="card-body">
                        <form action="" method="post">
                          @csrf
                          <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="id_daftar_poli" value="{{ $periksa->id }}">
                                <label for="">Nama Pasien</label>
                                <input type="text" class="form-control" value="{{ $periksa->nama }}" readonly>
                                <br>
                                <label for="">Tanggal Periksa</label>
                                <input type="datetime-local" name="tgl_periksa" value="{{ $pemeriksaan->tgl_periksa }}" class="form-control">
                                <br>
                                <label for="">Catatan</label>
                                <input type="text" name="catatan" value="{{ $pemeriksaan->catatan }}" class="form-control">
                                <br>
                                <label for="">Obat</label>
                                <select name="obat[]" id="" class="form-control" multiple>
                                    @foreach($obat as $o)
                                    <option value="{{ $o->id }}" @if(in_array($o->id, $obat_selected)) selected @endif>{{ $o->nama_obat }} ({{ $o->kemasan }}) - @currency($o->harga)</option>
                                    @endforeach
                                </select>
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
