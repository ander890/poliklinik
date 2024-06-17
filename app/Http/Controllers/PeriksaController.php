<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePeriksaRequest;
use App\Http\Requests\UpdatePeriksaRequest;
use App\Models\Periksa;
use App\Models\JadwalPeriksa;
use App\Models\DaftarPoli;
use App\Models\Obat;
use App\Models\DetailPeriksa;
use App\Models\Pasien;

use Illuminate\Http\Request;

class PeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ret = [
            "periksa" => DaftarPoli::select("pasien.nama", "daftar_poli.*", "periksa.id as id_periksa")
            ->join("pasien", "daftar_poli.id_pasien", "=", "pasien.id")
            ->join("jadwal_periksa", "daftar_poli.id_jadwal", "=", "jadwal_periksa.id")
            ->join("dokter", "jadwal_periksa.id_dokter", "=", "dokter.id")
            ->leftJoin("periksa", "periksa.id_daftar_poli", "=", "daftar_poli.id")
            ->where("dokter.id", $request->session()->get("id"))
            ->where("jadwal_periksa.hari", $this->hari_ini())
            ->whereDate("daftar_poli.created_at", ">=", date("Y-m-d", strtotime('-7 days')))
            ->orderBy("daftar_poli.no_antrian", "ASC")
            ->get(),
        ];


        return view('page.dokter.periksa', $ret);
    }

    public function riwayat(Request $request)
    {
        $ret = [
            "pasien" => Pasien::all()
        ];

        return view('page.dokter.riwayat', $ret);
    }

    public function riwayatAPI(Request $request)
    {
        $periksa = DaftarPoli::select("periksa.id", "periksa.tgl_periksa", "pasien.nama", "dokter.nama as nama_dokter", "daftar_poli.keluhan", "periksa.catatan", "periksa.biaya_periksa")
        ->join("pasien", "daftar_poli.id_pasien", "=", "pasien.id")
        ->join("jadwal_periksa", "daftar_poli.id_jadwal", "=", "jadwal_periksa.id")
        ->join("dokter", "jadwal_periksa.id_dokter", "=", "dokter.id")
        ->leftJoin("periksa", "periksa.id_daftar_poli", "=", "daftar_poli.id")
        ->where("pasien.id", $request->id)
        ->get()
        ->toArray();

        $periksa_final = [];
        $biaya_obat = 0;
        foreach($periksa as $p){
            $p['obat'] = DetailPeriksa::select("obat.*")->where("id_periksa", $p['id'])->join("obat", "detail_periksa.id_obat", "=", "obat.id")->get()->toArray();
            $p['obat_string'] = "";
            foreach($p['obat'] as $i => $o){
                $p['obat_string'] .= $o['nama_obat'];
                if(@$p['obat'][$i+1]){
                    $p['obat_string'] .= ", ";
                }
            }
            $p["biaya_obat"] = (int)DetailPeriksa::where("id_periksa", $p['id'])->join("obat", "detail_periksa.id_obat", "=", "obat.id")->sum("obat.harga");
            $p["biaya_total"] = $p['biaya_periksa'] + $p['biaya_obat'];
            array_push($periksa_final, $p);
        }


        $ret = [
            "pasien" => Pasien::findOrFail($request->id),
            "periksa" => $periksa_final,
        ];

        return response()->json($ret);
    }

    function hari_ini() {
        date_default_timezone_set('Asia/Jakarta');

        $hari_inggris = date('l'); // Mendapatkan nama hari dalam bahasa Inggris
        // Array yang mencocokkan nama hari bahasa Inggris dengan bahasa Indonesia
        $nama_hari = array(
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        );
    
        // Mengembalikan nama hari dalam bahasa Indonesia
        return $nama_hari[$hari_inggris];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $ret = [
            "periksa" => DaftarPoli::select("pasien.nama", "daftar_poli.*", "periksa.id as id_periksa")
            ->join("pasien", "daftar_poli.id_pasien", "=", "pasien.id")
            ->join("jadwal_periksa", "daftar_poli.id_jadwal", "=", "jadwal_periksa.id")
            ->join("dokter", "jadwal_periksa.id_dokter", "=", "dokter.id")
            ->leftJoin("periksa", "periksa.id_daftar_poli", "=", "daftar_poli.id")
            ->where("dokter.id", $request->session()->get("id"))
            ->where("jadwal_periksa.hari", $this->hari_ini())
            ->whereDate("daftar_poli.created_at", ">=", date("Y-m-d", strtotime('-7 days')))
            ->where("daftar_poli.id", $request->id)
            ->orderBy("daftar_poli.no_antrian", "ASC")
            ->first(),
            "obat" => Obat::all(),
        ];

        return view('page.dokter.periksa_create', $ret);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeriksaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $periksa = new Periksa;
        $periksa->id_daftar_poli = $request->id_daftar_poli;
        $periksa->tgl_periksa = $request->tgl_periksa;
        $periksa->catatan = $request->catatan;
        $periksa->biaya_periksa = 150000;
        $periksa->save();

        foreach($request->obat as $o){
            $detail_periksa = new DetailPeriksa;
            $detail_periksa->id_periksa = $periksa->id;
            $detail_periksa->id_obat = $o;
            $detail_periksa->save();
        }

        toastr()->success("Berhasil Simpan Data Pemeriksaan");

        return redirect("/dokter/periksa");
    }

    function tanggal_dari_hari($hari) {
        // Daftar nama hari dalam bahasa Indonesia
        $nama_hari = array(
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );
    
        // Menentukan indeks dari nama hari yang diberikan
        $indeks = array_search($hari, $nama_hari);
    
        // Mendapatkan hari ini dalam format timestamp
        $hari_ini = strtotime('today');
    
        // Mendapatkan hari minggu ini dalam format timestamp
        $hari_ini_minggu_ini = strtotime('last Sunday', $hari_ini);
    
        // Menambahkan selisih hari antara hari ini dan hari yang ingin kita cari
        $selisih = $indeks - date('N', $hari_ini_minggu_ini);
        if ($selisih < 0) {
            $selisih += 7;
        }
    
        // Mendapatkan tanggal dari hari yang dicari
        $tanggal = strtotime("+$selisih days", $hari_ini_minggu_ini);
    
        // Jika tanggal yang dihasilkan kurang dari tanggal hari ini, tambahkan satu minggu
        while ($tanggal < $hari_ini) {
            $tanggal = strtotime('+1 week', $tanggal);
        }
    
        // Mengembalikan tanggal dalam format yang diinginkan
        return date('Y-m-d', $tanggal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function show(Periksa $periksa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $ret = [
            "periksa" => DaftarPoli::select("pasien.nama", "daftar_poli.*", "periksa.id as id_periksa")
            ->join("pasien", "daftar_poli.id_pasien", "=", "pasien.id")
            ->join("jadwal_periksa", "daftar_poli.id_jadwal", "=", "jadwal_periksa.id")
            ->join("dokter", "jadwal_periksa.id_dokter", "=", "dokter.id")
            ->leftJoin("periksa", "periksa.id_daftar_poli", "=", "daftar_poli.id")
            ->where("dokter.id", $request->session()->get("id"))
            ->where("jadwal_periksa.hari", $this->hari_ini())
            ->whereDate("daftar_poli.created_at", ">=", date("Y-m-d", strtotime('-7 days')))
            ->where("daftar_poli.id", $request->id)
            ->orderBy("daftar_poli.no_antrian", "ASC")
            ->first(),
            "obat" => Obat::all(),
            "pemeriksaan" => Periksa::where("id_daftar_poli", $request->id)->firstOrFail(),
        ];

        $obat_selected = [];
        $detail = DetailPeriksa::select("id_obat")->where("id_periksa", $ret['pemeriksaan']->id)->get()->toArray();
        foreach($detail as $d){
            array_push($obat_selected, $d['id_obat']);
        }

        $ret['obat_selected'] = $obat_selected;

        return view('page.dokter.periksa_edit', $ret);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeriksaRequest  $request
     * @param  \App\Models\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $periksa = Periksa::where("id_daftar_poli", $request->id)->firstOrFail();
        $periksa->tgl_periksa = $request->tgl_periksa;
        $periksa->catatan = $request->catatan;
        $periksa->save();

        DetailPeriksa::where("id_periksa", $periksa->id)->delete();

        foreach($request->obat as $o){
            $detail_periksa = new DetailPeriksa;
            $detail_periksa->id_periksa = $periksa->id;
            $detail_periksa->id_obat = $o;
            $detail_periksa->save();
        }

        toastr()->success("Berhasil Edit Data Pemeriksaan");

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Periksa  $periksa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Periksa $periksa)
    {
        //
    }
}
