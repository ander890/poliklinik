<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poliklinik</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="jumbotron jumbotron-fluid" style="background-color:#214b8e">
        <div class="container">
            <center>
                <br>
                <h1 class="display-4" style="color:white"><b>Sistem Temu Janji</b></h1>
                <h1 class="display-4" style="color:white"><b>Pasien - Dokter</b></h1>
                <p style="color:white">Bimbingan Karir 2024 Bidang Web</p>
                <br>
            </center>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2><b>Login Sebagai Pasien</b></h2>
                        <p>Apabila anda seorang Pasien, silakan Login terlebih dahulu untuk melakukan pendaftaran sebagai pasien</p>
                        <a href="{{ url('/pasien/login') }}" class="card-link">Klik Link Berikut -></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                <div class="card-body">
                        <h2><b>Login Sebagai Dokter</b></h2>
                        <p>Apabila anda seorang Dokter, silakan Login terlebih dahulu untuk memulai melayani pasien!</p>
                        <a href="{{ url('/dokter/login') }}" class="card-link">Klik Link Berikut -></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
