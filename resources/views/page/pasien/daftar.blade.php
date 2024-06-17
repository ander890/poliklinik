@extends('layouts.base_admin.base_auth') @section('judul', 'Halaman Login') @section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="#">
            <b>Poli</b>klinik</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <center>
                <h5>Booking Jadwal Periksa</h5>
            </center>

            <form method="post" action="{{ url('/pasien/periksa') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $pasien->id }}">
                <label for="">Nama</label>
                    <input
                        type="text"
                        placeholder="Nama Lengkap"
                        class="form-control @error('email') is-invalid @enderror"
                        name="nama"
                        value="{{ $pasien->nama }}"
                        readonly>
                <label for="">No. RM</label>
                    <input
                        type="text"
                        placeholder="No. RM"
                        class="form-control @error('email') is-invalid @enderror"
                        name="no_rm"
                        value="{{ $pasien->no_rm }}"
                        readonly>
                <label for="">Pilih Poli</label>
                <select id="poli" name="poli" class="form-control">
                    <option value="" selected disabled>=== PILIH POLI ===</option>
                    @foreach($poli as $pol)
                    <option value="{{ $pol->id }}">{{ $pol->nama_poli }}</option>
                    @endforeach
                </select>
                <label for="">Pilih Jadwal</label>
                <select id="jadwal" name="jadwal" class="form-control">
                    
                </select>
                <label for="">Keluhan</label>
                <textarea name="keluhan" id="" name="keluhan" class="form-control"></textarea>
                <br>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Konfirmasi</button>
                        <a href="{{ url('/') }}" class="btn btn-secondary btn-block">Batal</a>

                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <!-- /.social-auth-links -->
        </div>
        <!-- /.login-card-body -->
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#poli').on('change', function() {
            // Ambil nilai dari opsi yang dipilih
            var selectedValue = $(this).val();

            // Kirim permintaan AJAX ke API
            $.ajax({
                url: '{{ url("pasien/jadwal_dokter") }}', // Ganti dengan URL API Anda
                type: 'GET', // atau 'POST' tergantung pada API
                data: { id_poli: selectedValue }, // Data yang dikirim ke API
                success: function(response) {
                    // Tampilkan data yang diterima dari API
                    $('#jadwal').empty();
            
                    // Tambahkan opsi default
                    $('#jadwal').append('<option value="">=== PILIH JADWAL ===</option>');

                    // Iterasi melalui data dan tambahkan opsi ke elemen select
                    response.forEach(function(item) {
                        $('#jadwal').append('<option value="' + item.id + '">' + item.hari + ' ' + item.jam_mulai + " - " + item.jam_selesai + ' (' + item.nama + ')' + '</option>');
                    });
                },
                error: function(error) {
                    // Tangani error
                    console.log('Error:', error);
                }
            });
        });
    });

</script>
@endsection

<!-- /.login-box -->
