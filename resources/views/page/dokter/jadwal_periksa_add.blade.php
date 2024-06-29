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
                    <div class="card-header">Detail Jadwal Periksa</div>

                    <div class="card-body">
                        <form action="" method="post">
                          @csrf
                          <div class="row">
                            <div class="col-md-12">
                              <label for="">Hari</label>
                              <select name="hari" class="form-control" @if(@$selected) disabled @endif>
                                <option value="Senin" @if(@$selected['hari'] == "Senin") selected @endif>Senin</option>
                                <option value="Selasa" @if(@$selected['hari'] == "Selasa") selected @endif>Selasa</option>
                                <option value="Rabu" @if(@$selected['hari'] == "Rabu") selected @endif>Rabu</option>
                                <option value="Kamis" @if(@$selected['hari'] == "Kamis") selected @endif>Kamis</option>
                                <option value="Jumat" @if(@$selected['hari'] == "Jumat") selected @endif>Jumat</option>
                                <option value="Sabtu" @if(@$selected['hari'] == "Sabtu") selected @endif>Sabtu</option>
                                <option value="Minggu" @if(@$selected['hari'] == "Minggu") selected @endif>Minggu</option>
                              </select>
                              <br>
                              <label for="">Jam Mulai</label>
                              <input name="jam_mulai" type="time" class='form-control' value="{{ @$selected['jam_mulai'] }}" @if(@$selected) readonly @endif>
                              <br>
                              <label for="">Jam Selesai</label>
                              <input name="jam_selesai" type="time" class='form-control' value="{{ @$selected['jam_selesai'] }}" @if(@$selected) readonly @endif>
                              @if(@$selected)
                              <br>
                              <label for="">Status</label>
                              <select name="aktif" class="form-control">
                                <option value="Y" @if(@$selected['aktif'] == "Y") selected @endif>Aktif</option>
                                <option value="T" @if(@$selected['aktif'] == "T") selected @endif>Tidak Aktif</option>
                              </select>
                              @endif
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
