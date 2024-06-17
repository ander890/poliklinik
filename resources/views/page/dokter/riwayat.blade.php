@extends('layouts.base_admin.base_dashboard_dokter')
@section('judul', 'Halaman Dashboard')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Daftar Riwayat Periksa Pasien</h1>
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
                        <a>Daftar Pasien</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered display" style="width:100%">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama Pasien</td>
                                    <td>Alamat</td>
                                    <td>No KTP</td>
                                    <td>No Telepon</td>
                                    <td>No RM</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($pasien as $i => $p)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>{{ $p->alamat }}</td>
                                    <td>{{ $p->no_ktp }}</td>
                                    <td>{{ $p->no_hp }}</td>
                                    <td>{{ $p->no_rm }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary detail_btn" data-toggle="modal"
                                            data-id="{{ $p->id }}">
                                            Detail Riwayat Periksa
                                        </button>
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

<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="riwayat-name">Riwayat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Tanggal Periksa</td>
                            <td>Nama</td>
                            <td>Nama Dokter</td>
                            <td>Keluhan</td>
                            <td>Catatan</td>
                            <td>Obat</td>
                            <td>Biaya</td>
                        </tr>
                    </thead>
                    <tbody id="tabel-riwayat">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script_footer')
<script>
    $('.detail_btn').click(function (e) {
        $('#detail').modal('show')
        let id = $(this).data("id")

        $('#riwayat-name').empty();
        $("#tabel-riwayat").empty()

        $.ajax({
            url: '{{ url("dokter/riwayat") }}/' + id, // Ganti dengan URL API Anda
            type: 'GET', // atau 'POST' tergantung pada API
            success: function (response) {
                // Tampilkan data yang diterima dari API
                $('#riwayat-name').text("Riwayat " + response.pasien.nama);

                let trHTML = ""
                $.each(response.periksa, function (i, item) {
                    let biayaTotal = new Intl.NumberFormat("id-ID", {
                                style: "currency",
                                currency: "IDR"
                            }).format(item.biaya_total);

                    trHTML += '<tr><td>' + (i+1) + '</td><td>' + item.tgl_periksa + '</td><td>' + item.nama + '</td><td>' + item.nama_dokter + '</td><td>' + item.keluhan + '</td><td>' + item.catatan + '</td><td>' + item.obat_string + '</td><td>' + biayaTotal + '</td></tr>';
                });

                $("#tabel-riwayat").html(trHTML)
                // // Tambahkan opsi default
                // $('#jadwal').append('<option value="">=== PILIH JADWAL ===</option>');

                // // Iterasi melalui data dan tambahkan opsi ke elemen select
                // response.forEach(function (item) {
                //     $('#jadwal').append('<option value="' + item.id + '">' + item.hari +
                //         ' ' + item.jam_mulai + " - " + item.jam_selesai + ' (' + item
                //         .nama + ')' + '</option>');
                // });
            },
            error: function (error) {
                // Tangani error
                console.log('Error:', error);
            }
        });
    })

</script>
@endsection
