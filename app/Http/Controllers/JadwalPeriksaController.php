<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJadwalPeriksaRequest;
use App\Http\Requests\UpdateJadwalPeriksaRequest;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;

class JadwalPeriksaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ret = [
            "jadwal" => JadwalPeriksa::query()
                        ->select("jadwal_periksa.*", "dokter.nama as nama_dokter")
                        ->join("dokter", "jadwal_periksa.id_dokter", "=", "dokter.id")
                        ->where("id_dokter", $request->session()->get("id"))
                        ->get(),
        ];

        return view('page.dokter.jadwal_periksa', $ret);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('page.dokter.jadwal_periksa_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreJadwalPeriksaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if(JadwalPeriksa::where("id_dokter", $request->session()->get("id"))->where("aktif", "Y")->first() && $request->aktif == "Y"){
        //     JadwalPeriksa::where("id_dokter", $request->session()->get("id"))->update(["aktif" => "T"]);
        // }

        $jadwal = new JadwalPeriksa;
        $jadwal->id_dokter = $request->session()->get("id");
        $jadwal->hari = $request->hari;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_selesai = $request->jam_selesai;
        $jadwal->aktif = "T";
        $jadwal->save();

        toastr()->success("Tambah jadwal periksa sukses");

        return redirect('/dokter/jadwal_periksa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JadwalPeriksa  $jadwalPeriksa
     * @return \Illuminate\Http\Response
     */
    public function show(JadwalPeriksa $jadwalPeriksa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JadwalPeriksa  $jadwalPeriksa
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $ret = [
            "selected" => JadwalPeriksa::find($request->id)
        ];

        return view('page.dokter.jadwal_periksa_add', $ret);
    }

    public function update(Request $request)
    {
        //AMBIL ID DOKTER PADA SESSION
        $idDokter = $request->session()->get("id");

        //CEK ID JADWAL PADA DATABASE, JIKA TIDAK DITEMUKAN RETURN 404
        $jadwal = JadwalPeriksa::findOrFail($request->id);

        //PERIKSA APAKAH ADA JADWAL DOKTER AKTIF & FORM YANG DISUBMIT BERSTATUS AKTIF
        if(JadwalPeriksa::where("id_dokter", $idDokter)->where("aktif", "Y")->first() && $request->aktif == "Y"){
            //UPDATE SEMUA JADWAL DOKTER MENJADI TIDAK AKTIF KETIKA KONDISI TERPENUHI
            JadwalPeriksa::where("id_dokter", $idDokter)->update(["aktif" => "T"]);
        }

        //SIMPAN PADA DATABASE
        $jadwal->aktif = $request->aktif;
        $jadwal->save();

        toastr()->success("Edit jadwal periksa sukses");

        return redirect('/dokter/jadwal_periksa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JadwalPeriksa  $jadwalPeriksa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokter = JadwalPeriksa::find($id);
        $dokter->delete();

        toastr()->success("Hapus jadwal periksa sukses");
        return redirect()->back();
    }
}
